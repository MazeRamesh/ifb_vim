@extends('layouts.app')

@section('page-title','Material Details List')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div id="layoutSidenav_content">

      <div class="container-fluid pt-3">
             <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 nopadding  print-shape">
                  <div class="card-header toll-free" style="width:250px;">
                        <span class="toll-free"> Material Details</span>
                  </div>
              </div>
				<div class="card card-primary card-outline  mb-4 mt-2">
				   <div class="card-header">
						<h3 class="card-title clearfix">List</h3>
						<div class="card-tools">
						   <a href="{{ route('material_details.material_detail.create') }}" class="btn btn-sm pl-3 pr-3 bg-success float-right clearfix" title="Create New Material Detail"  role="button">
							    Add
                            </a>
                            <a href="{{asset('ExcelImport_sampleFiles/Sample BASF HMIL Material Detail Import.xlsx')}}" class="btn btn-info btn-sm mr-3">
                                Sample Import</a>
						</div>
					</div>

						<div class="card-body table-responsive">
                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <span class="fa fa-ok"></span>
                                    {{ $error }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endforeach
                            @endif
                        <form action="{{route('material_details.material_detail.import-excel')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for='import_file' class="col-md-3 col-sm-6 control-label">Bulk Upload<span class="text-danger">*</span></label>
                                        <div class="col-md-9 col-sm-6 float-right">
                                            <input class="form-control {{ $errors->has('import_file') ? 'is-invalid' : '' }}" name='import_file' type="file" id='import_file' required minlength="1" placeholder="Enter part no here...">
                                            {!! $errors->first('import_file', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-success">Import</button>
                                    </div>
                                </div>
                            </form>
							<table class="table table-sm table-hover" style="width:100%" id="materialDetails-table">
								<thead>
									<tr>
												<th>Material Code</th>
		<th>Part No</th>
		<th>Customer Part No</th>
		<th>Shop Code</th>
		<th>Shop</th>
		<th>Gate</th>
		<th>Box Qty</th>
		<th>Plant Code</th>
		<th>Hsn Code</th>
		<th>Gst In</th>
		<th>Product Desc</th>

										<th>Action</th>
									</tr>
								</thead>
							</table>
						</div><!--/. card-body -->
				</div><!--/. card -->
			</div>
		</div> <!--/. row -->
	  </div><!--/. container-fluid -->
    </section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


@push('scripts')
<!-- DataTables -->

<script>
    $(function() {
		$('#materialDetails-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('get.materialDetail.data') !!}',
            columns: [
										{ data: 'material_code', name: 'material_code' },
						{ data: 'part_no', name: 'part_no' },
						{ data: 'customer_part_no', name: 'customer_part_no' },
						{ data: 'shop_code', name: 'shop_code' },
						{ data: 'shop', name: 'shop' },
						{ data: 'gate', name: 'gate' },
						{ data: 'box_qty', name: 'box_qty' },
						{ data: 'plant_code', name: 'plant_code' },
						{ data: 'hsn_code', name: 'hsn_code' },
						{ data: 'gst_in', name: 'gst_in' },
						{ data: 'product_desc', name: 'product_desc' },

				{ data: 'actions', name: 'actions', orderable: false, searchable: false}
            ]
        }).on('click', '.btn-delete[data-remote]', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            var url = $(this).data('remote');
            // confirm then
            if (confirm('Are you sure you want to delete this materialDetail?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {method: '_DELETE', submit: true}
                }).always(function (data) {
                        $('#materialDetails-table').DataTable().draw(false);
                    }
                );
            }
        });
    });

</script>
@endpush

