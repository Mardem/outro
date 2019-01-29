<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo e(env('APP_NAME')); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/css/vendor.bundle.base.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/css/vendor.bundle.addons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/style.css')); ?>">
    <!-- endinject -->
    <link href="<?php echo e(asset('css/themify-icons.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/multiple-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/easy-autocomplete.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/easy-autocomplete.themes.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/datepicker.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/foundation-datepicker.css')); ?>">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('favicon/apple-icon-57x57.png')); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(asset('favicon/apple-icon-60x60.png')); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('favicon/apple-icon-72x72.png')); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('favicon/apple-icon-76x76.png')); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('favicon/apple-icon-114x114.png')); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('favicon/apple-icon-120x120.png')); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('favicon/apple-icon-144x144.png')); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('favicon/apple-icon-152x152.png')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('favicon/apple-icon-180x180.png')); ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo e(asset('favicon/android-icon-192x192.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicon/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('favicon/favicon-96x96.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicon/favicon-16x16.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('favicon/manifest.json')); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(asset('favicon/ms-icon-144x144.png')); ?>">
    <meta name="theme-color" content="#ffffff">

    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0 !important;
        }
        .dt-button-collection {
            margin-top: 14.5px !important;
        }
        div.dt-button-collection button.dt-button.active:not(.disabled) {
            background: #2f528d !important;
            padding: 3px 10px;
            border-radius: 33px;
            color: #fff;
            border: none;
        }
        div.dt-button-collection button.dt-button {
            background: #babdbf !important;
            padding: 3px 10px;
            border-radius: 33px;
            color: #fff;
            border: none;
        }
    </style>
    <?php echo $__env->yieldContent('styles'); ?>

</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
