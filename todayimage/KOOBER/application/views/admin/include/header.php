<?php
//print_r($this->session->userdata('admin'));die;
  if(!$this->session->userdata('admin')){
   // redirect('admin');
  }
  $admin = $this->session->userdata('admin');
  
  $page = $this->uri->segment(3);
  
?>
<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8" />
        <title>KOOBER | Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link href="<?=base_url('assets');?>/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="<?=base_url('assets');?>/images/banner/logo.png" sizes="16x16" type="image/png">
        <link href="<?=base_url('assets');?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url('assets');?>/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url('assets');?>/css/custom.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url('assets');?>/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url('assets');?>/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url('assets');?>/css/pages.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url('assets');?>/css/menu.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url('assets');?>/css/responsive.css" rel="stylesheet" type="text/css">
         <link href="<?=base_url('assets');?>/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

<!-- sweet alert -->
  <script src="<?=base_url('sweetAlert/sweetalert-dev.js');?>"></script>
  <link rel="stylesheet" href="<?=base_url('sweetAlert/sweetalert.css');?>"> 


        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?=base_url('assets');?>/plugins/morris.js/morris.css">
        <script src="<?=base_url('assets');?>/js/modernizr.min.js"></script>

    </head>
