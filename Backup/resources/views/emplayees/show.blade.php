@extends('layouts.app')

@section('page-title','Employee View')
@section('masters','menu-open')
@section('employee','active')
@section('content')
  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('emplayees.emplayee.index') }}">Employee</a></li>
              <li class="breadcrumb-item active">View</li>
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
			<div class="col-12 pt-4">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title text-info clearfix">
						   <strong>{{ isset($title) ? $title : 'EMPLOYEE DETAILS' }}</strong>
                              <div class="float-right">
            <form method="POST" action="{!! route('emplayees.emplayee.destroy', $emplayee->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
               <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('emplayees.emplayee.index') }}" class="btn btn-primary" title="Show All Emplayee">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('emplayees.emplayee.create') }}" class="btn btn-success" title="Create New Emplayee">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('emplayees.emplayee.edit', $emplayee->id ) }}" class="btn btn-info text-white" title="Edit Emplayee">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Emplayee" onclick="return confirm(&quot;Click Ok to delete Emplayee.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
                                  </form></div> 
                        </h3>
                        

    </div>

    <div class="card-body">
      <div class="card-text">
            
            <dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Code</dt>
            <dd class="col-md-8 col-sm-6">{{ $emplayee->empcode }}</dd>
		      </dl>
          
          <dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Name</dt>
            <dd class="col-md-8 col-sm-6">{{ $emplayee->empname }}</dd>
		      </dl>
          
          <dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Company</dt>
            <dd class="col-md-8 col-sm-6">{{ $emplayee->company }}</dd>
		      </dl>
          
          <dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Email</dt>
            <dd class="col-md-8 col-sm-6">{{ $emplayee->empemail }}</dd>
		      </dl>
          
          <dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Mobile</dt>
            <dd class="col-md-8 col-sm-6">{{ $emplayee->empmobile }}</dd>
		      </dl>
          
          <dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Address</dt>
            <dd class="col-md-8 col-sm-6">{{ $emplayee->empaddress }}</dd>
		      </dl>
          
          <dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> City</dt>
            <dd class="col-md-8 col-sm-6">{{ $emplayee->empcity }}</dd>
		      </dl>
          
          <dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Place</dt>
            <dd class="col-md-8 col-sm-6">{{ $emplayee->empplace }}</dd>
		      </dl>
          
          <dl class="row lp-2">
            <dt class="col-md-3 col-sm-5"> Status</dt>
            <dd class="col-md-8 col-sm-6">{{ $emplayee->empstatus }}</dd>
		      </dl>
          
         
        </div>
    </div>
</div>
                
            </div>
          </div>
        </div>
      </section>
</div>


@endsection