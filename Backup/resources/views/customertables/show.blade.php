@extends('layouts.app')

@section('page-title','Customer View')
@section('masters','menu-open')
@section('customer','active')
@section('content')

  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('customertables.customertables.index') }}">Customer</a></li>
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
			<div class="col-12 mt-3">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title text-info clearfix">
						   <strong>{{ isset($title) ? $title : 'CUSTOMER VIEW' }}</strong>
						   <div class="float-right">
								<form method="POST" action="{!! route('customertables.customertables.destroy', $customertables->id) !!}" accept-charset="UTF-8">
									<input name="_method" value="DELETE" type="hidden">
									{{ csrf_field() }}
									<div class="btn-group btn-group-sm" role="group">
										<a href="{{ route('customertables.customertables.index') }}" class="btn btn-primary btn-sm" title="Show All Customertables">
											<span class="fa fa-th-list" aria-hidden="true"></span>
										</a>

										<!-- <a href="{{ route('customertables.customertables.create') }}" class="btn btn-success btn-sm" title="Create New Customertables">
											<span class="fa fa-plus" aria-hidden="true"></span>
										</a> -->
										
										<a href="{{ route('customertables.customertables.edit', $customertables->id ) }}" class="btn btn-info text-white btn-sm" title="Edit Customertables">
											<i class="fas fa-pen"></i>	
										</a>

										<!-- <button type="submit" class="btn btn-danger btn-sm" title="Delete Customertables" onclick="return confirm(&quot;Delete Customertables??&quot;)">
											<span class="fa fa-trash" aria-hidden="true"></span>
										</button> -->
									</div>
								</form>

							</div>
						</h3>
					</div>
					<div class="card-body">
						<div class="card-text">
									<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">Code</dt>
            <dd class="col-md-8 col-sm-6">{{ $customertables->customercode }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Name</dt>
            <dd class="col-md-8 col-sm-6">{{ $customertables->customername }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Type</dt>
            <dd class="col-md-8 col-sm-6">{{ $customertables->customertype }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Address</dt>
            <dd class="col-md-8 col-sm-6">{{ $customertables->customeraddress }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> GSTI Nno</dt>
            <dd class="col-md-8 col-sm-6">{{ $customertables->customerGSTINno }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> PhoneNo</dt>
            <dd class="col-md-8 col-sm-6">{{ $customertables->customerphoneno }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> MobileNo</dt>
            <dd class="col-md-8 col-sm-6">{{ $customertables->customermobileno }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Email</dt>
            <dd class="col-md-8 col-sm-6">{{ $customertables->customeremail }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> City</dt>
            <dd class="col-md-8 col-sm-6">{{ $customertables->customercity }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> State</dt>
            <dd class="col-md-8 col-sm-6">{{ $customertables->customerstate }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Staus</dt>
            <dd class="col-md-8 col-sm-6">{{ $customertables->customerstaus }}</dd>
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
