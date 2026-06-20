@extends('layouts.app')

@section('page-title','Vchtypes List')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vchtypes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item active">Vchtypes List</li>
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
						<h3 class="card-title clearfix">Vchtypes</h3>
						<div class="card-tools">
						   <a href="{{ route('vchtypes.vchtypes.create') }}" class="btn btn-sm pl-3 pr-3 bg-success float-right clearfix" title="Create New Vchtypes"  role="button">
								<span class="fa fa-plus" aria-hidden="true"> Add</span>
							</a>
						</div>
					</div>
					
					@if(count($vchtypesObjects) == 0)
						<div class="card-body text-center">
							<h4>No Vchtypes Available!</h4>
						</div>
					@else
						<div class="card-body table-responsive p-0">
							<table class="table table-hover">
								<tr>
									                            <th>Voucher Type Code</th>
                            <th>Voucher Type Name</th>
                            <th>Voucher Type Description</th>
                            <th>Voucher Type Under</th>
                            <th>Status</th>

									<th></th>
								</tr>
								@foreach($vchtypesObjects as $vchtypes)
								<tr>
									                            <td>{{ $vchtypes->vchtypecode }}</td>
                            <td>{{ $vchtypes->vchtypename }}</td>
                            <td>{{ $vchtypes->vchtypedescription }}</td>
                            <td>{{ $vchtypes->vchtypeunder }}</td>
                            <td>{{ $vchtypes->status }}</td>

									<td>
										<form method="POST" action="{!! route('vchtypes.vchtypes.destroy', $vchtypes->id) !!}" accept-charset="UTF-8">
											<input name="_method" value="DELETE" type="hidden">
											{{ csrf_field() }}
											<div class="btn-group btn-group-xs pull-right" role="group">
												<a href="{{ route('vchtypes.vchtypes.show', $vchtypes->id ) }}" class="btn btn-info btn-sm" title="Show Vchtypes">
													<span class="fa fa-eye" aria-hidden="true"></span>
												</a>
												<a href="{{ route('vchtypes.vchtypes.edit', $vchtypes->id ) }}" class="btn btn-primary btn-sm" title="Edit Vchtypes">
													<span class="fas fa-pencil-alt" aria-hidden="true"></span>
												</a>

												<button type="submit" class="btn btn-danger btn-sm" title="Delete Vchtypes" onclick="return confirm(&quot;Delete Vchtypes?&quot;)">
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
							{!! $vchtypesObjects->render() !!}
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
