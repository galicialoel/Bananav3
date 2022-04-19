<?php

namespace App\Http\Controllers;

use App\BoxProduct;
use App\Classification;
use App\Sale;
use Carbon\Carbon;
use App\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */

    public function index()
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

        return view('dashboard',compact('boxes','sales','classifications','total_amount_a','total_amount_b'));
    }

}
