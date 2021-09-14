@extends('layouts.master')

@section('title')
    Fiber Links Information
@endsection
@section('content')
    <div class="container-fluid">
        <div class="text-right">
            <a href="{{route('fiber_links.index')}}" class="btn btn-outline-dark mb-1"><i
                    class="fas fa-caret-left fa-2x"></i></a>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header bg-gradient-primary font-weight-bold">Fiber Links</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-gradient-success">
                        <th scope="col">Link Id</th>
                        <th scope="col">Link Name</th>
                        <th scope="col">Fiber Type</th>
                        <th scope="col">Used Core</th>
                        <th scope="col">Free Core</th>
                        <th scope="col">Number Of Splice Points</th>
                        <th scope="col">Average Link Loss</th>
                        <th scope="col">OFC Type</th>
                        <th scope="col">A-End ODF Connector Type</th>
                        <th scope="col">Z-End ODF Connector Type</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{ $fiberLinks->id }}</th>
                        <td>{{ $fiberLinks->link_name }}</td>
                        <td>{{ $fiberLinks->fiber_type }}</td>
                        <td>{{ $fiberLinks->used_core }}</td>
                        <td>{{ $fiberLinks->free_core}}</td>
                        <td>{{ $fiberLinks->number_splice_points }}</td>
                        <td>{{ $fiberLinks->average_link_loss }}</td>
                        <td>{{ $fiberLinks->ofc_type }}</td>
                        <td>{{ $fiberLinks->a_end_odf_connector_type }}</td>
                        <td>{{ $fiberLinks->z_end_odf_connector_type }}</td>
                        <td>{{ $fiberLinks->created_at->format('Y-m-d') }}</td>
                        <td>{{ $fiberLinks->updated_at->format('Y-m-d') }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @if($fiberLinks->fiber_splice_points->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-primary font-weight-bold">Amplifier Boards Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-gradient-success">
                            <th scope="col">Fiber Splice Point Id</th>
                            <th scope="col">Latitude</th>
                            <th scope="col">Longitude</th>
                            <th scope="col">Link Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fiberLinks->fiber_splice_points as $fiberSplice)
                            <tr>
                                <th scope="row">{{ $fiberSplice->id }}</th>
                                <td>{{ $fiberSplice->latitude }}</td>
                                <td>{{ $fiberSplice->longitude }}</td>
                                <td>{{ $fiberSplice->fiber_links_id }}</td>
                                <td>{{ $fiberSplice->created_at->format('Y-m-d') }}</td>
                                <td>{{ $fiberSplice->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        <div class="text-right">
            <a href="{{route('fiber_links.index')}}" class="btn btn-outline-dark btn-lg nav-item mb-2"><i
                    class="fas fa-caret-left fa-2x"></i></a>
        </div>
    </div>
@endsection
