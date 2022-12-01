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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pb-3">
                            <a href="{{ route('customer.create') }}" class="btn btn-info btn-md">Add New</a>
                            <a href="{{ route('customer.index') }}" class="btn btn-success btn-md">All Customer</a>
                            <a href="{{ route('customer.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                        </div>
                        <form action="{{ route('customer.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $selected->id }}">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $selected->name }}" placeholder="Enter Name" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="input-email">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="email" class="form-control"
                                                value="{{ $selected->email }}" placeholder="Enter Email" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="input-phone">Phone</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ $selected->phone }}" placeholder="Enter Phone" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="input-address">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="address" class="form-control"
                                                value="{{ $selected->address }}" placeholder="Enter Address" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="input-email">Enter Status</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="status" required>
                                                @if ($selected->status == 1)
                                                    <option value="0">InActive</option>
                                                    <option selected value="1">Active</option>
                                                @else
                                                    <option selected value="0">InActive</option>
                                                    <option value="1">Active</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal"
                                            data-target=".bd-example-modal-sm-update">Update Customer</button>
                                    </div>
                                </div>
                            </div>
                            <!-- ################# Small modal ####################-->
                            @include('extra.update-modal')
                            <!-- Main container end -->
                        </form>
                        <hr>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
