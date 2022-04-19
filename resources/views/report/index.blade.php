@extends('layouts.app', ['page' => 'List', 'pageSlug' => 'providers', 'section' => 'providers'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Sales Report</h4>
                        </div>
                        <div class="col-4 text-right">
                            <!-- DATE: {{ Carbon\Carbon::now() }} -->
                            {{-- <a href="{{ route('providers.create') }}" class="btn btn-sm btn-primary">New Provider</a> --}}
                        </div>
                    </div>
                </div>
             <div class="m-4">
                <div class="d-flex flex-row">
                    <div class="p-2 m-2">  <div x-data="{ show: false }">
                        <button class="btn btn-sm btn-secondary" @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }">
                            Custom Filter
                        </button>
                        <div x-show="show">
                            <form action="{{ url('filter/date/report') }}" method="get">
                                @csrf
                                <div class="d-flex flex-row">
                                    <div class="p-2">
                                        <label>
                                            from
                                        </label>
                                        <input type="date" name="from" class="form-control"required>
                                    </div>
                                    <div class="p-2">
                                        <label>
                                            to
                                        </label>
                                        <input type="date" name="to" class="form-control"required>
                                    </div>

                                </div>
                                    <div class="d-flex flex-row">
                                        <div class="p-2">
                                             <button type="submit" class="btn btn-outline btn-success btn-sm">Submit</button>
                                        </div>
                                        <div class="p-2">
                                            <div >
                                                <input type="checkbox" name="yes" class="mr-2"aria-label="Checkbox for following text input">
                                                <label class="mt-1">*check box to show pdf data </label>
                                              </div>
                                        </div>
                                      </div>
                            </form>
                        </div>
                    </div>
                </div>
                    <div class="p-2  m-2">
                        <div x-data="{ show: false }">
                            <button class="btn btn-sm" @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }">
                                Filter Date
                              </button>
                            <div x-show="show">
                                <form action="{{ url('search/date') }}" method="get">
                                    @csrf
                                    <div class="d-flex flex-row">
                                        <div class="p-2">
                                            <label>
                                                Date
                                            </label>
                                            <input type="date" name="date" class="form-control"required>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="p-2">
                                             <button type="submit" class="btn btn-outline btn-success btn-sm">Submit</button>
                                        </div>
                                        <div class="p-2">
                                            <div >
                                                <input type="checkbox" name="yes" class="mr-2"aria-label="Checkbox for following text input">
                                                <label class="mt-1">*check box to show pdf data </label>
                                              </div>
                                        </div>
                                      </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="p-2  m-2">   <div x-data="{ show: false }">
                        <button class="btn btn-sm" @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }">
                            Filter Year
                          </button>
                        <div x-show="show">
                            <form action="{{ url('search/year') }}" method="get">
                                @csrf
                                <div class="d-flex flex-row">
                                    <div class="p-2">
                                        <label>
                                            Date
                                        </label>
                                        <!-- <input type="date" name="date" class="form-control"required> -->

                                        <input type="number" class="form-control" min="1900" max="2099" step="1" name="year" value="2021" />
                                    </div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div class="p-2">
                                         <button type="submit" class="btn btn-outline btn-success btn-sm">Submit</button>
                                    </div>
                                    <div class="p-2">
                                        <div >
                                            <input type="checkbox" name="yes" class="mr-2"aria-label="Checkbox for following text input">
                                            <label class="mt-1">*check box to show pdf data </label>
                                          </div>
                                    </div>
                                  </div>
                            </form>
                        </div>
                    </div></div>
                </div>
                <div >
             </div>

             <div >

             </div>
             <div class="mt-3">
             <form action="{{ url('generate/pdf/today') }}" method="get">
                @csrf
                <div class="d-flex flex-row">
                    <div class="p-2">
                        <label>
                            Download pdf for today's transaction
                        </label>
                        <input type="hidden" class="form-control" name="pdf" value="download" />
                    </div>
                </div>
                    <button type="submit" class="btn btn-outline btn-warning btn-sm">Download Pdf</button>
            </form>
            </div>
                <div class="card-body">
                    @include('alerts.success')
                    @if($boxes->count() <=0)
                    <div class="text-center">
                       <h2>
                        No data to Display
                       </h2>
                </div>
                    @else
                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class="text-primary">
                                <th scope="col">Transaction #</th>
                                <th scope="col">Classification</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Date Sold</th>
                            </thead>
                            <tbody>
                              @foreach ($boxes as $item)
                              <tr>
                                <td>{{ $item->transaction_no }}</td>
                                <th scope="row">
                                    Class A: {{ $item->class_a_total }} boxes
                                    ||
                                     Class B:
                                     {{$item->class_b_total }} boxes</th>
                                <td>China</td>
                                <td>14 kg</td>
                                <th scope="col">{{ $item->date_sold }}</th>

                            </tr>
                              @endforeach

                            </tbody>
                        </table>
                        <!-- <td>Grand Total Box:  <b>
                            {{ $item->class_a_total + $item->class_b_total }}
                        </b></td> -->
                    </div>
                    @endif

                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years",
    autoclose:true //to close picker once year is selected
});
        </script>
@endsection
