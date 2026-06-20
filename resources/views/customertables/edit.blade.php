@extends('layouts.app')

@section('page-title','Customertables Edit')
@section('masters','menu-open')
@section('customer','active')
@section('content')
  <!-- Content Wrapper. Contains page content -->
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
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Main content -->
	
    <section class="content">
		<div class="container-fluid"  ng-controller="CustomerController">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-12 mt-3">
					<div class="card card-primary card-outline">
						<form method="POST" action="{{ route('customertables.customertables.update', $customertables->id) }}" id="edit_customertables_form" name="edit_customertables_form" accept-charset="UTF-8" class="form-horizontal">
							<div class="card-header">
								<h3 class="card-title text-info clearfix">
								   <strong>{{ !empty($title) ? $title : 'CUSTOMER EDIT' }}</strong>
								   <div class="btn-group btn-group-sm float-right"  role="group">
										<a href="{{ route('customertables.customertables.index') }}" class="btn btn-primary btn-sm" title="Show All Customertables">
											<span class="fa fa-th-list" aria-hidden="true"></span>
										</a>

										<!-- <a href="{{ route('customertables.customertables.create') }}" class="btn btn-success btn-sm" title="Create New Customertables">
											<span class="fa fa-plus" aria-hidden="true"></span>
										</a> -->
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
							@include ('customertables.form', [
														'customertables' => $customertables,
                            'editflag'       => true,
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
@push('scripts')

  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
    app.controller('CustomerController',function($scope,$http){
      $scope.customertype="{{$customertables->customertype}}";
    });
  $(function() {
   $( "#pincode" ).autocomplete({
      source: function( request, response ) {
        $.ajax({
          url: "{{route('pincodesearch')}}",
          dataType: "json",
          data: {
            q: request.term
          },
          success: function( data ) {
            response( data );
          }
        });
      },
      minLength: 3,  // Set minum input length
      select: function( event, ui ) {
      	    //do something on select event
            var vl = ui.item.id;      
            var data = vl.split("-");
            console.log(data);
            $("#customercity").val(data[0]);
            $("#customerstate").val(data[2]);
            $("#customerstatecode").val(data[5]);
        //console.log(ui.item); // ui.item is  responded json from server
      },
      open: function() {
                 // D0 something on open event.
      },
      close: function() {
               // Do omething on close event
      }
    });
  });
  </script>
@endpush

