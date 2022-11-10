<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Ah potek</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('img') }}/favicon.png" rel="icon">
        <link href="{{ asset('img') }}/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('vendor') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('vendor') }}/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="{{ asset('vendor') }}/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="{{ asset('vendor') }}/quill/quill.snow.css" rel="stylesheet">
        <link href="{{ asset('vendor') }}/quill/quill.bubble.css" rel="stylesheet">
        <link href="{{ asset('vendor') }}/remixicon/remixicon.css" rel="stylesheet">
        <link href="{{ asset('vendor') }}/simple-datatables/style.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('css') }}/style.css" rel="stylesheet">
        <style>
            .foto {
                background-color: indigo;
                color: white;
                padding: 0.5rem;
                font-family: sans-serif;
                border-radius: 0.3rem;
                cursor: pointer;
                margin-top: 1rem;
            }
            .foto-view {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 100%;
            }
        </style>
        @stack('style')
        <!-- =======================================================
        * Template Name: NiceAdmin - v2.4.1
        * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->


</head>

<body>
    <!-- ======= Header ======= -->
    @include('layouts.components.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('layouts.components.sidebar')
  <!-- End Sidebar-->

  @yield('content');
  <!-- End #main -->
  @include('layouts.components.footer')
  <!-- ======= Footer ======= -->
