@extends('layouts.app')

@section('page-title','Products List')
@section('masters','menu-open')
@section('part','active')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item active">Products List</li>
            </ol>
          </div>
        </div>
      </div>
    </div> -->
    <!-- /.content-header -->
	@if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="fa fa-ok"></span>
            {!! session('success_message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
       </div>
    @endif
    <!-- Main content -->
	
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
			<div class="col-12 mt-2">
				<div class="card card-primary card-outline">
				   <div class="card-header">
						<h3 class="card-title text-info   clearfix"><strong>PRODUCTS</strong></h3>
						<div class="card-tools">
						   <a href="{{ route('products.products.create') }}" class="btn btn-sm pl-3 pr-3 bg-success float-right clearfix" title="Create New Location"  role="button">
								<span><i class="fas fa-plus"></i> Add</span>
							</a>
                             <a href="{{ route('products.products.productsImport') }}" class="btn btn-sm pl-3 pr-3 bg-warning float-right clearfix" title="Create New Customertables"  role="button">
								<span><i class="fas fa-upload"></i> Import</span>
							</a>
                             <a href="{{ route('products.products.productsDownload') }}" class="btn btn-sm pl-3 pr-3 bg-info float-right clearfix" title="Create New Customertables"  role="button">
								<span><i class="fas fa-download"></i> Export</span>
							</a>
						</div>
					</div>
        
        @if(count($productsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Products Available.</h4>
            </div>
        @else
        <div class="card-body panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Product Partno</th>
                            <th>Product Description</th>
                            <th>HSN Code</th>
                            <th>Uom</th>
                            <th>Price</th>
                            <th>GST Rate</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productsObjects as $products)
                        <tr>
                            <td>{{ $products->productcode }}</td>
                            <td>{{ $products->productname }}</td>
                            <td>{{ $products->productpartno }}</td>
                            <td>{{ $products->productdescription }}</td>
                             <td>{{ $products->producthsncode }}</td>
                            <td>{{ $products->uom_id }}</td>
                            <td>{{ $products->productsellingrate }}</td>
                            <td>{{ $products->productigstrate }}</td>
                            <td>{{ $products->productstatus }}</td>
                            <td>

                                <form method="POST" action="{!! route('products.products.destroy', $products->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                   <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('products.products.show', $products->id ) }}" class="btn btn-sm btn-warning text-white" title="Show Products">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('products.products.edit', $products->id ) }}" class="btn btn-sm btn-info text-white" title="Edit Products">
                                           <i class="fas fa-pencil-alt"></i>
                                        </a>
                                       
                                        @if(Gate::allows('super_admin'))

                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete Products" onclick="return confirm(&quot;Click Ok to delete Products.&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button>
                                       
                                       @endif
                                       
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                
                </div><!--/. card-body -->
						<div class="card-footer clearfix">
							{!! $productsObjects->render() !!}
						</div>
					@endif
				</div><!--/. card -->
			</div>
		</div> <!--/. row -->
	  </div>
          <!--/. container-fluid -->
        </div>
    </section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
