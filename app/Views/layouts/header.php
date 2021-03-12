<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   
        

    <!-- Custom styles for this template-->
    <link href="<?= APP_URL?>/admin/css/sb-admin-2.css" rel="stylesheet">
    
    <link href="<?= APP_URL?>/admin/css/bootstrap.css" rel="stylesheet">    
    <link href="<?= APP_URL?>/admin/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" rel="stylesheet">
    
    <link type="text/css" href="<?= APP_URL?>/admin/css/sample.css" rel="stylesheet" media="screen" />
    <link rel="stylesheet" href="<?= APP_URL?>/admin/css/fontawesome.min.css"> 
     
    <script src="<?= APP_URL?>/admin/js/jquery-3.5.1.js"></script>
    <script src="<?= APP_URL?>/admin/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    
    
    
    <script src="<?= APP_URL?>/admin/js/sb-admin-2.js"></script>
    <script src="<?= APP_URL?>/admin/js/ckeditor.js"></script>
    <script src="<?= APP_URL?>/admin/js/main.js"></script>
   
    <script src="<?= APP_URL?>/admin/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
            <?php if(session('isAdminLoggedIn')):?>
                <?= $this->include('layouts/sidebar')?>
            <?php endif;?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
            <div id="content">

                    <!-- Topbar -->
                        <?php if(session('isAdminLoggedIn')):?>
                            <?= $this->include('layouts/adminnavbar')?>
                        <?php endif;?>