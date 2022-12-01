@extends('layouts.app')
@section('content')
    <div class="inner_table white_bg layout3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="space-50"></div>
                    <div class="area404 text-center">
                        <img src="{{ asset('assets/frontend/img/bg/404.png') }}" alt="" width="20%">
                    </div>
                    <div class="space-30"></div>
                    <div class="back4040 text-center col-lg-6 m-auto">
                        <h3>UnAuthorize Access</h3>
                        <div class="space-10"></div>
                        <p>Sorry the page you were looking for cannot be found. Try searching for the best match or browse
                            the links below:</p>
                        <div class="space-20"></div>
                        <div class="button_group"> <a href="{{ route('home') }}" class="cbtn2">GO TO HOME</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-50"></div>
    </div>
@endsection
