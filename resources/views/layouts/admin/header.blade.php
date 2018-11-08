<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <!-- endinject -->
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/multiple-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/easy-autocomplete.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/easy-autocomplete.themes.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/tagsinput/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/foundation-datepicker.css') }}">

    @yield('styles')

</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
