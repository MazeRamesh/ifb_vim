@extends('layouts.app')

@section('page-title','Customers List')
@section('masters','menu-open')
@section('customer','active')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Customers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item active">Customers List</li>
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
      <div class="container-fluid ">
        <!-- Info boxes -->
        <div class="row">
			<div class="col-12 mt-3">
				<div class="card card-primary card-outline">
				   <div class="card-header">
						<h3 class="card-title text-info clearfix"><strong>Transport LIST</strong></h3>
						<!-- <div class="card-tools">
						   <a href="{{ route('customertables.customertables.create') }}" class="btn btn-sm pl-3 pr-3 bg-success float-right clearfix" title="Create New Customertables"  role="button">
								<span><i class="fas fa-plus"></i>Add</span>
							</a>
                            <a href="{{ route('customertables.customertables.customertablesImport') }}" class="btn btn-sm pl-3 pr-3 text-white bg-warning float-right clearfix" title="Create New Customertables"  role="button">
								<span><i class="fas fa-upload"></i>Import</span>
							</a>
                             <a href="{{ route('customertables.customertables.customertablesDownload') }}" class="btn btn-sm pl-3 pr-3 text-white bg-info float-right clearfix" title="Create New Customertables"  role="button">
								<span><i class="fas fa-download"></i>Export</span>
							</a>
						</div> -->
					</div>
                   
					
					@if(count($customertablesObjects) == 0)
						<div class="card-body text-center">
							<h4>No Customertables Available!</h4>
						</div>
					@else
						<div class="card-body table-responsive p-0">
							<table class="table table-hover">
								<tr>
							<th>Code</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Address</th>
                            <th>GSTIN No.</th>
                            <th>Phone No.</th>
                            <th>Mobile No.</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Staus</th>

									<th>Action</th>
								</tr>
								@foreach($customertablesObjects as $customertables)
								<tr>
									                            <td>{{ $customertables->customercode }}</td>
                            <td>{{ $customertables->customername }}</td>
                            <td>{{ $customertables->customertype }}</td>
                            <td>{{ $customertables->customeraddress }}</td>
                            <td>{{ $customertables->customerGSTINno }}</td>
                            <td>{{ $customertables->customerphoneno }}</td>
                            <td>{{ $customertables->customermobileno }}</td>
                            <td>{{ $customertables->customeremail }}</td>
                            <td>{{ $customertables->customercity }}</td>
                            <td>{{ $customertables->customerstate }}</td>
                            <td>{{ $customertables->customerstaus }}</td>

									<td>
										<form method="POST" action="{!! route('customertables.customertables.destroy', $customertables->id) !!}" accept-charset="UTF-8">
											<input name="_method" value="DELETE" type="hidden">
											{{ csrf_field() }}
											<div class="btn-group btn-group-xs pull-right" role="group">
												<a href="{{ route('customertables.customertables.show', $customertables->id ) }}" class="btn btn-warning btn-sm text-white" title="Show Customertables">
													<span class="fa fa-eye" aria-hidden="true"></span>
												</a>
												<a href="{{ route('customertables.customertables.edit', $customertables->id ) }}" class="btn btn-info text-white btn-sm" title="Edit Customertables">
													<i class="fas fa-pencil-alt"></i>
												</a>
                                                
<!--                                                 @if(Gate::allows('super_admin'))

												<button type="submit" class="btn btn-danger btn-sm" title="Delete Customertables" onclick="return confirm(&quot;Delete Customertables?&quot;)">
													<span class="fa fa-trash" aria-hidden="true"></span>
												</button>
                                                
                                                @endif -->
                                                
											</div>
										</form>
									</td>
								</tr>
								@endforeach
							</table>
						</div>
						<div class="card-footer clearfix">
							{!! $customertablesObjects->render() !!}
						</div>
					@endif
				</div><!--/. card -->
			</div>
		</div> <!--/. row -->
	  </div><!--/. container-fluid -->
    </section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
