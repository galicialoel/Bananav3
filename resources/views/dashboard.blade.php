@extends('layouts.app', ['pageSlug' => 'dashboard', 'page' => 'Dashboard', 'section' => ''])
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

@section('content')


@php
 $transaction_no ='TRN'.rand(0,999999999);
@endphp
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header " style="padding: 45px">
                    <h5 class="card-category">Total no. of Reject Products</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bank text-info"></i>

                    {{   App\BoxProduct::where('status','reject')->count() }}
                </h3>
                </div>

            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header " style="padding: 45px">
                    <h5 class="card-category">Total no. of Boxes Sold</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bank text-info"></i>

                    {{   App\BoxProduct::where('status','sold')->count() }}
                </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header"  style="padding: 45px">
                    <h5 class="card-category">Total no. of Stock Boxes </h5>
                    <h3 class="card-title"><i class="tim-icons icon-paper text-success"></i>
                        {{   App\BoxProduct::where('status','stock')->count() }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">


        <div class="col-lg-12 col-md-12">
            <div class="card card-tasks">
                <div class="card-header">
                <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Transaction Information</h4>
                        </div>
                        <div class="col-4 text-right">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalLong"">
                                Sell Stocks
                            </button>
                        </div>
                       <div class="col-4">

                            <form action="{{ url('search/transaction') }}" method="get">
                                @csrf
                                <input type="text" name="transaction_no" class="form-control" placeholder="Input Box Number here .." required>
                                <button type="submit" class="btn btn-outline-secondary btn-sm">Search</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                @include('dashboard-table',['sales',$sales])
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog"  style="max-width: 80%;" role="document">
          <div class="modal-content">
            <div class="modal-body">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="page-content container">
                            <div class="page-header text-blue-d2">
                            <h3 class="page-title text-secondary-d1">
                                Transaction #
                                <small class="page-info">
                                    <i class="fa fa-angle-double-right text-80"></i>
                                   {{ $transaction_no}}
                                </small>
                            </h3>
                            </div>

                            <div class="container px-0">
                            <div class="row mt-4">
                                <div class="col-12 col-lg-10 offset-lg-1">
                                    {{-- <div class="row">
                                        <div class="col-12">
                                            <div class="text-center text-150">
                                                <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                                                <span class="text-default-d3">Bootdey.com</span>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- .row -->

                                    <hr class="row brc-default-l1 mx-n1 mb-4" />

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <hr class="d-sm-none" />
                                            <div class="text-grey-m2">
                                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                                    Transaction Information
                                                </div>

                                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Transaction #:</span>  {{ $transaction_no}}</div>

                                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Order Deliver DateTime:</span> {{ Carbon\Carbon::now() }}</div>
                                                @foreach ($classifications as $class)
                                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Price {{ $class->class_name }} : ₱ </span>{{ $class->price }}</div>
                                                @endforeach

                                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Kg per box :</span>14kg</div>
                                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Destination:</span> <span class="badge badge-warning badge-pill px-25">China</span></div>
                                            </div>
                                        </div>
                                        <!-- /.col -->

                                        <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">

                                        </div>
                                        <!-- /.col -->
                                    </div>

                                    <div class="mt-4">

                                        <div class="row border-b-2 brc-default-l2"></div>

                                        <!-- or use a table instead -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                                        @if($boxes->count() === 0)
                                        <h2 class="text-center"> No Available Product To Sell</h2>
                                        @else
                                        <thead class="bg-none bgc-default-tp1">
                                            <tr class="text-white text-center text-sm">
                                                <th  width="140">Classification</th>
                                                <th width="140">Price Each</th>
                                                <th width="140">Box & Kilo</th>
                                                <th width="140">Initial Total Amount </th>
                                            </tr>
                                        </thead>

                                        <tbody class="text-95 text-secondary-d3">
                                            <tr></tr>
                                            @foreach ($classifications as $item)
                                            <tr class="text-center text-sm">
                                                <td class="text-95">{{ $item->class_name }}</td>
                                                <td class="text-secondary-d2"> ₱ {{ $item->price }}</td>
                                                <td class="text-95">{{ App\BoxProduct::where('status','stock')->where('classification_id',$item->id)->count()  }} box/s- {{ App\BoxProduct::where('status','stock')->where('classification_id',$item->id)->count() * 14 }} kilos</td>
                                                <td class="text-secondary-d2"> ₱ {{App\BoxProduct::where('status','stock')->where('classification_id', $item->id)->count() * $item->price }}
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>

                                        @endif
                                    </table>
                                </div>



                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0 text-white" >
                                                Extra note such as company or payment information...
                                            </div>

                                            <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">

                                                <div class="row my-2">
                                                    <div class="col-7 text-right">
                                                      Total Number of Boxes
                                                    </div>
                                                    <div class="col-5">
                                                        <span class="text-110 text-secondary-d1">{{ $boxes->count() }} boxes</span>
                                                    </div>
                                                </div>

                                                <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                                    <div class="col-7 text-right">
                                                        Total Amount Class A
                                                    </div>
                                                    <div class="col-5">
                                                        <span class="text-150 text-success-d3 opacity-2">  ₱ {{ $total_amount_a }}</span>
                                                    </div>
                                                </div>

                                                <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                                    <div class="col-7 text-right">
                                                        Total Amount Class B
                                                    </div>
                                                    <div class="col-5">
                                                        <span class="text-150 text-success-d3 opacity-2">  ₱ {{ $total_amount_b }}</span>
                                                    </div>
                                                </div>

                                                <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                                    <div class="col-7 text-right">
                                                       Overall total amount
                                                    </div>
                                                    <div class="col-5">
                                                        <span class="text-150 text-success-d3 opacity-2">  ₱ {{ $total_amount_a  +$total_amount_b }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="text-secondary-d1 text-105">Operated by : {{ auth()->user()->name }} </span>
                                            <form action="{{ route('sell.store') }}" method="post">
                                                @csrf
                                                <input type="hidden"  name="total_box_sold" value={{ $boxes->count() }}>
                                                <input type="hidden" name="class_a_total" value={{ App\BoxProduct::where('status','stock')->where('classification_id',1)->count()  }}>
                                                <input type="hidden" name="class_b_total" value={{ App\BoxProduct::where('status','stock')->where('classification_id',2)->count()  }}>
                                                <input type="hidden"  name="total_kg_sold" value={{App\BoxProduct::where('status','stock')->count() * 14 }}>
                                                <input type="hidden"  name="total_amount_sold" value={{ $total_amount_a  +$total_amount_b }} >
                                                <input type="hidden"  name="sold" value={{ $boxes->pluck('id') }}>
                                                <input type="hidden"  name="transaction_number" value={{ 'TRN'.rand(0,999999999) }}>
s
                                                @if ($boxes->count() <= 0 )
                                                <button type="submit" disabled class="btn btn-sm btn-primary float-right">Sell Now</button>
                                                @else
                                                <button type="submit"  class="btn btn-sm btn-primary float-right">Sell Now</button>
                                             @endif
                                              {{-- </form> --}}
                                        </div>
                                        <hr />

                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>
                      </div>

                </div>
            </div>

          </div>
        </div>
      </div>

@endsection

@push('js')
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
@endpush
