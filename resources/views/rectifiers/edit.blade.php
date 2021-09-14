@extends('layouts.master')

@section('title')
    Rectifiers Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('rectifiers.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Update</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-primary"><h3 class="mb-0">Update Rectifier</h3></div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item text-danger">
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('rectifiers.update', isset($rectifiers)?$rectifiers->id:'')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id"
                               name="id" value="{{$rectifiers->id}}">
                    </div>
                    <div class="form-group">
                        <label for="rectifiers_model">Rectifiers Model</label>
                        <input type="text" class="form-control" id="rectifiers_model"
                               name="rectifiers_model" value="{{$rectifiers->rectifiers_model}}">
                    </div>
                    <div class="form-group">
                        <label for="rectifiers_capacity">Rectifiers Capacity</label>
                        <input type="number" class="form-control" id="rectifiers_capacity"
                               name="rectifiers_capacity" value="{{$rectifiers->rectifiers_capacity}}" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="rectifiers_module_model">Rectifiers Module Model</label>
                        <input type="text" class="form-control" id="rectifiers_module_model"
                               name="rectifiers_module_model" value="{{$rectifiers->rectifiers_module_model}}">
                    </div>
                    <div class="form-group">
                        <label for="number_of_rectifiers_model_slots">Number Of Rectifiers Model Slots</label>
                        <input type="number" class="form-control" id="number_of_rectifiers_model_slots"
                               name="number_of_rectifiers_model_slots"
                               value="{{$rectifiers->number_of_rectifiers_model_slots}}">
                    </div>
                    <div class="form-group">
                        <label for="rectifiers_module_capacity">Rectifiers Module Capacity</label>
                        <input type="number" class="form-control" id="rectifiers_module_capacity"
                               name="rectifiers_module_capacity" step="0.01"
                               value="{{$rectifiers->rectifiers_module_capacity}}">
                    </div>
                    <div class="form-group">
                        <label for="rectifier_module_Qty">Rectifier Module Qty</label>
                        <input type="number" class="form-control" id="rectifier_module_Qty"
                               name="rectifier_module_Qty" step="0.01" value="{{$rectifiers->rectifier_module_Qty}}">
                    </div>
                    <div class="form-group">
                        <label for="llvd_capacity">LLVD Capacity</label>
                        <input type="number" class="form-control" id="llvd_capacity"
                               name="llvd_capacity" step="0.01" value="{{$rectifiers->llvd_capacity}}">
                    </div>
                    <div class="form-group">
                        <label for="blvd_capacity">BLVD Capacity</label>
                        <input type="number" class="form-control" id="blvd_capacity"
                               name="blvd_capacity" step="0.01" value="{{$rectifiers->blvd_capacity}}">
                    </div>
                    <div class="form-group">
                        <label for="battery_fuess_Qty">Battery Fuess Qty</label>
                        <input type="number" class="form-control" id="battery_fuess_Qty"
                               name="battery_fuess_Qty" step="0.01" value="{{$rectifiers->battery_fuess_Qty}}">
                    </div>
                    <div class="form-group">
                        <label for="power_of_msag_msan_connected_company">Power Of MSAG/MSAN Connected Company</label>
                        <input type="text" class="form-control" id="power_of_msag_msan_connected_company"
                               name="power_of_msag_msan_connected_company"
                               value="{{$rectifiers->power_of_msag_msan_connected_company}}">
                    </div>
                    <div class="form-group">
                        <label for="monitoring_system_name">Monitoring System Name</label>
                        <select class="form-control form-control-lg mb-3"
                                name="monitoring_system_name"
                                id="monitoring_system_name">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="ECC500">ECC500</option>
                            <option value="ECC800">ECC800</option>
                            <option value="ESC">ESC</option>
                            <option value="EISU">EISU</option>
                            <option value="MISU">MISU</option>
                            <option value="CSU">CSU</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lld_number">LLD Number</label>
                        <input type="number" class="form-control" id="lld_number"
                               name="lld_number" value="{{$rectifiers->lld_number}}">
                    </div>
                    <div class="form-group">
                        <label for="commission_date">Commission Date</label>
                        <input type="text" class="form-control" id="commission_date"
                               name="commission_date" value="{{$rectifiers->commission_date}}">
                    </div>
                    <div class="form-group">
                        <label for="site_id">Site Id</label>
                        <select class="form-control form-control-lg mb-3" name="site_id"
                                id="site_id">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach(\App\Models\Site::all() as $sites)
                                <option value="{{$sites->id}}">{{$sites->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="work_order_id">Work Order Id</label>
                        <select class="form-control form-control-lg mb-3" name="work_order_id"
                                id="work_order_id">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach(\App\Models\WorkOrder::all() as $workOrder)
                                <option value="{{$workOrder->id}}">{{$workOrder->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary btn-lg">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
