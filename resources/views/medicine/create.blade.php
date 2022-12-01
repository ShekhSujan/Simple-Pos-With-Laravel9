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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pb-3">
                            <a href="{{ route('medicine.create') }}" class="btn btn-info btn-md">Add New</a>
                            <a href="{{ route('medicine.index') }}" class="btn btn-success btn-md">All medicine</a>
                            <a href="{{ route('medicine.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>

                        </div>
                        <form action="{{ route('medicine.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="title">Title</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="title" class="form-control"
                                                value="{{ old('title') }}" placeholder="Enter title" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2"  for="input-unit_price">Unit Price</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="unit_price" class="form-control"
                                                value="{{ old('unit_price') }}" placeholder="Enter Unit Price" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2"  for="input-stock">stock</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="stock" class="form-control"
                                                value="{{ old('stock') }}" placeholder="Enter stock" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2"  for="input-dosage">dosage</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="dosage" class="form-control"
                                                value="{{ old('dosage') }}" placeholder="Enter dosage"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2"  for="input-strength">strength</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="strength" class="form-control"
                                                value="{{ old('strength') }}" placeholder="Enter strength"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2"  for="input-generic">generic</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="generic" class="form-control"
                                                value="{{ old('generic') }}" placeholder="Enter generic"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2"  for="input-company">company</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="company" class="form-control"
                                                value="{{ old('company') }}" placeholder="Enter company"  required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <button type="submit" name="submit" class="btn btn-primary btn-md btn-block">Save
                                        Medicine</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
