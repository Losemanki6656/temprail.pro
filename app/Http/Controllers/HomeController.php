<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temp;
use App\Models\UserOrganization;
use App\Models\Sector;
use App\Models\Organization;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $organizations = Organization::all();
        $org_id = UserOrganization::where('user_id', Auth::user()->id)->value('organization_id');
        
        $maxTemps = Temp::orderBy('temp','desc')->get();

        $temps = Temp::with('sector')->get();

        $sectors = Sector::
        where('organization_id',$org_id)->get();

        return view('home',[
            'temps' => $temps,
            'sectors' => $sectors,
            'organizations' => $organizations,
            'maxTemps' => $maxTemps
        ]);
    }

    public function temps(Request $request)
    {
        $org_id = UserOrganization::where('user_id', Auth::user()->id)->value('organization_id');
        
        $temps = Temp::query()
        ->where('organization_id', $org_id)
        ->when(request('sector_id'), function ( $query, $sector_id) {
            return $query->where('sector_id', $sector_id);

        })->when(request('date1'), function ( $query, $date1) {
            return $query->where('created_at','>=', $date1);

        })->when(request('date2'), function ( $query, $date2) {
            return $query->where('created_at','<=', $date2);

        })->orderBy('created_at','desc')->with('sector');

        $sectors = Sector::
        where('organization_id',$org_id)->get();

        if($request->paginate) $paginate = $request->paginate; else $paginate = 10;
        return view('temps',[
            'temps' => $temps->paginate($paginate),
            'sectors' => $sectors
        ]);
    }

    public function static(Request $request)
    {
        $org_id = UserOrganization::where('user_id', Auth::user()->id)->value('organization_id');
        if($request->date_stat) $date_stat = $request->date_stat; else $date_stat = now()->format('Y-m-d');

        $temps = Temp::where('organization_id', $org_id)
        ->whereDate('created_at','=',$date_stat)->get();

        $categories = [];
        for($i = 0; $i <= 23; $i++) {
            $c = str_pad((string)$i, 2, '0', STR_PAD_LEFT) . ':00';
            $categories[] = "'$c'";
        }

        $series = [];
        $sectors = [];
        $tempur = 0;
        foreach ($temps->groupBy('sector_id') as $key => $value) {
            for($i = 0; $i <= 23; $i++) {
                $series[$key][$i] = 0;
                $sectors[$key] = Sector::find($key)->name;
            }
        }
        foreach ($temps as $key => $temp) {
            $y = number_format($temp->created_at->format('H'));
            $series[$temp->sector_id][$y] = $temp->temp;
        }

        return view('statistic', compact( 'sectors','categories', 'series'));
    }

    public function main()
    {
        $org_id = UserOrganization::where('user_id', Auth::user()->id)->value('organization_id');

        $sectors = Sector::
        where('organization_id',$org_id)->get();

        return view('sectors',[
            'sectors' => $sectors
        ]);
    }
}
