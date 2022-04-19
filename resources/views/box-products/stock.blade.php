@extends('layouts.app', ['page' => 'Methods', 'pageSlug' => 'Product Stock List', 'section' => 'methods'])

@section('content')
    @include('alerts.success')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">

                            <h4 class="card-title">Available Stock Product List  </h4>

                        </div>
                        {{-- <div class="col-4 text-right">
                            <a href="/farmer/create" class="btn btn-sm btn-primary">Add Farmer</a>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div>
                                <div x-data="{ show: false }">
                                    <button class="btn btn-sm mb-3"@click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }">
                                        Search Box Number
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                          </svg>
                                      </button>
                                    <div x-show="show">
                                        <form action="{{ url('search/product') }}" method="get">
                                            @csrf
                                            <input type="text" name="box_number" class="form-control" placeholder="Input Box Number here ..">
                                            <input type="hidden" name="status" value="stock" class="form-control">
                                            <button type="submit" class="btn btn-outline-secondary btn-sm">Search</button>
                                        </form>
                                    </div>
                                </div>
                              </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <div x-data="{ show: false }">
                                    <button class="btn btn-sm mb-3"@click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }">
                                        Search Order Delivery Date
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                          </svg>
                                      </button>
                                    <div x-show="show">
                                        <form action="{{ url('search/product') }}" method="get">
                                            @csrf
                                            <input type="date" name="order_delivery" class="form-control">
                                            <input type="hidden" name="status" value="stock" class="form-control">
                                            <button type="submit" class="btn btn-outline-secondary btn-sm">Search</button>
                                        </form>
                                    </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">Box #</th>
                                <th scope="col">Classification</th>
                                <th scope="col">Order Delivery Date</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Kg</th>
                            </thead>
                            <tbody>
                                @forelse ($datas as $item)
                                <tr>
                                    <th scope="row">{{ $item->box_number }}</th>
                                    <td>{{ $item->classification->class_name}}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->product_destination }}</td>
                                    <td>{{ $item->kgs }} kilos</td>
                                  </tr>
                                @empty
                                <tr>
                                    NO DATA
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-inline-flex p-2">
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $datas->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
