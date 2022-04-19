@extends('layouts.app', ['page' => 'Inventory Statistics', 'pageSlug' => 'istats', 'section' => 'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Farmer's Boxes Added List    </h4>
                    <h2>{{ $user->name }}</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Classification</th>
                            <th>No. of Box</th>
                            <th>Amount</th>
                            <th>Price</th>
                        </thead>
                        <tbody>
                            @forelse ($classifications as $key => $item)
                            <tr>
                                <td>{{ $item->class_name }}</td>
                                <td>{{ $item->box_products->where('user_id',$user->id)->count() }}</td>
                                <td>{{  $item->box_products->where('user_id',$user->id)->count() *   $item->price}}</td>
                                <td>{{ $item->price }}</td>
                              </tr>
                            @empty
                            no data
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-md-6">
            <div class="card card-tasks">
                <div class="card-header">
                    <h4 class="card-title">Statistics by Income (TOP 15)</h4>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Sold</th>
                                <th>Income</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-tasks">
                <div class="card-header">
                    <h4 class="card-title">Statistics by Average Price (TOP 15)</h4>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Sold</th>
                                <th>Average Price</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
