<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$title?></title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>js/select.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>images/favicon.png" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="<?= base_url('assets/'); ?>vendors/js/vendor.bundle.base.js"></script>
    
</head>

<body>
    <div class="container-scroller">        
        <?php $this->load->view('template/_navbar.php');?>        
        <div class="container-fluid page-body-wrapper">                        
            <?php $this->load->view('template/_sidebar.php');?>            
            <div class="main-panel">
                
                <!-- main content -->
                <?=$contents;?>
                <!-- end main content -->
                
                <?php $this->load->view('template/_footer.php');?>                
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/'); ?>js/off-canvas.js"></script>
    <script src="<?= base_url('assets/'); ?>js/hoverable-collapse.js"></script>
    <script src="<?= base_url('assets/'); ?>js/template.js"></script>
    <script src="<?= base_url('assets/'); ?>js/settings.js"></script>
    <script src="<?= base_url('assets/'); ?>js/todolist.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

    
</body>

</html>