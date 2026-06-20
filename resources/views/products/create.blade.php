@extends('layouts.app')

@section('page-title','Products New')
@section('masters','menu-open')
@section('part','active')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Products New</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('products.products.index') }}">Products</a></li>
              <li class="breadcrumb-item active">New Products</li>
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
					<form method="POST" action="{{ route('products.products.store') }}" accept-charset="UTF-8" id="create_products_form" name="create_products_form" class="form-horizontal">
						<div class="card-header">
							<h3 class="card-title text-info clearfix">
							   <strong>CREATE NEW PRODUCTS</strong>
							   <div class="float-right">
									<a href="{{ route('products.products.index') }}" class="btn btn-primary btn-sm" title="Show All products">
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
            @include ('products.form', [
                                        'products' => null,
                                        'editflag' => false,
                                      ])
	
						</div>
						<div class="card-footer clearfix text-center">
								<input class="btn btn-primary btn-sm pr-4 pl-4" type="submit" value="Add">
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

