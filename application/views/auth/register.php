<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$title?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>images/favicon.png" />
    <style>
       .password{
           -webkit-text-security:disc;
       }
   </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="<?= base_url('assets/'); ?>images/logo.svg" alt="logo">
                            </div>
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            <?php echo validation_errors(); ?>
                            <form action="<?php echo base_url('register') ?>" method="post">
                                <div class="form-group">
                                    <input autocomplete="off" type="text" class="form-control form-control-lg" name="nama_lengkap" placeholder="nama_lengkap">
                                </div>
                                <div class="form-group">
                                    <input autocomplete="off" type="email" class="form-control form-control-lg" name="email" required placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input autocomplete="off" type="text" class="form-control form-control-lg password" name="password" required placeholder="password">
                                </div>
                                <div class="form-group">
                                    <input autocomplete="off" type="text" class="form-control form-control-lg password" name="password_konfirmasi" required placeholder="password konfirmasi">
                                </div>                            
                                <div class="form-group">
                                    <input autocomplete="off" type="text" class="form-control form-control-lg" name="no_hp" required placeholder="no_hp">
                                </div>                            
                                <div class="form-group">
                                    <input autocomplete="off" type="text" class="form-control form-control-lg" name="alamat" required placeholder="alamat">
                                </div>                            
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="<?= base_url('login')?>" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url('assets/'); ?>vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url('assets/'); ?>js/off-canvas.js"></script>
    <script src="<?= base_url('assets/'); ?>js/hoverable-collapse.js"></script>
    <script src="<?= base_url('assets/'); ?>js/template.js"></script>
    <script src="<?= base_url('assets/'); ?>js/settings.js"></script>
    <script src="<?= base_url('assets/'); ?>js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
<script>
$(document).ready(function() {
    if ( $('#terms').val()) {
        
    }
   
    $('#email').val('')
    $('#password').val('')
    $('#password_konfirmasi').val('')

});
</script>