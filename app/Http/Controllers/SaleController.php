<?php

namespace App\Http\Controllers;

use App\BoxProduct;
use App\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function sell(Request $request)
    {
       $sold =  json_decode($request->sold, true);

       DB::transaction(function () use($request,$sold){
        $sale = Sale::create([
            'user_id' => auth()->user()->id,
            'transaction_no' =>$request->transaction_number,
            'date_sold' =>Carbon::now(),
            'total_amount_sold' =>$request->total_amount_sold,
            'total_kg_sold' =>$request->total_kg_sold,
            'total_box_sold' =>$request->total_box_sold,
            'class_a_total'=>$request->class_a_total,
            'class_b_total' =>$request->class_b_total
        ]);

        $product = BoxProduct::whereIn('id',$sold)
        ->update(['status'=> 'sold']);

       });

        return redirect()->back();
    }
}
