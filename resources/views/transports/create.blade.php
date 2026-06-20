@extends('layouts.app')

@section('page-title','Transport New')
@section('masters','menu-open')
@section('transports','active')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transport New</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('transports.transport.index') }}">Transport</a></li>
              <li class="breadcrumb-item active">New Transport</li>
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
					<form method="POST" action="{{ route('transports.transport.store') }}" accept-charset="UTF-8" id="create_transport_form" name="create_transport_form" class="form-horizontal">
						<div class="card-header">
							<h3 class="card-title text-info clearfix">
							   <strong>CREATE NEW SALES</strong>
							   <div class="float-right">
									<a href="{{ route('transports.transport.index') }}" class="btn btn-primary btn-sm" title="Show All products">
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
            @include ('transports.form', [
                                        'transport' => null,
                                      ])
</div>
                <div class="form-group">
                    <div class="card-footer clearfix text-center">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>
                </div>

            </form>

        </div>


@endsection


