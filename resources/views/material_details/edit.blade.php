@extends('layouts.app')

@section('page-title','Material Detail Edit')

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
						<form method="POST" action="{{ route('material_details.material_detail.update', $materialDetail->id) }}" id="edit_material_detail_form" name="edit_material_detail_form" accept-charset="UTF-8" class="form-horizontal">
							<div class="card-header">
								<h3 class="card-title clearfix">
								   {{ !empty($title) ? $title : 'Material Detail' }}
								   <div class="btn-group btn-group-sm float-right"  role="group">
										<a href="{{ route('material_details.material_detail.index') }}" class="btn btn-primary btn-sm" title="Show All Material Detail">
											<span class="fa fa-th-list" aria-hidden="true"></span>
										</a>

										<a href="{{ route('material_details.material_detail.create') }}" class="btn btn-success btn-sm" title="Create New Material Detail">
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
							@include ('material_details.form', [
														'materialDetail' => $materialDetail,
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
@endsection
