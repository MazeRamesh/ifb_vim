@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Podetails' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('podetails.podetails.destroy', $podetails->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('podetails.podetails.index') }}" class="btn btn-primary" title="Show All Podetails">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('podetails.podetails.create') }}" class="btn btn-success" title="Create New Podetails">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('podetails.podetails.edit', $podetails->id ) }}" class="btn btn-primary" title="Edit Podetails">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Podetails" onclick="return confirm(&quot;Click Ok to delete Podetails.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Pono</dt>
            <dd>{{ optional($podetails->pono)->id }}</dd>
            <dt>Podate</dt>
            <dd>{{ $podetails->podate }}</dd>
            <dt>Productcode</dt>
            <dd>{{ optional($podetails->productcode)->id }}</dd>
            <dt>Productname</dt>
            <dd>{{ $podetails->productname }}</dd>
            <dt>Partno</dt>
            <dd>{{ $podetails->partno }}</dd>
            <dt>Productdescription</dt>
            <dd>{{ $podetails->productdescription }}</dd>
            <dt>Uom</dt>
            <dd>{{ $podetails->uom }}</dd>
            <dt>Productmanufactdate</dt>
            <dd>{{ $podetails->productmanufactdate }}</dd>
            <dt>Productexpirydate</dt>
            <dd>{{ $podetails->productexpirydate }}</dd>
            <dt>Productmrprate</dt>
            <dd>{{ $podetails->productmrprate }}</dd>
            <dt>Productsellingrate</dt>
            <dd>{{ $podetails->productsellingrate }}</dd>
            <dt>Productdealerrate</dt>
            <dd>{{ $podetails->productdealerrate }}</dd>
            <dt>Productigstrate</dt>
            <dd>{{ $podetails->productigstrate }}</dd>
            <dt>Productcgstrate</dt>
            <dd>{{ $podetails->productcgstrate }}</dd>
            <dt>Productsgstrate</dt>
            <dd>{{ $podetails->productsgstrate }}</dd>
            <dt>Productqty</dt>
            <dd>{{ $podetails->productqty }}</dd>
            <dt>Producthsncode</dt>
            <dd>{{ $podetails->producthsncode }}</dd>
            <dt>Productigstamount</dt>
            <dd>{{ $podetails->productigstamount }}</dd>
            <dt>Productcgstamount</dt>
            <dd>{{ $podetails->productcgstamount }}</dd>
            <dt>Productsgstamount</dt>
            <dd>{{ $podetails->productsgstamount }}</dd>
            <dt>Netamount</dt>
            <dd>{{ $podetails->netamount }}</dd>
            <dt>Taxableamount</dt>
            <dd>{{ $podetails->taxableamount }}</dd>

        </dl>

    </div>
</div>

@endsection