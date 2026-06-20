@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Quotation' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('quotations.quotation.destroy', $quotation->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('quotations.quotation.index') }}" class="btn btn-primary" title="Show All Quotation">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('quotations.quotation.create') }}" class="btn btn-success" title="Create New Quotation">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('quotations.quotation.edit', $quotation->id ) }}" class="btn btn-primary" title="Edit Quotation">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Quotation" onclick="return confirm(&quot;Click Ok to delete Quotation.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Quotation Number</dt>
            <dd>{{ $quotation->quotation_number }}</dd>
            <dt>Quotation Date</dt>
            <dd>{{ $quotation->quotation_date }}</dd>
            <dt>Quotation Company Code</dt>
            <dd>{{ $quotation->quotation_company_code }}</dd>
            <dt>Quotation Customer Code</dt>
            <dd>{{ $quotation->quotation_customer_code }}</dd>
            <dt>Project Name</dt>
            <dd>{{ $quotation->project_name }}</dd>
            <dt>Description</dt>
            <dd>{{ $quotation->description }}</dd>
            <dt>Reference</dt>
            <dd>{{ $quotation->reference }}</dd>
            <dt>Quotation Product Code</dt>
            <dd>{{ $quotation->quotation_product_code }}</dd>
            <dt>Item Description</dt>
            <dd>{{ $quotation->item_description }}</dd>
            <dt>Item Price</dt>
            <dd>{{ $quotation->item_price }}</dd>
            <dt>Item Sgst</dt>
            <dd>{{ $quotation->item_sgst }}</dd>
            <dt>Item Cgst</dt>
            <dd>{{ $quotation->item_cgst }}</dd>
            <dt>Item Igst</dt>
            <dd>{{ $quotation->item_igst }}</dd>
            <dt>Item Subtotal</dt>
            <dd>{{ $quotation->item_subtotal }}</dd>
            <dt>Item Taxtotal</dt>
            <dd>{{ $quotation->item_taxtotal }}</dd>
            <dt>Quotation Amount</dt>
            <dd>{{ $quotation->quotation_amount }}</dd>
            <dt>Quotation Amount Inwords</dt>
            <dd>{{ $quotation->quotation_amount_inwords }}</dd>

        </dl>

    </div>
</div>

@endsection