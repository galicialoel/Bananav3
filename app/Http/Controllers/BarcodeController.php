<?php

namespace App\Http\Controllers;

use App\BoxProduct;
use App\Classification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use File;
use Response;

class BarcodeController extends Controller
{

    public function download_file(Request $request){
        $filepath = public_path($request->barcode_url);
        return Response::download($filepath);
    }



    public function barcode_scan()
    {
        return view('barcode.index');
    }

    public function add_product(Request $request)
    {

        $cls = Classification::where('barcode', $request->barcode_number);
        if($cls->exists()){
            $data =$cls->first();
            if($data->class_status =='reject'){
                BoxProduct::create([
                    'user_id' =>auth()->user()->id,
                    'classification_id' =>$data->id,
                    'box_number' =>'BX-'.rand(0,999999999),
                    'order_delivery_date' => Carbon::now('Asia/Singapore'),
                    'price' =>$data->price,
                    'status' =>$data->class_status
                ]);
            }else{
                BoxProduct::create([
                    'user_id' =>auth()->user()->id,
                    'classification_id' =>$data->id,
                    'box_number' =>'BX-'.rand(0,999999999),
                    'order_delivery_date' => Carbon::now('Asia/Singapore'),
                    'price' =>$data->price
                ]);
            }

            return 'done';
        }else{
            return response()->json(
                'unrecognized barcode!'
            );
        }

    }
}
