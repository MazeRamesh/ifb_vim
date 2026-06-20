{{--
<!-- @extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Productmaps</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('productmaps.productmap.create') }}" class="btn btn-success" title="Create New Productmap">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($productmaps) == 0)
            <div class="panel-body text-center">
                <h4>No Productmaps Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Cutomer</th>
                            <th>Product</th>
                            <th>Customer</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productmaps as $productmap)
                        <tr>
                            <td>{{ optional($productmap->product)->productcode }}</td>
                            <td>{{ optional($productmap->cutomer)->id }}</td>
                            <td>{{ $productmap->product }}</td>
                            <td>{{ $productmap->customer }}</td>

                            <td>

                                <form method="POST" action="{!! route('productmaps.productmap.destroy', $productmap->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('productmaps.productmap.show', $productmap->id ) }}" class="btn btn-info" title="Show Productmap">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('productmaps.productmap.edit', $productmap->id ) }}" class="btn btn-primary" title="Edit Productmap">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Productmap" onclick="return confirm(&quot;Click Ok to delete Productmap.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $productmaps->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection -->
--}}



@extends('layouts.app')

@section('page-title','Rate Master')
@section('masters','menu-open')
@section('map','active')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- <div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0 text-dark">Product Map Master</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Productmaps</li>
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

<section class="content" ng-controller="ProductMapController">
<div class="container-fluid">
<!-- Info boxes -->
<div class="row">
<div class="col-12 mt-3">
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title text-info clearfix">
           <strong>PRODUCTS MAP</strong> 
        </h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('productmaps.productmap.store') }}" accept-charset="UTF-8" id="create_productmap_form" name="create_productmap_form" class="form-horizontal">
            {{ csrf_field() }}
<div class="row">
    <div class="col-sm-6 form-group clearfix">
        <label for="customer_id" class="col-md-2  control-label">Customer</label>
            <select class="form-control " name="customer_id" type="text" placeholder="Select a Customer" id="customer">
            </select>
    </div>
    <div class="col-sm-6 form-group clearfix">
        <label for="product_id" class="col-md-2 control-label">Product</label>
            <select class="form-control " name="product_id" type="text" placeholder="Select a Customer" id="product">
            </select>
        </div>
    </div>
</div>

<div class="text-center">
    <input class="btn btn-primary" type="submit" value="Submit">
</div>

<div class="row">
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title text-info font-weight-bold">LIST OF PRODUCTS</h5>
                
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>S No.</th>
                        <th>Product Code</th>
                        <th>Customer Code</th>
                    </thead>
                    <tbody>
                    
                        <tr ng-repeat="product in products">
                            <td ng-bind="$index+1"></td>
                            <td ng-bind="product.productcode"></td>
                            <td ng-bind="product.customercode"></td>
                            <td>
                              <button class="btn btn-danger" ng-if="product.readonly==true" type="button" ng-click="deleteMapping(product,$index)" ><i class="fas fa-trash-alt"></i></button>
                            </td> 
                        </tr>
                  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</form>
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
    app.controller('ProductMapController',function($scope,$http){
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
    // if($scope.customer_id!=customer.id)
    // {
    //     $scope.customer_id=customer.id;
    //     $scope.products=[];
    //     // $("#customer").val('').trigger('change');
    //     $http.get('{{route("customertables.get-mapped-products")}}?customer_id='+$scope.customer_id).then(function(response){
    //         var response=response.data;
    //         response.forEach(product=>{
    //             push_obj={
    //                 'product_id':product.id,
    //                 'id':product.pivot.id,
    //                 'productsellingrate':product.productsellingrate,
    //                 'custsellingrate':parseInt(product.pivot.productsellingrate),
    //                 'productname':product.productname,
    //                 'productpartno':product.productpartno,
    //                 'readonly':true,
    //         };
    //         $scope.products.push(push_obj);
    //         })
    //     })
    // }
    return customer.text;
  }
        });

$('#customer').on('change',function(){
    $http.get('{{route("productmaps.get-mapped-products")}}?customer_id='+this.value).then(function(response){
            var response=response.data;
            
            response.forEach(product=>{
                push_obj={
                    'product_id':product.id,
                    'productcode':product.productmap.productcode,
                    'customercode':product.customermap.customercode,
                    'readonly':true,
            };
            $scope.products.push(push_obj);
            })
            
        })
})

$scope.deleteMapping=function(product,index){
    if(confirm('Are You Sure to Delete'))
    {
        $http.delete('{{route("productmaps.productmap.index")}}/productmap/'+product.product_id).then(val=>{
            let response=val.data;
            console.log(response.status);
            if(response.status==true)
            {
                $scope.products.splice(index,1);
                console.log($scope.products);
            }
            alert(response.message);
        });
    }

}

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
          more: (params.page * 10) < data.total
        }
      };
    }
        },
   templateResult: function(product){return product.text},
  templateSelection: function(product){
  //   var flag=$scope.products.findIndex(t_product=>t_product.product_id==product.id);
  //   if(flag==-1 && product.id!="")
  //   {
  //       product.readonly=false;
  //       product.processing=false;
  //       product.product_id=product.id;
  //       $scope.products.push(product);
  //       $("#product").val('').trigger('change');
  //       $scope.$apply();
  //   }
    return product.text;
   }
        });



  });
</script>
@endpush