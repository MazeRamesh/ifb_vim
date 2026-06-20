@extends('layout.app')
@section('users','menu-open')
@section('ucreation','active')
@section('content')
    <div id="invoice">
        <div class="panel panel-default" v-cloak>
            <div class="card card-primary">
                 <div class="card-header">
                    <h4 class="card-title">Upload Users   
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
                      
                      <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('uploadUsers') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
		
			<input type="file" name="import_file" accept=".xlsx, .xls, .csv, .CSV"/> <br> <br>
			<center><button class="btn btn-success btn-md">Import File</button></center>
            
           
            
		</form>
                      
                      <div style="padding-top:20px;">
                          
                          <b>Note :</b><br>
                          
                          <p>
                          
                              1). Formats supported are .xlsx, .xls, .csv, and .CSV <br>
                              2). First Row is Title Part. <br>
                              3). Second Row 1st column 2nd column and 3rd column are required.<span style="color:red">*</span> <br>
                              <span style="padding-left:20px;">(if create Dealerlogin,BranchLogin,RegionalManagerLogin, or ReportViewerLogin 4th column is required.<span style="color:red">*</span>)</span><br>
                              4). Rold ID is number field. It will be 1 to 6 only. Example given below.<br>
                              <span style="padding-left:20px;">1 - Super Administrator (Full Rights), 2 - Administrator (can create other users), 3 - Branch_Login, 4 - Report_Viewer_Login, 5 - WareHouse_Person_Login,</span><br><span style="padding-left:20px;">6 - Dealer_Login, 7 - Regional_Manager_Login </span> 
                          
                          </p>
                          
                          <img src="{{asset('uploadUser.PNG')}}">
                          
                          
                      
                
                      </div>
                      
	</div>
 
                 </div>
    
        </div>
    </div>
@endsection

@push('scripts')
   
    
    <script src="/js/app.js"></script>
@endpush