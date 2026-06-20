@extends('layouts.app')
@section('print','menu-open')
@section('page-title','View Sales Invoice')
@push('css')
<style type="text/css">
  .select2-selection__rendered
  {
    padding-top: 8px !important;
  }
  .select2-selection__choice
  {
   padding-top: 8px !important; 
  }
  .select2-result-repository__avatar{float:left;width:60px;margin-right:10px}.select2-result-repository__avatar img{width:100%;height:auto;border-radius:2px}.select2-result-repository__meta{margin-left:70px}.select2-result-repository__title{color:black;font-weight:700;word-wrap:break-word;line-height:1.1;margin-bottom:4px}.select2-result-repository__forks,.select2-result-repository__stargazers{margin-right:1em}.select2-result-repository__forks,.select2-result-repository__stargazers,.select2-result-repository__watchers{display:inline-block;color:#aaa;font-size:11px}.select2-result-repository__description{font-size:13px;color:#777;margin-top:4px}.select2-results__option--highlighted .select2-result-repository__title{color:white}.select2-results__option--highlighted .select2-result-repository__forks,.select2-results__option--highlighted .select2-result-repository__stargazers,.select2-results__option--highlighted .select2-result-repository__description,.select2-results__option--highlighted .select2-result-repository__watchers{color:#c6dcef}.s2-docs-sidebar.affix{position:static}
</style>
@endpush
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
	
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row" style="padding-top: 10px;">
			<div class="col-12">
				<div class="card card-primary card-outline">
				<div class="card-header" style="background-color: #535EE3;">
            <h3 class="card-title clearfix" style="color: white;">View Sales Invoice</h3>
</div>
           <form role="form" action="{{ route('print.printbarcode') }}" method="POST" id="myForm" autocomplete="off" target="_blank">
                        {!! csrf_field() !!}
                
                {{--<!-- <div class="btn-group btn-group-sm pull-right" role="group">
                    <a href="{{ route('salesheaders.salesheader.index') }}" class="btn btn-sm btn-primary" title="Show All sales Invoice">
                        <span class="fa fa-eye" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('salesheaders.salesheader.create') }}" class="btn btn-sm btn-success" title="Create New sales Invoice">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('salesheaders.salesheader.edit', $salesheader->id ) }}" class="btn btn-sm btn-primary" title="Edit sales Invoice">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete sales Invoice" onclick="return confirm(&quot;Click Ok to delete sales Invoice.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div> -->--}}
           

  <br>
   <input name="invoicenumber" id="invoicenumber" value="{{$salesheader[0]->invoice_no}}" style="display: none;"/>
   
   <input name="all" id="all" style="display: none;"/>
   <input name="original" id="original" style="display: none;"/>
   <input name="duplicate" id="duplicate" style="display: none;"/>
   <input name="triplicate" id="triplicate" style="display: none;"/>
   <input name="extra" id="extra" style="display: none;"/>

    <div class="card-body">
        
        <div class="card-text">
            
            
            <dl class="row lp-2">
            
            <dt class="col">Invoice No.</dt>
            <dd class="col">{{ $salesheader[0]->invoice_no }}</dd>
            <dt class="col">Invoice Date</dt>
            <dd class="col">{{ $salesheader[0]->invoice_date }}</dd>
            <dt class="col">Invoice Value</dt>
            <dd class="col">{{ $salesheader[0]->grand_total }}</dd>
                                
            </dl>
            
            <dl class="row lp-2">
		                 
            <dt class="col">ISGT Amt.</dt>
            <dd class="col">{{ $salesheader[0]->totaligst }}</dd>
            <dt class="col">SSGT Amt.</dt>
            <dd class="col">{{ $salesheader[0]->totalsgst }}</dd>
            <dt class="col">CSGT Amt.</dt>
            <dd class="col">{{ $salesheader[0]->totalcgst }}</dd>
                 
            </dl>
            
            <dl class="row lp-2">
                                
            <dt class="col">Tax Amt.</dt>
            <dd class="col">{{ $salesheader[0]->tax_amount }}</dd>
            <dt class="col">Net Amt.</dt>
            <dd class="col">{{ $salesheader[0]->subtotal }}</dd>    
            <dt class="col"></dt>
            <dd class="col"></dd>                
                </dl>
                        
        </div>
        
        <table class="table table-condensed table-bordered" >
                        <thead>
                           <tr style="background-color: #B7BBF2;">
                              
                               
                                <th style="width:15%;">Product Name</th>
                                <th style="width:15%;">ITW PartNo</th>
                                <th style="width:15%;">Hmil PartNo</th>
                                <th style="width:15%;">HSN Code</th>
                                <th style="width:15%;">Po No.</th>
                                <th style="width:15%;">PO Date</th>
                                <th style="width:15%;">Vendor Code</th>
                                <th style="width:15%;">Quantity</th>
                                <th style="width:15%;">Unit rate</th>
                      
                            </tr>
                        </thead>
            
            @foreach($salesheader as $salesheaders)
                        <tbody>
                            <tr>
                               
                                <td style="width:15%;">{{$salesheaders->party_description}}</td>
                                <td style="width:15%;">{{$salesheaders->itw_part_no}}</td>
                                <td style="width:15%;">{{$salesheaders->hmil_part_no}}</td>
                                <td style="width:15%;">{{$salesheaders->hsn_code}}</td>
                                <td style="width:15%;">{{$salesheaders->po_no}}</td>
                                <td style="width:15%;">{{$salesheaders->po_date}}</td>
                                <td style="width:15%;">{{$salesheaders->hmil_vendor_code}}</td>
                                <td style="width:15%;">{{$salesheaders->item_qty}}</td>
                                <td style="width:15%;">{{$salesheaders->item_rate}}</td>
                                                  
                            </tr>
                        </tbody>
            
            @endforeach
        
        </table>
        <div class="card-footer clearfix text-center">
                              <button type="submit" class=" btn btn-success btn-sm pl-4 pr-4" id="print">Print</button>
                        </div>
        
        
    </div>
</form>
    </div>
</div>
        </div>
          </div>
      </section>
</div>


@endsection
@push('scripts')
<!-- DataTables -->

<script>

   function print() {
       
        }

 


</script>
@endpush