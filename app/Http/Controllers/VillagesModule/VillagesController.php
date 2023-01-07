<?php

namespace App\Http\Controllers\VillagesModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Village;
use App\ForestArea;

class VillagesController extends Controller
{
    	public function getVillage($village_id)

    {

        $data = ForestArea::where('id',$village_id)->first();

        \Log::info($data);

        return response()->json(['data' => $data]);

    }
}
