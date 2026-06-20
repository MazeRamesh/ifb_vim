@extends('layouts.app')

@section('page-title','Sales List')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sales</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item active">Sales List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
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
			<div class="col-12">
				<div class="card card-primary card-outline">
				   <div class="card-header">
						<h3 class="card-title clearfix">Sales</h3>
						<div class="card-tools">
						   <a href="{{ route('salesheaders.salesheader.create') }}" class="btn btn-sm pl-3 pr-3 bg-success float-right clearfix" title="Create New Location"  role="button">
								<span class="fa fa-plus" aria-hidden="true"> Add</span>
							</a>
                        
						</div>
					</div>
        
        @if(count($salesheaders) == 0)
            <div class="panel-body text-center">
                <h4>No Sales Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                           
                            <th>Invoice No</th>
                            <th>Invoice Date</th>
                            <th>Customer Code</th>
                            <th>Vch Type </th>
                          
                            <th>Tax Amount</th>
                            <th>Grand Total Amount</th>
                           
                            <th>Created By</th>
                            <th>Created At</th>
                         

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($salesheaders as $salesheader)
                        <tr>
                            
                            <td>{{ $salesheader->invoiceno }}</td>
                            <td>{{ $salesheader->invoicedate }}</td>
                            <td>{{ $salesheader->customercode_id}}</td>
                            <td>{{ $salesheader->vchtypecode_id }}</td>
                           
                           
                            <td>{{ $salesheader->taxamount }}</td>
                            <td>{{ $salesheader->grandtotalamount }}</td>
                            
                            <td>{{ $salesheader->createdby }}</td>
                            <td>{{ $salesheader->created_at }}</td>
                           
                           

                            <td>

                                <form method="POST" action="{!! route('salesheaders.salesheader.destroy', $salesheader->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('salesheaders.salesheader.show', $salesheader->id ) }}" class="btn btn-sm btn-info" title="Show Salesheader">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('salesheaders.salesheader.edit', $salesheader->id ) }}" class="btn btn-sm btn-primary" title="Edit Salesheader">
                                            <span class="fas fa-pencil-alt" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger btn-sm " title="Delete Salesheader" onclick="return confirm(&quot;Click Ok to delete Salesheader.&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

           </div><!--/. card-body -->
						<div class="card-footer clearfix">
							{!! $salesheaders->render() !!}
						</div>
					@endif
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
  

    
})
    
    app.factory('Dealers', function($resource) {
      return $resource($salesheaders);
    })
   app.controller('DealersCtrl', function($scope, Dealers) {
      var self = this;
      self.dealers = Dealers.query();

      self.expandAll = function(expanded) {
        // $scope is required here, hence the injection above, even though we're using "controller as" syntax
        $scope.$broadcast('onExpandAll', {
          expanded: expanded
        });
      };

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
    
    


</script>
@endpush

