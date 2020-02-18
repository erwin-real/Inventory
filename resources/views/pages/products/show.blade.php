@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Products</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/products">Products</a></li>
                        <li><span>{{ucfirst($product->name)}} - {{ucfirst($product->type)}}</span></li>
                    </ul>
                </div>
            </div>
            @include('includes.user-profile')
        </div>
    </div>
    <!-- page title area end -->

    <div class="main-content-inner">
        @include('includes.messages')
        <div class="row">
            <div class="col-12 mt-5 mb-5">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="header-title mb-0">{{ucfirst($product->name)}} - {{ucfirst($product->type)}}</h4>
                            <a href="/products/{{$product->id}}/create" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Add</a>
                        </div>

                        @if($product->singleProducts->sum('quantity') <= $product->warning_quantity)
                            <div class="mt-3 mb-0 alert alert-danger alert-dismissible">
                                <strong>URGENT!</strong> Needs to restock!
                            </div>
                        @endif
                        <div class="ml-5 mt-4">

                            {{-- BASIC INFO --}}
                            <p> <strong>Name</strong>: {{ ucfirst($product->name) }}</p>
                            <p> <strong>Type</strong>: {{ ucfirst($product->type) }}</p>
                            <p> <strong>Price</strong>: {{ $product->price }}</p>
                            <p> <strong>Total Quantity</strong>: {{ $product->singleProducts->sum('quantity')}}</p>
                            <p> <strong>Warning Quantity</strong>: {{ $product->warning_quantity }}</p>
                            <p> <strong>Added at</strong>: {{ date('D M d, Y h:i a', strtotime($product->created_at)) }}</p>
                            <p> <strong>Modified at</strong>: {{ date('D M d, Y h:i a', strtotime($product->updated_at)) }}</p>
                        </div>
                        @if(count($product->singleProducts) > 0)
                            <div class="market-status-table mt-4">
                                {{--{{$accounts->links()}}--}}
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Quantity</th>
                                            <th>Added At</th>
                                            <th>Expired At</th>
                                            <th>Modified At</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($product->singleProducts as $singleProduct)
                                            <tr id="{{$singleProduct->id}}">
                                                <td class="d-none">{{$singleProduct->id}}</td>
                                                <td>{{$singleProduct->slug}}</td>
                                                <td>{{$singleProduct->quantity}}</td>
                                                <td>{{ date('D M d, Y h:i a', strtotime($singleProduct->created_at)) }}</td>
                                                <td>{{ date('D M d, Y', strtotime($singleProduct->expired_at)) }}</td>
                                                <td>{{ date('D M d, Y h:i a', strtotime($singleProduct->updated_at)) }}</td>
                                                <td class="text-danger delete-modal"><i class="ti-trash"></i></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-holder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="delete-modal-body">
                    <div class="m-3 font-weight-bold">Do you really wish to delete this product?</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Nope</button>

                    <form id="delete-form">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function () {
            $('.delete-modal').click(function (e) {

                $('#single_id').remove();

                let children = $(this).closest('td').parent()[0].children;
                $('#delete-form').append("<input id=\"single_id\" type=\"hidden\" name=\"single_id\" value=\""+ children[0].innerText +"\">");

                $('#delete-holder').modal('show');
            });

            $('#delete-form').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    type: "DELETE",
                    url: "/products/{{$product->id}}",
                    data: $('#delete-form').serialize(),
                    success: function (response) {
                        location.reload();
                    },
                    error: function (error) {
                        console.log(error);
                        $('.alerts').remove();
                        $('#delete-holder').modal('hide');
                        $('.main-content-inner').before("<div class=\"alert alert-danger alerts\">Deleted Product Unsuccessfully.\n" +
                            "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a></div>");
                        $(".alerts").fadeTo(5000, 500).slideUp(500, function() { $(".alerts").slideUp(500); });
                    }
                });
            });
        });
    </script>
@endsection