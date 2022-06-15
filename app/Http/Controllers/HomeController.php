<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temp;
use App\Models\UserOrganization;
use App\Models\Sector;
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
        $org_id = UserOrganization::where('user_id', Auth::user()->id)->value('organization_id');

        $temps = Temp::with('sector')->get();

        $sectors = Sector::
        where('organization_id',$org_id)->get();

        return view('home',[
            'temps' => $temps,
            'sectors' => $sectors
        ]);
    }

    public function temps()
    {
        $org_id = UserOrganization::where('user_id', Auth::user()->id)->value('organization_id');
        
        $temps = Temp::all();

        $sectors = Sector::
        where('organization_id',$org_id)->get();

        return view('temps',[
            'temps' => $temps,
            'sectors' => $sectors
        ]);
    }

    public function static()
    {
        $org_id = UserOrganization::where('user_id', Auth::user()->id)->value('organization_id');

        $temps = Temp::
        where('organization_id', $org_id)
        ->whereDate('created_at','=',now()->toDateString('Y-m-d'))
        ->get();

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
