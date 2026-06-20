@extends('layouts.app')

@section('page-title','products Edit')
@section('masters','menu-open')
@section('part','active')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('products.products.index') }}">products</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Main content -->
	
    <section class="content">
		<div class="container-fluid ">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-12 pt-3">
					<div class="card card-primary card-outline">
						<form method="POST" action="{{ route('products.products.update', $products->id) }}" id="edit_products_form" name="edit_products_form" accept-charset="UTF-8" class="form-horizontal">
							<div class="card-header">
								<h3 class="card-title text-info clearfix">
								   <strong>{{ !empty($title) ? $title : 'PRODUCTS' }}</strong>
								   <div class="btn-group btn-group-sm float-right"  role="group">
										<a href="{{ route('products.products.index') }}" class="btn btn-primary btn-sm" title="Show All products">
											<span class="fa fa-th-list" aria-hidden="true"></span>
										</a>

										<a href="{{ route('products.products.create') }}" class="btn btn-success btn-sm" title="Create New products">
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
            @include ('products.form', [
                                        'products' => $products,
                                        'editflag' => true,
                                      ])
</div>
							<div class="card-footer clearfix text-center">
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
