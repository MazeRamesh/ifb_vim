@extends('layouts.app')
@section('content')

<div class="content-wrapper">

    
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card card-primary card-outline">
                     <form method="POST" action="{{ route('config.store') }}" accept-charset="UTF-8" id="create_emplayee_form" name="create_emplayee_form" class="form-horizontal">
                        {!! csrf_field() !!}
                        <div class="card-header">
                            <h3 class="card-title text-info clearfix">
                               <strong>Configuration</strong>
                               <div class="float-right">
                                    
                                                    </div>
                            </h3>
                        </div>
                        <div class="card-body">
        
            
    <div class="row">
        <div class="col-md-6 form-group">
                <label for="empcode" class="col-md-6 control-label"><b>e-Way Bill Serial Trail Key</b></label>
               <textarea  id="ewaybillserialkey" style="height:300px" name="ewaybillserialkey" class="form-control" required readonly>{{$configures[0]->ewaybillserialkey}}</textarea>
               
        </div>
        <div class="col-md-6 form-group">
            <label for="empname" class="col-md-6 control-label"><b>e-Way Bill Serial Trail Key</b></label>
             <textarea  id="ewaybillserialnewkey" style="height:300px" name="ewaybillserialnewkey" class="form-control" readonly>{{$configures[0]->ewaybillserialnewkey}}</textarea>
            
        </div>
        
        
        <div class="col-md-6 form-group">
            <label for="ewaybillusername" class="col-md-6 control-label" ><b>Company GSTIN Number</b></label>
         
                <input class="form-control" name="ewaybillusername" type="text" id="ewaybillusername" minlength="1" placeholder="Enter Company GSTIN    here..." value="{{$configures[0]->ewaybillusername}}" oninput="this.value = this.value.replace(/[^0-9a-zA-Z.]/g, '').replace(/(\..*)\./g, '$1');" readonly> 
        </div>

        <div class="col-md-6 form-group">
            <label for="ewaybilluserpassword" class="col-md-6 control-label"><b>URL</b></label>
                <input class="form-control" name="ewaybilluserpassword" type="text" id="ewaybilluserpassword" value="{{$configures[0]->ewaybilluserpassword}}" minlength="1" placeholder="Enter URL here..." readonly>
               
        </div>
       
</div>


                
                        </div>
                        <div class="card-footer clearfix text-center">
                            <input class="btn btn-primary btn-sm pr-4 pl-4" onclick="editewaybill()" type="button" value="Edit">
                                <input class="btn btn-success btn-sm pr-4 pl-4" type="submit" value="Update">
                        </div>
                    </form>
                </div><!--/. card -->
            </div>
        </div> <!--/. row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@push('scripts')
<!-- DataTables -->

<script>
function editewaybill() 
    {
    document.getElementById("ewaybillserialkey").readOnly = false;
    document.getElementById("ewaybillserialnewkey").readOnly = false;
    document.getElementById("ewaybillusername").readOnly = false;  
    document.getElementById("ewaybilluserpassword").readOnly = false;  
    }

</script>
@endpush