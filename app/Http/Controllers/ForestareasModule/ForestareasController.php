<?php

namespace App\Http\Controllers\ForestareasModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ForestArea;

class ForestareasController extends Controller
{
    


	public function getForestarea($beat_id)

    {

        $data = ForestArea::where('id',$beat_id)->first();

        \Log::info($data);

        return response()->json(['data' => $data]);

    }



}
