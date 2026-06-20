{{--<!-- @extends('layouts.app')

@section('page-title','Transport List')
@section('masters','menu-open')
@section('transports','active')
@section('content')

<style>
div>table>tbody>tr:nth-child(4n+1) {
    background-color:#dcdcdc;
}
div>table>tbody>tr:nth-child(even)>td {
    border: none;
    padding: 0;
}
</style>
  <div class="content-wrapper">

	@if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="fa fa-ok"></span>
            {!! session('success_message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
       </div>
    @endif

    <section class="content">
      <div class="container-fluid">
      <div class="row">
			<div class="col-12 mt-3">
				<div class="card card-primary card-outline">
				   <div class="card-header">
						<h3 class="card-title text-info text-uppercase font-weight-bold clearfix">Transport List</h3>
						<div class="card-tools">
						   <a href="{{ route('transports.transport.create') }}" class="btn btn-sm pl-3 pr-3 bg-success float-right clearfix" title="Create New Location"  role="button">
                <span> <i class="fas fa-plus"></i>Add</span>
							</a>
                        
						</div>
					</div>
        <div class="card-body panel-body-with-table">
             <div class="table-responsive">
          <table class="table table-striped dt-responsive" width="100%">
                    <thead>
                        <tr>
                            <th> Id</th>
                            <th> Name</th>
                            <th> Type</th>
                            <th>Vehicle No</th>
                            <th>Vehicle Type</th>
                            <th>Transport Document No</th>
                            <th> Mode</th>
                            <th> Distance</th>
                            <th> Document Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($transports as $transport)
                        <tr>
                            <td>{{ $transport->transporterId }}</td>
                            <td>{{ $transport->transporterName }}</td>
                            <td>{{ $transport->transportertype }}</td>
                            <td>{{ $transport->vehicleNo }}</td>
                            <td>{{ $transport->vehicleType }}</td>
                            <td>{{ $transport->transDocNo }}</td>
                            <td>{{ $transport->transMode }}</td>
                            <td>{{ $transport->transDistance }}</td>
                            <td>{{ $transport->transDocDate }}</td>
                            <td>

                                <form method="POST" action="{!! route('transports.transport.destroy', $transport->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('transports.transport.show', $transport->id ) }}" class="btn btn-sm btn-warning text-white" title="Show Transport">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('transports.transport.edit', $transport->id ) }}" class="btn btn-sm btn-info text-white" title="Edit Transport">
                                           <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        
                                         @if(Gate::allows('super_admin'))

                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete Transport" onclick="return confirm(&quot;Click Ok to delete Transport.&quot;)">
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

             </div>
           </div>
						
					
				</div>
			</div>
		</div>
	  </div>
      </section>
      
        </div>
@endsection -->--}}
@extends('layouts.app')

@section('page-title','Transport List')
@section('masters','menu-open')
@section('transports','active')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Customers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Customers List</li>
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
      <div class="container-fluid ">
        <!-- Info boxes -->
        <div class="row">
      <div class="col-12 mt-3">
        <div class="card card-primary card-outline">
           <div class="card-header">
            <h3 class="card-title text-info clearfix"><strong>CUSTOMER LIST</strong></h3>
            <div class="card-tools">
               <a href="{{ route('transports.transport.create') }}" class="btn btn-sm pl-3 pr-3 bg-success float-right clearfix" title="Create New Customertables"  role="button">
                <span><i class="fas fa-plus"></i>Add</span>
              </a>
            </div>
          </div>
                   
          
          @if(count($transports) == 0)
            <div class="card-body text-center">
              <h4>No Customertables Available!</h4>
            </div>
          @else
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tr>
                              <th> Id</th>
                            <th> Name</th>
                            <th> Type</th>
                            <th>Vehicle No</th>
                            <th>Vehicle Type</th>
                            <th>Transport Document No</th>
                            <th> Mode</th>
                            <th> Distance</th>
                            <th> Document Date</th>
                            <th>Action</th>
                </tr>
                @foreach($transports as $transport)
                <tr>
                            <td>{{ $transport->transporterId }}</td>
                            <td>{{ $transport->transporterName }}</td>
                            <td>{{ $transport->transportertype }}</td>
                            <td>{{ $transport->vehicleNo }}</td>
                            <td>{{ $transport->vehicleType }}</td>
                            <td>{{ $transport->transDocNo }}</td>
                            <td>{{ $transport->transMode }}</td>
                            <td>{{ $transport->transDistance }}</td>
                            <td>{{ $transport->transDocDate }}</td>

                  <td>
                    <form method="POST" action="{!! route('transports.transport.destroy', $transport->id) !!}" accept-charset="UTF-8">
                      <input name="_method" value="DELETE" type="hidden">
                      {{ csrf_field() }}
                      <div class="btn-group btn-group-xs pull-right" role="group">
                        <a href="{{ route('transports.transport.show', $transport->id ) }}" class="btn btn-warning btn-sm text-white" title="Show Customertables">
                          <span class="fa fa-eye" aria-hidden="true"></span>
                        </a>
                        <a href="{{ route('transports.transport.edit', $transport->id ) }}" class="btn btn-info text-white btn-sm" title="Edit Customertables">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                                                
                                                @if(Gate::allows('super_admin'))

                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Customertables" onclick="return confirm(&quot;Delete Customertables?&quot;)">
                          <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                                                
                                                @endif
                                                
                      </div>
                    </form>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <div class="card-footer clearfix">
              {!! $transports->render() !!}
            </div>
          @endif
        </div><!--/. card -->
      </div>
    </div> <!--/. row -->
    </div><!--/. container-fluid -->
    </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
