@extends('layouts.app')

@section('page-title','User Creation')
@section('users','menu-open')
@section('ucreation','active')
@section('content')

  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Creation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('usersetting') }}">Users</a></li>
              <li class="breadcrumb-item active">New</li>
            </ol>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
    <div class="row">
  <div class="col-12 mt-3">
				<div class="card card-primary card-outline">



                    <form action="{{ route('usersetting.update', $usersetting) }}" method="POST" id="myForm">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" value="{{ $usersetting->id }}">
                        <input type="hidden" value="{{csrf_token()}}" name="remember_token" />

                       <div class="card-header" style="background-color: #535EE3;">
            <h3 class="card-title clearfix" style="color: white;">Edit User
								   <div class="btn-group btn-group-sm float-right"  role="group">
										<a href="{{ route('usersetting') }}" class="btn btn-primary btn-sm" title="Show All Users">
											<span class="fa fa-th-list" aria-hidden="true"></span>
										</a>

										<a href="{{ route('usersetting.create') }}" class="btn btn-success btn-sm" title="Create New Users">
											<span class="fa fa-plus" aria-hidden="true"></span>
										</a>
									</div>
								</h3>
							</div>

<div class="card-body row">



          {{--<div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-4 control-label lab">Employee Code</label>
                <input  type="text" class="form-control" name="empcode" value="{{ old('empcode', $usersetting->empcode) }}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-4 control-label lab">Employee Name<b class="imp">*</b></label>
                <input  type="text" class="form-control" name="empname" value="{{ old('empname', $usersetting->empname) }}" required>
              </div>
            </div>--}}


  <div class="col-sm-6">
    <div class="form-group">
      <label class="col-sm-4 control-label lab">User Name<b class="imp">*</b></label>
      <input  type="text" class="form-control" name="username" value="{{ old('username', $usersetting->name) }}" oninput="this.value = this.value.replace(/[^0-9a-zA-Z.]/g, '').replace(/(\..*)\./g, '$1');" required>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="form-group">
    <label class="col-sm-4 control-label lab">Password<b class="imp">*</b></label>
    <input type="password" class="form-control" name="password" value="" required>
    </div>
  </div>
 {{--<div class="col-sm-6">
              <div class="form-group">
               <label  class="col-sm-4 control-label lab">Plant<b class="imp">*</b></label>
               <select class="form-control" id="user_plant" name="user_plant" required>
                        <option value="">Select Plant</option>
                    @foreach ($plants as $key => $plant)
                        <option value="{{ $plant->cmpgstino }}" {{ old('user_plant', optional($usersetting)->user_plant) == $key ? 'selected' : '' }}>
                            {{ $plant->plantcode }} - {{ $plant->plantname }}
                        </option>
                    @endforeach
                </select>
        </div>
      </div>--}}
<div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-4 control-label lab">Roles<b class="imp">*</b></label>
                 <select class="form-control" id="role_id" name="role_id" required>
                        <option value="">Select Plant</option>
                    @foreach ($roles as $key => $role)
                        <option value="{{ $role->id }}" {{ old('role_id', optional($usersetting)->role_id) == $key ? 'selected' : '' }}>
                            {{ $role->display_name }} - {{ $role->name }}
                        </option>
                    @endforeach
                </select>
              </div>
            </div>


<div class="col-sm-12">
<center>
<div class="form-group">

<input type="submit" class="btn btn-primary  btn-md" value="Update User">

</div></center>
</div>
</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      </section>
</div>

@section('createhandler')
<script>
		$(window).bind("beforeunload", function() {
            return "Are you sure? You didn't finish the form!";
        });

        $(document).ready(function() {
            $("#myForm").on("submit", function(e) {
                //check form to make sure it is kosher
                //remove the ev
                $(window).off("beforeunload");
                return true;
            });
        });
</script>
@endsection
@endsection
