@extends('layouts.app')

@section('page-title','Uom View')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Uom</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('uoms.uom.index') }}">Uoms</a></li>
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
						   {{ isset($title) ? $title : 'Uom' }}
						   <div class="float-right">
								<form method="POST" action="{!! route('uoms.uom.destroy', $uom->id) !!}" accept-charset="UTF-8">
									<input name="_method" value="DELETE" type="hidden">
									{{ csrf_field() }}
									<div class="btn-group btn-group-sm" role="group">
										<a href="{{ route('uoms.uom.index') }}" class="btn btn-primary btn-sm" title="Show All Uom">
											<span class="fa fa-th-list" aria-hidden="true"></span>
										</a>

										<a href="{{ route('uoms.uom.create') }}" class="btn btn-success btn-sm" title="Create New Uom">
											<span class="fa fa-plus" aria-hidden="true"></span>
										</a>
										
										<a href="{{ route('uoms.uom.edit', $uom->id ) }}" class="btn btn-primary btn-sm" title="Edit Uom">
											<span class="fas fa-pencil-alt" aria-hidden="true"></span>
										</a>

										<button type="submit" class="btn btn-danger btn-sm" title="Delete Uom" onclick="return confirm(&quot;Delete Uom??&quot;)">
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
            <dt class="col-md-3 col-sm-5">Uom Code</dt>
            <dd class="col-md-8 col-sm-6">{{ $uom->uomcode }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">Uom Name</dt>
            <dd class="col-md-8 col-sm-6">{{ $uom->uomname }}</dd>
		</dl>
		<dl class="row lp-2">
            <dt class="col-md-3 col-sm-5">Uom Short Name</dt>
            <dd class="col-md-8 col-sm-6">{{ $uom->uomshortname }}</dd>
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
