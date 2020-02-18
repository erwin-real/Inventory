@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Products</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/products">Products</a></li>
                        <li><span>Add</span></li>
                    </ul>
                </div>
            </div>
            @include('includes.user-profile')
        </div>
    </div>
    <!-- page title area end -->

    <div class="main-content-inner">
        @include('includes.messages')
        <div class="row mt-5 mb-5">
            <div class="col-md-6 col-sm-9">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h4 class="header-title mb-0">Add Product</h4>
                        </div>
                        <div class="mt-4">
                            <form action="{{ action('ProductController@store') }}" method="POST">
                                @csrf

                                {{-- NAME --}}
                                <div class="form-group row">
                                    <label for="name" class="col-md-12 col-form-label text-md-left">Name <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- TYPE --}}
                                <div class="form-group row">
                                    <label for="type" class="col-md-12 col-form-label text-md-left">Type <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <select name="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }} py-0" id="type" autofocus required>
                                            <option value="pork">Pork</option>
                                            <option value="chicken">Chicken</option>
                                            <option value="beef">Beef</option>
                                            <option value="others">Others</option>
                                        </select>

                                        @if ($errors->has('type'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--PRICE--}}
                                <div class="form-group row">
                                    <label for="price" class="col-md-12 col-form-label text-md-left">Price per Kilogram <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="price" type="number" step=".01" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" autofocus>

                                        @if ($errors->has('price'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- QUANTITY --}}
                                <div class="form-group row">
                                    <label for="quantity" class="col-md-12 col-form-label text-md-left">Quantity <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="quantity" type="number" step="1" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" autofocus>

                                        @if ($errors->has('quantity'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('quantity') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- WARNING QUANTITY --}}
                                <div class="form-group row">
                                    <label for="warning_quantity" class="col-md-12 col-form-label text-md-left">Warning Quantity <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="warning_quantity" type="number" step="1" class="form-control{{ $errors->has('warning_quantity') ? ' is-invalid' : '' }}" name="warning_quantity" autofocus>

                                        @if ($errors->has('warning_quantity'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('warning_quantity') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- EXPIRED AT --}}
                                <div class="form-group row">
                                    <label for="expired_at" class="col-md-12 col-form-label text-md-left">Expired At <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="expired_at" type="date" step="1" class="form-control{{ $errors->has('expired_at') ? ' is-invalid' : '' }}" name="expired_at" autofocus>

                                        @if ($errors->has('expired_at'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('expired_at') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-5 mb-0 text-center">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="fa fa-user-plus"></i> Save
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- UNIT --}}
    {{--<div class="form-group row">--}}
    {{--<label for="unit" class="col-md-12 col-form-label text-md-left">Unit <span class="text-danger">*</span></label>--}}

    {{--<div class="col-md-12">--}}
    {{--<select name="unit" class="form-control{{ $errors->has('unit') ? ' is-invalid' : '' }} py-0" id="unit" autofocus required>--}}
    {{--<option value="kg">Kilogram</option>--}}
    {{--<option value="lbs">Pounds</option>--}}
    {{--<option value="piece">Piece</option>--}}
    {{--<option value="bag">Bag</option>--}}
    {{--</select>--}}

    {{--@if ($errors->has('unit'))--}}
    {{--<span class="invalid-feedback" role="alert">--}}
    {{--<strong>{{ $errors->first('unit') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection