<aside class="main-sidebar sidebar-light-primary elevation-4">
  <a style="padding: 0px;margin: 0px;" href="{!! url('https://www.ifbindustries.com//') !!}" target="_blank" class="brand-link">
      <img style="padding:0px;height:55px;width:150px" src="{{ asset('assets/img/IFB.jpg') }}"

         >
     <br>
    </a>
  <div class="sidebar">
  <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item @yield('dashboard')">
      <a href="{{ route('home') }}" class="nav-link">

        <i style=" font-size:14px;line-height:22px;"  class="nav-icon fas fa-desktop"></i>
        <p>
        Home
        </p>
      </a>
    </li>
  {{-- @if(Gate::denies('super_admin'))
  <li class="nav-item has-treeview @yield('masters')">
    <a href="#" class="nav-link">
      <i class="nav-icon fa fa-sitemap"></i>
      <p>
      Masters
      <i class="right fa fa-angle-left"></i>
      </p>
    </a>
  <ul class="nav nav-treeview">

    <li class="nav-item">
      <a href="{{ route('locations.location.index') }}" class="nav-link @yield('company')">
      <i class="fa fa-industry nav-icon" aria-hidden="true"></i>
      <p>Location</p>
      </a>
    </li>


  </ul>
  </li>
 @endif --}}

  <!-- <li class="nav-item @yield('ewaybill')">
  <a class="nav-link link" href="{{ route('ewaybill.index')}}">
                              <i class="fas fa-file-invoice nav-icon"></i>
                                e-Waybill
                            </a>
  </li> -->
    @if(Gate::denies('super_admin'))
    <!-- <li class="nav-item @yield('master_details_page')">
        <a href="{{ route('material_details.material_detail.index') }}" class="nav-link">
            <i class=""></i>

            <i style=" font-size:14px;line-height:22px;"  class="nav-icon fas fa-plus"></i>
          <p>
          Materail Details
          </p>
        </a>
      </li> -->
    <li class="nav-item @yield('importpage')">
    <a href="{{ route('salesheaders.salesheader.Import') }}" class="nav-link">
        <i class=""></i>

        <i style=" font-size:14px;line-height:22px;"  class="nav-icon fas fa-file-import"></i>
      <p>
      Invoice Upload
      </p>
    </a>
  </li>
  {{--<li class="nav-header">Print</li>
   <li class="nav-item @yield('print')">
    <a href="{{ url('print/print_invo')}}" class="nav-link">
      <i class="fa fa-print nav-icon"></i>
      <p>
      Print Invoices
      </p>
    </a>
  </li> --}}
  @endif
@if(Gate::denies('super_admin'))
    <li class="nav-item @yield('digitalsigner')">
        <a class="nav-link link" href="{{ route('signor.index')}}">
        <i style="font-size:14px;"class="fas fa-file-signature nav-icon"></i>
        <p>
            Print Invoice
        </p>

      </a>
      </li>
      @endif
      @if(Gate::denies('super_admin'))
    <li class="nav-item @yield('digitalsign')">
        <a class="nav-link link" href="{{ route('digitalsign.index')}}">
        <i style="font-size:14px;"class="fas fa-file-signature nav-icon"></i>
        <p>
            Digital Sign
        </p>

      </a>
      </li>
      @endif
      @if(Gate::denies('super_admin'))
    <!--<li class="nav-item @yield('autoasn')">
        <a class="nav-link link" href="{{ route('autoasn.index')}}">
        <i style="font-size:14px;"class="fas fa-file-signature nav-icon"></i>
        <p>
            Auto ASN
        </p>

      </a>
      </li>-->
      @endif
<!-- @if(Gate::denies('super_admin'))
  <li class="nav-header">Transaction</li>
  <li class="nav-item @yield('po')">
    <a href="{{ url('poheaders')}}" class="nav-link ">
      <i class="fa fa-shopping-cart nav-icon"></i>
      <p>
      Purchase Order
      </p>
    </a>
  </li>
  <li class="nav-item @yield('sales')">
    <a href="{{ route('salesheaders.salesheader.Import')}}" class="nav-link ">
      <i class="fa fa-chart-line nav-icon"></i>
      <p>
      Sales
      </p>
    </a>
  </li>
  @endif -->
  <!-- <li class="nav-item @yield('sales')">
    <a href="{{ route('quotations.quotation.index')}}" class="nav-link ">
      <i class="fa fa-chart-line nav-icon"></i>
      <p>
      Quotations
      </p>
    </a>
  </li> -->

  <!-- <li class="nav-item">
    <a href="{{ url('print-invoice')}}" class="nav-link">
      <i class="fa fa-print nav-icon"></i>
      <p>
      Print Invoices
      </p>
    </a>
  </li>  -->
  <li class="nav-item has-treeview @yield('reports')">
    <a href="#" class="nav-link">
          <i style=" font-size:18px;" class="fab fa-buffer nav-icon"></i>
<p>
    Reports
    <i class="right fa fa-angle-left"></i>
</p>



  </a>
  <ul class="nav nav-treeview">
<!--   <li class="nav-item">
  <a href="{{ route('customerwiseReports')}}" class="nav-link @yield('customerwise')">
  <i class="fa fa-user nav-icon"></i>
  <p>Customerwise Report</p>
  </a>
  </li> -->
<!--   <li class="nav-item">
  <a href="{{ route('productwisereports')}}" class="nav-link @yield('productwise')">
  <i class="fa fa-cart-plus nav-icon"></i>
  <p>
  Productwise Report
  </p>
  </a>
  </li> -->
  <li class="nav-item">
  <a href="{{ route('salesreports')}}" class="nav-link @yield('saleswise')">
  <i style="font-size:14px;"class="fa fa-file nav-icon"></i>
  <p>
  Sales Report
  </p>
  </a>
  </li>
  </ul>
  </li>

  <li class="nav-item @yield('password')">
  <a href="{{ route('auth.change_password') }}" class="nav-link ">
  <i style="font-size:14px;" class="fas fa-key nav-icon"></i>
  <i class=""></i>
  <p>Change Password</p>
  </a>
  </li>
   <!-- <li class="nav-item @yield('config')">
  <a href="{{ route('config') }}" class="nav-link ">
  <i class="fa fa-lock nav-icon"></i>
  <p>Configuration</p>
  </a>
  </li> -->
  @if(Gate::allows('admin'))
  <li class="nav-item has-treeview @yield('users')">
  <a href="#" class="nav-link">
  <i style="font-size:14px;" class="fa fa-users nav-icon"></i>
  <p>
  Users Management
  <i class="fa fa-angle-left right"></i>
  </p>
  </a>
  <ul class="nav nav-treeview">
  <li class="nav-item">
  <a href="{{ route('roles') }}" class="nav-link @yield('roles')">
  <i class="fas fa-users nav-icon"></i>
  <p>Roles</p>
  </a>
  </li>
  <li class="nav-item">
  <a href="{{ route('usersetting') }}" class="nav-link @yield('ucreation')">
  <i class="nav-icon fa fa-user"></i>
  <p>
  User Creation
  </p>
  </a>
  </li>
  </ul>
  </li>
@endif
  </ul>
  </nav>
  </div>
</aside>

