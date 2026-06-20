@extends('layouts.app')

@section('page-title','Drop Downs List')
@section('masters','menu-open')
@section('dropdown','active')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Drop Downs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item active">Drop Downs List</li>
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
        @foreach(config('constants.options_from_db') as $key =>$option )
				<div class="card card-primary card-outline">
				   <div class="card-header">
						<h3 class="card-title clearfix text-uppercase text-info font-weight-bold">Options For {{$key}} </h3>
						<div class="card-tools">
						   <button  class="add_dropdown btn btn-sm pl-3 pr-3 bg-success float-right clearfix" title="Create New Drop Downs" option_name="{{$option}}" role="button">
								<span ><i class="fas fa-plus"></i> Add</span>
							</button>
						</div>
					</div>
					
						<div class="card-body table-responsive">
							<table class=" table-striped table-sm table-hover dropDownsObjects-table" role="{{$option}}" style="width:100%">
								<thead>
									<tr>
										<th>Fieldsname</th>
		                <th>Option value</th>
										<th>Action</th>
									</tr>
								</thead>
							</table>
						</div><!--/. card-body -->
				</div><!--/. card -->
        @endforeach
			</div>
		</div> <!--/. row -->
	  </div><!--/. container-fluid -->
    </section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <div class="modal fade " id="dropDown_Modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <form id="option_form" method="post" action="{{route('drop_downs.drop_downs.store')}}">
          @csrf
          <input type="hidden" id="fieldsname" name="fieldsname"/>
        <div class="modal-header">
          <h4 class="modal-title">Create a <span id="modal-header-name"></span> DropDown</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="form-group clearfix">
                <label for="option" class="col-md-3 col-sm-6 control-label">Option</label>
                <div class="col-md-9 col-sm-6 float-right">
                    <input class="form-control " name="optionvalue" type="text" id="optionvalue" minlength="1" placeholder="Enter Value here...">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <div class="modal fade " id="dropDown_Modal_forUpdate" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update a <span id="modal-header-name"></span> DropDown</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
@endsection


@push('scripts')
<!-- DataTables -->

<script>
    $(function() {
      array_of_dropdowns=@json(array_values(config('constants.options_from_db')));
      selected_index=0;
      $.each($('.add_dropdown'),function(index, button){
        $(button).on('click',function(){
          $("#modal-header-name").html(array_of_dropdowns[index]);
          $("#fieldsname").val(array_of_dropdowns[index]);
          $("#option_form")[0].reset();
          $("#dropDown_Modal").modal('show');
          selected_index=index;
        });
      });
      // $("#option_form").on('submit',function(event){
      //   event.preventDefault();
      //   $.post($(this).attr('action'),function(data){
      //     refreshTable(selected_index);
      //   });
      // });
      $.each($('.dropDownsObjects-table'),function(index, table){
        $(table).DataTable({
            processing: true,
            serverSide: true,
            ajax: {'url':'{!! route('get.dropDowns.data') !!}',
                   'data':function(d){
                    d.option_name=array_of_dropdowns[index];
                    return d;
                   }},
            columns: [
                    { data: 'fieldsname', name: 'fieldsname' },     
            { data: 'optionvalue', name: 'optionvalue' },     

        { data: 'actions', name: 'actions', orderable: false, searchable: false}
            ]
        }).on('click', '.btn-delete[data-remote]', function (e) { 
            e.preventDefault();
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            var url = $(this).data('remote');
            // confirm then
            if (confirm('Are you sure you want to delete this dropDowns?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {method: '_DELETE', submit: true}
                }).always(function (data) {
                        console.log(index);
                       refreshTable(index);
                    }
                );
            }
        });  
    }
    );
    });
    function refreshTable(index)
    {
       $.each($('.dropDownsObjects-table'),function(inner_index, table){
          if(index==inner_index)
            $(table).DataTable().draw(false);
        });
    }
</script>
@endpush