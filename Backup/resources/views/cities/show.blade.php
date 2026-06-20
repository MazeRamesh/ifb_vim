@extends('layouts.app')

@section('page-title','City View')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">City</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('cities.city.index') }}">Cities</a></li>
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
						   {{ isset($title) ? $title : 'City' }}
						   <div class="float-right">
								<form method="POST" action="{!! route('cities.city.destroy', $city->id) !!}" accept-charset="UTF-8">
									<input name="_method" value="DELETE" type="hidden">
									{{ csrf_field() }}
									<div class="btn-group btn-group-sm" role="group">
										<a href="{{ route('cities.city.index') }}" class="btn btn-primary btn-sm" title="Show All City">
											<span class="fa fa-th-list" aria-hidden="true"></span>
										</a>

										<a href="{{ route('cities.city.create') }}" class="btn btn-success btn-sm" title="Create New City">
											<span class="fa fa-plus" aria-hidden="true"></span>
										</a>
										
										<a href="{{ route('cities.city.edit', $city->id ) }}" class="btn btn-primary btn-sm" title="Edit City">
											<span class="fas fa-pencil-alt" aria-hidden="true"></span>
										</a>

										<button type="submit" class="btn btn-danger btn-sm" title="Delete City" onclick="return confirm(&quot;Delete City??&quot;)">
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
            <dt class="col-md-3 col-sm-5">City Name</dt>
            <dd class="col-md-8 col-sm-6">{{ $city->city_name }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">City Short Name</dt>
            <dd class="col-md-8 col-sm-6">{{ $city->city_short_name }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">State</dt>
            <dd class="col-md-8 col-sm-6">{{ optional($city->state)->state_name }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">City Active</dt>
            <dd class="col-md-8 col-sm-6">{{ $city->city_active }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">Created By</dt>
            <dd class="col-md-8 col-sm-6">{{ optional($city->creator)->name }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">Created Date</dt>
            <dd class="col-md-8 col-sm-6">{{ $city->created_date }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">Altered By</dt>
            <dd class="col-md-8 col-sm-6">{{ optional($city->alteredBy)->id }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">Altered Date</dt>
            <dd class="col-md-8 col-sm-6">{{ $city->altered_date }}</dd>
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
