@extends('layouts.app', ['page' => 'Inventory Statistics', 'pageSlug' => 'istats', 'section' => 'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-title">Classification Info</h2>
                <div class="d-flex flex-row">
                    @forelse ($cls as $item)
                    <div class="card m-5" style="width: 18rem;">
                        <h3 class="text-center">{{ $item->class_name}} </h3>
                         <img class="card-img-top" src="{{url($item->barcode_path)}}" alt="Card image cap">
                        <div class="card-body" style="display:flex;justify-content:center">
                            <form action="{{ url('download/file') }}" method="post">
                                @csrf
                                <input type="hidden" name="barcode_url" value="{{ $item->barcode_path }}"/>
                                <button class="btn btn-primary btn-sm "><i class="fa fa-download mr-3"></i>download</button>
                            </form>

                        </div>
                      </div>
                      @empty

                      @endforelse
                </div>

                {{-- <div class="card-header">
                    <h4 class="card-title">Classification List</h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Classification
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Classification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('settings.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Class Name</label>
                                      <input type="text" class="form-control"  name="class_name" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Price</label>
                                      <input type="number" class="form-control" name="price" id="exampleInputPassword1">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                            </div>

                        </div>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="card" style="width: 18rem; margin-left:6px">
                    <img class="card-img-top" src="https://www.webarcode.com/barcode/image.php?code=113412379052&type=C128B&xres=1&height=50&width=206&font=3&output=png&style=197" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Class A Barcode</h5>
                    </div>
                </div>
                <div class="card" style="width: 18rem; margin-left:6px">
                    <img class="card-img-top" src="https://www.webarcode.com/barcode/image.php?code=793415779052&type=C128B&xres=1&height=50&width=206&font=3&output=png&style=197" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Class B Barcode</h5>
                    </div>
                </div> --}}
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
