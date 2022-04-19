@extends('layouts.app', ['page' => 'Methods', 'pageSlug' => 'methods', 'section' => 'methods'])

@section('content')
    @include('alerts.success')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Farmer List</h4>
                        </div>
                        {{-- <div class="col-4 text-right">
                            <a href="/farmer/create" class="btn btn-sm btn-primary">Add Farmer</a>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @forelse ($farmers as $farmer)
                                <tr>
                                    <th scope="row">{{ $farmer->name }}</th>
                                    <td>{{ $farmer->email }}</td>
                                    <td>{{ $farmer->status }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="tim-icons icon-settings-gear-63"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a  class="dropdown-item"  href="{{ url('/barcode/'.$farmer->id) }}">
                                                    Add product
                                                </a>
                                                <a class="dropdown-item"   href="{{ url('/farmer/harvest/'.$farmer->id) }}">
                                                    View Details
                                                </a>
                                                {{-- <button type="button" class="dropdown-item" onclick="confirm('{{ __('Are you sure you want to delete this user?') }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Delete') }}
                                        </button> --}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                 no data
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{-- {{ $methods->links() }} --}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
