@extends('layouts.app')

@section('page-title','Locations List')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Locations</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item active">Locations List</li>
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
						<h3 class="card-title clearfix">Locations</h3>
						<div class="card-tools">
						   <a href="{{ route('locations.location.create') }}" class="btn btn-sm pl-3 pr-3 bg-success float-right clearfix" title="Create New Location"  role="button">
								<span class="fa fa-plus" aria-hidden="true"> Add</span>
							</a>
                             <!--<a href="{{ route('locations.location.locationImport') }}" class="btn btn-sm pl-3 pr-3 bg-warning float-right clearfix" title="Create New Customertables"  role="button">
								<span class="fa fa-upload" aria-hidden="true"> Import</span>
							</a>
                             <a href="{{ route('locations.location.locationDownload') }}" class="btn btn-sm pl-3 pr-3 bg-info float-right clearfix" title="Create New Customertables"  role="button">
								<span class="fa fa-download" aria-hidden="true"> Export</span>
							</a>-->
						</div>
					</div>
					
					@if(count($locations) == 0)
						<div class="card-body text-center">
							<h4>No Locations Available!</h4>
						</div>
					@else
						<div class="card-body table-responsive p-0">
							<table class="table table-hover">
								<tr>
				            <th>S.No</th>
				            <th>Location Code</th>
                            <th>Shop Code</th>
                            <th>Location Name</th>
                            <!--<th>Location Description</th>-->

									<th>Action</th>
								</tr>
								@foreach($locations as $key=> $location)
								<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $location->locationcode }}</td>
							<td>{{ $location->shopcode }}</td>
                            <td>{{ $location->locationname }}</td>
                           <!-- <td>{{ $location->locationDescription }}</td>-->

									<td>
										<form method="POST" action="{!! route('locations.location.destroy', $location->id) !!}" accept-charset="UTF-8">
											<input name="_method" value="DELETE" type="hidden">
											{{ csrf_field() }}
											<div class="btn-group btn-group-xs pull-right" role="group">
												<a href="{{ route('locations.location.show', $location->id ) }}" class="btn btn-info btn-sm" title="Show Location">
													<span class="fa fa-eye" aria-hidden="true"></span>
												</a>
												<a href="{{ route('locations.location.edit', $location->id ) }}" class="btn btn-primary btn-sm" title="Edit Location">
													<span class="fas fa-pencil-alt" aria-hidden="true"></span>
												</a>

												<button type="submit" class="btn btn-danger btn-sm" title="Delete Location" onclick="return confirm(&quot;Delete Location?&quot;)">
													<span class="fa fa-trash" aria-hidden="true"></span>
												</button>
											</div>
										</form>
									</td>
								</tr>
								@endforeach
							</table>
						</div><!--/. card-body -->
						<div class="card-footer clearfix">
							{!! $locations->render() !!}
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
