<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>{{ config('app.name') }} | @yield('page-title') </title>

        <!-- <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables/dataTables.bootstrap4.css') }}">    -->
		<link href="{{asset('assets/css/font.css')}}" rel="stylesheet">
		<link href="{{asset('assets/css/style-dashborad.css')}}" rel="stylesheet">
		<link href="{{asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
		<!-- <link href="{{asset('assets/css/dataTables.bootstrap4.css') }}" rel="stylesheet"> -->
		<link href="{{asset('assets/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{asset('css/app.css') }}" rel="stylesheet">
        <link href="{{asset('css/select.css') }}" rel="stylesheet">
        <link href="{{asset('css/bootstrap-float-label.min.css') }}" rel="stylesheet">

        		<link href="{{asset('assets/css/jquery-ui.css')}}" rel="stylesheet">
		<link href="{{asset('assets/css/fontawesome.min.css')}}" rel="stylesheet"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.css"> 
		<link href="{{asset('assets/css/all_style.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/print_invoice.css')}}" rel="stylesheet"/>
		<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
		<link type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">
		<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> -->
        <!-- <link href="{{asset('css/selectize.bootstrap4.css') }}" rel="stylesheet">
        <link href="{{asset('css/selectize-plugin-clear.css') }}" rel="stylesheet">

		 <link href="{{asset('css/select.css') }}" rel="stylesheet"> -->
		<!-- <link href="{{asset('css/bootstrap-float-label.min.css') }}" rel="stylesheet">
		<link href="{{asset('assets/css/jquery-ui.css')}}" rel="stylesheet">
		<link href="{{asset('assets/css/fontawesome.min.css')}}" rel="stylesheet"/>
		<link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">
		 <link href="{{asset('css/select2.css')}}" rel="stylesheet"/>
		{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.css"> --}}
		<link href="{{asset('assets/css/all_style.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/css/print_invoice.css')}}" rel="stylesheet"/>
        <link href="{{asset('css/selectize.default.css')}}" rel="stylesheet" />
		  {{-- <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> --}}
<link type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" rel="stylesheet" />  -->
<!-- <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" /> -->
<style>
	.imp
    {
        color: red;
    }
    .lab
    {
        font-weight: bold !important;
    }
</style>
@stack('css')
	</head>
	<body class="hold-transition sidebar-mini" ng-app="angularApp">
		<div class="wrapper">
			@include('layouts.navbar')
			@include('layouts.sidebar')
			@yield('content')
			@include('layouts.footer')
		</div>
	</body>

	<!-- <script src="{{asset('assets/js/select2.js')}}" ></script> -->



	<script src="{{asset('assets/js/all.min.js')}}" crossorigin="anonymous"></script>
	<script src="{{ asset('js/app.js') }}" ></script>
	<script src="{{ asset('js/select.js') }}" ></script>
	<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('js/angular-resource.js') }}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	{{-- <script src="{{asset('js/datatables/jquery.dataTables.js')}}"></script> --}}
	<script src="{{asset('assets/js/dataTables.min.js') }}"></script>
	<script src="{{asset('assets/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{asset('assets/js/responsive.bootstrap4.min.js') }}"></script>
	    {{-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>


	     <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script> --}}


    <script src="{{ asset('js/angular-sanitize.js') }}"></script>
    <script src="{{asset('assets/js/select2.js')}}" ></script>
    <script src="{{asset('js/jquery.mask.min.js')}}" ></script>
    <script src="{{asset('js/selectize.min.js')}}" ></script>
    <script src="{{asset('js/selectize-plugin-clear.js')}}" ></script>
    <script src="{{asset('js/angular-selectize.js')}}" ></script>
    <script src="{{asset('js/flatpickr.min.js')}}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> -->
	 <!-- <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script> -->
	<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
	<!-- <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script> -->
	<script type="text/javascript">





var app=angular.module('angularApp', ['ngResource','ui.select', 'ngSanitize','selectize']);
        // ,'willcrisis.angular-select2'
app.filter('propsFilter', function() {
  return function(items, props) {
    var out = [];

    if (angular.isArray(items)) {
      var keys = Object.keys(props);

      items.forEach(function(item) {
        var itemMatches = false;

        for (var i = 0; i < keys.length; i++) {
          var prop = keys[i];
          var text = props[prop].toLowerCase();
          if (item[prop].toString().toLowerCase().indexOf(text) !== -1) {
            itemMatches = true;
            break;
          }
        }

        if (itemMatches) {
          out.push(item);
        }
      });
    } else {
      // Let the output be the input untouched
      out = items;
    }

    return out;
  };
});

// var app=angular.module('angularApp', ['ngResource']);
        //,'willcrisis.angular-select2'

	$(function(){

		// sends the uploaded file file to the fielselect event
		$(document).on('change', ':file', function() {
			var input = $(this);
			var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');

			input.trigger('fileselect', [label]);
		});

		// Set the label of the uploaded file
		$(':file').on('fileselect', function(event, label) {
			$(this).closest('.uploaded-file-group').find('.uploaded-file-name').val(label);
		});

		// Deals with the upload file in edit mode
		$('.custom-delete-file:checkbox').change(function(e){
			var self = $(this);
			var container = self.closest('.input-width-input');
			var display = container.find('.custom-delete-file-name');

			if (self.is(':checked')) {
				display.wrapInner('<del></del>');
			} else {
				var del = display.find('del').first();
				if (del.is('del')) {
					del.contents().unwrap();
				}
			}
		}).change();
	});
	$(".ajax_form").on("submit",function(e){
		e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
            	populateToHtml(data);
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
	});

	$(".ajax_form1").on("submit",function(e){
		e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
            	populateToHtml1(data);
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
	});


	</script>

        	<script>
				//  var table = $('.table').DataTable();
				 // table.columns( [9,10,11,12] ).visible( false );
	  $(".sidebar").slimScroll({
		height: $(".sidebar").outerHeight(true),
         // color: '#ff4800',
         //  width: '500px',
	  });

    $('#datepicker').datepicker({
      uiLibrary: 'bootstrap4'
  });
   $('#datepicker1').datepicker({
       uiLibrary: 'bootstrap4'
   });
</script>

	<!-- PAGE SPECIFIC SCRIPTS -->
@stack('scripts')

</html>
