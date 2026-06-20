@extends('layouts.app')

@section('page-title','PO List')
@section('po','menu-open')
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
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark ">Purchase Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item active">PO List</li>
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
    @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </li>
                                    @endforeach

                                </ul>
                            @endif
    <!-- Main content -->
	
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
			<div class="col-12 mt-3">
				<div class="card card-primary card-outline">
				   <div class="card-header">
						<h3 class="card-title clearfix text-info font-weight-bold text-uppercase">Purchase Order List</h3>
						<div class="card-tools">
						   <a href="{{ route('poheaders.poheader.create') }}" class="btn btn-sm pl-3 pr-3 bg-success float-right clearfix" title="Create New Location"  role="button">
								<span><i class="fas fa-plus"></i> Add</span>
							</a>
                        
						</div>
					</div>
                   
        <div class="card-body card-body-with-table table-responsive p-0">
            <div class="card-body table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Date</th>
                            <th>Customer Code</th>
                            <th>Taxable Amount</th>
                            <th>Freight Charges</th>
                            <th>Packing Charges</th>
                            <th>Other Charges</th>
                            <th>Discount</th>
                            <th>Taxamount</th>
                            <th>Grandtotalamount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($poheaders as $poheader)
                        <tr>
                            <td>{{ $poheader->pono }}</td>
                            <td>{{ $poheader->podate }}</td>
                            <td>{{ $poheader->customercode_id }}</td>
                            <td>{{ $poheader->taxableamounts }}</td>          
                            <td>{{ $poheader->Freight_amt }}</td>          
                            <td>{{ $poheader->Packing_amt }}</td>          
                            <td>{{ $poheader->otheramount }}</td>          
                            <td>{{ $poheader->discountamount }}</td>          
                            <td>{{ $poheader->taxamounts }}</td>          
                            <td>{{ $poheader->grandtotalamount }}</td>
                            <td>
                                <form method="POST" action="{!! route('poheaders.poheader.destroy', $poheader->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('poheaders.poheader.show', $poheader->id ) }}" class="btn btn-sm btn-info" title="Show Poheader">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('poheaders.poheader.edit', $poheader->id ) }}" class="btn btn-sm btn-primary" title="Edit Poheader">
                                           <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        
                                         @if(Gate::allows('super_admin'))

                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete Poheader" onclick="return confirm(&quot;Click Ok to delete Poheader.&quot;)">
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
           </div><!--/. card-body -->
						
					
				</div><!--/. card -->
			</div>
		</div> <!--/. row -->
	  </div><!--/. container-fluid -->
      </section>
      
        </div>

  <!-- /.content-wrapper -->
@endsection