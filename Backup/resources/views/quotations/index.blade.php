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
                <h4 class="mt-5 mb-5">Quotations</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('quotations.quotation.create') }}" class="btn btn-success" title="Create New Quotation">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($quotations) == 0)
            <div class="panel-body text-center">
                <h4>No Quotations Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Quotation Number</th>
                            <th>Quotation Date</th>
                            <th>Quotation Company Code</th>
                            <th>Quotation Customer Code</th>
                            <th>Project Name</th>
                            <th>Reference</th>
                            <th>Quotation Product Code</th>
                            <th>Item Description</th>
                            <th>Item Price</th>
                            <th>Item Sgst</th>
                            <th>Item Cgst</th>
                            <th>Item Igst</th>
                            <th>Item Subtotal</th>
                            <th>Item Taxtotal</th>
                            <th>Quotation Amount</th>
                            <th>Quotation Amount Inwords</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($quotations as $quotation)
                        <tr>
                            <td>{{ $quotation->quotation_number }}</td>
                            <td>{{ $quotation->quotation_date }}</td>
                            <td>{{ $quotation->quotation_company_code }}</td>
                            <td>{{ $quotation->quotation_customer_code }}</td>
                            <td>{{ $quotation->project_name }}</td>
                            <td>{{ $quotation->reference }}</td>
                            <td>{{ $quotation->quotation_product_code }}</td>
                            <td>{{ $quotation->item_description }}</td>
                            <td>{{ $quotation->item_price }}</td>
                            <td>{{ $quotation->item_sgst }}</td>
                            <td>{{ $quotation->item_cgst }}</td>
                            <td>{{ $quotation->item_igst }}</td>
                            <td>{{ $quotation->item_subtotal }}</td>
                            <td>{{ $quotation->item_taxtotal }}</td>
                            <td>{{ $quotation->quotation_amount }}</td>
                            <td>{{ $quotation->quotation_amount_inwords }}</td>

                            <td>

                                <form method="POST" action="{!! route('quotations.quotation.destroy', $quotation->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('quotations.quotation.show', $quotation->id ) }}" class="btn btn-info" title="Show Quotation">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('quotations.quotation.edit', $quotation->id ) }}" class="btn btn-primary" title="Edit Quotation">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Quotation" onclick="return confirm(&quot;Click Ok to delete Quotation.&quot;)">
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
            {!! $quotations->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
@push('scripts')
<script>
             table = $('#print_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('get.salesheaders.data') !!}',
        columnDefs: [{
            orderable: false,
            className: 'select-checkbox',
            targets: 0
        }],
        select: {
            style: 'multi',
            selector: 'td:first-child'
        },
        order: [
            [1, 'asc']
        ],
         columns: [                 
                { data: null, orderable: false, "defaultContent":''},
                { data: 'invoiceno', name: 'invoiceno' },
                { data: 'invoicedate', name: 'invoicedate' },
                { data: 'otheramount', name: 'otheramount' },
                { data: 'discountamount', name: 'discountamount' },
                { data: 'totaltaxamount', name: 'totaltaxamount' },
                { data: 'grandtotalamount', name: 'grandtotalamount' },
                { data: 'created_at', name: 'created_at' },
                { data: 'created_at', name: 'created_at' },
                { data: 'pdfstatus', name: 'pdfstatus' },
                { data: 'ewaybillno', name: 'ewaybillno' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false},  
                
            ]
     }).on('click', '.btn-delete[data-remote]', function (e) { 
            e.preventDefault();
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            var url = $(this).data('remote');
            // confirm then
            if (confirm('Are you sure you want to delete this area?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {method: '_DELETE', submit: true}
                }).always(function (data) {
                    console.log("1212");
                        $('#print_table').DataTable().draw(false);
                    }
                );
            }
             
        });
</script>
@endpush