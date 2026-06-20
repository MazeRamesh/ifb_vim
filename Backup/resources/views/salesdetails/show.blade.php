@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Salesdetails' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('salesdetails.salesdetails.destroy', $salesdetails->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('salesdetails.salesdetails.index') }}" class="btn btn-primary" title="Show All Salesdetails">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('salesdetails.salesdetails.create') }}" class="btn btn-success" title="Create New Salesdetails">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('salesdetails.salesdetails.edit', $salesdetails->id ) }}" class="btn btn-primary" title="Edit Salesdetails">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Salesdetails" onclick="return confirm(&quot;Click Ok to delete Salesdetails.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Invoiceno</dt>
            <dd>{{ optional($salesdetails->invoiceno)->id }}</dd>
            <dt>Invoicedate</dt>
            <dd>{{ $salesdetails->invoicedate }}</dd>
            <dt>Productcode</dt>
            <dd>{{ optional($salesdetails->productcode)->id }}</dd>
            <dt>Productname</dt>
            <dd>{{ $salesdetails->productname }}</dd>
            <dt>Partno</dt>
            <dd>{{ $salesdetails->partno }}</dd>
            <dt>Productdescription</dt>
            <dd>{{ $salesdetails->productdescription }}</dd>
            <dt>Uom</dt>
            <dd>{{ $salesdetails->uom }}</dd>
            <dt>Productmanufactdate</dt>
            <dd>{{ $salesdetails->productmanufactdate }}</dd>
            <dt>Productexpirydate</dt>
            <dd>{{ $salesdetails->productexpirydate }}</dd>
            <dt>Productmrprate</dt>
            <dd>{{ $salesdetails->productmrprate }}</dd>
            <dt>Productsellingrate</dt>
            <dd>{{ $salesdetails->productsellingrate }}</dd>
            <dt>Productdealerrate</dt>
            <dd>{{ $salesdetails->productdealerrate }}</dd>
            <dt>Productigstrate</dt>
            <dd>{{ $salesdetails->productigstrate }}</dd>
            <dt>Productcgstrate</dt>
            <dd>{{ $salesdetails->productcgstrate }}</dd>
            <dt>Productsgstrate</dt>
            <dd>{{ $salesdetails->productsgstrate }}</dd>
            <dt>Productqty</dt>
            <dd>{{ $salesdetails->productqty }}</dd>
            <dt>Producthsncode</dt>
            <dd>{{ $salesdetails->producthsncode }}</dd>
            <dt>Productigstamount</dt>
            <dd>{{ $salesdetails->productigstamount }}</dd>
            <dt>Productcgstamount</dt>
            <dd>{{ $salesdetails->productcgstamount }}</dd>
            <dt>Productsgstamount</dt>
            <dd>{{ $salesdetails->productsgstamount }}</dd>
            <dt>Netamount</dt>
            <dd>{{ $salesdetails->netamount }}</dd>
            <dt>Taxableamount</dt>
            <dd>{{ $salesdetails->taxableamount }}</dd>

        </dl>

    </div>
</div>

@endsection