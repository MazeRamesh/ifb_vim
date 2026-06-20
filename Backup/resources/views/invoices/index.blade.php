@extends('layout.app')
@section('pagename','Report Master')
@section('pagename1','Report Master')
@section('mastermenu','menu-open')
@section('partmaster','active')
@section('content')

    <div class="row">
        <div class="col-md-12">

            @include('layout.partials.messages')

             <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">
                        Items
                        <div class="pull-right">
                            <a href="{{ route('invoices.create') }}" class="btn btn-info btn-fill"><i class="fa fa-upload"></i> Upload</a>
                            <a href="{{ URL::to('downloadInvoice') }}"><button class="btn btn-success"><i class="fa fa-download"></i> Export </button></a>
                            <!--a href="{{ URL::to('post') }}"><button class="btn btn-danger"><i class="glyphicon glyphicon-envelope"></i> POST</button></a-->
                        </div>


                    </h4>

                </div>



                 <div class="card-body table-responsive">


                     <table class="table table-hover  table-striped" id="uploadtable">
                        <thead>
                            <tr style="background-color:#e0f3ff;" >
                                <!--<th>
                                    S.No
                                </th>-->
                                <th class="text-center" style="background-color:#e0f3ff;">
                                    Invoice No
                                </th>
                                <th class="text-center">
                                    No of Package
                                </th>
                                <th class="text-center">
                                    Type of Package
                                </th>
                                <th class="text-center">
                                    Qty
                                </th>
                                <th class="text-center">
                                    Part No
                                </th>
                                <th class="text-center">
                                   Suppiler Code
                                </th>
                                <th class="text-center">
                                    cumulative QTY
                                </th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($invoices as $invoices)

                                <tr>

                                    <!--<td>
                                        {{ $invoices->serialNo }}
                                    </td >-->
                                    <td class="text-center">
                                        {{ $invoices->invoiceNo }}
                                    </td>
                                    <td class="text-center">
                                        {{ $invoices->NoOfPacking }}
                                    </td>
                                    <td class="text-center">
                                        {{ $invoices->packingType }}
                                    </td>
                                    <td class="text-center">
                                        {{ $invoices->invoiceTotalQTY }}
                                    </td>
                                    <td class="text-center">
                                        {{ $invoices->ourProductCode }}
                                    </td>
                                    <td class="text-center">
                                        {{ $invoices->suppilerCode }}
                                    </td>
                                    <td class="text-center">
                                        {{ $invoices->cumulativeQTY }}
                                    </td>


                                </tr>
                            @endforeach



                        </tbody>

                    </table>




                </div>
            </div>

        </div>
    </div>

@push('script')
<script>
    $(function(){
        $("#uploadtable").DataTable({
              "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
            "columnDefs": [
    { "width": "20%", "targets": 7 }
  ]
        });

    });
</script>
@endpush

@endsection








