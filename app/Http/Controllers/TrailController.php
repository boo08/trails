<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\trailResource;
use Illuminate\Support\Facades\Validator;
use App\Models\Trail;
use App\Models\Trail_items;
use DB;
class TrailController extends Controller
{
    /*
        function name:fetchTrail
        Inputs: trail id
        Description: to show trail details
        Return value:  json trail data
    */
    public function fetchTrail($id)
    {
        $prams=[];
        $prams["id"]=$id;
        $validator = \Validator::make($prams, [
            'id' => 'required|numeric',           
        ]);
    if ($validator->fails()) {
            $responseArr = [];
            $responseArr['error'] = "Validation issue";
            $responseArr['message'] = $validator->errors();
            return response()->json($responseArr, 305);
        }else{
            $trails=Trail::find($id);

            if (is_null($trails)) {       
                return response()->json([
                    'error' => 'Data not found'
                ], 404);
            }
            return new trailResource($trails);
        }
    }
  /*
        function name:createTrail
        Inputs: trail id,customer_id,trail_to,flying_from,total_cost
        Description: to create trail data
        Return value:  json trail data
    */
    public function createTrail(Request $request)
    {
        
        $validator = \Validator::make($request->all(), [
            'customer_id' => 'required',
            'trail_to' => 'required',
            'flying_from' => 'required',
            'total_cost' => 'required',
           
        ]);
    if ($validator->fails()) {
            $responseArr = [];
            $responseArr['error'] = "Validation issue";
            $responseArr['message'] = $validator->errors();
            return response()->json($responseArr, 305);
        }else{
            $trails=new Trail;
            $trails->id =$request->id;
            $trails->customer_id =$request->customer_id;
            $trails->trail_to =$request->trail_to;
            $trails->flying_from =$request->flying_from;
            $trails->total_cost =$request->total_cost;
            $trails->save();
            return response()->json(["message"=>"Created success"], 200);


        }
    }

 /*
        function name:updateTrailItem
        Inputs: trail item id,cost
        Description: to update trail item data
        Return value:  message
    */
    
    public function updateTrailItem(Request $request,$id)
    {
        $prams=$request->all();
        $prams["id"]=$id;
        $validator = \Validator::make($prams, [
            'id' => 'required|numeric',           
            'cost' => 'required',           
        ]);
    if ($validator->fails()) {
            $responseArr = [];
            $responseArr['error'] = "Validation issue";
            $responseArr['message'] = $validator->errors();
            return response()->json($responseArr, 305);
        }else{
            $trails_items=Trail_items::find($id);

            if (!is_null($trails_items)) {
                    
                Trail_items::where('id', $id)
                            ->update(['cost' => $request->cost]);
                $totalCost = DB::table("trail_items")
                                ->selectRaw('sum(cost) as total')
                                ->where('trail_id', $trails_items->trail_id)
                                ->get()[0]->total;

                $trails=Trail::where('id', $trails_items->trail_id)
                                ->update(['total_cost' => $totalCost]);
                return response()->json(["message"=>"Updated success"], 200);
            }else{

                $responseArr['error'] = "Item Not Found";
                $responseArr['message'] = "Trail items id not found";
                return response()->json($responseArr, 305);
            }
        }
    }

  
}
