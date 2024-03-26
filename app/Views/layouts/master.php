<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Learnify</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="<?php echo base_url('/template/css/styles.min.css')?>" />
    <?= $this->renderSection('css') ?>

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <?= $this->include('layouts/sidebar') ?>
        <!--  Sidebar End -->
        <div class="body-wrapper">
            <!--  Header Start -->
             <?= $this->include('layouts/navbar') ?>
            <!--  Header End -->
            <div class="container-fluid">
                <?= $this->include('Msg/alert') ?>
                
                <?= $this->renderSection('content') ?>

            </div>
        </div>
    </div>
    <script src="<?php echo base_url('template/libs/jquery/dist/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('template/libs/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?php echo base_url('template/js/sidebarmenu.js')?>"></script>
    <script src="<?php echo base_url('template/js/app.min.js')?>"></script>
    <?= $this->renderSection('js') ?>
</body>

</html>