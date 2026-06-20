@extends('layouts.app')

@section('page-title','View Plant')
@section('masters','menu-open')
@section('company','active')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Company</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('companies.company.index') }}">Company</a></li>
              <li class="breadcrumb-item active">View</li>
			</ol>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Main content -->
	
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
			<div class="col-12 pt-4">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title text-info clearfix">
						   <strong>{{ isset($title) ? $title : 'COMPANY VIEW' }}</strong>
						   <div class="float-right">
								<form method="POST" action="{!! route('companies.company.destroy', $company->id) !!}" accept-charset="UTF-8">
									<input name="_method" value="DELETE" type="hidden">
									{{ csrf_field() }}
									<div class="btn-group btn-group-sm" role="group">
										<a href="{{ route('companies.company.index') }}" class="btn btn-primary btn-sm" title="Show All Company">
											<span class="fa fa-th-list" aria-hidden="true"></span>
										</a>

										<!--<a href="{{ route('companies.company.create') }}" class="btn btn-success btn-sm" title="Create New Company">
											<span class="fa fa-plus" aria-hidden="true"></span>
										</a>-->
										
										<a href="{{ route('companies.company.edit', $company->id ) }}" class="btn btn-warning text-white btn-sm" title="Edit Company">
											<span><i class="fas fa-pencil-alt"></i></span>
										</a>

										<button type="submit" class="btn btn-danger btn-sm" title="Delete company" onclick="return confirm(&quot;Delete company??&quot;)">
											<span class="fa fa-trash" aria-hidden="true"></span>
										</button>
									</div>
								</form>

							</div>
						</h3>
					</div>
					<div class="card-body">
						<div class="card-text">
									<!-- <dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Code</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmpcode }}</dd>
		</dl> -->
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">Name</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmpname }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">Plant Code</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->plantcode }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">Plant Name</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->plantname }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">GSTIN No.</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmpgstino }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">PAN No.</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->panno }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Country</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmpcountry }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> State</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmpstate }}</dd>
		</dl>
       <dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> City</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmpcity }}</dd>
		</dl>
		<!-- <dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Mailing Name</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmpmailingname }}</dd>
		</dl>
      <dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Location Code</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->companylocation }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Address</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmpaddress }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> GSTINo</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmpgstino }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Country</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmpcountry }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> State</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmpstate }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> City</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmpcity }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Email</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmpemail }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Phoneno</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmpphoneno }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Mobileno</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmpmobileno }}</dd>
		</dl>
        <dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Website</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmpwebsite }}</dd>
		</dl>
        <dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Logo</dt>
            <dd class="col-md-8 col-sm-6">{{ $company->cmplogo }}</dd>
		</dl> -->

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
