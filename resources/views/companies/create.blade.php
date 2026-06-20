@extends('layouts.app')

@section('page-title','New Plant')
@section('masters','menu-open')
@section('company','active')
@section('content')
  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Customertables New</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('customertables.customertables.index') }}">Customertables</a></li>
              <li class="breadcrumb-item active">New</li>
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
			<div class="col-12">
				<div class="card card-primary card-outline mt-3">
					<form method="POST" action="{{ route('companies.company.store') }}" accept-charset="UTF-8" id="create_customertables_form" name="create_customertables_form" class="form-horizontal">
						<div class="card-header">
							<h3 class="card-title clearfix text-info">
							   <strong>CREATE NEW PLANT</strong>
							   <div class="float-right">
									<a href="{{ route('companies.company.index') }}" class="btn btn-primary btn-sm" title="Show All Customertables">
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
            @include ('companies.form', [
                                        'company' => null,
                                      ])

              	
						</div>
						<div class="card-footer clearfix text-center">
								<input class="btn btn-primary btn-sm pr-4 pl-4" type="submit" value="ADD">
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
            $("#cmpcity").val(data[0]);
            $("#cmpstate").val(data[2]);
            $("#statecode").val(data[5]);
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
