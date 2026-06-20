@extends('layouts.app')

@section('page-title','User List')
@section('users','menu-open')
@section('ucreation','active')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
      
        <section class="content">
      <div class="container-fluid">

    <div class="row">
        
        			<div class="col-12 mt-3">
				<div class="card card-primary card-outline">
				   <div class="card-header" style="background-color: #535EE3;">
            <h3 class="card-title clearfix" style="color: white;">Users</h3>
						<div class="card-tools">
                            
                             <a href="{{ route('usersetting.create') }}" class="btn btn-sm pl-3 pr-3 bg-success float-right text-white clearfix" title="Create New Plants"  role="button">
								<span><i class="fas fa-plus"></i> Add</span>
							</a>
                            <!-- <a href="{{  route('user.import') }}" class="btn btn-sm pl-3 pr-3 bg-info float-right clearfix" title="Create New Plants"  role="button">
								<span class="fa fa-upload" aria-hidden="true"> Import</span>
							</a>-->
						   
						</div>
					</div>
                    

                <div class="card-body table-responsive">
                    <table class="table table-hover table-striped" id="userTable">
                        <thead>
                            <tr>
                                                                
                                <th class="text-center">User Name</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
       
                            @foreach($usersetting as $usersettings)
                                <tr>
                                    
                                                                       
                                    <td class="text-center">
                                       {{$usersettings->name}}
                                    </td>
                                                                        
                                    <td class="text-center">
                                       {{$usersettings->MappedUsers->name}}
                                    </td>
                                
                                    <td class="text-center">
                                        <a href="{{ route('usersetting.edit', $usersettings) }}" class="btn btn-warning text-white btn-simple btn-sm">
                                            <i class="fas fa-pencil-alt"></i> 
                                        </a>
                                        
                                         @if(Gate::allows('super_admin'))
                                        
                                        <a href="{{ route('usersetting.destroy', $usersettings) }}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-simple btn-sm">
                                            <i class="fas fa-times"></i>
                                        </a>
                                        
                                        @endif
                                        
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
      </section>
</div>



@push('script')
<script>
$(function(){
       
        $("#userTable").DataTable({
           
              "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
           
      "autoWidth": true,
            
                     
        });
    
    });
</script>
@endpush
@endsection