@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">All Customer</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row  gutters">
            @include('extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="table-container">
                    <div class="t-header">
                        <span>All Meta</span>
                        <span class="float-right"><a href="{{ route('customer.create') }}" class="btn btn-info btn-md">Add
                                New</a>
                            <a href="{{ route('customer.index') }}" class="btn btn-success btn-md">All Customer</a>
                            <a href="{{ route('customer.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                        </span>
                    </div>
                    <div class="table-responsive">
                        <table id="print-table1" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allCustomer as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->address }}</td>
                                        @if ($value->status == 1)
                                            <td><span class="badge badge-success">Active</span></td>
                                        @else
                                            <td><span class="badge badge-danger">InActive</span></td>
                                        @endif
                                        <td>
                                            <a href="{{ route('customer.edit', $value->id) }}" title="Edit Row"><span
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
                        @include('customer.trash-modal')
                        <!-- ################# Small modal ####################-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
