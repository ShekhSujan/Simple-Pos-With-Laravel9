@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">All Customer</a></li>
            <li class="breadcrumb-item"><a href="{{ route('customer.trash_list') }}">Trash List</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row  gutters">
            @include('extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="table-container">
                    <div class="t-header">
                        <span>All Trash List</span>
                        <span class="float-right"><a href="{{ route('customer.create') }}" class="btn btn-info btn-md">Add
                                New</a>
                            <a href="{{ route('customer.index') }}" class="btn btn-success btn-md">All Customer</a>
                            <a href="{{ route('customer.trash_list') }}" class="btn btn-danger btn-md">Trash
                                list</a></span>
                    </div>
                    <div class="table-responsive">
                        @if ($dataCount > 0)
                            <form style="overflow: hidden;" action="{{ route('customer.bulk_action') }}" method="post">
                                @csrf
                                <div class="dropdown show">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" width="20px"
                                        role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Bulk Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                            onclick="modalBulk(0)" data-target=".bd-example-modal-sm-action"
                                            href="#">Pernament Delete</button>
                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                            onclick="modalBulk(1)" data-target=".bd-example-modal-sm-action" href="#"
                                            value="1">Restore</button>
                                    </div>
                                </div>
                                <table id="print-table1" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false" width="10px"><input type="checkbox"
                                                    id="chkSelectAll" />SL:</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allCustomer as $key => $value)
                                            <tr>
                                                <td><input type="checkbox" name="chk[]" class="chkDel"
                                                        value="{{ $value->id }}" />{{ $loop->iteration }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->phone }}</td>
                                                <td>{{ $value->address }}</td>`

                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                @include('extra.bulk-action')
                            </form>
                        @else
                            <p class="text-center">Trash is empty</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
