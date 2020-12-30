<?php
include 'inc/config.php';
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 <meta name="description" content="" />
 <meta name="author" content="" />
 <title>Dashboard - NBCS Member Admin</title>
 <link href="dist/css/styles.css" rel="stylesheet" />
 <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
  crossorigin="anonymous" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
 </script>
</head>

<body class="sb-nav-fixed">
 <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
  <a class="navbar-brand" href="index.html">NBCS Member Management System</a>
  <!-- <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
    class="fas fa-bars"></i></button> -->
  <!-- Navbar Search-->
  <!-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
   <div class="input-group">
    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
     aria-describedby="basic-addon2" />
    <div class="input-group-append">
     <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
    </div>
   </div>
  </form> -->
  <!-- Navbar -->
  <ul class="navbar-nav ml-auto mr-md-0">
   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
     aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
     <a class="dropdown-item" href="#">Settings</a>
     <a class="dropdown-item" href="#">Activity Log</a>
     <div class="dropdown-divider"></div>
     <a class="dropdown-item" href="login.html">Logout</a>
    </div>
   </li>
  </ul>
 </nav>
 <div id="layoutSidenav">
  <div id="layoutSidenav_nav">
   <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
     <div class="nav">
      <div class="sb-sidenav-menu-heading">Membership Enrollment</div>
      <a class="nav-link" href="index.php">
       <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
       New Member Request
      </a>
      <div class="sb-sidenav-menu-heading">Membership</div>
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false"
       aria-controls="collapseLayouts">
       <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
       Members
       <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
      </a>
      <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
       <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="members.php">All Approved Members</a>
        <a class="nav-link" href="activemembers.php?do=Manage">Active Members</a>
        <a class="nav-link" href="memberstatus.php">Add New Member</a>
        <a class="nav-link" href="agencytype.php">Dues Collection</a>
        <a class="nav-link" href="agencytype.php">Expired Members</a>
       </nav>
      </div>
      <div class="sb-sidenav-menu-heading">Reference Table</div>
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false"
       aria-controls="collapseLayouts">
       <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
       Category
       <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
      </a>
      <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
       <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="membertype.php">Member Type</a>
        <a class="nav-link" href="memberstatus.php">Member Status</a>
        <a class="nav-link" href="agencytype.php">Agency Type</a>
       </nav>
      </div>

   </nav>
  </div>