<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}admin/assets/images/favicon.png">
    <title>Abdullah Admin Panel</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{ asset('/') }}admin/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{ asset('/') }}admin/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('/') }}admin/dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('/') }}admin/dist/css/pages/dashboard1.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/') }}admin/assets/node_modules/dropify/dist/css/dropify.min.css">

    <link rel="stylesheet"
        href="{{ asset('/') }}admin/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet"
        href="{{ asset('/') }}admin/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}admin/assets/node_modules/summernote/dist/summernote-bs4.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('admin.includes.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        @include('admin.includes.sidebar')

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield('body')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include('admin.includes.footer')
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('/') }}admin/assets/node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('/') }}admin/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('/') }}admin/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="{{ asset('/') }}admin/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('/') }}admin/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('/') }}admin/dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{ asset('/') }}admin/assets/node_modules/raphael/raphael-min.js"></script>
    <script src="{{ asset('/') }}admin/assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="{{ asset('/') }}admin/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    {{-- <script src="{{ asset('/') }}admin/assets/node_modules/toast-master/js/jquery.toast.js"></script> --}}
    <!-- Chart JS -->
    <script src="{{ asset('/') }}admin/dist/js/dashboard1.js"></script>
    {{-- <script src="{{ asset('/') }}admin/assets/node_modules/toast-master/js/jquery.toast.js"></script> --}}
    <script src="{{ asset('/') }}admin/assets/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script src="{{ asset('/') }}admin/assets/node_modules/summernote/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>

    <script src="{{ asset('/') }}admin/assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}admin/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <script>
        $(function() {
            $('#myTable').DataTable();
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group +
                                '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
            // responsive table
            $('#config-table').DataTable({
                responsive: true
            });
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });


            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass(
                'btn btn-primary me-1');

            $('.summernote').summernote({
                height: 350, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });

        });

    </script>

    <script>
         $(function() {
            $(document).on('change', '#categoryId', function(){
                var categoryId = $(this).val();
                // alert(categoryId);
                 $.ajax({
                    type: "GET",
                    url: "{{route('product.get-subcategory-by-category')}}",
                    data:{id: categoryId},
                    dataType:"JSON",
                    success: function(response){
                        var subCategoryId = $('#subCategoryId');
                        subCategoryId.empty();
                        // console.log(response);
                        var option = '';
                        option += ' <option value="" disabled selected> ......Seleted Sub  Category......</option>';
                        $.each(response, function(key, value){
                            option += '<option value="'+value.id+'">'+value.name+'</option>';
                        });

                        subCategoryId.append(option);
                    }
                 });
            });
         });
    </script>
    {{-- <script>
        $(function() {
            $(document).on('change', '#categoryId', function() {

                var categoryId = $(this).val();
                alert(categoryId);
                $.ajax({
                    type: "GET",
                    url: "{{ route('product.get-subcategory-by-category') }}",
                    data:{id: categoryId},
                     dataType: "JSON",
                    success: function(response) {
                        var categoryId = $('#subcategoryId');
                        subCategoryId = empty();
                        var option = '';
                        option +=
                            '<option value="" disabled select> --select Sub category </option>';
                        $.each(response, function(key, value)) {
                            option += '<option value' + value.id +
                                'disabled' selected>' = value.name + '</option>';

                        }
                        subCategoryId.append(option);
                    }
                });

            });

        })
    </script> --}}

</body>

</html>
