<?php

namespace App\Http\Controllers;

use App\BoxProduct;
use App\Classification;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmerController extends Controller
{




    public function harvest_details(User $user)
    {
        $class_a = BoxProduct::where('user_id',$user->id)
        ->whereHas('classification',function($q){
            $q->where('class_name','Class-A');
        })->get();

        $classifications = Classification::get();

        $class_b = BoxProduct::where('user_id',$user->id)
        ->whereHas('classification',function($q){
            $q->where('class_name','Class-B');
        })->get();


        return view('farmer.harvest',compact('class_a','class_b','classifications','user'));
    }

    public function index()
    {
        $farmers = User::whereHas('role',function($q){
            $q->where('name','farmer');
        })->paginate(10);
        return view('farmer.index',compact('farmers'));
    }


    public function create()
    {
        return view('farmer.create');
    }

    public function store(Request $request)
    {
        DB::transaction(function () use($request) {
            $farmer =   User::create([
                'email' =>$request->email,
                  'name' =>$request->name,
                  'password' =>Carbon::now()->toDateString().'-'.$request->name
              ]);
              $farmer->role()->create([
                  'name' => 'farmer'
              ]);
        });

        session()->flash('success', 'Added !');
        return redirect()->back();
    }
}
