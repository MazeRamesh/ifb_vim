@extends('layouts.app')

@section('page-title','Role New')
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
<li class="breadcrumb-item"><a href="{{ route('roles') }}">Role List</a></li>
<li class="breadcrumb-item active">New</li>
</ol>
</div>
</div>
</div>
</div> -->

<!-- Main content -->

<section class="content">
<div class="container-fluid">
<!-- Info boxes -->
<div class="row">
<div class="col-12 mt-3">
<div class="card card-primary card-outline">
<form method="POST" action="{{ route('roles.store') }}" accept-charset="UTF-8" id="create_role_form" name="create_role_form" class="form-horizontal">
<div class="card-header">
<h3 class="card-title clearfix text-info text-uppercase font-weight-bold">
Create New Role
<div class="float-right">
<a href="{{ route('roles') }}" class="btn btn-primary btn-sm" title="Show All Role">
<span class="fa fa-th-list" aria-hidden="true"></span>
</a>
</div>
</h3>
</div>
<div class="card-body">
@if ($errors->any())
<ul class="alert alert-danger">
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
@endif

{{ csrf_field() }}
@include ('roles.form', [
'role' => null,
])


</div>
<div class="card-footer clearfix text-center">
<input class="btn btn-primary btn-sm pr-4 pl-4" type="submit" value="Add">
</div>
</form>
</div><!--/. card -->
</div>
</div> <!--/. row -->
</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
