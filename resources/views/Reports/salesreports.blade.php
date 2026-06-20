@extends('layouts.app')

@section('page-title','Sales Report')
@section('reports','menu-open')
@section('saleswise','active')
@section('content')
@push('css')
<style>
    tr:nth-child(even) {
  background-color: #e0f3ff;
}
  td{
    text-align: center;
  }
  th{
    text-align: center;
  }

</style>
@endpush
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sales Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item active">Sales Report</li>
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
				   <div class="card-header" style="background-color: #535EE3;">
            <h3 class="card-title clearfix" style="color: white;">Sales Report</h3>
						<div class="card-tools">

						</div>
					</div>


      <div class="card-body pb-0">

           <div class="row">

<div class="col-3 form-group">
    <label for="fromdate" class="col control-label lab">From Date</label>
    <div class="col">
    <input class="form-control" type="text" name="fromdate" id="fromdate" value="" placeholder="From Date" autocomplete="off"><!-- {{isset($_GET['fromdate'])? $_GET['fromdate']: ''}} -->
    </div>
</div>

<div class="col-3 form-group">
    <label for="todate" class="col control-label lab">To Date</label>
    <div class="col">
    <input id="todate" class="form-control" type="text" name="todate" value="" placeholder="To Date" autocomplete="off" ><!-- {{isset($_GET['todate'])? $_GET['todate']: ''}} -->
    </div>
</div>



{{-- <div class="col-3 form-group">
    <label class="col control-label lab">Sign Status: </label>
<select class="form-control" id="signstatus" name="signstatus" required="">
<option value="" style="display: none;" disabled selected>Select Status Name</option>
<option value="all">All</option>
<option value="signed">Signed</option>
<option value="unsigned">Un Signed</option>
</select>

</div> --}}


</div>
</div>






        <div class="card-body panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table  " style="width:100%" id="customerwiseReport_table">
                    <thead>
                        <tr style="background: #ffffff;">
                            <!-- <th></th> -->
                                                <th>Inv.No</th>
                                                <th>Inv. Date</th>
                                                <th>IGST Amt.</th>
                                                <th>Net Amt.</th>
                                                <th>Invoice Amt.</th>
                                                <th>Created At</th>
                                                {{-- <th>Actions</th> --}}

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

     reg_table.on("click", "th.select-checkbox", function() {
    if ($("th.select-checkbox").hasClass("selected")) {
        reg_table.rows().deselect();
        $("th.select-checkbox").removeClass("selected");
        $("#download").attr("disabled", true);
    } else {
        reg_table.rows().select();
        $("th.select-checkbox").addClass("selected");
        var dataTableRows = reg_table.rows({selected: true}).data().toArray();
        console.log(dataTableRows);
        $("#download").attr("disabled", false);

    }
}).on("select deselect", function() {
     console.log("123");

    ("Some selection or deselection going on")
    if (reg_table.rows({
            selected: true
        }).count() !== reg_table.rows().count()) {
        console.log()
        $("th.select-checkbox").removeClass("selected");
         $("#download").attr("disabled", false);
    } else {
        $("th.select-checkbox").addClass("selected");
        $("#download").attr("disabled", true);
    }

    if (reg_table.rows({
            selected: true
        }).count() !== 0) {
        $("#download").attr("disabled", false);
    } else {

        $("#download").attr("disabled", true);
    }

});
});

$(function() {
         reg_table = $('#customerwiseReport_table').DataTable({
        processing: true,
        serverSide: true,
       dom: 'Blfrtip',
      className: 'btn btn-success btn-sm',
      buttons: [
                     {
                className: 'btn btn-warning btn-sm',
                extend: 'excel',
                autoFilter: true,
                exportOptions: {
                    columns: [0,1,2,3,4,5],
                      modifier: {
                        page: '-1'
                    }
                }
            },
            {
                className: 'btn btn-success btn-sm',
                extend: 'pdf',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [0,1,2,3,4,5],
                      modifier: {
                        page: '-1'
                    }
                }
            }
                             ],
                             "lengthMenu": [[10, 25, 50,100,500, -1], [10, 25, 50,100,500, "All"]],
        ajax:{"url": '{!! route('salewisesreports') !!}',

'data':function ( d ) {
                        d.fromdate=$("#fromdate").val();
                        d.todate=$("#todate").val();
                        d.signstatus=$("#signstatus").val();
                    }},

         columns: [
                // { data: null, orderable: false, "defaultContent":''},
                { data: 'invoiceno', name: 'invoiceno' },
                { data: 'invoicedate', name: 'invoicedate' },
                 {data: 'igstamount', name: 'igstamount' },
                { data: 'taxableamounts', name: 'taxableamounts' },
                { data: 'sales_total', name: 'sales_total' },
                { data: 'created_at', name: 'created_at' },
                // { data: 'actions', name: 'actions', orderable: false, searchable: false}

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
                        $('#customerwiseReport_table').DataTable().draw(false);
                    }
                );
            }

        });
});

$("#fromdate").datepicker({format: 'dd/mm/yyyy'});
$("#todate").datepicker({format: 'dd/mm/yyyy'});

$("#fromdate,#todate,#signstatus").on('change',function(){
    reg_table.draw();
});

</script>
@endpush
