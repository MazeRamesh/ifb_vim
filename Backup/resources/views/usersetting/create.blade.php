@extends('layouts.app')

@section('page-title','User Creation')
@section('users','menu-open')
@section('ucreation','active')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 mt-3">
        <div class="card card-primary card-outline">
          <form action="{{ route('usersetting.store') }}" method="POST" id="myForm" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" value="{{csrf_token()}}" name="remember_token" />
            <div class="card-header" style="background-color: #535EE3;">
            <h3 class="card-title clearfix" style="color: white;">Create User
            <div class="float-right">
            <a href="{{ route('usersetting') }}" class="btn btn-primary btn-sm" title="Show All Users">
            <span class="fa fa-th-list" aria-hidden="true"></span>
            </a>
            </div>
            </h3>
            </div>
            <div class="row card-body">
{{--<!--  <div class="col-sm-6">
            <div class="form-group">
              <label class="col-sm-4 control-label">Select Employee</label>
              <select ng-model="choose_employee"  class="form-control" id="choose_employee" name="choose_employee" required>
              <option value="" disabled selected>Select Employee</option>
              @foreach ($employee as $key => $employeeee)
              <option value="{{ $employeeee->empcode }}" {{ old('employeeee') }}>
              {{ $employeeee->empcode}} - {{$employeeee->empname}}
              </option>
              @endforeach
              </select>
            </div>
            </div> -->--}}

            {{--<div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-4 control-label lab">Employee Code</label>
                <input ng-value="choose_employee"  type="text" class="form-control" name="empcode" value="">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-4 control-label lab">Employee Name<b class="imp">*</b></label>
                <input ng-value="choose_employee"  type="text" class="form-control" name="empname" value="" required>
              </div>
            </div>--}}
            <div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-4 control-label lab">User Name<b class="imp">*</b></label>
                <input ng-value="choose_employee"  type="text" class="form-control" name="username" value="" required>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label  class="col-sm-4 control-label lab">Password<b class="imp">*</b></label>
                <input  type="password" class="form-control" name="password" value="" required>
              </div>
            </div>
            {{--<div class="col-sm-6">
              <div class="form-group">
               <label  class="col-sm-4 control-label lab">Plant<b class="imp">*</b></label>
               <select class="form-control" id="user_plant" name="user_plant" required>
                        <option value="" style="display: none;" disabled selected>Select Plant</option>
                    @foreach ($plants as $key => $plant)
                        <option value="{{ $plant->cmpgstino }}">
                            {{ $plant->plantcode }} - {{ $plant->plantname }}
                        </option>
                    @endforeach
                </select>
        </div>
      </div>--}}
      <div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-4 control-label">Roles</label>
                 <select class="form-control" id="role_id" name="role_id" required>
                        <option value="" style="display: none;" disabled selected>Select Role</option>
                    @foreach ($roles as $key => $role)
                        <option value="{{ $role->id }}">
                            {{ $role->display_name }} - {{ $role->name }}
                        </option>
                    @endforeach
                </select>
              </div>
            </div>
               <!-- <div class="col-sm-6">
              <div class="form-group">
                <label  class="col-sm-4 control-label">Plant Name</label>
                <input  type="text" class="form-control" name="password" value="{{ old('password') }}" required>
              </div>
            </div> -->
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary  btn-md" value="Create User">
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
