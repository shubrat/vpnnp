<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    {{-- <title>{{ $pageTitle . ' - Tech Community Nepal - IT Company In Nepal' }}</title> --}}
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Tech Community Nepal - IT Company in Nepal" name="description"/>
    <meta content="Tech Community Nepal" name="author"/>
    <meta property="og:site_name" content="{{config('app.name')}}">
    <meta name="twitter:image:alt" content="{{config('app.name')}}">
        <title>{{config('app.name')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('cms/images/favicon.ico') }}">

    <!-- alertifyjs Css -->
    <link href="{{asset('cms/libs/alertifyjs/build/css/alertify.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- alertifyjs default themes  Css -->
    <link href="{{asset('cms/libs/alertifyjs/build/css/themes/default.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Sweet Alert-->
    <link href="{{asset('cms/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- choices css -->
    <link href="{{asset('cms/libs/choices.js/public/assets/styles/choices.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- plugin css -->
    <link href="{{ asset('cms/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css"/>

    <!-- preloader css -->
    <link href="{{ asset('cms/css/preloader.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- datepicker css -->
    <link href="{{ asset('cms/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet">

    <!-- Dropify -->
    <link href="{{ asset('cms/libs/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">

    <!-- Summer Note -->
    <link href="{{ asset('cms/libs/summer-note/summernote-lite.min.css') }}" rel="stylesheet">

    <!-- Switchery -->
    <link href="{{ asset('cms/libs/switchery/dist/switchery.min.css') }}" rel="stylesheet">

    <!-- Bootstrap Css -->
    <link href="{{ asset('cms/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('cms/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('cms/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
     <!-- Select2 Css-->
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- bootstrap input tags css -->
    <link rel="stylesheet" href="{{ asset('cms/css/bootstrap-tagsinput.css') }}" />
    

    @stack('    ')

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">


        <x-cms-top-bar/>


        <x-cms-navigation/>


        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </div>

            <x-cms-footer/>

        </div>
    </div>


    <!-- JAVASCRIPT -->
    <script src="{{ asset('cms/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('cms/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('cms/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('cms/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('cms/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('cms/libs/feather-icons/feather.min.js') }}"></script>

          <!-- bootstrap tags input-->
        <script src="{{ asset('cms/js/bootstrap-tagsinput-1.min.js') }}"> </script>
    

    

    <!-- pace js -->
    <script src="{{ asset('cms/libs/pace-js/pace.min.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('cms/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('cms/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

 
    <script src="{{ asset('cms/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('cms/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('cms/libs/pdfmake/build/vfs_fonts.js') }}"></script>


    <!-- choices js -->
    <script src="{{ asset('cms/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- color picker js -->
    <script src="{{ asset('cms/libs/@simonwep/pickr/pickr.min.js') }}"></script>
    <script src="{{ asset('cms/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

    <!-- datepicker js -->
    <script src="{{ asset('cms/libs/flatpickr/flatpickr.min.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('cms/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Plugins js-->
    <script src="{{ asset('cms/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('cms/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- alertifyjs js -->
    <script src="{{ asset('cms/libs/alertifyjs/build/alertify.min.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('cms/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Dropify -->
    <script src="{{ asset('cms/libs/dropify/dist/js/dropify.min.js') }}"></script>

    <!-- Summer Note -->
    <script src="{{ asset('cms/libs/summer-note/summernote-lite.min.js') }}"></script>


     <!-- Select2 -->
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Switchery -->
    <script src="{{ asset('cms/libs/switchery/dist/switchery.min.js') }}"></script>

    <script src="{{ asset('cms/js/app.js') }}"></script>

   


    <script>

        function showConfirmationDialog(url, table) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3d4144',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {'_token': '{{ @csrf_token() }}'},
                        success: function (result) {
                            Swal.fire(
                                'Deleted!',
                                'Your record has been deleted.',
                                'success'
                            ).then(() => {
                                // location.reload();
                                table.ajax.reload();
                            })
                        },
                        error: function (result) {
                            console.log(result.success)
                            Swal.fire(
                                'Error!',
                                'Some Problem Occured. Please Try again later.',
                                'error'
                            ).then(() => {
                                table.ajax.reload();
                            })
                        }
                    })
                } else {
                    Swal.fire("Cancelled", "Deletion Cancelled", "error");
                }
            })
        }
    </script> 


<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select",
            allowClear: true
        });

    });

</script>

    @include('utils.messages')
    @stack('scripts')

</body>

</html>
