@extends('layouts.app')

@section('page-title','Rate Master')
@section('masters','menu-open')
@section('rate','active')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- <div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0 text-dark">Rate Master</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Rate Master</li>
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

<section class="content" ng-controller="CustomerProductController">
<div class="container-fluid">
<!-- Info boxes -->
<div class="row">
<div class="col-12 pt-4">
<div class="card">
	<div class="card-header">
		<h3 class="card-title text-uppercase font-weight-bold  text-info clearfix">
			Customer Product Mappings
		</h3>
	</div>
	<div class="card-body ">
	<div class="row">
<div class="col-md-6 form-group clearfix">
    <label for="customer" class="col-md-3 col-sm-6 control-label">Customer</label>
        <select class="form-control " name="customer" type="text" placeholder="Select a Customer" id="customer">
        </select>
</div>
<div class="col-md-6">
<div class="card-tools">
 <label for="customer" class="col-md-3 col-sm-6 control-label">Add Product</label>
	<select class="form-control" name="product" type="text" placeholder="Select a Product" id="product">
	</select>
</div>
</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title text-uppercase font-weight-bold  text-info">List of Products</h5>
				
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<th>S.No</th>
						<th>Name</th>
						<th>PartNo</th>
						<th>Actual Price</th>
						<th>Customer Price</th>
						<th>Action</th>
					</thead>
					<tbody>
					<tr ng-repeat="product in products">
						<td ng-bind="$index+1"></td>
						<td ng-bind="product.productname">
						</td>
						<td ng-bind="product.productpartno">
						</td>
						<td ng-bind="product.productsellingrate">
						</td>
						<td>
							<input name="productsellingrate" type="number" ng-disabled="product.readonly" ng-model="product.custsellingrate"/>
						</td>
						<td>
							<button class="btn btn-info text-white" ng-if="product.readonly==true" ng-click="saveorupdate(product)"><i class="fas fa-pencil-alt"></i></button>
							<button class="btn btn-secondary text-white" ng-if="product.readonly==false" ng-click="saveorupdate(product)"><i class="fas fa-save"></i></button>
							<button class="btn btn-danger" ng-if="product.readonly==true" ng-click="deleteMapping(product,$index)" ><i class="fas fa-trash-alt"></i></button>
						</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div> <!--/. row -->
</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@push('scripts')
<script type="text/javascript">
	app.controller('CustomerProductController',function($scope,$http){
		$scope.customer_id;
		$scope.product_id;
		$scope.products=[];
		$('#customer').select2({
			theme:'bootstrap4',
			placeholder: "Select Customer",
    		minimumInputLength: 1,
    		ajax: {
        		url: "{{route('get-customers')}}",
        		dataType: 'json',
        		quietMillis: 250,
        		data: function (params) {
      				return {
        				q: params.term, // search term
        				page: params.page
      				};
    			},
     processResults: function (response, params) {
      params.page = params.page || 1;
      var data=response.data;
      var data = $.map(data, function (obj) {
        obj.text = obj.text || obj.customername;
        return obj;
      });
      return {
        results: data,
        pagination: {
          more: (params.page * 10) < data.total_count
        }
      };
    }
    	},
   templateResult: function(customer){return customer.text},
  templateSelection: function(customer){
  	if($scope.customer_id!=customer.id)
  	{
  		$scope.customer_id=customer.id;
  		$scope.products=[];
  		// $("#customer").val('').trigger('change');
  		$http.get('{{route("customertables.get-mapped-products")}}?customer_id='+$scope.customer_id).then(function(response){
        console.log(response);
  			var response=response.data;
  			response.forEach(product=>{
  				push_obj={
  					'product_id':product.id,
  					'id':product.pivot.id,
  					'productsellingrate':product.productsellingrate,
  					'custsellingrate':parseInt(product.pivot.productsellingrate),
  					'productname':product.productname,
  					'productpartno':product.productpartno,
  					'readonly':true,
  			};
  			$scope.products.push(push_obj);
  			})
  		})
  	}
  	return customer.text;
  }
		});
$('#product').select2({
			theme:'bootstrap4',
			placeholder: "Add Product",
    		minimumInputLength: 1,
    		ajax: {
        		url: "{{route('get_product')}}",
        		dataType: 'json',
        		quietMillis: 250,
        		data: function (params) {
      				return {
        				q: params.term, // search term
        				page: params.page,
        				notin: $scope.products.map(product=>parseInt(product.product_id))
      				};
    			},
     processResults: function (response, params) {
      params.page = params.page || 1;
      var data=response.data;
      var data = $.map(data, function (obj) {
        obj.text = obj.text || obj.productname;
        return obj;
      });
      return {
        results: data,
        pagination: {
          more: (params.page * 10) < data.total_count
        }
      };
    }
    	},
   templateResult: function(product){return product.text},
  templateSelection: function(product){
  	var flag=$scope.products.findIndex(t_product=>t_product.product_id==product.id);
  	if(flag==-1 && product.id!="")
  	{
  		product.readonly=false;
  		product.processing=false;
  		product.product_id=product.id;
  		$scope.products.push(product);
  		$("#product").val('').trigger('change');
  		$scope.$apply();
  	}
  	return product.text;
  }
		});
$scope.deleteMapping=function(product,index){
	if(confirm('Are You Sure to Delete'))
	{
		$http.delete('{{route("rate-master.index")}}/'+product.id).then(val=>{
			let response=val.data;
			if(response.status==true)
			{
				$scope.products.splice(index,1);
			}
			alert(response.message);
		});
	}
}
$scope.saveorupdate= function(product){
	if($scope.customer_id==null||$scope.customer_id=="")
	{
		alert('select a customer');
		return ;
	}
	console.log(product.readonly);
	if(product.readonly==false){
		if(product.custsellingrate==null||product.custsellingrate=="")
		{
			alert('give a rate for a product');
			return ;
		}
		product.processing=true;
		$http.post("{{route('rate-master.store')}}",{'customer_id':$scope.customer_id,'product':{'id':product.product_id,'rate':product.custsellingrate}}).then(res=>{
				response=res.data;
				product.processing=false;
				if(response.status==true)
				{
					product.readonly=true;
					product.id=response.product_mapped.id;
				}
				else
					console.log(response.message);
			})
	}
	else
		product.readonly=!product.readonly;
}

  });
</script>
@endpush