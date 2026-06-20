@extends('layouts.app')

@section('page-title','Role Edit')
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
<li class="breadcrumb-item"><a href="{{ route('roles') }}">Role</a></li>
<li class="breadcrumb-item active">Edit</li>
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
<form method="POST" action="{{ route('roles.update', $role->id) }}" id="edit_role_form" name="edit_role_form" accept-charset="UTF-8" class="form-horizontal">
<div class="card-header">
<h3 class="card-title clearfix text-info text-uppercase font-weight-bold">
{{ !empty($title) ? $title : 'Edit Role Details' }}
<div class="btn-group btn-group-sm float-right"  role="group">
<a href="{{ route('roles') }}" class="btn btn-primary btn-sm" title="Show All Role">
<span class="fa fa-th-list" aria-hidden="true"></span>
</a>

<!-- <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm" title="Create New Role">
<span class="fa fa-plus" aria-hidden="true"></span>
</a> -->
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
<input name="_method" type="hidden" value="PUT">
@include ('roles.form', [
'role' => $role,
])

</div>
<div class="card-footer clearfix text-center">
<input class="btn btn-primary btn-sm pr-4 pl-4" type="submit" value="Update">
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
