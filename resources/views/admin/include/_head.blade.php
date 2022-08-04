<meta charset="utf-8" />
<title>JEA - Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="Admin Dashboard" name="description" />
<meta content="ThemeDesign" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


<!-- DataTables -->
@yield('datatable_css')

<link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('admin/css/icons.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('admin/css/style.css')}}" rel="stylesheet" type="text/css">
<!-- include summernote css/js -->



<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@yield('table_css')
