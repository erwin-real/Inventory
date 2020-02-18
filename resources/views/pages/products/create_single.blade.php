@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Products</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/products">Products</a></li>
                        <li><a href="/products/{{$product->id}}">{{ucfirst($product->name)}} - {{ucfirst($product->type)}}</a></li>
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
                            <h4 class="header-title mb-0">Add {{$product->name}} - {{$product->type}}</h4>
                        </div>
                        <div class="mt-4">
                            <form action="/products/{{$product->id}}" method="POST">
                                @csrf

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
@endsection