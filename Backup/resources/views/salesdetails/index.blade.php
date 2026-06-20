@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Salesdetails</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('salesdetails.salesdetails.create') }}" class="btn btn-success" title="Create New Salesdetails">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($salesdetailsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Salesdetails Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Invoiceno</th>
                            <th>Invoicedate</th>
                            <th>Productcode</th>
                            <th>Productname</th>
                            <th>Partno</th>
                            <th>Productdescription</th>
                            <th>Uom</th>
                            <th>Productmanufactdate</th>
                            <th>Productexpirydate</th>
                            <th>Productmrprate</th>
                            <th>Productsellingrate</th>
                            <th>Productdealerrate</th>
                            <th>Productigstrate</th>
                            <th>Productcgstrate</th>
                            <th>Productsgstrate</th>
                            <th>Productqty</th>
                            <th>Producthsncode</th>
                            <th>Productigstamount</th>
                            <th>Productcgstamount</th>
                            <th>Productsgstamount</th>
                            <th>Netamount</th>
                            <th>Taxableamount</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($salesdetailsObjects as $salesdetails)
                        <tr>
                            <td>{{ optional($salesdetails->invoiceno)->id }}</td>
                            <td>{{ $salesdetails->invoicedate }}</td>
                            <td>{{ optional($salesdetails->productcode)->id }}</td>
                            <td>{{ $salesdetails->productname }}</td>
                            <td>{{ $salesdetails->partno }}</td>
                            <td>{{ $salesdetails->productdescription }}</td>
                            <td>{{ $salesdetails->uom }}</td>
                            <td>{{ $salesdetails->productmanufactdate }}</td>
                            <td>{{ $salesdetails->productexpirydate }}</td>
                            <td>{{ $salesdetails->productmrprate }}</td>
                            <td>{{ $salesdetails->productsellingrate }}</td>
                            <td>{{ $salesdetails->productdealerrate }}</td>
                            <td>{{ $salesdetails->productigstrate }}</td>
                            <td>{{ $salesdetails->productcgstrate }}</td>
                            <td>{{ $salesdetails->productsgstrate }}</td>
                            <td>{{ $salesdetails->productqty }}</td>
                            <td>{{ $salesdetails->producthsncode }}</td>
                            <td>{{ $salesdetails->productigstamount }}</td>
                            <td>{{ $salesdetails->productcgstamount }}</td>
                            <td>{{ $salesdetails->productsgstamount }}</td>
                            <td>{{ $salesdetails->netamount }}</td>
                            <td>{{ $salesdetails->taxableamount }}</td>

                            <td>

                                <form method="POST" action="{!! route('salesdetails.salesdetails.destroy', $salesdetails->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('salesdetails.salesdetails.show', $salesdetails->id ) }}" class="btn btn-info" title="Show Salesdetails">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('salesdetails.salesdetails.edit', $salesdetails->id ) }}" class="btn btn-primary" title="Edit Salesdetails">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Salesdetails" onclick="return confirm(&quot;Click Ok to delete Salesdetails.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $salesdetailsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection