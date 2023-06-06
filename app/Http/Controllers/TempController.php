<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temp;

class TempController extends Controller
{
    

    public function create(Request $request)
    {
        $temps = new Temp();
        $temps->organization_id = $request->userid;
        $temps->sector_id = $request->id;
        $temps->temp = $request->temp ?? 0;
        $temps->temp2 = $request->temp2 ?? 0;
        $temps->save();
        
        return response()->json([
            'message' => 'success'
        ]);
    }

    public function create(Request $request)
    {
        
        return response()->json([
            'message' => 'success'
        ]);
    }
}
