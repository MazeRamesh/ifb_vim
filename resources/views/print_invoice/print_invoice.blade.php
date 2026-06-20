@extends('layouts.app')
@section('content')
@section('print','menu-open')
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
            <div id="layoutSidenav_content">

                    <div class="container-fluid pt-3">
                           <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 nopadding  print-shape">
                                <div class="card-header toll-free">
                                      <span class="toll-free"> Print Invoice </span>
                                       <!-- <div class="card-tools" style="float: right;">
               <a href="" class="btn btn-sm pl-3 pr-3 bg-success float-right clearfix" title="Create New Customer"  role="button">
                <span ><i class="fas fa-upload"></i> Import</span>
              </a>
                             </div> -->
          </div>
                                </div>


                            </div>
                            <!-- <div id="triangle-bottomleft">
                               
                            </div>  -->
                        <div class="card card-primary card-outline mb-4 mt-2">
                            
                            <div class="card-body" ng-controller="PrintpageController">
                                <form role="form" action="{{ route('print.printbarcode') }}" method="POST" id="myForm" autocomplete="off" target="_blank">
                        {!! csrf_field() !!}
                                <div class="col-md-12 border p-3">
                                    <div class="row vim">
                                        <!-- <div class="col-md-2">
                                           {{-- <input id="datepicker" name="fromdate" id="fromdate" placeholder="From date"/ autocomplete="off">
                                        </div>
                                        <div class="col-md-3">
                                            <input id="datepicker1" name="todate" id="todate" placeholder="To date" autocomplete="off" onchange="changedate()" />
                                        </div>--}}
                                        <input id="datepicker" class="from" name="fromdate"  placeholder="From date"/ autocomplete="off" ng-model="fromdate">
                                        </div> -->
                                         <div class="col-md-3"> 
<div class="form-group clearfix{{ $errors->has('fromdate') ? 'has-error' : '' }}">
    <label class="lab">From Date<b class="imp">*</b></label> 
    <input id="datepicker" class="from" name="fromdate"  placeholder="From date"/ autocomplete="off" ng-model="fromdate">
</div>
</div>
                                        <div class="col-md-3"> 
<div class="form-group clearfix{{ $errors->has('todate') ? 'has-error' : '' }}">
    <label class="lab">To Date<b class="imp">*</b></label> 
    <input id="datepicker1" class="to" name="todate" placeholder="To date" autocomplete="off" ng-change="changedate()" ng-model="todate"/>
</div>
</div> 
                                        
                                            <div class="col-md-6 mt-2 code">
                                            <input name="invoiceto" id="invoiceto" style="display: none;" />
                                             <input name="invoicenumber" id="invoicenumber" style="display: none;" />
                                        </div>
                                    </div>
                                        <div class="row mt-2 vim1">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                  <label class="lab">Invoice Number<b class="imp">*</b></label>
             <ui-select ng-model="$parent.invnum" theme="select2" style="min-width: 250px;" title="Choose a person" append-to-body="true" id="invnum" name="invoicenumber" ng-change="checkinvoiceto();"  required>
              <ui-select-match allow-clear="true" placeholder="Select a Invoice Number...">@{{$select.selected.invoiceno}}</ui-select-match>
              <ui-select-choices repeat="invoice in invoices | propsFilter: {invoiceno: $select.search}">
                   <div ng-bind-html="invoice.invoiceno"></div>
              </ui-select-choices>
             </ui-select>
                                              
                                                </div>
                                            </div>
                                        </div>
                                       <div class="col-md-5 mt-3">
                                            <div class="checkbox">
                                                <input type="checkbox" id="check" name="all" class="invoice testone" value="All" />
                                                <label for="check">
                                                <span></span>All Copies
                                                </label> 
                                                <span>
                                                        <input type="checkbox" id="check1" class="test invoice" name="original" value="Original" />
                                                        <label for="check1">
                                                        <span></span>Original
                                                        </label>
                                                </span> 
                                                <span>
                                                        <input type="checkbox" id="check2" class="test invoice" name="duplicate" value="Duplicate" />
                                                        <label for="check2">
                                                        <span></span>Duplicate
                                                        </label>
                                                </span>  
                                                <span>
                                                        <input type="checkbox" id="check3" class="test invoice" name="triplicate" value="Triplicate" />
                                                        <label for="check3">
                                                        <span></span>Triplicate
                                                        </label>
                                                </span>
                                                <span>
                                                        <input type="checkbox" id="check4" class="test invoice" name="extra" value="Extra" />
                                                        <label for="check4">
                                                        <span></span>Extra
                                                        </label>
                                                </span>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-4">
                                            <div class=" row button">
                                            <button type="submit" class=" btn btn-success btn-sm pl-4 pr-4" id="print" disabled>Print</button>
                                            <button type="button" id="download" class=" btn btn-danger btn-sm ml-2" disabled>Download</button>
                                            <button type="button" class="btn btn-info text-white btn-sm ml-2 pl-4 pr-4" onclick="Reset()" ng-click="clear($event, $select)">Reset</button>
                                            
                                    
                                        </div>
                                        </div>

                                        </div>

                                        
                                        
                                        </div>
                                        </form>
                                       
                                  <div class="table-responsive mt-4">
                                    <table id="print_table" class="table table-bordered table-striped" width="100%" cellspacing="0">
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
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                    </table>
                        
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

// var fromdate = "dd/mm/yyyy";
    var today   = new Date();
    var date = today.getMonth()+1+'/'+(today.getDate())+'/'+today.getFullYear();
    $(".from").val(date);
    $(".to").val(date);

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

// function changedate()
//     {
//         // console.log($("#fromdate"));
//           $.get("{{route('getinvoicenum')}}",
//                         {
//                             from: $("#datepicker").val(),
//                             to: $("#datepicker1").val(),
//                             _token: '{{csrf_token()}}'

//                         },
//                        function(data,status){
//                       if(status=="success")
//                       {
//                         $("#invnum").html('');
//                         $("#invnum").append("<option disabled selected>----select----</option>");
//                         $.each(data,function(i,item){
//                           $("#invnum").append("<option value='"+item.invoiceno+"'>"+item.invoiceno+"</option>");
//                         });
//                       }  
//                     }
//                 );
        
//     }


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
                { data: 'cgstamount', name: 'cgstamount' },
                 {data: 'sgstamount', name: 'sgstamount' },
                { data: 'taxableamounts', name: 'taxableamounts' },
                { data: 'sales_total', name: 'sales_total' },
                { data: 'created_at', name: 'created_at' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false}  
                
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

// var selectedRows = table.rows({ selected: true }).ids(true);
//              console.log(selectedRows);
$scope.changedate=function()
    {
      $http.get("{{route('getinvoicenum')}}?from="+$scope.fromdate+"&to="+$scope.todate).then(val=>{
        response=val.data;
        $scope.invoices=response;    
      });
      // var selectedRows = table.rows({ selected: true }).ids(true);
      //        console.log(selectedRows);
    }
$scope.changedate();
    $scope.checkinvoiceto=function()
    {

        $("#print").attr("disabled", false);
        // $("#download").attr("disabled", false);
       console.log($scope.invnum);
          $.post("{{route('checkinvoiceto')}}",
                        {
                            invoiceno: $scope.invnum.invoiceno,
                            _token: '{{csrf_token()}}'
                        },
                        function(data)
                        {
                            console.log(data);
                          $("#invoicenumber").val($scope.invnum.invoiceno);
                          $("#invoicetohtml").html(data.customer.customername);
                          $("#custcode").html(data.invoiceto);
                          $("#invoiceto").val(data.invoiceto);
                        }
                );
        
    }

});
</script>
@endpush