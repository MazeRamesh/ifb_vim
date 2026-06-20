@extends('layouts.app')
@section('content')
@section('digitalsign','menu-open')
@push('css')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
  section {
    padding: 60px 0;

}
@media only screen
and (min-device-height : 320px)
and (max-device-height : 600px) {
.graph-card{
  height: 600px;
}
}
section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#tabs{
  background: #007b5e;
    color: #eee;
}
#tabs h6.section-title{
    color: #eee;
}
tr:nth-child(even) {
  background-color: #E0F3FF;
}
#tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: white;
    background-color: #3f45a3;
    border:2px solid #3f45a3;
    /* border-color: transparent transparent #C0C0C0; */
    letter-spacing: 1px;
    /* border-bottom: 4px solid !important; */
    font-size: 16px;
}
#tabs .nav-tabs .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #eee;
    font-size: 20px;
}
.demo2{
    background-color: white;
    color: #3a32e1;
    font-size: 15px;
    border: 2px solid #3a32e1;

}
#tabs .nav-tabs .nav-link {
    border: 1px solid blue;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #eee;
    font-size: 20px;
}
</style>
@endpush
<div class="content-wrapper">
<div id="layoutSidenav_content">
<div class="container-fluid pt-3">
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 nopadding  print-shape">
<div class="card-header toll-free">
<span class="toll-free"> Digital Sign </span>
</div>
</div>
<div class="card card-primary card-outline mb-4 mt-2">
<div class="card-body" ng-controller="PrintpageController">

<nav style="width: 100%;background-color: #2832AB;">
    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active demo2" id="nav-UnSingned-tab" style="border: 2px solid #2832AB ;" data-toggle="tab" href="#nav-UnSingned" role="tab" aria-controls="nav-UnSingned" ng-click="unsigned()" aria-selected="true">UnSigned Invoices</a>
        <a class="nav-item nav-link demo2" id="nav-ReadyForSigned-tab" ng-click="readyforsigned()" style="border: 2px solid #2832AB;border-left:0px" data-toggle="tab" href="#nav-ReadyForSigned" role="tab" aria-controls="nav-ReadyForSigned" aria-selected="false">Invoices Ready for Signature</a>
        <a class="nav-item nav-link demo2" id="nav-Signed-tab" ng-click="signed()" style="border: 2px solid #2832AB;border-left:0px" data-toggle="tab" href="#nav-Signed" role="tab" aria-controls="nav-Signed" aria-selected="false">Signed Invoices</a>
    </div>
</nav>

<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

<!-- Unsigned Tab -->

    <div  class="tab-pane fade show active" id="nav-UnSingned" role="tabpanel" aria-labelledby="nav-UnSingned-tab">
        <form role="form" action="{{ route('digitalsign.pdf') }}" method="POST" id="unsigned_form" autocomplete="off">
        {!! csrf_field() !!}
        <div class="col-md-12 border p-3" id="unsigned_div">
        <div class="row vim">
        <div class="col-md-3">
            <div class="form-group clearfix{{ $errors->has('fromdate') ? 'has-error' : '' }}">
            <label class="lab">From Date<b class="imp">*</b></label>
            <input id="fromdate" class="form-control" name="fromdate" style="border: 0px;border-bottom: 2px solid blue;" placeholder="From date" autocomplete="off" onchange="changedate()">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group clearfix{{ $errors->has('todate') ? 'has-error' : '' }}">
            <label class="lab">To Date<b class="imp">*</b></label>
            <input id="todate" class="form-control" name="todate" style="border: 0px;border-bottom: 2px solid blue;" placeholder="To date" autocomplete="off" onchange="changedate()">
            </div>
        </div>
        <div class="col-md-3" style="padding-top: 30px;">
            <button type="button" class=" btn btn-success btn-sm pl-4 pr-4" id="signbutton" style="font-weight: bold;">Click here to Sign</button>
            <input name="invoicenumber_ids" id="invoicenumber_ids" style="display: none;" />
        </div>
        </div>
        </div>
        </form>
        <div class="table-responsive mt-4">
            <table id="unsigned_table" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th></th>
                        <th>Inv.No</th>
                        <th>Inv. Date</th>
                        <th>CGST Amt.</th>
                        <th>SGST Amt.</th>
                        <th>Net Amt.</th>
                        <th>Invoice Amt.</th>
                        <th>Created At</th>
                        <th>View</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

<!-- Ready for signed Tab -->

    <div  class="tab-pane fade" id="nav-ReadyForSigned" role="tabpanel" aria-labelledby="nav-ReadyForSigned-tab">
        <div class="table-responsive mt-4">
            <table id="readyforsigned_table" class="table table-bordered " width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Inv.No</th>
                        <th>Inv. Date</th>
                        <th>CGST Amt.</th>
                        <th>SGST Amt.</th>
                        <th>Net Amt.</th>
                        <th>Invoice Amt.</th>
                        <th>Created At</th>
                        <th>View</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

<!-- Signed Tab -->

    <div  class="tab-pane fade" id="nav-Signed" role="tabpanel" aria-labelledby="nav-Signed-tab">
        <div class="table-responsive mt-4">
            <table id="signed_table" class="table table-bordered table-striped" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th></th>
                        <th>Inv.No</th>
                        <th>Inv. Date</th>
                        <th>Tax Amt.</th>
                        <th>Net Amt.</th>
                        <th>Invoice Amt.</th>
                        <th>Ewaybill No</th>
                        <th>PDF Status</th>
                        <th>View</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<!-- <form role="form" action="{{ route('sign.pdf') }}" method="POST" id="unsigned_form" autocomplete="off">
    {!! csrf_field() !!}
    <div class="col-md-12 border p-3" id="unsigned_div">
    <div class="row vim">
        <div class="col-md-3">
            <div class="form-group clearfix{{ $errors->has('fromdate') ? 'has-error' : '' }}">
            <label class="lab">From Date<b class="imp">*</b></label>
            <input id="fromdate" class="form-control" name="fromdate" style="border: 0px;border-bottom: 2px solid blue;" placeholder="From date" autocomplete="off">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group clearfix{{ $errors->has('todate') ? 'has-error' : '' }}">
            <label class="lab">To Date<b class="imp">*</b></label>
            <input id="todate" class="form-control" name="todate" style="border: 0px;border-bottom: 2px solid blue;" placeholder="To date" autocomplete="off">
            </div>
        </div>
        <div class="col-md-3" style="padding-top: 30px;">
            <button type="button" class=" btn btn-success btn-sm pl-4 pr-4" id="sign" disabled style="font-weight: bold;">Click here to Sign</button>
            <input name="invoicenumbers" id="invoicenumbers" style="display: none;" />
        </div>
    </div>
    </div>
</form> -->



    <form role="form" action="{{ route('print.sign.pdf') }}" method="POST" id="myForm" autocomplete="off">
                        {!! csrf_field() !!}
                                <div class="col-md-12 border p-3" id="full" style="display: none;">
                                    <div class="row vim">
                                        <div class="col-md-3">


                            <div class="form-group clearfix{{ $errors->has('fromdate') ? 'has-error' : '' }}">
    <label class="lab">From Date<b class="imp">*</b></label>
                                        <input id="fromdate" style="border: 0px;border-bottom: 2px solid blue;" class="from" name="fromdate"  placeholder="From date"/ autocomplete="off" ng-model="fromdate">
                                    </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group clearfix{{ $errors->has('fromdate') ? 'has-error' : '' }}">
    <label class="lab">To Date<b class="imp">*</b></label>
                                            <input id="todate" class="to" style="border: 0px;border-bottom: 2px solid blue;"  name="todate" placeholder="To date" autocomplete="off" ng-change="changedate()" ng-model="todate"/>
                                        </div>
                                    </div>

                                        <!-- <div class="col-md-6 mt-2 code">
                                            <p><span class="secondary p-2">Invoice To</span><span class="secondary1 p-2 pr-5" id="invoicetohtml"></span><span class="secondary p-2 pr-5">Cust.Code</span><span class="secondary1 p-2 pr-5" id="custcode"></span></p>
                                            <input name="invoiceto" id="invoiceto" style="display: none;" />

                                        </div> -->
                                        <input name="invoicenumber" id="invoicenumber" style="display: none;" />
                                    </div>
                                        <div class="row mt-2 vim1" style="padding-bottom: 15px;">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
             <ui-select ng-model="$parent.invnum" theme="select2" style="min-width: 250px;" title="Choose a person" append-to-body="true" id="invnum" name="invoicenumber" ng-change="checkinvoiceto1()"  required>
              <ui-select-match allow-clear="true" placeholder="Select a Invoice Number...">@{{$select.selected.invoiceno}}</ui-select-match>
              <ui-select-choices repeat="invoice in invoices | propsFilter: {invoiceno: $select.search}">
                   <div ng-bind-html="invoice.invoiceno"></div>
              </ui-select-choices>
             </ui-select>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="col-md-5 mt-1">

                                        </div>
                                        <div class="col-md-4">
                                            <div class=" row button">
                                            <button type="submit" class=" btn btn-success btn-sm pl-4 pr-4" id="print" disabled>Print</button>
                                            <!-- <button type="button" id="download" class=" btn btn-danger btn-sm ml-2" disabled>Download</button> -->
                                            <button type="button" class="btn btn-info text-white btn-sm ml-2 pl-4 pr-4" onclick="Reset()" ng-click="clear($event, $select)">Reset</button>
                                            <button type="button" class="btn btn-warning text-white btn-sm ml-2 pl-4 pr-4" onclick="Refresh()">Refresh</button>

                                        </div>
                                        </div>

                                        </div>



                                        </div>
                                        </form>


                                        
 <!-- <form role="form" action="{{ route('readytosign.pdf') }}" method="POST" id="readyforsignform" autocomplete="off" style="padding-bottom: 10px;">
                                        {!! csrf_field() !!}


                                        <div id="single">
                                            <button type="button" class=" btn btn-success btn-sm pl-4 pr-4" id="readytosign" disabled>Click here to Sign</button>
                                             <input name="invoices" id="invoices" style="display: none;" />
                                        </div>


                                        </form> -->
                                        <div class="col-md-12 border p-3" id="dropedsign" style="display: none;">
                                    <div class="row vim">
                                        <div class="col-md-4" style="padding-bottom: 15px;" id="single">
                                            <div class=" row button">
                                            <button type="button" class=" btn btn-success btn-sm pl-4 pr-4" id="signoropen">Click here to Open Signor Tool</button>
                                             <input name="invoices" id="invoices" style="display: none;" />
                                           
                                        </div>
                                        </div>
                                    </div>
                                </div>




    
    





                            </div>
                    </div>
                    </div>

            </div>
</div>
@endsection
@push('scripts')
<!-- DataTables -->
<script>

function changedate() 
{
    $('#unsigned_table').DataTable().draw();
}

var unsigned_table;
var signed_table;

var FROM_FLATPICKER=$("#fromdate").flatpickr({
    dateFormat:"d-m-Y",
    defaultDate :"today",
});

var TO_FLATPICKER=$("#todate").flatpickr({
    dateFormat:"d-m-Y",
    defaultDate :"today",
});

$(function()
{
    unsigned_table.on("click", "th.select-checkbox", function() 
    {
    if($("th.select-checkbox").hasClass("selected")) 
    {
        unsigned_table.rows().deselect();
        $("th.select-checkbox").removeClass("selected");
    } 
    else 
    {
        unsigned_table.rows().select();
        $("th.select-checkbox").addClass("selected");
    }
    }).on("select deselect", function() 
    {
        ("Some selection or deselection going on")
        if(unsigned_table.rows({selected: true}).count() !== unsigned_table.rows().count()) 
        {
            $("th.select-checkbox").removeClass("selected");
        } 
        else 
        {
            $("th.select-checkbox").addClass("selected");
        }
        if(unsigned_table.rows({selected: true}).count() !== 0) 
        {
        } 
        else 
        {
        }
    });
});

unsigned_table = $('#unsigned_table').DataTable({
    processing: true,
    serverSide: true,
     ajax: {
            "url": '{!! route('get.digitalsignor.data') !!}',
            'data': function(d) {
                d.fromdate = $("#fromdate").val();
                d.todate = $("#todate").val();
            }
    },
    // ajax: '{!! route('get.digitalsignor.data') !!}',
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
    "lengthMenu": [[10],[10]],
     columns: [
        { data: null, orderable: false, "defaultContent":''},
        { data: 'invoiceno', name: 'invoiceno' },
        { data: 'invoicedate', name: 'invoicedate' },
        { data: 'cgstamount', name: 'cgstamount' },
        { data: 'sgstamount', name: 'sgstamount' },
        { data: 'taxableamounts', name: 'taxableamounts' },
        { data: 'grandtotalamount', name: 'grandtotalamount' },
        { data: 'created_at', name: 'created_at' },
        { data: 'actions', name: 'actions', orderable: false, searchable: false}
        ]
     }).on('click', '.btn-delete[data-remote]', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        var url = $(this).data('remote');
        if (confirm('Are you sure you want to delete this area?')) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {method: '_DELETE', submit: true}
                }).always(function (data) {
                    // console.log("1212");
                        $('#unsigned_table').DataTable().draw(false);
                    }
                );
            }
});

signed_table = $('#signed_table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{!! route('get.digitalsigned.data') !!}',
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
        { data: 'totaltaxamount', name: 'totaltaxamount' },
        { data: 'taxableamounts', name: 'taxableamounts' },
        { data: 'grandtotalamount', name: 'grandtotalamount' },
        { data: 'ewaybillno', name: 'ewaybillno' },
        { data: 'pdfstatus', name: 'pdfstatus' },
        { data: 'actions', name: 'actions', orderable: false, searchable: false}
        ]
     });

$('#signbutton').click(function()
{
  var dataTableRows = unsigned_table.rows({selected: true}).data().toArray().map(a=>a.id);
  $('#invoicenumber_ids').val(dataTableRows);
  window.open('mazesign://1')
  $('#unsigned_form').submit();
})
























//     var today   = new Date();
//     var date = today.getMonth()+1+'/'+(today.getDate())+'/'+today.getFullYear();
//     $(".from").val(date);
//     $(".to").val(date);
// $("#datepicker1").trigger('change');
// function Refresh() {
//        $('#unsigned_table').DataTable().draw();
//        $('#readyforsigned_table').DataTable().draw();
//        $('#signed_table').DataTable().draw();
//        $("#datepicker1").trigger('change');
//         }

// $(function()
// {

//      readyforsignedtable.on("click", "th.select-checkbox", function() {
//     if ($("th.select-checkbox").hasClass("selected")) {
//         readyforsignedtable.rows().deselect();
//         $("th.select-checkbox").removeClass("selected");
//         $("#sign").attr("disabled", true);
//     } else {
//         readyforsignedtable.rows().select();
//         $("th.select-checkbox").addClass("selected");
//         // var dataTableRows = table.rows({selected: true}).data().toArray();
//         // console.log(dataTableRows);
//         $("#sign").attr("disabled", false);

//     }
// }).on("select deselect", function() {
//      console.log("123");

//     ("Some selection or deselection going on")
//     if (readyforsignedtable.rows({
//             selected: true
//         }).count() !== readyforsignedtable.rows().count()) {
//         console.log()
//         $("th.select-checkbox").removeClass("selected");
//          $("#sign").attr("disabled", false);
//     } else {
//         $("th.select-checkbox").addClass("selected");
//         $("#sign").attr("disabled", true);
//     }

//     if (readyforsignedtable.rows({
//             selected: true
//         }).count() !== 0) {
//         $("#sign").attr("disabled", false);
//     } else {

//         $("#sign").attr("disabled", true);
//     }

// });
// });

// $(function()
// {

//      table.on("click", "th.select-checkbox", function() {
//         console.log(table);
//     if ($("th.select-checkbox").hasClass("selected")) {
//         table.rows().deselect();
//         $("th.select-checkbox").removeClass("selected");
//         $("#readytosign").attr("disabled", true);
//     } else {
//         table.rows().select();
//         $("th.select-checkbox").addClass("selected");
//         // var dataTableRows = table.rows({selected: true}).data().toArray();
//         // console.log(dataTableRows);
//         $("#readytosign").attr("disabled", false);

//     }
// }).on("select deselect", function() {
//      console.log("123");

//     ("Some selection or deselection going on")
//     if (table.rows({
//             selected: true
//         }).count() !== table.rows().count()) {
//         console.log()
//         $("th.select-checkbox").removeClass("selected");
//          $("#readytosign").attr("disabled", false);
//     } else {
//         $("th.select-checkbox").addClass("selected");
//         $("#readytosign").attr("disabled", true);
//     }

//     if (table.rows({
//             selected: true
//         }).count() !== 0) {
//         $("#readytosign").attr("disabled", false);
//     } else {

//         $("#readytosign").attr("disabled", true);
//     }

// });
// });


// function Reset() {

//        $(".select2-search-choice-close").trigger('click');
//        $("#datepicker").val('').trigger('change');
//        $("#datepicker1").val('').trigger('change');
//        // $("#invoicetohtml").html('').trigger('change');
//        // $("#invoiceto").val('').trigger('change');
//        $("#invoicenumber1").val('').trigger('change');
//        // $("#custcode").html('').trigger('change');
//        // $("#invnum").val('').trigger('change');
//        $('#check').prop("checked", false);
//        $('#check1').prop("checked", false);
//        $('#check2').prop("checked", false);
//        $('#check3').prop("checked", false);
//        $('#check4').prop("checked", false);
//         }

// $('.testone').click(function(){
//         var val = $(this).prop('checked');
//         // var all = $('#check').prop('checked');
//         console.log(val);
//         if(val)
//         {
//             console.log("sdf")
//             $('.test').prop("checked", true);
//         }
//         else
//         {
//             $('.test').prop("checked", false);
//         }
//      })

//      $('.test').click(function()
//      {
//         var val = $(this).prop('checked');
//         var all = $('#check').prop('checked');
//         if((!val) && all)
//         {
//             console.log("sdf")
//             $('#check').prop("checked", false);
//         }
//      })

// $(function()
// {

//      signed_table.on("click", "th.select-checkbox", function() {
//     if ($("th.select-checkbox").hasClass("selected")) {
//         signed_table.rows().deselect();
//         $("th.select-checkbox").removeClass("selected");
//         $("#download").attr("disabled", true);
//     } else {
//         signed_table.rows().select();
//         $("th.select-checkbox").addClass("selected");
//         // var dataTableRows = signed_table.rows({selected: true}).data().toArray();
//         // console.log(dataTableRows);
//         $("#download").attr("disabled", false);

//     }
// }).on("select deselect", function() {
//      console.log("123");

//     ("Some selection or deselection going on")
//     if (signed_table.rows({
//             selected: true
//         }).count() !== signed_table.rows().count()) {
//         console.log()
//         $("th.select-checkbox").removeClass("selected");
//          $("#download").attr("disabled", false);
//     } else {
//         $("th.select-checkbox").addClass("selected");
//         $("#download").attr("disabled", true);
//     }

//     if (signed_table.rows({
//             selected: true
//         }).count() !== 0) {
//         $("#download").attr("disabled", false);
//     } else {

//         $("#download").attr("disabled", true);
//     }

// });
// });

// $('#signoropen').click(function()
// {
//   window.open('mazesign://1')  
// })

// $('#sign').click(function()
// {
//   var dataTableRows = readyforsignedtable.rows({selected: true}).data().toArray().map(a=>a.invoiceno);
//   //console.log(dataTableRows);
//   $('#invoicenumbers').val(dataTableRows);
//   console.log($('#invoicenumbers').val(dataTableRows));
//   $('#signform').submit();
// })

// $('#readytosign').click(function()
// {
//   var dataTableRows = table.rows({selected: true}).data().toArray().map(a=>a.invoiceno);
//   console.log(dataTableRows);
//   $('#invoices').val(dataTableRows);
//   console.log($('#invoices').val(dataTableRows));
//   window.open('mazesign://1')
//   $('#readyforsignform').submit();


// })









































// $("#fromdate").datepicker({format: 'dd/mm/yyyy'});
// $("#todate").datepicker({format: 'dd/mm/yyyy'});

// app.controller('PrintpageController',function($scope,$http,$filter){
//     $scope.fromdate=date;
//     $scope.todate=date;
//     $scope.from=date;
//     $scope.to=date;
//     $scope.invoices1=[];
//     $scope.invnum;
//     $scope.InvoiceNO;

// $scope.changedate=function()
//     {
//       $http.get("{{route('getinvoicenumsigned')}}?from="+$scope.fromdate+"&to="+$scope.todate).then(val=>{
//         response=val.data;
//         $scope.invoices=response;
//       });
//     }
// $scope.changedate();

// $scope.changedateunsigned=function()
//     {
//       $http.get("{{route('getinvoicenum')}}?from="+$scope.from+"&to="+$scope.to).then(val=>{
//         response=val.data;
//         $scope.invoices1=response;
//       });
//       // var selectedRows = table.rows({ selected: true }).ids(true);
//       //        console.log(selectedRows);
//     }
// $scope.changedateunsigned();

// // table = $('#unsigned_table').DataTable({
// //         processing: true,
// //         serverSide: true,
// //         ajax: '{!! route('get.digitalsignor.data') !!}',
// //         columnDefs: [{
// //             orderable: false,
// //             className: 'select-checkbox',
// //             targets: 0
// //         }],
// //         select: {
// //             style: 'multi',
// //             selector: 'td:first-child'
// //         },
// //         order: [
// //             [1, 'asc']
// //         ],
// //          columns: [
// //                 { data: null, orderable: false, "defaultContent":''},
// //                 { data: 'invoiceno', name: 'invoiceno' },
// //                 { data: 'invoicedate', name: 'invoicedate' },
// //                 { data: 'cgstamount', name: 'cgstamount' },
// //                 {data: 'sgstamount', name: 'sgstamount' },
// //                 { data: 'taxableamounts', name: 'taxableamounts' },
// //                 { data: 'sales_total', name: 'sales_total' },
// //                 { data: 'created_at', name: 'created_at' },
// //                 { data: 'actions', name: 'actions', orderable: false, searchable: false}

// //             ]
// //      }).on('click', '.btn-delete[data-remote]', function (e) {
// //             e.preventDefault();
// //             $.ajaxSetup({
// //                 headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
// //             });
// //             var url = $(this).data('remote');
// //             if (confirm('Are you sure you want to delete this area?')) {
// //                 $.ajax({
// //                     url: url,
// //                     type: 'DELETE',
// //                     data: {method: '_DELETE', submit: true}
// //                 }).always(function (data) {
// //                     console.log("1212");
// //                         $('#unsigned_table').DataTable().draw(false);
// //                     }
// //                 );
// //             }

// //         });

//     //  setInterval( function () {
//     //     $('#unsigned_table').DataTable().draw();
//     //     $('#readyforsigned_table').DataTable().draw();
//     //     $('#signed_table').DataTable().draw();
//     // }, 5000 );
// readyforsignedtable = $('#readyforsigned_table').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: '{!! route('get.readyforsignor.data') !!}',
//         // columnDefs: [{
//         //     orderable: false,
//         //     className: 'select-checkbox',
//         //     targets: 0
//         // }],
//         // select: {
//         //     style: 'multi',
//         //     selector: 'td:first-child'
//         // },
//         // order: [
//         //     [1, 'asc']
//         // ],
//          columns: [
//                 // { data: null, orderable: false, "defaultContent":''},
//                 { data: 'invoiceno', name: 'invoiceno' },
//                 { data: 'invoicedate', name: 'invoicedate' },
//                 { data: 'cgstamount', name: 'cgstamount' },
//                 {data: 'sgstamount', name: 'sgstamount' },
//                 { data: 'taxableamounts', name: 'taxableamounts' },
//                 { data: 'sales_total', name: 'sales_total' },
//                 { data: 'created_at', name: 'created_at' },
//                 { data: 'actions', name: 'actions', orderable: false, searchable: false}

//             ]
//      }).on('click', '.btn-delete[data-remote]', function (e) {
//             e.preventDefault();
//             $.ajaxSetup({
//                 headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
//             });
//             var url = $(this).data('remote');
//             if (confirm('Are you sure you want to delete this area?')) {
//                 $.ajax({
//                     url: url,
//                     type: 'DELETE',
//                     data: {method: '_DELETE', submit: true}
//                 }).always(function (data) {
//                     console.log("1212");
//                         $('#readyforsigned_table').DataTable().draw(false);
//                     }
//                 );
//             }

//         });

// signed_table = $('#signed_table').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: '{!! route('get.signed.data') !!}',
//         // columnDefs: [{
//         //     orderable: false,
//         //     className: 'select-checkbox',
//         //     targets: 0
//         // }],
//         // select: {
//         //     style: 'multi',
//         //     selector: 'td:first-child'
//         // },
//         // order: [
//         //     [1, 'asc']
//         // ],
//          columns: [
//                 // { data: null, orderable: false, "defaultContent":''},
//                 { data: 'invoiceno', name: 'invoiceno' },
//                 { data: 'invoicedate', name: 'invoicedate' },
//                 { data: 'cgstamount', name: 'cgstamount' },
//                 {data: 'sgstamount', name: 'sgstamount' },
//                 { data: 'taxableamounts', name: 'taxableamounts' },
//                 { data: 'sales_total', name: 'sales_total' },
//                 { data: 'created_at', name: 'created_at' },
//                 { data: 'pdfstatus', name: 'pdfstatus' },
//                 { data: 'actions', name: 'actions', orderable: false, searchable: false}

//             ]
//      }).on('click', '.btn-delete[data-remote]', function (e) {
//             e.preventDefault();
//             $.ajaxSetup({
//                 headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
//             });
//             var url = $(this).data('remote');
//             // confirm then
//             if (confirm('Are you sure you want to delete this area?')) {
//                 $.ajax({
//                     url: url,
//                     type: 'DELETE',
//                     data: {method: '_DELETE', submit: true}
//                 }).always(function (data) {
//                     console.log("1212");
//                         $('#signed_table').DataTable().draw(false);
//                     }
//                 );
//             }

//         });

// $scope.signed=function()
// {
//    $("#full").show();
//    $("#single").hide();
//    $("#signform").hide();
//    $("#single1").hide();
//    $("#dropedsign").hide();
// }
// $scope.unsigned=function()
// {
//    $("#full").hide();
//    $("#unsigned_div").show();
//    $("#signform").hide();
//    // $("#single1").show();
//    $("#dropedsign").hide();
// }
// $scope.readyforsigned=function()
// {
//    $("#full").hide();
//    $("#single").hide();
//    $("#signform").hide();
//    $("#single1").hide();
//    $("#dropedsign").show();

// }
// $scope.checkinvoiceto1=function()
//     {

//         $("#print").attr("disabled", false);
//         console.log($scope.InvoiceNO);
//         $("#invoicenumber").val($scope.invnum.invoiceno);
//         // $("#download").attr("disabled", false);
//        // console.log($scope.invnum);
//        //    $.post("{{route('checkinvoiceto')}}",
//        //                  {
//        //                      invoiceno: $scope.invnum.invoiceno,
//        //                      _token: '{{csrf_token()}}'
//        //                  },
//        //                  function(data)
//        //                  {
//        //                      console.log(data);
//        //                    $("#invoicenumber").val($scope.invnum.invoiceno);
//        //                    $("#invoicetohtml").html(data.customer.customername);
//        //                    $("#custcode").html(data.invoiceto);
//        //                    $("#invoiceto").val(data.invoiceto);
//        //                  }
//        //          );

//     }

// $scope.checkinvoiceto=function()
//     {

//         $("#print1").attr("disabled", false);
//         console.log($scope.InvoiceNO);
//         $("#invoicenumber1").val($scope.InvoiceNO.invoiceno);
//         // $("#download").attr("disabled", false);
//        // console.log($scope.invnum);
//        //    $.post("{{route('checkinvoiceto')}}",
//        //                  {
//        //                      invoiceno: $scope.invnum.invoiceno,
//        //                      _token: '{{csrf_token()}}'
//        //                  },
//        //                  function(data)
//        //                  {
//        //                      console.log(data);
//        //                    $("#invoicenumber").val($scope.invnum.invoiceno);
//        //                    $("#invoicetohtml").html(data.customer.customername);
//        //                    $("#custcode").html(data.invoiceto);
//        //                    $("#invoiceto").val(data.invoiceto);
//        //                  }
//        //          );

//     }

// });
</script>
@endpush
