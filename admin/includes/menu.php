<?php 

    include('../constants.php'); 
    include('login-check.php');

?>
<html>
    <head>
    <title>Group 11 Food Order/inventory tracking System</title>

        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    </head>
    
    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center">
            
            <div class="wrapper">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="../images/logo.png" width="350" alt="cafe Logo" class="img-responsive">
                </a>
            </div>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-order.php">Manage Orders</a></li>
                    <li><a href="manage-category.php">Food Category</a></li>
                    <li><a href="manage-food.php">Food variety</a></li>
                   
                    <li><a href="manage-admin.php">Manage Admin</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->