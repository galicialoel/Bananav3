<?php

namespace App\Http\Controllers;

use App\BoxProduct;
use App\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function pdf_today(){

        $date = Carbon::now();
        $sales = Sale::whereDate('date_sold',$date->toDateString())
        ->get();
        $date = Carbon::now();
        $pdf = \PDF::loadView('test',
         [
            'sales'=>$sales,
            'date' =>$date
        ]);

        return $pdf->download('report-'.$date->toDateString().'.pdf');
    }

    public function search_year(Request $request){
        $date = Carbon::now();
        $boxes = Sale::whereYear('date_sold', $request->year)->get();
        if($request->yes =='on'){
            $pdf = \PDF::loadView('test',
            [
             'sales'=>$boxes,
             'date' =>$date
             ]);
            // return $pdf->download('test.pdf');

            return $pdf->stream('report-'.$date->toDateString().'.pdf',
            [
             'sales'=>$boxes,
             'date'=>$date
             ]);
           }


        return view('report.index',compact('boxes'));
    }

    public function search_date(Request $request)
    {
        $date = Carbon::now();
        $boxes = Sale::whereDate('date_sold', $request->date)->get();
        if($request->yes =='on'){
            $pdf = \PDF::loadView('test',
            [
             'sales'=>$boxes,
             'date' =>$date
             ]);
            // return $pdf->download('test.pdf');

            return $pdf->stream('report-'.$date->toDateString().'.pdf',
            [
             'sales'=>$boxes,
             'date'=>$date
             ]);
           }

        return view('report.index',compact('boxes'));
    }

    public function report()
    {
        $boxes = BoxProduct::where('status','sold')
        ->whereDate('created_at',Carbon::now('Asia/Singapore'))
        ->get();

        $date = Carbon::now();

        $boxes = Sale::whereDate('date_sold',$date->toDateString())->get();

        //table tapos file
        return view('report.index',compact('boxes'));
    }

    public function filter_by_date(Request $request)
    {
        $from = Carbon::parse($request->from)->toDateString();
        $to = Carbon::parse($request->to)->toDateString();
        $date = Carbon::now();
       $boxes = Sale::whereBetween('date_sold', [$from, $to])->get();

       if($request->yes =='on'){
        $pdf = \PDF::loadView('test',
        [
         'sales'=>$boxes,
         'date' =>$date
         ]);
        // return $pdf->download('test.pdf');

        return $pdf->stream('report-'.$date->toDateString().'.pdf',
        [
         'sales'=>$boxes,
         'date'=>$date
         ]);
       }


       return view('report.index',compact('boxes'));

    }
}
