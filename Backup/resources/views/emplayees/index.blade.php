@extends('layouts.app')

@section('page-title','Employee List')
@section('masters','menu-open')
@section('employee','active')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Employee Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item active">Employee List</li>
            </ol>
          </div>
        </div>
      </div>
    </div> -->
    <!-- /.content-header -->
  @if(Session::has('success_message'))
  <div class="container pt-3">
        <div class="alert alert-success">
            <span class="fa fa-ok"></span>
            {!! session('success_message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
       </div>
    </div>
    @endif
    <!-- Main content -->
	
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
			<div class="col-12 pt-4">
				<div class="card card-primary card-outline">
				   <div class="card-header">
						<h3 class="card-title clearfix text-info"><strong>EMPLOYEE LIST</strong></h3>
                       
						<div class="card-tools">
						   <a href="{{ route('emplayees.emplayee.create') }}" class="btn btn-sm pl-3 pr-3 bg-success float-right clearfix" title="Create New Customertables"  role="button">
               <span><i class="fas fa-plus"></i>Add</span>
                <!-- <i class="fas fa-plus-square"></i> -->
							</a>
                           
						</div>
					</div>
                   
        @if(count($emplayees) == 0)
            <div class="panel-body text-center">
                <h4>No Employee Available.</h4>
            </div>
        @else
        <div class="card-body  panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Employee Code</th>
                            <th>Name</th>
                            <th>Plant Code</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Status</th>
                            <!-- <th>Place</th> -->
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($emplayees as $emplayee)
                        <tr>
                            <td>{{ $emplayee->empcode }}</td>
                            <td>{{ $emplayee->empname }}</td>
                            <td>{{ $emplayee->empplant }}</td>
                            <td>{{ $emplayee->empemail }}</td>
                            <td>{{ $emplayee->empmobile }}</td>
                            <td>{{ $emplayee->empaddress }}</td>
                            <td>{{ $emplayee->empstatus }}</td>
                            <!-- <td>{{ $emplayee->empplace }}</td> -->
                            <!-- <td>{{ $emplayee->empstatus }}</td> -->

                            <td>

                                <form method="POST" action="{!! route('emplayees.emplayee.destroy', $emplayee->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('emplayees.emplayee.show', $emplayee->id ) }}" class="btn btn-sm btn-warning text-white" title="Show Emplayee">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('emplayees.emplayee.edit', $emplayee->id ) }}" class="btn btn-sm btn-info text-white" title="Edit Emplayee">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        
                                         @if(Gate::allows('super_admin'))

                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete Emplayee" onclick="return confirm(&quot;Click Ok to delete Emplayee.&quot;)">
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
							{!! $emplayees->render() !!}
						</div>
					@endif
				</div><!--/. card -->
			</div>
		</div> <!--/. row -->
	  </div><!--/. container-fluid -->
	  </div><!--/. container-fluid -->
    </section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
