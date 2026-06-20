@extends('layouts.app')
@section('dashboard','menu-open')
@section('content')

<style>
    .progress.progress-xs {
    height: .25rem;
}
.no-r, .r-0 {
    border-radius: 0!important;
}

.progress {
    display: flex;
    height: 1rem;
    overflow: hidden;
    font-size: .75rem;
    background-color: #e9ecef;
    border-radius: .25rem;
}
</style>

   <div class="content-wrapper" style="">
    <section class="content">
      <div class="container-fluid pt-3">
          <div class="row">
            <div onclick="opensalesreport()" class="col-md-3 col-sm-3 col-12 my-2 mx-1   four-grid p-2 pt-0" style="box-shadow: 2px 2px 15px 0px #ccc;cursor: pointer" >
                <div class="row">
            <div class="col-sm-6" style="
            padding-top: 0px;
            padding-right: 0;
        ">
                             <div class="col-sm-12 text-left"  style="font-size:15px;line-height:21px;color:#797f82;"> Total sales Invoices  </div>

                            <div class="col-sm-12 mt-0 text-left  " style="font-size:25px;color:#797f82;"> {{$Total_SalesInvoices}}+</div>

                            <div class="progress progress-xs r-0 mt-2">
                                        {{-- <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div> --}}
                                    </div>
                            </div>


              <div class="col-sm-6 pt-3" style="text-align:center;">
                <i style="font-size:30px;font-weight:100;color: #215fe2;vertical-align:center;"class="fas fa-file-alt"></i>
                    </div>
        </div>
            </div>
          </div>




          </div>
      </div>
      </div>
    </div>
@endsection
@push('scripts')
<script>
function opensalesreport(){
    window.location.href="{{route('salesreports')}}";
}
</script>
@endpush
