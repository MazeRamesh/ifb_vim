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
                <h4 class="mt-5 mb-5">Podetails</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('podetails.podetails.create') }}" class="btn btn-success" title="Create New Podetails">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($podetailsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Podetails Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Pono</th>
                            <th>Podate</th>
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
                    @foreach($podetailsObjects as $podetails)
                        <tr>
                            <td>{{ optional($podetails->pono)->id }}</td>
                            <td>{{ $podetails->podate }}</td>
                            <td>{{ optional($podetails->productcode)->id }}</td>
                            <td>{{ $podetails->productname }}</td>
                            <td>{{ $podetails->partno }}</td>
                            <td>{{ $podetails->productdescription }}</td>
                            <td>{{ $podetails->uom }}</td>
                            <td>{{ $podetails->productmanufactdate }}</td>
                            <td>{{ $podetails->productexpirydate }}</td>
                            <td>{{ $podetails->productmrprate }}</td>
                            <td>{{ $podetails->productsellingrate }}</td>
                            <td>{{ $podetails->productdealerrate }}</td>
                            <td>{{ $podetails->productigstrate }}</td>
                            <td>{{ $podetails->productcgstrate }}</td>
                            <td>{{ $podetails->productsgstrate }}</td>
                            <td>{{ $podetails->productqty }}</td>
                            <td>{{ $podetails->producthsncode }}</td>
                            <td>{{ $podetails->productigstamount }}</td>
                            <td>{{ $podetails->productcgstamount }}</td>
                            <td>{{ $podetails->productsgstamount }}</td>
                            <td>{{ $podetails->netamount }}</td>
                            <td>{{ $podetails->taxableamount }}</td>

                            <td>

                                <form method="POST" action="{!! route('podetails.podetails.destroy', $podetails->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('podetails.podetails.show', $podetails->id ) }}" class="btn btn-info" title="Show Podetails">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('podetails.podetails.edit', $podetails->id ) }}" class="btn btn-primary" title="Edit Podetails">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Podetails" onclick="return confirm(&quot;Click Ok to delete Podetails.&quot;)">
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
            {!! $podetailsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection