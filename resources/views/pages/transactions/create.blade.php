@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Transactions</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/transactions">Transactions</a></li>
                        <li><span>Create</span></li>
                    </ul>
                </div>
            </div>
            @include('includes.user-profile')
        </div>
    </div>
    <!-- page title area end -->

    <div class="main-content-inner">
        @include('includes.messages')
        <div class="row mb-5">
            <div class="col-md-6 mt-5">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="header-title mb-0">Transaction Summary</h4>
                        </div>
                        <div class="market-status-table mt-4">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Price per kg</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody id="transactionsTBody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="ml-2">
                            <p><b>Total : <span id="total"></span></b></p>
                            <p>
                                <b class="float-left m-auto">Money : </b>
                                <input class="ml-2" id="money" onkeyup="updateChange()" type="number">
                            </p>
                            <p><b>Change: <span id="change"></span></b></p>
                        </div>
                        <div class="text-center mb-3">
                            <button id="save" type="button" class="btn btn-outline-primary" name="button">SAVE</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="header-title mb-0">Products List</h4>
                        </div>
                        <div class="form-group mt-4" align="center">
                            <label for="search">Search here :</label>
                            <input type="text" name="search" id="search" class="w-50 form-control" placeholder="Search Product">
                        </div>
                        <div class="market-status-table mt-4">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Price per kg</th>
                                        <th>Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody id="productsTBody">
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