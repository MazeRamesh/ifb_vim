@extends('layouts.app')
@section('content')
@section('ewaybill','menu-open')

<div class="content-wrapper">
            <div id="layoutSidenav_content">

                    <div class="container-fluid pt-3">
                           <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 nopadding  print-shape">
                                <div class="card-header toll-free">
                                      <span class="toll-free"> e-Way Bill </span>
                                </div>
                            </div>
                          
                        <div class="card card-primary card-outline mb-4 mt-2">
        @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="fa fa-ok"></span>
            {!! session('success_message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
       </div>
    @endif
    @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}
                                         <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button></li>

                                    @endforeach
                                </ul>
                            @endif
     <!-- @if(Session::has('danger_message'))
        <div class="alert alert-danger">
            <span class="fa fa-ok"></span>
            {!! session('success_message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
       </div>
    @endif -->
                            <div class="card-body" ng-controller="Ewaybillpagecontroller">
                                <form role="form" action="{{ route('generateewaybillno') }}" method="POST" id="myForm" autocomplete="off">
                        {!! csrf_field() !!}
                                <div class="col-md-12 border p-3">
                                    <div class="row vim">
                                        <div class="col-md-4">
                                          
                                        <input id="datepicker" class="from" name="fromdate"  placeholder="From date"/ autocomplete="off" ng-model="fromdate">
                                        </div>
                                        <div class="col-md-4">
                                            <input id="datepicker1" class="to" name="todate" placeholder="To date" autocomplete="off" ng-change="changedate()" ng-model="todate"/>
                                        </div>
                                         <input name="invoicenumber" id="invoicenumber" style="display: none;" />
                                       <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
             <ui-select ng-model="$parent.invnum" theme="select2" style="min-width: 250px;" title="Choose a person" append-to-body="true" id="invnum" name="invoicenumber" ng-change="checkewaybillno();"  required>
              <ui-select-match allow-clear="true" placeholder="Select a Invoice Number...">@{{$select.selected.invoiceno}}</ui-select-match>
              <ui-select-choices repeat="invoice in invoices | propsFilter: {invoiceno: $select.search}">
                   <div ng-bind-html="invoice.invoiceno"></div>
              </ui-select-choices>
             </ui-select>

                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-4 " style="padding-top: 20px;">
                                            <div class=" row button ">
                                            <button type="submit" id="ewaybillgeneratebutton" class=" btn btn-success btn-sm pl-4 pr-4" disabled>Generate E-way Bill</button>
                                            <button type="button" class="btn btn-info text-white btn-sm ml-2 pl-4 pr-4" onclick="Reset()" ng-click="clear($event, $select)">Reset</button>
                                        </div>
                                        </div>
                                        
                                    </div>
                                        <div class="row mt-2 vim1">
                                        
                                      
                                        

                                        </div>
                                        
                                        
                                        
                                        </div>
                                        </form>
                                  <div class="table-responsive mt-4">
                                    <table id="print_table" class="table table-bordered table-striped" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Actions</th>
                                                <th>Inv.No</th>
                                                <th>Inv. Date</th>
                                                <th>e-Way Bill No.</th> 
                                                <th>IGST Amt</th>
                                                <th>SGST Amt</th>
                                                <th>CGST Amt</th>
                                                <th>Invoice Amt</th>
                                                <th>Created At</th>
                                                <th>Pdf.Status</th>
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
    var today   = new Date();
    var date = today.getMonth()+1+'/'+(today.getDate())+'/'+today.getFullYear();
    $(".from").val(date);
    $(".to").val(date);

     function Reset() {
       
       $(".select2-search-choice-close").trigger('click');
       $("#datepicker").val('').trigger('change');
       $("#datepicker1").val('').trigger('change');
       $("#invoicenumber").val('').trigger('change');
        }
 $("#datepicker1").trigger('change');

app.controller('Ewaybillpagecontroller',function($scope,$http,$filter){
    $scope.fromdate=date;
    $scope.todate=date;
    $scope.invoices=[];
    $scope.invnum;
    
         table = $('#print_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('get.ewaybillinvoices.data') !!}',
        // columnDefs: [{
        //     orderable: false,
        //     className: 'select-checkbox',
        //     targets: 0
        // }],
        // select: {
        //     style: 'multi',
        //     selector: 'td:first-child'
        // },
        // order: [
        //     [1, 'asc']
        // ],
         columns: [ 
         { data: 'actions', name: 'actions', orderable: false, searchable: false},                
                // { data: null, orderable: false, "defaultContent":''},
                { data: 'invoiceno', name: 'invoiceno' },
                { data: 'invoicedate', name: 'invoicedate' },
                 { data: 'ewaybillno', name: 'ewaybillno' },
                { data: 'igstamount', name: 'igstamount' },
                { data: 'sgstamount', name: 'sgstamount' },
                { data: 'cgstamount', name: 'cgstamount' },
                { data: 'sales_total', name: 'sales_total' },
                // { data: 'created_at', name: 'created_at' },
                { data: 'created_at', name: 'created_at' },
                { data: 'pdfstatus', name: 'pdfstatus' },
               
                  
                
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

$scope.changedate=function()
    {
      $http.get("{{route('getewayinvoicenum')}}?from="+$scope.fromdate+"&to="+$scope.todate).then(val=>{
        response=val.data;
        $scope.invoices=response;    
      });
      var selectedRows = table.rows({ selected: true }).ids(true);
             console.log(selectedRows);
    }
$scope.changedate();


$scope.checkewaybillno=function()
    {

        $("#ewaybillgeneratebutton").attr("disabled", false);
        $("#invoicenumber").val($scope.invnum.invoiceno);
    }

});
</script>
@endpush