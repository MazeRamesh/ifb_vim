
@extends('layouts.app')

@section('page-title','Customertables List')
@section('masters','menu-open')
@section('customer','active')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Customertables</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item active">Customertables List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
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
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
			<div class="col-12">
				<div class="card card-primary card-outline">
				   <div class="card-header">
						<h3 class="card-title clearfix">Import Customer</h3>
                       
						
					</div>
                   
					
					  <div class="panel">
                 
                 
                  <div class="container">
                      
                  
                      <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('customertables.customertables.customertablesExcelImport') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
		
			<input type="file" name="import_file" accept=".xlsx, .xls, .csv, .CSV"/> 
                          <a href="{{ asset('ExcelImport_sampleFiles/ExcelImportCustomer_Master.xls') }}" download>
                          <span class="fa fa-download pull-right" aria-hidden="true" title="Download Sample File"></span></a>
                          <br> <br>
			<center><button class="btn btn-success btn-md">Import File</button></center>
            
           
            
		</form>
	</div>
 
                 </div>
			
					
				</div><!--/. card -->
			</div>
		</div> <!--/. row -->
	  </div><!--/. container-fluid -->
    </section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection









