@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('setting') }}">Setting</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row gutters">
            @include('extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card m-0">
                    <div class="card-header">
                        <div class="card-title">Update Setting</div>
                    </div>
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">

                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <form action="{{ route('setting.update') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $selected->id }}">
                                            <input type="hidden" name="ext" value="{{ $selected->logo }}">
                                            <input type="hidden" name="ext2" value="{{ $selected->favicon }}">
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2" for="input-title">Enter Title
                                                            <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="title" class="form-control"
                                                                value="{{$selected->title}}" placeholder="Enter Title"
                                                                required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2" for="input-email">Email
                                                            <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="email" class="form-control"
                                                                value="{{$selected->email}}" placeholder="Enter Email"
                                                                required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2" for="input-phone">Phone
                                                            <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="phone" class="form-control"
                                                                value="{{$selected->phone}}" placeholder="Enter Phone"
                                                                required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2" for="input-address">Address
                                                            <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="address" class="form-control"
                                                                value="{{$selected->address}}" placeholder="Enter Address"
                                                                required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2" for="input-logo">Logo
                                                            <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" id="imgInp" name="logo"
                                                                type="file"><br>
                                                            <img src="{{ asset("assets/images/logo/{$selected->id}-logo.{$selected->logo}") }}"
                                                                alt="No Image" id="imgload" width="80" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2" for="input-favicon">Favicon
                                                            <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control form-control-alt" id="imgInp2"
                                                                name="favicon" type="file"><br>
                                                            <img src="{{ asset("assets/images/logo/{$selected->id}-favicon.{$selected->favicon}") }}"
                                                                alt="No Image" id="imgload2" width="80" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="form-group pl-1">
                                                        <button type="button" class="btn btn-primary btn-block"
                                                            data-toggle="modal"
                                                            data-target=".bd-example-modal-sm-update">Update
                                                            Setting</button>
                                                    </div>
                                                </div>

                                            </div>
                                            @include('extra.update-modal')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
