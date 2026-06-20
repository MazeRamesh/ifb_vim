@extends('layouts.app')

@section('page-title','State View')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">State</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('states.state.index') }}">States</a></li>
              <li class="breadcrumb-item active">View</li>
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
					<div class="card-header">
						<h3 class="card-title clearfix">
						   {{ isset($title) ? $title : 'State' }}
						   <div class="float-right">
								<form method="POST" action="{!! route('states.state.destroy', $state->id) !!}" accept-charset="UTF-8">
									<input name="_method" value="DELETE" type="hidden">
									{{ csrf_field() }}
									<div class="btn-group btn-group-sm" role="group">
										<a href="{{ route('states.state.index') }}" class="btn btn-primary btn-sm" title="Show All State">
											<span class="fa fa-th-list" aria-hidden="true"></span>
										</a>

										<a href="{{ route('states.state.create') }}" class="btn btn-success btn-sm" title="Create New State">
											<span class="fa fa-plus" aria-hidden="true"></span>
										</a>
										
										<a href="{{ route('states.state.edit', $state->id ) }}" class="btn btn-primary btn-sm" title="Edit State">
											<span class="fas fa-pencil-alt" aria-hidden="true"></span>
										</a>

										<button type="submit" class="btn btn-danger btn-sm" title="Delete State" onclick="return confirm(&quot;Delete State??&quot;)">
											<span class="fa fa-trash" aria-hidden="true"></span>
										</button>
									</div>
								</form>

							</div>
						</h3>
					</div>
					<div class="card-body">
						<div class="card-text">
									<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">State Name</dt>
            <dd class="col-md-8 col-sm-6">{{ $state->state_name }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">State Short Name</dt>
            <dd class="col-md-8 col-sm-6">{{ $state->state_short_name }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">Country</dt>
            <dd class="col-md-8 col-sm-6">{{ optional($state->country)->country_name }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">State Active</dt>
            <dd class="col-md-8 col-sm-6">{{ $state->state_active }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">Created By</dt>
            <dd class="col-md-8 col-sm-6">{{ optional($state->creator)->name }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">Created Date</dt>
            <dd class="col-md-8 col-sm-6">{{ $state->created_date }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">Altered By</dt>
            <dd class="col-md-8 col-sm-6">{{ optional($state->alteredBy)->id }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">Altered Date</dt>
            <dd class="col-md-8 col-sm-6">{{ $state->altered_date }}</dd>
		</dl>

						</div>
					</div>
				</div><!--/. card -->
			</div>
		</div> <!--/. row -->
	  </div><!--/. container-fluid -->
    </section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
