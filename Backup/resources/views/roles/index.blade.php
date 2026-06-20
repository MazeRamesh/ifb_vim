@extends('layouts.app')

@section('page-title','Roles List')
@section('users','menu-open')
@section('roles','active')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- <div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0 text-dark">Role</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Role List</li>
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
<!-- Main content -->

<section class="content">
<div class="container-fluid">
<!-- Info boxes -->
<div class="row">
<div class="col-12 mt-3">
<div class="card card-primary card-outline">
    <div class="card-header" style="background-color: #535EE3;">
            <h3 class="card-title clearfix" style="color: white;">Roles</h3>
<div class="card-tools">
<!--<a href="{{ url('roles.roles.create') }}" class="btn btn-sm pl-3 pr-3 bg-success float-right clearfix" title="Create New Role"  role="button">
<span class="fa fa-plus" aria-hidden="true"> Add</span>
</a>-->
</div>
</div>
<div class="card-body">


@if(count($roles) == 0)
<div class="card-body text-center">
<h4>No Role Available!</h4>
</div>
@else
<div class="  table-responsive p-0">
<table class="table table-hover" id="reporttables">
    <thead>

    {{--<!-- <th>Company</th> -->--}}
    <th>Name</th>
    <th>Short Name</th>
    <th>Description</th>
    {{--<!-- <th>Clients Active</th> -->--}}
    <th>Action</th>	

    </thead>
    @foreach($roles as $role)
    <tr>
    <td>{{ $role->name }}</td>
    <td>{{ $role->display_name }}</td>
    <td>{{ $role->description }}</td>
    <td>
    <form method="POST" action="{!! route('roles.destroy', $role->id) !!}" accept-charset="UTF-8">
    <input name="_method" value="DELETE" type="hidden">
    {{ csrf_field() }}
    <div class="btn-group btn-group-xs " role="group">
    <a href="{{ route('roles.show', $role->id ) }}" class="btn btn-warning text-white btn-sm" title="Show Role">
    <span class="fa fa-eye" aria-hidden="true"></span>
    </a>
    <a href="{{ route('roles.edit', $role->id ) }}" class="btn btn-info text-white btn-sm" title="Edit Role">
    <span class="fas fa-pencil-alt" aria-hidden="true"></span>
    </a>

        <!-- @if(Gate::allows('super_admin'))
        
    <button type="submit" class="btn btn-danger btn-sm" title="Delete Role" onclick="return confirm(&quot;Delete Role?&quot;)">
    <span class="fa fa-trash" aria-hidden="true"></span>
    </button>
        
        @endif -->
        
    </div>
    </form>
    </td>	
    {{--<!-- <td>{{ optional($role->company)->created_at }}</td> -->--}}

    {{--<!-- <td>{{ $role->clients_active }}</td> -->--}}


    </tr>
    @endforeach
</table>
</div>
</div><!--/. card-body -->
<div class="card-footer clearfix">
{!! $roles->render() !!}
</div>
@endif
</div><!--/. card -->
</div>
</div> <!--/. row -->
</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@push('scripts')
<script>

$(function(){

$("#reporttables").DataTable({
"lengthChange": true,
"searching": true,
"ordering": true,
"info": true,
"paging":true,
"pageLength":5,
"autoWidth": true
        

});

});
</script>
@endpush

@endsection
