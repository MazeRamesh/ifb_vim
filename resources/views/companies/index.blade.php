@extends('layouts.app')
@section('page-title','Plants List')
@section('masters','menu-open')
@section('company','active')
@section('content')
<div class="content-wrapper">
  <!-- <div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Company</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Company List</li>
        </ol>
      </div>
    </div>
    </div>
  </div> -->
  @if(Session::has('success_message'))
  <div class="container pt-3">
  <div class="alert alert-success">
  <span><i class="fas fa-check"></i></span>
    {!! session('success_message') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
     <span aria-hidden="true">&times;</span>
    </button>
  </div>
  </div>
  @endif
  <section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12  mt-4">
          <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title clearfix text-info"><strong>PLANT</strong></h3>
            <!-- <div class="card-tools">
               <a href="{{ route('companies.company.create') }}" class="btn btn-sm pl-3 pr-3 bg-success float-right clearfix" title="Create New Customertables"  role="button">
               <span><i class="fas fa-plus"></i>Add</span>
                
              </a>
                           
            </div> -->
          </div>
          @if(count($companies) == 0)
          <div class="panel-body text-center">
            <h4>No Companies Available.</h4>
          </div>
          @else
          <div class="card-body panel-body-with-table">
             <div class="table-responsive">
          <table class="table table-striped dt-responsive" width="100%">
            <thead>
              <tr>
                <!-- <th>Code</th> -->
                <th>Company Name</th>
                <!-- <th>Mailing Name</th> -->
                <th>Plant Code</th>
                <th>Plant Name</th>
                <th>Address</th>
                <th>GSTINo</th>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
                <!-- <th>Email</th> -->
                <!-- <th>PhoneNo</th> -->
                <!-- <th>MobileNo</th> -->
                <!-- <th>Website</th> -->
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
            <tr>
              <!-- <td>{{ $company->cmpcode }}</td> -->
              <td>{{ $company->cmpname }}</td>
              <!-- <td>{{ $company->cmpmailingname }}</td> -->
              <td>{{ $company->plantcode }}</td>
               <td>{{ $company->plantname }}</td>
              <td>{{ $company->cmpaddress }}</td>
              <td>{{ $company->cmpgstino }}</td>
              <td>{{ $company->cmpcountry }}</td>
              <td>{{ $company->cmpstate }}</td>
              <td>{{ $company->cmpcity }}</td>
              <!-- <td>{{ $company->cmpemail }}</td> -->
              <!-- <td>{{ $company->cmpphoneno }}</td> -->
              <!-- <td>{{ $company->cmpmobileno }}</td> -->
              <!-- <td>{{ $company->cmpwebsite }}</td> -->
              <td>{{ $company->cmplogo }}</td>
              <td>
                <form method="POST" action="{!! route('companies.company.destroy', $company->id) !!}" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}
                <div class="btn-group btn-group-xs pull-right" role="group">
                <a href="{{ route('companies.company.show', $company->id ) }}" class="btn btn-warning btn-sm text-white" title="Show Company">
                <span class="fa fa-eye" aria-hidden="true"></span>
                </a>
                <a href="{{ route('companies.company.edit', $company->id ) }}" class="btn btn-sm btn-info text-white" title="Edit Company">
                <i class="fas fa-pencil-alt"></i>
                </a>
                <!-- <a href="{{ route('companies.company.destroy', $company->id ) }}" class="btn btn-sm btn-danger text-white" title="Delet Company">
                <i class="fas fa-trash"></i>
                </a> -->
                </div>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
          </table>
        </div>
            <div class="card-footer clearfix">
              {!! $companies->render() !!}
            </div>
          @endif
          </div>
          </div>
          </div> 
      </div>
    </div>
  </section>
</div>
@endsection
