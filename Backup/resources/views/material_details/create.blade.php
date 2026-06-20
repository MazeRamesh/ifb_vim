@extends('layouts.app')

@section('page-title','Material Detail New')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div id="layoutSidenav_content">

      <div class="container-fluid pt-3">
             <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 nopadding  print-shape">
                  <div class="card-header toll-free" style="width:250px;">
                        <span class="toll-free"> Material Details</span>
                  </div>
              </div>
				<div class="card card-primary card-outline  mb-4 mt-2">
					<form method="POST" action="{{ route('material_details.material_detail.store') }}" accept-charset="UTF-8" id="create_material_detail_form" name="create_material_detail_form" class="form-horizontal">
						<div class="card-header">
							<h3 class="card-title clearfix">
							   Create
							   <div class="float-right">
									<a href="{{ route('material_details.material_detail.index') }}" class="btn btn-primary btn-sm" title="Show All Material Detail">
											<span class="fa fa-th-list" aria-hidden="true"></span>
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
							@include ('material_details.form', [
														'materialDetail' => null,
													  ])


						</div>
						<div class="card-footer clearfix">
								<input class="btn btn-primary btn-sm pr-4 pl-4" type="submit" value="Add">
						</div>
					</form>
				</div><!--/. card -->
			</div>
		</div> <!--/. row -->
	  </div><!--/. container-fluid --
@endsection
