@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('medicine.index') }}">All medicine</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row  gutters">
            @include('extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="table-container">
                    <div class="t-header">
                        <span>All Medicine</span>
                        <span class="float-right"><a href="{{ route('medicine.create') }}" class="btn btn-info btn-md">Add
                                New</a>
                            <a href="{{ route('medicine.index') }}" class="btn btn-success btn-md">All medicine</a>
                            <a href="{{ route('medicine.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                        </span>
                    </div>
                    <div class="table-responsive">
                        <table id="print-table1" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>Title</th>
                                    <th>Company</th>
                                    <th>Med Group</th>
                                    <th>Unite Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allMedicine as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->company }}</td>
                                        <td>{{ $value->generic }}</td>
                                        <td>
                                            {{ $value->unit_price }}
                                        </td>
                                        <td>
                                            @if ($value->stock == 0)
                                                <span class="badge badge-danger">Out Of Stock</span>
                                            @else
                                                {{ $value->stock }}
                                            @endif
                                        </td>
                                        @if ($value->status == 1)
                                            <td><span class="badge badge-success">Active</span></td>
                                        @else
                                            <td><span class="badge badge-danger">InActive</span></td>
                                        @endif
                                        <td>
                                            <a href="{{ route('medicine.edit', $value->id) }}" title="Edit Row"><span
                                                    class="btn btn-info btn-md"><i class="icon-edit1"></i></span></a>
                                            <button type="button" class="btn btn-danger btn-md delete-id"
                                                id="{{ $value->id }}" data-toggle="modal"
                                                data-target=".bd-example-modal-sm" onclick="modalview(this.id)"
                                                title="Trash Row"><i class="icon-x"></i>
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <!-- ################# Small modal ####################-->
                        @include('medicine.trash-modal')
                        <!-- ################# Small modal ####################-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
