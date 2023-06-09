<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temp;
use App\Models\UserOrganization;
use App\Models\Sector;
use App\Models\Organization;
use Auth;
use Carbon\Carbon;

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
        
        $maxTemp = Temp::where('organization_id', $org_id)
            ->where('created_at', '>=', Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d'))
            ->orderBy('temp','desc')->with('sector')
            ->first();
        $minTemp = Temp::where('organization_id', $org_id)
            ->where('created_at', '>=', Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d'))
            ->orderBy('temp','asc')->with('sector')
            ->first();

        $LastmaxTemp = Temp::where('organization_id', $org_id)
            ->whereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])
            ->orderBy('temp','desc')->with('sector')->first();
        $LastminTemp = Temp::where('organization_id', $org_id)
            ->whereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])
            ->orderBy('temp','asc')->with('sector')->first();

        $dMax = (double)$maxTemp->temp ?? 0 - (double)$LastmaxTemp->temp ?? 0; 
        $dMin = (double)$minTemp->temp ?? 0 - (double)$LastminTemp->temp ?? 0; 
    
        $date_chart = request('date_chart', now()->format('Y-m-d'));

        $sectors = Sector::where('organization_id', $org_id)
            ->with([
                'temps' => function ($q) use ($date_chart) {
                    $q->whereDate('created_at', $date_chart);
                }
            ])
            ->get();

        $onlineSectorsCount = Temp::where('organization_id', $org_id)
            ->where('created_at', '>=', Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d'))
            ->select('sector_id')
            ->groupBy('sector_id')
            ->get()->count();

        $series = []; $allTemps = 0; $maxChartTemp = 0; $minChartTemp = 120; $timeMaxTemp = '';
        foreach($sectors as $item)
        {
            $data = [];
            for($i = 0; $i <= 23; $i++) {
                $summTemp = 0; $x = 0;
                foreach($item->temps as $temp)
                {
                    $q = (double)$temp->temp;
                    if( (int)$temp->created_at->format('H') == $i) {
                        if($maxChartTemp < $q) {
                            $maxChartTemp = $q; 
                            $timeMaxTemp = $temp->created_at->format('H:i');
                        }
                        if($minChartTemp > $q) $minChartTemp = $q;
                        $summTemp += $q;
                        $x++;
                    }
                }
                if($x != 0) {
                    $allTemps += $x;
                    $t = (double)number_format($summTemp/$x, 2, '.', '.');
                    $data[] = $t;
                } else $data[] = 0;
            }

            $series[] = [
                "label" => $item->name,
                "fill" => !0,
                "backgroundColor" => "rgba(6, 101, 208, .6)",
                "borderColor" => "transparent",
                "pointBackgroundColor" => "rgba(6, 101, 208, 1)",
                "pointBorderColor"  => "#fff",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(6, 101, 208, 1)",
                'data' => $data
            ];
        }

        $categories = [];
        for($i = 0; $i <= 23; $i++) {
            $c = str_pad((string)$i, 2, '0', STR_PAD_LEFT);
            $categories[] = "'$c'";
        }

        if($minChartTemp == 120) $maxChartTemp = 0;

        return view('home',[
            'sectors' => $sectors,
            'maxTemp' => $maxTemp,
            'minTemp' => $minTemp,
            'dMax' => $dMax,
            'dMin' => $dMin,
            'onlineSectorsCount' => $onlineSectorsCount,
            'categories' => $categories,
            'series' => json_encode($series, true),
            'allTemps' => $allTemps,
            'maxChartTemp' => $maxChartTemp,
            'minChartTemp' => $minChartTemp,
            'timeMaxTemp' => $timeMaxTemp
        ]);
    }

    public function temps(Request $request)
    {
        $org_id = UserOrganization::where('user_id', Auth::user()->id)->value('organization_id');
        
        $temps = Temp::query()
            ->where('organization_id', $org_id)
            ->when(request('sector_select'), function ( $query, $sector_select) {
                return $query->where('sector_id', $sector_select);

            })->when(request('date1'), function ( $query, $date1) {
                return $query->where('created_at','>=', $date1);

            })->when(request('date2'), function ( $query, $date2) {
                return $query->where('created_at','<=', $date2);

            })->orderBy('created_at','desc')->with('sector');

            $sectors = Sector::where('organization_id', $org_id)->get();

        return view('temps',[
            'temps' => $temps->paginate(request('paginate_select',10)),
            'sectors' => $sectors
        ]);
    }

    public function sectors()
    {
        $org_id = UserOrganization::where('user_id', Auth::user()->id)->value('organization_id');

        $sectors = Sector::where('organization_id',$org_id)->get();

        return view('sectors',[
            'sectors' => $sectors
        ]);
    }

    public function sector_update(Sector $id, Request $request)
    {
        $id->update($request->all());
        
        return back();
    }
}
