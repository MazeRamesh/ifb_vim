@extends('layout.app')

@section('content')
    <div id="invoice">
        <div class="panel panel-default" v-cloak>
            <div class="card card-primary">
                 <div class="card-header">
                    <h4 class="card-title">Upload Invoice   
                    <div class="pull-right">
                            <a href="{{ route('home') }}" class="btn btn-info btn-fill"><i class="fa fa-arrow-left"></i>  Back</a>
                        </div></h4>
        
                </div>
            </div>
           
           <!-- <br> 
            <br>
            <div style="padding-left:600px;">
                <label>Gross Weight:</label>
                <input type="text" name="grossweight"> 
                
                <label style="padding-left:10px;">Equipment:</label>
                <input type="text" name="equipment">
                    
                    </div> <br>-->
            
            
             <div class="panel">
                 
                 
                  <div class="container">
                      
                      @include('layout.partials.messages')
                      
                      <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
		
			<input type="file" name="import_file" accept=".xlsx, .xls, .csv, .CSV"/> <br> <br>
			<center><button class="btn btn-success btn-md">Import File</button></center>
            
           
            
		</form>
	</div>
 
                 </div>
    
        </div>
    </div>
@endsection

@push('scripts')
   
    
    <script src="/js/app.js"></script>
@endpush