@extends('layouts.app')

@section('page-title','Previlege Edit')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Previlege</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('previleges.previlege.index') }}">Previleges</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
	
    <section class="content">
		<div class="container-fluid">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-12">
					<div class="card card-primary card-outline">
						<form method="POST" action="{{ route('previleges.previlege.update', $previlege->id) }}" id="edit_previlege_form" name="edit_previlege_form" accept-charset="UTF-8" class="form-horizontal">
							<div class="card-header">
								<h3 class="card-title clearfix">
								   {{ !empty($title) ? $title : 'Previlege' }}
								   <div class="btn-group btn-group-sm float-right"  role="group">
										<a href="{{ route('previleges.previlege.index') }}" class="btn btn-primary btn-sm" title="Show All Previlege">
											<span class="fa fa-th-list" aria-hidden="true"></span>
										</a>

										<a href="{{ route('previleges.previlege.create') }}" class="btn btn-success btn-sm" title="Create New Previlege">
											<span class="fa fa-plus" aria-hidden="true"></span>
										</a>
									</div>
								</h3>
							</div>
						<div class="card-body">
							@if ($errors->any())
								<ul class="alert alert-danger">
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							@endif


							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PUT">
							@include ('previleges.form', [
														'previlege' => $previlege,
													  ])
								
							</div>
							<div class="card-footer clearfix">
									<input class="btn btn-primary btn-sm pr-4 pl-4" type="submit" value="Update">
							</div>
						</form>
					</div><!--/. card -->
				</div>
			</div> <!--/. row -->
		</div><!--/. container-fluid -->
    </section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
