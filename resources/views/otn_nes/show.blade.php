@extends('layouts.master')

@section('title')
    NE Information
@endsection
@section('content')
    <div class="container-fluid">
        <div class="text-right">
            <a href="{{route('otn_nes.index')}}" class="btn btn-outline-dark mb-1"><i
                    class="fas fa-caret-left fa-2x"></i></a>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header bg-gradient-primary font-weight-bold">NE Details</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-gradient-success">
                        <th scope="col">NE Id</th>
                        <th scope="col">NE Name</th>
                        <th scope="col">NE Type</th>
                        <th scope="col">NE Vendor</th>
                        <th scope="col">Site Id</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{ $otnNes->id }}</th>
                        <td>{{ $otnNes->ne_name }}</td>
                        <td>{{ $otnNes->ne_type }}</td>
                        <td>{{ $otnNes->ne_vendor }}</td>
                        <td>{{ $otnNes->transmission_site_id }}</td>
                        <td>{{ $otnNes->created_at->format('Y-m-d') }}</td>
                        <td>{{ $otnNes->updated_at->format('Y-m-d') }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @if($otnNes->transmission_equipment->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-primary font-weight-bold">Equipment Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-gradient-success">
                            <th scope="col">Id</th>
                            <th scope="col">SubRack Name</th>
                            <th scope="col">SubRack Type</th>
                            <th scope="col">Equipment Type</th>
                            <th scope="col">Number Of Used Slots</th>
                            <th scope="col">Number Of Free Slots</th>
                            <th scope="col">Vendor</th>
                            <th scope="col">Ne Id</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($otnNes->transmission_equipment as $equipment)
                            <tr>
                                <th scope="row">{{ $equipment->id }}</th>
                                <td>{{ $equipment->subrack_name }}</td>
                                <td>{{ $equipment->subrack_type }}</td>
                                <td>{{ $equipment->equipment_type }}</td>
                                <td>{{ $equipment->number_used_slots }}</td>
                                <td>{{ $equipment->number_free_slots }}</td>
                                <td>{{ $equipment->vendor }}</td>
                                <td>{{ $equipment->transmission_otn_ne_id }}</td>
                                <td>{{ $equipment->transmission_site_id }}</td>
                                <td>{{ $equipment->created_at->format('Y-m-d') }}</td>
                                <td>{{ $equipment->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        <div class="text-right">
            <a href="{{route('otn_nes.index')}}" class="btn btn-outline-dark btn-lg nav-item mb-2"><i
                    class="fas fa-caret-left fa-2x"></i></a>
        </div>
    </div>
@endsection
