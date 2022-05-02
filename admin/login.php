<?php include('../constants.php'); ?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>

    <body style="background-image: url(../images/mainbanner.jpg);background-size: cover;background-repeat: no-repeat">
    <div class="container h-100">
    <div  class="row h-100 justify-content-center align-items-center">
        <div style="background-color:#006E7F; color:#ffffff;padding:15px;" class="col-10 col-md-8 col-lg-6">
            <!-- Form -->
            <form class="form-example" action="" method="post">
                <h1 class="text-center">Cafe's Management</h1>
                <p class="description text-center">Please login to your account.</p>
                <?php
                if (isset($_SESSION['login'])) {
?>
<h3 style="color:#ffffff;background-color:#000000;"><?=$_SESSION['login']?></h3>

<?php unset($_SESSION['login']);
                }

                if (isset($_SESSION['no-login-message'])) {
                    ?>
                    <h3 style="color:#ffffff;background-color:#000000;"><?=$_SESSION['no-login-message']?></h3>
                    
                    <?php                      unset($_SESSION['no-login-message']);
                }
            ?>
                <!-- Input fields -->
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control username" id="username" placeholder="Username..." name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control password" id="password" placeholder="Password..." name="password">
                </div>
                <button type="submit" name="submit" class="btn btn-success btn-customized">Sign in</button>
                <!-- End input fields -->
             </form>
            <!-- Form end -->
        </div>
    </div>
    
  <!-- footer Section Ends Here -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    </body>
</html>

<?php

    //CHeck whether the Submit Button is Clicked or NOt
    if (isset($_POST['submit'])) {
        //Process for Login
        //1. Get the Data from Login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if ($count==1) {
            //User AVailable and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.BASEURL.'admin/');
        } else {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Invalid Username or Password .</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.BASEURL.'admin/login.php');
        }
    }

?>