@extends('layouts.app')
@section('masters','menu-open')
@section('part','active')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Products' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('products.products.destroy', $products->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('products.products.index') }}" class="btn btn-primary" title="Show All Products">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('products.products.create') }}" class="btn btn-success" title="Create New Products">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('products.products.edit', $products->id ) }}" class="btn btn-primary" title="Edit Products">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Products" onclick="return confirm(&quot;Click Ok to delete Products.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Product Code</dt>
            <dd>{{ $products->productcode }}</dd>
            <dt>Product Name</dt>
            <dd>{{ $products->productname }}</dd>
            <dt>Product Partno</dt>
            <dd>{{ $products->productpartno }}</dd>
            <dt>Product Description</dt>
            <dd>{{ $products->productdescription }}</dd>
            <dt>Uom</dt>
            <dd>{{ optional($products->uom)->created_at }}</dd>
            <dt>Product Manufact Date</dt>
            <dd>{{ $products->productmanufactdate }}</dd>
            <dt>Product Expiry Date</dt>
            <dd>{{ $products->productexpirydate }}</dd>
            <dt>Product MRP Rate</dt>
            <dd>{{ $products->productmrprate }}</dd>
            <dt>Product Selling Rate</dt>
            <dd>{{ $products->productsellingrate }}</dd>
            <dt>Product Dealer Rate</dt>
            <dd>{{ $products->productdealerrate }}</dd>
            <dt>Product IGST Rate</dt>
            <dd>{{ $products->productigstrate }}</dd>
            <dt>Product CGST Rate</dt>
            <dd>{{ $products->productcgstrate }}</dd>
            <dt>Product SGST Rate</dt>
            <dd>{{ $products->productsgstrate }}</dd>
            <dt>Product Qty</dt>
            <dd>{{ $products->productqty }}</dd>
            <dt>Product Closing Qty</dt>
            <dd>{{ $products->productclosingqty }}</dd>
            <dt>Product Status</dt>
            <dd>{{ $products->productstatus }}</dd>
            <dt>Producthsncode</dt>
            <dd>{{ $products->producthsncode }}</dd>

        </dl>

    </div>
</div>

@endsection