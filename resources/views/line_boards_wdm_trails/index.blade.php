@extends('layouts.master')

@section('title')
    Line Board Wdm trails Information
@endsection

{{--@section('sitemap')--}}
{{--    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>--}}
{{--    <li class="breadcrumb-item active"><a href="{{route('airconditioners.index')}}">Air Conditioner</a></li>--}}
{{--@endsection--}}

@section('content')
    <div class="container-fluid">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <span style="font-size: 2em; color: #00a87d">
                    <i class="fas fa-info-circle"></i></span>
                {{session()->get('success')}}
            </div>
        @elseif(session()->has('updated'))
            <div class="alert alert-success">
                <span style="font-size: 2em; color: #00a87d">
                    <i class="fas fa-info-circle"></i></span>
                {{session()->get('updated')}}
            </div>
        @elseif(session()->has('deleted'))
            <div class="alert alert-danger">
                <span style="font-size: 2em; color: #ff0000">
                    <i class="fas fa-info-circle"></i></span>
                {{session()->get('deleted')}}
            </div>
        @elseif(session()->has('connection'))
            <div class="alert alert-danger">
                <span style="font-size: 2em; color: #ff0000">
                    <i class="fas fa-info-circle"></i></span>
                {{session()->get('connection')}}
            </div>
        @endif
        <div class="row">
            <div class="col-md-4 col-xl-4">
                {{--                <div class="sidebar px-4 py-md-0">--}}
                <form action="{{route('line_boards_wdm_trails.index')}}" class="input-group" method="get">
                    <input type="text" class="form-control" name="search"
                           placeholder="Search By Trail Id, Trail Name Or Working Mode"
                           value="{{request()->query('search')}}">
                    <div class="input-group-addon">
                        <button id="search" type="button" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                {{--                </div>--}}
            </div>
            <div class="col">
                @can('transmission-create')
                    <div class="text-right">
                        <a href="{{route('line_boards_wdm_trails.create')}}" class="btn btn-outline-success mb-2"><i
                                class="fas fa-plus-circle fa-2x"></i></a>
                    </div>
                @endcan
            </div>
        </div>
        <div class="card border-dark mb-3">
            <div class="card-header bg-gradient-primary font-weight-bold">Line Board Wdm Trail</div>
            <div class="card-body text-black-50">
                @if($lineBoardWdmTrails->isNotEmpty())
                    <table class="table table-bordered table-responsive border-primary">
                        <thead>
                        <tr class="bg-gradient-success">
                            <th scope="col">Id</th>
                            <th scope="col">Trail Name</th>
                            <th scope="col">Working Mode</th>
                            <th scope="col">Source Ne</th>
                            <th scope="col">Source Port Number</th>
                            <th scope="col">Source Port WaveLength</th>
                            <th scope="col">Sink Ne</th>
                            <th scope="col">Sink Board Id</th>
                            <th scope="col">Sink Port Number</th>
                            <th scope="col">Sink Port WaveLength</th>
                            <th scope="col">Source Board Id</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            @can('transmission-edit')
                                <th scope="col">Update</th>
                            @endcan
                            @can('transmission-delete')
                                <th scope="col">Delete</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lineBoardWdmTrails as $lineBoardWdmTrail)
                            <tr>
                                <th scope="row">{{ $lineBoardWdmTrail->id }}</th>
                                <td>{{ $lineBoardWdmTrail->trail_name }}</td>
                                <td>{{ $lineBoardWdmTrail->working_mode }}</td>
                                <td>{{ $lineBoardWdmTrail->source_ne }}</td>
                                <td>{{ $lineBoardWdmTrail->source_port_number }}</td>
                                <td>{{ $lineBoardWdmTrail->source_port_wave_length }}</td>
                                <td>{{ $lineBoardWdmTrail->sink_ne }}</td>
                                <td>{{ $lineBoardWdmTrail->sink_board_id }}</td>
                                <td>{{ $lineBoardWdmTrail->sink_port_number }}</td>
                                <td>{{ $lineBoardWdmTrail->sink_port_wave_length }}</td>
                                <td>{{ $lineBoardWdmTrail->transmission_line_boards_id }}</td>
                                <td>{{ $lineBoardWdmTrail->transmission_site_id }}</td>
                                <td>{{ $lineBoardWdmTrail->created_at->format('Y-m-d') }}</td>
                                <td>{{ $lineBoardWdmTrail->updated_at->format('Y-m-d') }}</td>
                                @can('transmission-edit')
                                    <td><a href="{{route('line_boards_wdm_trails.edit', $lineBoardWdmTrail->id)}}"
                                           class="btn btn-primary btn-sm">Update</a></td>
                                @endcan
                                @can('transmission-delete')
                                    <td>
                                        <button class="btn btn-danger btn-sm"
                                                onclick="handleDelete({{$lineBoardWdmTrail->id}})">
                                            Delete
                                        </button>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-danger px-4" role="alert">
                        No results found for query {{ request()->query('search') }}
                    </div>
                @endif
                <div class="d-flex justify-content-center">
                    {!! $lineBoardWdmTrails->appends(['search' => request()->query('search')])->links() !!}
                    {{--                    {!! $airconditioners->appends(\Request::except('page'))->render() !!}--}}
                </div>
            </div>
        </div>
        <form action="" method="post" id="deleteForm">
        @csrf
        @method('DELETE')

        <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-gradient-danger">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Line Board Wdm Trails</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-danger font-weight-bold">
                                Are You Sure You Want To Delete This Line Board Wdm Trails Data ?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Go Back</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteForm')
            form.action = '/line_boards_wdm_trails/' + id
            // console.log('deleting', form);
            $('#deleteModal').modal('show')
        }
    </script>
@endsection
