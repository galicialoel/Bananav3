<?php

namespace App\Http\Controllers;

use App\BoxProduct;
use App\Classification;
use App\Sale;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BoxProductController extends Controller
{


    public function search_transaction(Request $request)
    {
        $boxes = BoxProduct::where('status','stock')->get();
        $sales = Sale::paginate(10);
        $classifications = Classification::whereIn('id',[1,2])->get();

        $class_a= Classification::where('id',1)->first();
            $total_a = BoxProduct::where('status','stock')
            ->where('classification_id',1)
            ->count();

        $class_b= Classification::where('id',2)->first();
        $total_b = BoxProduct::where('status','stock')
        ->where('classification_id',2)
        ->count();

        $total_amount_a = $total_a * $class_a->price;
        $total_amount_b =  $total_b * $class_b->price;


        if($request->transaction_no != null){
            $sales = Sale::query()
            ->where('transaction_no', 'LIKE', "%{$request->transaction_no}%")
            ->paginate(12);
        }

        return view('dashboard',compact('boxes','sales','classifications','total_amount_a','total_amount_b'));


    }
    public function search(Request $request)
    {

        if($request->has('box_number')){
            $datas = BoxProduct::query()
            ->where('status',$request->status)
            ->where('box_number', 'LIKE', "%{$request->box_number}%")
            ->orWhere('box_number', 'LIKE', "%{$request->box_number}%")
            ->paginate(12);


            if($request->status ==='reject'){
                return view('box-products.reject',compact('datas'));
            }
            if($request->status ==='stock'){
                return view('box-products.stock',compact('datas'));
            }
        }
        elseif($request->has('order_delivery')){

            $datas = BoxProduct::query()
            ->where('status',$request->status)
            ->whereDate('order_delivery_date', 'LIKE', "%{$request->order_delivery}%")
            ->paginate(12);
            if($request->status ==='reject'){
                return view('box-products.reject',compact('datas'));
            }
            if($request->status ==='stock'){
                return view('box-products.stock',compact('datas'));
            }
        }

    }
    public function reject(){
        $datas  = BoxProduct::where('status','reject')->paginate(10);
        return view('box-products.reject',compact('datas'));
    }
    public function stock(){
        $datas  = BoxProduct::where('status','stock')->paginate(10);
        return view('box-products.stock',compact('datas'));
    }
}
