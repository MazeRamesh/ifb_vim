@extends('layouts.app')
@section('content')
@section('autoasn','menu-open')
@push('css')
<style>
  td{
    text-align: center;
  }
  th{
    text-align: center;
  }

</style>
@endpush
<div class="content-wrapper">
      @if(Session::has('success_message'))
        <div class="alert alert-success">
            
            {!! session('success_message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
       </div>
  @endif
  @if ($errors->any())
                <ul class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}<button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button></li>
                  @endforeach
                </ul>
              @endif

<div id="layoutSidenav_content">
<div class="container-fluid pt-3">
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 nopadding  print-shape">
<div class="card-header toll-free">
    <span class="toll-free">Auto ASN</span>
</div>
</div>
    <div class="card card-primary card-outline mb-4 mt-2">
        <div class="card-body" ng-controller="PrintpageController">
            <form role="form" action="{{ route('hmil.postdata') }}" method="POST" id="myForm" autocomplete="off">
            {!! csrf_field() !!}
            <div class="col-md-12 border p-3">
            <div class="row vim">
                <div class="col-md-3">
                    <label class="lab">From Date</label>
                    <input id="fromdate" class="from form-control" name="fromdate"  placeholder="From date"/ autocomplete="off" ng-model="fromdate" readonly>
                </div>
                <div class="col-md-3">
                    <label class="lab">To Date</label>
                    <input id="todate" class="to form-control" name="todate" placeholder="To date" autocomplete="off" ng-change="changedate()" ng-model="todate" readonly>
                </div>
                <div class="col-md-3">
                     <div class="form-group">
                    <label class="lab">Invoice Numbers</label>
                    <div class="input-group mb-3">
                    <ui-select ng-model="$parent.invnum" theme="select2" style="min-width: 250px;" title="Choose a person" append-to-body="true" id="invnum" name="invoicenumber" ng-change="checkinvoiceto();"  required>
                    <ui-select-match allow-clear="true" placeholder="Select a Invoice Number...">@{{$select.selected.invoiceno}}</ui-select-match>
                    <ui-select-choices repeat="invoice in invoices | propsFilter: {invoiceno: $select.search}">
                    <div ng-bind-html="invoice.invoiceno"></div>
                    </ui-select-choices>
                    </ui-select>
                    </div>
                </div>
                </div>
                <div class="col-md-3">
                    <div class=" row button" style="padding-top: 25px;">
                    <button type="submit" class="btn btn-success btn-sm pl-4 pr-4" id="print" disabled style="height:30px;color: white;font-weight: bold;">POST</button>
                    <button type="button" class="btn btn-info btn-sm ml-2 pl-4 pr-4" onclick="Reset()" ng-click="clear($event, $select)" style="height:30px;color: black;font-weight: bold;">Reset</button>
                    </div>
                </div>
                <div class="col-md-6 mt-2 code">
                    <input name="invoiceto" id="invoiceto" style="display: none;" />
                    <input name="invoicenumber" id="invoicenumber" style="display: none;" />
                </div>
            </div>
            <!--<div class="row mt-2 vim1">
                <div class="col-md-3">
                 <div class="form-group">
                    <label class="lab">Invoice Numbers</label>
                    <div class="input-group mb-3">
                    <ui-select ng-model="$parent.invnum" theme="select2" style="min-width: 250px;" title="Choose a person" append-to-body="true" id="invnum" name="invoicenumber" ng-change="checkinvoiceto();"  required>
                    <ui-select-match allow-clear="true" placeholder="Select a Invoice Number...">@{{$select.selected.invoiceno}}</ui-select-match>
                    <ui-select-choices repeat="invoice in invoices | propsFilter: {invoiceno: $select.search}">
                    <div ng-bind-html="invoice.invoiceno"></div>
                    </ui-select-choices>
                    </ui-select>
                    </div>
                </div> 
                </div>
                <div class="col-md-4">
                    <div class=" row button" style="padding-top: 15px;">
                    <button type="submit" class=" btn btn-success btn-sm pl-4 pr-4" id="print" disabled>POST    </button>
                    <button type="button" class="btn btn-info text-white btn-sm ml-2 pl-4 pr-4" onclick="Reset()" ng-click="clear($event, $select)">Reset</button>
                    </div>
                </div>
            </div>-->
    </div>
</form>
                                     
<table id="hmil_post_table" class="table table-bordered table-striped" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Inv.No</th>
            <th>Inv. Date</th>
            <th>Tax Amt.</th>
            <th>Net Amt.</th>
            <th>Invoice Amt.</th>
            <th>Status</th>
            <th>Error</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
                        
</div>
</div>
</div>
</div>
</div>
@endsection
@push('scripts')
<!-- DataTables -->

<script>
var FROM_DATE=$("#fromdate").flatpickr({
    dateFormat:"d-m-Y",
    // altFormat:"Y-m-d",
    defaultDate:'today'
});
var TO_DATE=$("#todate").flatpickr({
    dateFormat:"d-m-Y",
    altFormat:"Y-m-d",
    defaultDate:'today'
});
// var fromdate = "dd/mm/yyyy";
    var today   = new Date();
    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
    // $(".from").val(date);
    // $(".to").val(date);

    $(function() {

     table.on("click", "th.select-checkbox", function() {
    if ($("th.select-checkbox").hasClass("selected")) {
        table.rows().deselect();
        $("th.select-checkbox").removeClass("selected");
        $("#download").attr("disabled", true);
    } else {
        table.rows().select();
        $("th.select-checkbox").addClass("selected");
        var dataTableRows = table.rows({selected: true}).data().toArray();
        console.log(dataTableRows);
        $("#download").attr("disabled", false);

    }
}).on("select deselect", function() {
     console.log("123");
    
    ("Some selection or deselection going on")
    if (table.rows({
            selected: true
        }).count() !== table.rows().count()) {
        console.log()
        $("th.select-checkbox").removeClass("selected");
         $("#download").attr("disabled", false);
    } else {
        $("th.select-checkbox").addClass("selected");
        $("#download").attr("disabled", true);
    }

    if (table.rows({
            selected: true
        }).count() !== 0) {
        $("#download").attr("disabled", false);
    } else {
        
        $("#download").attr("disabled", true);
    }

});
});

$('#download').click(function(){
        var dataTableRows = table.rows({selected: true}).data().toArray().map(a=>a.invoiceno);

        console.log(dataTableRows);
        $('#invoicenumber').val(dataTableRows);
        $('#myForm').submit();
     })
 
$('.testone').click(function(){
        var val = $(this).prop('checked');
        // var all = $('#check').prop('checked');
        console.log(val);
        if(val)
        {
            console.log("sdf")
            $('.test').prop("checked", true);
        }
        else
        {
            $('.test').prop("checked", false);
        }
     })

     $('.test').click(function()
     {
        var val = $(this).prop('checked');
        var all = $('#check').prop('checked');
        if((!val) && all)
        {
            console.log("sdf")
            $('#check').prop("checked", false);
        }
     })

function exportexcel()
{
   var data = table.rows().data().map(r=>{
    return r.id;
   });
   data=data.join(',');
   console.log(data);
   $('#data').val(data);
   $('#excelexportform').submit();
 
}



     function Reset() {
       
       $(".select2-search-choice-close").trigger('click');
       $("#datepicker").val('').trigger('change');
       $("#datepicker1").val('').trigger('change');
       $("#invoicetohtml").html('').trigger('change');
       $("#invoiceto").val('').trigger('change');
       $("#invoicenumber").val('').trigger('change');
       $("#custcode").html('').trigger('change');
       // $("#invnum").val('').trigger('change');
       $('#check').prop("checked", false);
       $('#check1').prop("checked", false);
       $('#check2').prop("checked", false);
       $('#check3').prop("checked", false);
       $('#check4').prop("checked", false);
        }
         function getdata() {
       
       exec("cmd /c D:\\JKfenner\\get_sap_invoices\\get_sap_invoices\\get_sap_invoices_run.bat");
        }
 $("#datepicker1").trigger('change');

app.controller('PrintpageController',function($scope,$http,$filter){
    $scope.fromdate=date;
    $scope.todate=date;
    $scope.invoices=[];
    // $scope.invnum=[];
    $scope.invnum;
    
// 
         table = $('#hmil_post_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('get.hmilpostdata.data') !!}',
       
        order: [
            [1, 'asc']
        ],
         columns: [                 
                { data: 'invoiceno', name: 'invoiceno' },
                { data: 'invoicedate', name: 'invoicedate' },
                { data: 'totaltaxamount', name: 'totaltaxamount' },
                { data: 'taxableamounts', name: 'taxableamounts' },
                { data: 'grandtotalamount', name: 'grandtotalamount' },
                { data: 'hmil_status', name: 'hmil_status' },
                { data: 'hmil_status_msg', name: 'hmil_status_msg' },
                { data: 'actions', name: 'actions' }                
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
                    // console.log("1212");
                        $('#hmil_post_table').DataTable().draw(false);
                    }
                );
            }
             
        });

// var selectedRows = table.rows({ selected: true }).ids(true);
//              console.log(selectedRows);
$scope.changedate=function()
    {
      $http.get("{{route('getsignedinvoicenum')}}?from="+$scope.fromdate+"&to="+$scope.todate).then(val=>{
        response=val.data;
        $scope.invoices=response;    
      });
      
    }
$scope.changedate();
    $scope.checkinvoiceto=function()
    {

        $("#print").attr("disabled", false);
        $("#invoicenumber").val($scope.invnum.invoiceno);
        // $("#download").attr("disabled", false);
       console.log($scope.invnum);
          // $.post("{{route('checkinvoiceto')}}",
          //               {
          //                   invoiceno: $scope.invnum.invoiceno,
          //                   _token: '{{csrf_token()}}'
          //               },
          //               function(data)
          //               {
          //                   console.log(data);
          //                 $("#invoicenumber").val($scope.invnum.invoiceno);
          //                 $("#invoicetohtml").html(data.customer.customername);
          //               }
          //       );
        
    }

});
</script>
@endpush