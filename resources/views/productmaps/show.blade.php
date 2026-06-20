@extends('layouts.app')
@section('masters','menu-open')
@section('map','active')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Productmap' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('productmaps.productmap.destroy', $productmap->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('productmaps.productmap.index') }}" class="btn btn-primary" title="Show All Productmap">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('productmaps.productmap.create') }}" class="btn btn-success" title="Create New Productmap">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('productmaps.productmap.edit', $productmap->id ) }}" class="btn btn-primary" title="Edit Productmap">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Productmap" onclick="return confirm(&quot;Click Ok to delete Productmap.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Product</dt>
            <dd>{{ optional($productmap->product)->productcode }}</dd>
            <dt>Cutomer</dt>
            <dd>{{ optional($productmap->cutomer)->id }}</dd>
            <dt>Product</dt>
            <dd>{{ $productmap->product }}</dd>
            <dt>Customer</dt>
            <dd>{{ $productmap->customer }}</dd>

        </dl>

    </div>
</div>

@endsection