@extends('layouts.app')

@section('page-title','Previleges List')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0 text-dark">Previleges</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Previleges List</li>
</ol>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
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
<div class="col-12">
<div class="card card-primary card-outline">
<div class="card-header">
<h3 class="card-title clearfix">Previleges</h3>
<div class="card-tools">
<a href="{{ route('previleges.previlege.create') }}" class="btn btn-sm pl-3 pr-3 bg-success float-right clearfix" title="Create New Previlege"  role="button">
<span class="fa fa-plus" aria-hidden="true"> Add</span>
</a>
</div>
</div>

@if(count($previleges) == 0)
<div class="card-body text-center">
<h4>No Previleges Available!</h4>
</div>
@else
<div class="card-body table-responsive p-0">
<table class="table table-hover">
<tr>
<th>Action</th>	
<th>Company</th>
<th>Priviledge Name</th>
<th>Priviledge Active</th>


</tr>
@foreach($previleges as $previlege)
<tr>
<td>
<form method="POST" action="{!! route('previleges.previlege.destroy', $previlege->id) !!}" accept-charset="UTF-8">
<input name="_method" value="DELETE" type="hidden">
{{ csrf_field() }}
<div class="btn-group btn-group-xs pull-right" role="group">
<a href="{{ route('previleges.previlege.show', $previlege->id ) }}" class="btn btn-info btn-sm" title="Show Previlege">
<span class="fa fa-eye" aria-hidden="true"></span>
</a>
<a href="{{ route('previleges.previlege.edit', $previlege->id ) }}" class="btn btn-primary btn-sm" title="Edit Previlege">
<span class="fas fa-pencil-alt" aria-hidden="true"></span>
</a>

<button type="submit" class="btn btn-danger btn-sm" title="Delete Previlege" onclick="return confirm(&quot;Delete Previlege?&quot;)">
<span class="fa fa-trash" aria-hidden="true"></span>
</button>
</div>
</form>
</td>	
<td>{{ optional($previlege->company)->created_at }}</td>
<td>{{ $previlege->priviledge_name }}</td>
<td>{{ $previlege->priviledge_active }}</td>


</tr>
@endforeach
</table>
</div><!--/. card-body -->
<div class="card-footer clearfix">
{!! $previleges->render() !!}
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
@endsection
