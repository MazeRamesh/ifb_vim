@extends('layouts.app')

@section('page-title','Change password')
@section('password','menu-open')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Change password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Change password</li>
            </ol>
          </div>
        </div>
      </div>
    </div> -->

   <section class="content">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h4 class="card-title text-info font-weight-bold text-uppercase">Change password</h4>
                    </div>
                        {!! Form::open(['method' => 'PATCH', 'route' => ['auth.change_password']]) !!}
                        <!-- If no success message in flash session show change password form  -->
                        <div class="card-body">
                            @if(Session::has('success_message'))
                                <div class="alert alert-success">
                                    <span class="fa fa-ok"></span>
                                    {!! session('success_message') !!}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                               </div>
                            @endif
                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    {!! Form::label('current_password', 'Current password*', ['class' => 'col-sm-4 control-label']) !!} {!! Form::password('current_password', ['class' => 'form-control', 'placeholder' => '']) !!}
                                    <p class="help-block"></p>
                                </div>
                                <div class="col-md-6 form-group">
                                    {!! Form::label('new_password', 'New password*', ['class' => 'col-sm-4 control-label']) !!} {!! Form::password('new_password', ['class' => 'form-control ', 'placeholder' => '']) !!}
                                    <p class="help-block"></p>

                                </div>
                                <div class="col-md-6 form-group">
                                    {!! Form::label('new_password_confirmation', 'New password confirmation*', ['class' => 'col-sm-4 control-labell']) !!} {!! Form::password('new_password_confirmation', ['class' => 'form-control', 'placeholder' => '']) !!}
                                    <p class="help-block"></p>

                                </div>
                            </div>
                            <div class="text-center">
                              {!! Form::submit(trans('Save'), ['style' => 'background-color:green;border:0;color:white; padding-bottom: 3px;margin-top: 15px;padding-top: 0px;  padding-left: 30px;  padding-right: 30px;'], ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}
                            </div>


                        </div>
                       "
                </div>
            </div>
        </div>
  </section>
</div>



@stop

