@extends('layouts.app')
@section('sales','menu-open')
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View Sales Invoice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('salesheaders.salesheader.index') }}">PO</a></li>
              <li class="breadcrumb-item active">View Sales Invoice</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
	
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
			<div class="col-12">
				<div class="card card-primary card-outline">
				

         <form method="POST" action="{!! route('salesheaders.salesheader.destroy', $salesheader->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                
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
  

    <div class="card-body">
        
        <div class="card-text">
            
            
            <dl class="row lp-2">
                                
            <dt class="col">Sales unique No</dt>
            <dd class="col">{{ $salesheader->salesuniqueno }}</dd>
            <dt class="col">Invoice No</dt>
            <dd class="col">{{ $salesheader->invoiceno }}</dd>
            <dt class="col">Invoice Date</dt>
            <dd class="col">{{ $salesheader->invoicedate }}</dd>
                                
            </dl>
            
            <dl class="row lp-2">
		                 
            <dt class="col">Tax Types</dt>
            <dd class="col">{{ $salesheader->taxtypes }}</dd>
            <dt class="col">Taxable Amount</dt>
            <dd class="col">{{ $salesheader->taxableamounts }}</dd>
            <dt class="col">IGST Amount</dt>
            <dd class="col">{{ $salesheader->igstamount }}</dd>
                 
            </dl>
            
            <dl class="row lp-2">
                                
            <dt class="col">CGST Amount</dt>
            <dd class="col">{{ $salesheader->cgstamount }}</dd>
            <dt class="col">SGST Amount</dt>
            <dd class="col">{{ $salesheader->sgstamount }}</dd>
            <dt class="col">Other Amount</dt>
            <dd class="col">{{ $salesheader->otheramount }}</dd>
                
                </dl>
            
            <dl class="row lp-2">
            
            <dt class="col">Discount Amount</dt>
            <dd class="col">{{ $salesheader->discountamount }}</dd>
            <dt class="col">Tax Amount</dt>
            <dd class="col">{{ $salesheader->totaltaxamount }}</dd>
            <dt class="col">Grand Total Amount</dt>
            <dd class="col">{{ $salesheader->grandtotalamount }}</dd>
                
                 </dl>
            
             <dl class="row lp-2">
                                
            <dt class="col">Createdby</dt>
            <dd class="col">{{ $salesheader->createdby }}</dd>
            <dt class="col">CreatedAt</dt>
            <dd class="col">{{ $salesheader->created_at }}</dd>
            <dt class="col">Companyid</dt>
            <dd class="col">{{ $salesheader->companyid }}</dd>
                                
                                
		  </dl>

            
        </div>
        
        <table class="table table-condensed table-bordered" >
                        <thead>
                            <tr>
                              
                               
                                <th style="width:15%;">Product Name</th>
                                <th style="width:15%;">PartNo</th>
                                <th style="width:15%;">Description</th>
                                <th style="width:15%;">HSN Code</th>
                                <th style="width:15%;">UOM</th>
                                <th style="width:15%;">QTY</th>
                                <th style="width:15%;">Rate</th>
                                <th style="width:15%;">Tax %</th>
                                <th style="width:15%;">Net Amount</th>
                                <th style="width:15%;">Tax Amount</th>
                                <th style="width:15%;">Total Amount</th>
                            </tr>
                        </thead>
            
            @foreach($salesheader->InvoicenoList as $salesheader)
                        <tbody>
                            <tr>
                               
                                <td style="width:15%;">{{$salesheader->productname}}</td>
                                <td style="width:15%;">{{$salesheader->partno}}</td>
                                <td style="width:15%;">{{$salesheader->productdescription}}</td>
                                <td style="width:15%;">{{$salesheader->producthsncode}}</td>
                                <td style="width:15%;">{{$salesheader->uom_id}}</td>
                                <td style="width:15%;">{{$salesheader->productqty}}</td>
                                <td style="width:15%;">{{$salesheader->productsellingrate}}</td>
                                <td style="width:15%;">{{$salesheader->productigstrate}}</td>
                                <td style="width:15%;">{{$salesheader->netamount}}</td>
                                <td style="width:15%;">{{$salesheader->productigstamount}}</td>
                                <td style="width:15%;">{{$salesheader->taxableamount}}</td>
                                
                            </tr>
                        </tbody>
            
            @endforeach
        
        </table>
        
        
        
    </div>
</form>
    </div>
</div>
        </div>
          </div>
      </section>
</div>


@endsection