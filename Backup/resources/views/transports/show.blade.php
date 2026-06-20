@extends('layouts.app')

@section('page-title','Transport View')
@section('masters','menu-open')
@section('transports','active')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transport</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('transports.transport.index') }}">Transport</a></li>
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
			<div class="col-12 mt-3">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title text-info clearfix">
						   <strong>{{ isset($title) ? $title : 'TRANSPORT DETAILS' }}</strong>
						   <div class="float-right">
            <form method="POST" action="{!! route('transports.transport.destroy', $transport->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('transports.transport.index') }}" class="btn btn-primary" title="Show All Transport">
                        <span class="fa fa-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('transports.transport.create') }}" class="btn btn-success" title="Create New Transport">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('transports.transport.edit', $transport->id ) }}" class="btn btn-info text-white" title="Edit Transport">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Transport" onclick="return confirm(&quot;Click Ok to delete Transport.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>
                        </h3>

    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-md-3">
          <p><strong>Transporter Id</strong></p>
          <p><strong>Transporter Name</strong></p>
          <p><strong>Transporter Type</strong></p>
          <p><strong>Vehicle No</strong></p>
          <p><strong>Vehicle Type</strong></p>
          <p><strong>Transport Document No</strong></p>
          <p><strong>Transport Mode</strong></p>
          <p><strong>Transport Distance</strong></p>
          <p><strong>Transport Document Date</strong></p>
          <p><strong>Entry Date</strong></p>
          <p><strong>Created By</strong></p>
          <p><strong>Company</strong></p>
        </div>
        <div class="col-md-9">
          <p>{{ $transport->transporterId }}</p>
          <p>{{ $transport->transporterName }}</p>
          <p>{{ $transport->transportertype }}</p>
          <p>{{ $transport->vehicleNo }}</p>
          <p>{{ $transport->vehicleType }}</p>
          <p>{{ $transport->transDocNo }}</p>
          <p>{{ $transport->transMode }}</p>
          <p>{{ $transport->transDistance }}</p>
          <p>{{ $transport->transDocDate }}</p>
          <p>{{ $transport->entrydate }}</p>
          <p>{{ $transport->createdby }}</p>
          <p>{{ optional($transport->company)->count }}</p>
        </div>
      </div>
    </div>
</div>
            </div>
          </div>
        </div>
      </section>
</div>


@endsection