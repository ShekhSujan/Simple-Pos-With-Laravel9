@extends('layouts.app')
@section('content')
    <!-- Page header start -->
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('medicine.index') }}">Medicine Stock</a></li>
        </ol>
    </div>
    <div class="main-container">
        <!-- Row start -->
        <div class="row  gutters">
            @include('extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="table-container">
                    <div class="table-responsive">
                        <table id="highlightRowColumn" class="table custom-table css-serial">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>Title</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allMedicine as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>
                                            @if ($value->stock == 0)
                                                <span class="badge badge-danger">Out Of Stock</span>
                                            @else
                                                {{ $value->stock }}
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm delete-id"
                                                id="{{ $value->id }}" data-toggle="modal"
                                                data-target=".bd-example-modal-sm" onclick="modalview(this.id)"
                                                title="Delete Row"><i class="icon-add"></i></button>
                                            <a href="{{ route('stock.view', $value->id) }}" class="btn btn-success btn-sm"
                                                title="Delete Row"><i class="icon-zoom_out_map"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </form>
                        <!-- ################# Small modal ####################-->
                        @include('stock.stock-modal')
                        <!-- Main container end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
