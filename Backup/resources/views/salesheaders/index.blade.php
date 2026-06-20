@extends('layouts.app')

@section('page-title','Sales List')
@section('sales','menu-open')
@section('content')

<style>
div>table>tbody>tr:nth-child(4n+1) {
    background-color:#dcdcdc;
}
div>table>tbody>tr:nth-child(even)>td {
    border: none;
    padding: 0;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item active">Sales List</li>
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
						<h3 class="card-title clearfix text-info text-uppercase font-weight-bold">Sales List</h3>
						<div class="card-tools">
						   <a href="{{ route('salesheaders.salesheader.create') }}" class="btn btn-sm pl-3 pr-3 bg-success float-right clearfix" title="Create New Location"  role="button">
								<span><i class="fas fa-plus"></i> Add</span>
							</a>
                             <a href="{{ route('salesheaders.salesheader.Import') }}" class="btn btn-sm pl-3 pr-3 bg-warning float-right clearfix" title="Create New Customertables"  role="button">
								<span> <i class="fas fa-upload"></i>Import</span>
							</a>
                             <a href="{{ route('salesheaders.salesheader.Download') }}" class="btn btn-sm pl-3 pr-3 bg-info float-right clearfix" title="Create New Customertables"  role="button">
								<span> <i class="fas fa-download"></i> Export</span>
							</a>
						</div>
					</div>
        
       
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">
                 <div ng-controller="DealersCtrl as ctrl">
                <table class="table table-striped " >
                    <thead>
                         
                            
                            <th>
                                    <button class="btn btn-sm btn-primary" type="button" ng-click="ctrl.expandAll(allExpanded = !allExpanded)">
                                    <span ng-bind="allExpanded ? '-' : '+'"></span></button>
                            </th>
                           
                            <th>Invoice No</th>
                            <th>Invoice Date</th>
                            <th>Customer Code</th>
                            <th>Freight Amount</th>
                            <th>Packing Amount</th>
                            <th>Other Amount</th>
                            <th>Discount Amount</th>
                            <th>Tax Amount (IGST+CGST+SGST)</th>
                            <th>Item Total</th>
                            <th>Grand Total Amount</th>
                            <th>Created By</th>
                            <th>Created At</th>
                            <th>Action</th>
                           
                        
                    </thead>
                    <tbody>
                   
                        <tr ng-repeat-start="dealer in ctrl.dealers">
                            <td>
                    <button class="btn btn-sm btn-info" ng-click="expanded = !expanded" expand>
                        <span ng-bind="expanded ? '-' : '+'"></span>
                    </button>
                </td>
                            <td ng-bind="dealer.invoiceno"></td>
                            <td ng-bind="dealer.invoicedate"></td>
                            <td ng-bind="dealer.customercode_id"></td>
                            <td ng-bind="dealer.Freight_amt"></td>
                            <td ng-bind="dealer.Packing_amt"></td>
                            <td ng-bind="dealer.otheramount"></td>
                            <td ng-bind="dealer.discountamount"></td>
                            <td ng-bind="dealer.totaltaxamount"></td>
                            <td ng-bind="dealer.sales_total"></td>
                            <td ng-bind="dealer.grandtotalamount"></td>
                            <td ng-bind="dealer.createdby"></td>
                            <td ng-bind="dealer.created_at"></td>
                       

                            <td>

                              <!-- <form method="POST" action="@{{getAction(dealer)}}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}-->

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a ng-href="{{ route('salesheaders.salesheader.index') }}/show/@{{dealer.id}} " class="btn btn-sm btn-info" title="Show Salesheader">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        
                                         <a ng-href="{{ route('salesheaders.salesheader.index') }}/@{{dealer.id}}/edit" class="btn btn-sm btn-primary" title="Edit Salesheader" ng-show="dealer.from != 'excel'">
                                            <span class="fas fa-pencil-alt" aria-hidden="true"></span>
                                        </a>
                                        
                                         @if(Gate::allows('super_admin'))
                                       
                                       <a ng-href="{{ route('salesheaders.salesheader.index') }}/delete/@{{dealer.id}}" class="btn btn-sm btn-danger" title="Delete Salesheader" onclick="return confirm(&quot;Click Ok to delete Salesheader.&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </a>
                                        
                                        @endif
                                        
                                       <!-- <button type="submit" class="btn btn-danger btn-sm " title="Delete Salesheader" onclick="return confirm(&quot;Click Ok to delete Salesheader.&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button>-->
                                    </div>

                              <!--  </form>-->
                                
                            </td>
                            
                        </tr>
                        
                        
                        <tr ng-repeat-end ng-show="expanded">
               
                <td colspan="12">
                    <table class="table table-condensed table-bordered" >
                        <thead>
                            <tr>
                              
                                <th style="width:15%;">Product Code</th>
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
                        <tbody>
                            <tr ng-repeat="brand in dealer.invoiceno_list">
                               
                                <td style="width:15%;" ng-bind="brand['productcode_id']"></td>
                                <td style="width:15%;" ng-bind="brand['productname']"></td>
                                <td style="width:15%;" ng-bind="brand['productpartno']"></td>
                                <td style="width:15%;" ng-bind="brand['productdescription']"></td>
                                <td style="width:15%;" ng-bind="brand['producthsncode']"></td>
                                <td style="width:15%;" ng-bind="brand['uom_id']"></td>
                                <td style="width:15%;" ng-bind="brand['productqty']"></td>
                                <td style="width:15%;" ng-bind="brand['productsellingrate']"></td>
                                <td style="width:15%;" ng-bind="brand['productigstrate']"></td>
                                <td style="width:15%;" ng-bind="brand['netamount']"></td>
                                <td style="width:15%;" ng-bind="brand['taxamount']"></td>
                                <td style="width:15%;" ng-bind="brand['totallinevalue']"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
             
                    </tbody>
                </table>

           </div><!--/. card-body -->
           </div><!--/. card-body -->
						
					
				</div><!--/. card -->
			</div>
		</div> <!--/. row -->
	  </div><!--/. container-fluid -->
        </div>
    </section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@push('scripts')
<script type="text/javascript">
app.controller('SalesHeaderInventoryController', function($scope,$http) {
  
    
});
    

    
    
      (function() {
          
  "use strict";

  angular.module('angularApp', ['ngResource'])
    .controller('DealersCtrl', function($scope) {
      var self = this;
      self.dealers = @json($salesheaders);
      
      console.log(self.dealers);

      $scope.ShowEdit = true;
      self.expandAll = function(expanded) {
        // $scope is required here, hence the injection above, even though we're using "controller as" syntax
        $scope.$broadcast('onExpandAll', {
          expanded: expanded
        });
      };
      self.getAction=function(d)
      {
          return "{{ route('salesheaders.salesheader.index')}}/salesheader/"+d.id;
      }
    })
        .directive('expand', function () {
            function link(scope, element, attrs) {
                scope.$on('onExpandAll', function (event, args) {
                    scope.expanded = args.expanded;
                });
            }
            return {
                link: link
            };
        });
}());
    



</script>

<script>
    $(function(){
    
        $("#salesReport").DataTable({  
           
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
           
      "autoWidth": true
            
                     
        });
    
    });
</script>

@endpush

