@extends('layouts.app')
@section('content')
  <!-- Page header start -->
  <div class="page-header">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('stock.index')}}">Add Stock</a></li>
      <li class="breadcrumb-item"><a href="#">{{$selected->title}}</a></li>

    </ol>
  </div>
  <div class="main-container">
    <div class="row gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered css-serial">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Date</th>
                      <th>Stock</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($stock_history as $key => $value)
                      @php
                        $v=explode('=',$value)
                      @endphp
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$v[0]}}</td>
                        <td>{{$v[1]}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
