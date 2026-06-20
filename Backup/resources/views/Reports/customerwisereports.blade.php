@extends('layouts.app')

@section('page-title','Customerwise Report')
@section('reports','menu-open')
@section('customerwise','active')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Customerwise Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item active">Customerwise Report</li>
            </ol>
          </div>
        </div>
      </div>
    </div> -->
    <!-- /.content-header -->
	@if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="fa fa-ok"></span>
            {!! session('success_message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
       </div>
    @endif
    <!-- Main content -->
	
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
			<div class="col-12 mt-3">
				<div class="card card-primary card-outline">
				   <div class="card-header">
						<h3 class="card-title clearfix text-info text-uppercase font-weight-bold">Customerwise Report ( Hero Motocorp Ltd. )</h3>
						<div class="card-tools">
						   
						</div>
					</div>
                    
            
      <div class="card-body">              
             
           <div class="row">

<div class="col-3 form-group">
    <label for="fromdate" class="col control-label">From Date</label>
    <div class="col">
    <input class="form-control" type="text" name="fromdate" id="fromdate" value="" placeholder=" "><!-- {{isset($_GET['fromdate'])? $_GET['fromdate']: ''}} -->    
    </div>
</div>
    
<div class="col-3 form-group">
    <label for="todate" class="col control-label">To Date</label>
    <div class="col">
    <input id="todate" class="form-control" type="text" name="todate" value="" placeholder=" "><!-- {{isset($_GET['todate'])? $_GET['todate']: ''}} -->   
    </div>
</div>
    


<div class="col-3 form-group">
    <label class="col control-label">Customer Name: </label>
<select class="form-control" id="customercode" name="customercode" required="">
<option value="" style="display: none;" disabled selected>Select Customer Name</option>
<option value="all">All</option> 
@foreach ($customerlist as $key => $customerlists)
<option value="{{ $customerlists->customercode }}">
{{ $customerlists->customercode }} - {{ $customerlists->customername }}
</option>
@endforeach
</select>

</div>
</div>
</div>



                
        
       
        <div class="card-body panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped " style="width:100%" id="customerwiseReport_table">
                    <thead>
                        <tr>
                            <th>Invoice No</th>
                            <th>Invoice Date</th>
                            <th>Customer Code</th>
                            
                            <th>Tax Amount</th>
                            <th>Discount Amount</th>
                            <th>Other Amount</th>
                            <th>Grand Total</th>
                            <th>Created By</th>
                            <th>Created At</th>
                        
                        </tr>
                    </thead>
       
                </table>

                
                </div><!--/. card-body -->
						
					
				</div><!--/. card -->
			</div>
		</div> <!--/. row -->
	  </div>
          <!--/. container-fluid -->
        </div>
    </section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection



@push('scripts')

<!-- DataTables Excel Export Js -->

<script src="{{asset('js/backendjs/buttons.html5.min.js')}}"></script>
<script src="{{asset('js/backendjs/jszip.min.js')}}"></script>
<script src="{{asset('js/backendjs/dataTables.buttons.min.js')}}"></script>

<!-- DataTables -->

<script>
	var reg_table;
$(function() {
reg_table=$('#customerwiseReport_table').DataTable({
processing: true,
searching: true,
serverSide: true,
dom: 'lBfrtip',
   buttons: [
    'excel'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
ajax:{"url": '{!! route('get.customerwisereport.data') !!}',

'data':function ( d ) {
                        d.fromdate=$("#fromdate").val();
                        d.todate=$("#todate").val();
                        d.customercode=$("#customercode").val();
                       
                    }},
columns: [
{ data: 'invoiceno', name: 'invoiceno' },
{ data: 'invoicedate', name: 'invoicedate' },
{ data: 'customercode_id', name: 'customercode_id' },

{ data: 'totaltaxamount', name: 'totaltaxamount' },
{ data: 'discountamount', name: 'discountamount' },
{ data: 'otheramount', name: 'otheramount' },
{ data: 'grandtotalamount', name: 'grandtotalamount' },
{ data: 'createdby', name: 'createdby' },
{ data: 'created_at', name: 'created_at' },

]
}).on('click', '.btn-delete[data-remote]', function (e) {
e.preventDefault();
$.ajaxSetup({
headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});
var url = $(this).data('remote');
// confirm then
if (confirm('Are you sure you want to delete this registration?')) {
$.ajax({
url: url,
type: 'DELETE',
data: {method: '_DELETE', submit: true}
}).always(function (data) {
$('#customerwiseReport_table-table').DataTable().draw(false);
}
);
}
});
});

$("#fromdate").datepicker({format: 'dd/mm/yyyy'});
$("#todate").datepicker({format: 'dd/mm/yyyy'});

$("#fromdate,#todate,#customercode").on('change',function(){
    reg_table.draw();
});

</script>
@endpush
