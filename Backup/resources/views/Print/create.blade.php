@extends('layouts.app')
@section('page-title','Print Invoice')
@section('print','menu-open')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Print Invoice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('salesheaders.salesheader.index') }}">Sales</a></li>
              <li class="breadcrumb-item active">Print Invoice</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
	
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
			<div class="col-12">
				<div class="card card-primary card-outline">

                    <form role="form" action="{{ route('print.printbarcode') }}" method="POST" id="myForm" autocomplete="off">
                        {!! csrf_field() !!}
                        <div class="card-body">
                            
                            
                            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
      
                         <label >From Date: </label> 
                               <input  style="width: 40%" class="form-control" type="text" id="fromdate">
                        
                  </div>
                  </div>
                                
                                <div class="col-md-3">
                                <div class="form-group">
                               <label >To Date: </label> 
                               <input  style="width: 40%" class="form-control" type="text" id="todate">
                                </div>
                                </div>
                                
                                 <div class="col-md-3">
                                <div class="form-group">
                               <label >Invoice To: </label> 
                               <input class="form-control" type="text" name="invoiceto" id="invoiceto" readonly>
                                </div>
                                </div>
                                
                  </div>
                            
                             <div class="row">
              <div class="col-md-6">
                <div class="form-group">
      
                         <label >Invoice No: </label> 
                                <select  class="form-control" id="invnum" name="invoicenumber" onchange="checkinvoiceto();"  required>
                                  <option value="" disabled selected>--- select ---</option>
								</select>
                        
                  </div>
                  </div>
                                 
                                
                                 
                                 <div class="col-md-3">
                                <div class="form-group">
                                <label >Select Copies: </label> 
                                <select class="form-control" name="selectcopy"  required>
                                  <option value="All">All</option>
                                  <option value="ORIGINAL">Original</option>
                                  <option value="DUPLICATE">Duplicate</option>
                                  <option value="TRIPLICATE">Triplicate</option>
                                  <option value="EXTRA">Extra</option>
								</select>
                                </div>
                                </div>
                                 
                                 
                                 
                                 
                  </div>
                       
                            
                      
                            
                          
                        
                         
                            </div>
                           
                            

                        
<center>                            <div class="form-group">
                            <p>
                            <input type="submit" class="btn btn-success btn-md" id="printbtn" value="Print">
                                
                            <input type="button" onclick="Reset();"  class="btn btn-danger btn-md clearAll" id="btnReset" value="Reset">
                                
                             <a href="{{ route('home') }}" class="btn btn-warning btn-md">Cancel</a>
                                
                            </p>
                        </div>
    </center>
                       
                        
                      
                        
                    </form>
                </div>
                
                </div>
                
            </div>
        </div>
      </section>
      
</div>
@section('createhandler')
@push('scripts')
<script>
    
    var fromdate = "dd/mm/yyyy";
    var today   = new Date();
    var date = today.getMonth()+1+'/'+(today.getDate())+'/'+today.getFullYear();
    // var a =today.getDate();
    // var b =today.getMonth()+1;
    // var c =today.getFullYear();
    // var from_date=a+b+c;
    //console.log(date);
    //var to_date   =today;
    $("#fromdate").val(date);
     $("#todate").val(date);
    
    $(function() {
        
$('#invoicenumber').select2({
                width: '50%',
                allowClear: true
                
            });
    });
    
     function Reset() {
        
       $("#invoicenumber").val('').trigger('change');
	   $("#fromdate").val('').trigger('change');
	   $("#todate").val('').trigger('change');
	   $("#invnum").val('').trigger('change');
    }
    $("#fromdate").datepicker({maxDate: today,minDate: '-12M'},{
            

                "onSelect": function(date) {
                   $("#todate").datepicker('option','minDate',$(this).val());
                    $.post("{{route('getinvoicenum')}}",
                    {
                        fromdate: date,
                        todate: $("#todate").val(),
                        _token: '{{csrf_token()}}'
                    },
                    function(data,status){
                      if(status=="success")
                      {
                        $("#invnum").html('');
                        $("#invnum").append("<option disabled selected>----select----</option>");
                        $.each(data,function(i,item){
                          $("#invnum").append("<option value='"+item.invoiceno+"'>"+item.invoiceno+"</option>");
                        });
                      }  
                    }); 
                }
            }).change(function() {
               $("#todate").datepicker('option','minDate',$(this).val());
                $.post("{{route('getinvoicenum')}}",
                    {
                        fromdate: $(this).val(),
                        todate: $("#todate").val(),
                        _token: '{{csrf_token()}}'
                    },
                    function(data,status){
                      if(status=="success")
                      {
                        $("#invnum").html('');
                        $("#invnum").append("<option disabled selected>----select----</option>");
                        $.each(data,function(i,item){
                          $("#invnum").append("<option value='"+item.invoiceno+"'>"+item.invoiceno+"</option>");
                        });
                      }  
                    });
            });

            $("#todate").datepicker({maxDate: today,minDate: '-12M'},{
                "onSelect": function(date) {
                    $("#fromdate").datepicker('option','maxDate',$(this).val());
                    $.post("{{route('getinvoicenum')}}",
                    {
                        fromdate: $("#fromdate").val(),
                        todate: date,
                        _token: '{{csrf_token()}}'
                    },
                    function(data,status){
                      if(status=="success")
                      {
                        $("#invnum").html('');
                        $("#invnum").append("<option disabled selected>----select----</option>");
                        $.each(data,function(i,item){
                          $("#invnum").append("<option value='"+item.invoiceno+"'>"+item.invoiceno+"</option>");
                        });
                      }  
                    });
                }
            }).change(function() {
              $("#fromdate").datepicker('option','maxDate',$(this).val());
               $.post("{{route('getinvoicenum')}}",
                    {
                        fromdate: $("#fromdate").val(),
                        todate: $(this).val(),
                        _token: '{{csrf_token()}}'
                    },
                    function(data,status){
                      if(status=="success")
                      {
                        $("#invnum").html('');
                        $("#invnum").append("<option disabled selected>----select----</option>");
                        $.each(data,function(i,item){
                          $("#invnum").append("<option value='"+item.invoiceno+"'>"+item.invoiceno+"</option>");
                        });
                      }  
                    });
            });
    
    
function checkinvoiceto()
    {
       
          $.post("{{route('checkinvoiceto')}}",
                        {
                            invoiceno: $("#invnum").val(),
                            _token: '{{csrf_token()}}'
                        },
                        function(data)
                        {
                            console.log(data);
                          $("#invoiceto").val(data.invoiceto);
                        }
                );
        
    }

 $("#todate").trigger('change');
</script>
@endpush

@endsection
@endsection

