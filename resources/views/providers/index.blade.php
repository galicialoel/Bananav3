@extends('layouts.app', ['page' => 'List ', 'pageSlug' => 'providers', 'section' => 'providers'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Providers</h4>
                        </div>
                        <div class="col-4 text-right">
                            {{-- <a href="{{ route('providers.create') }}" class="btn btn-sm btn-primary">New Provider</a> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Payments Made</th>
                                <th scope="col">Total Payment</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                  </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{-- {{ $providers->links() }} --}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
