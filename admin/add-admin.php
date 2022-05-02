<?php include('includes/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['add']; //Display the SEssion Message if SEt
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>

        <form action="" method="POST">
        <div class="form-group col-md-6">
                        <label class="label ">Full Name</label>
                        <input  class="form-control"  type="text" name="full_name" placeholder="Eg, Rashid Alma">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="label ">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="rasalma">

                    </div>
                     <div class="form-group col-md-6">
                        <label class="label col-md-4">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="********">
            
                      </div> 
                    <div class="form-group col-md-6">
                    <input type="submit" name="submit" value="Add Category" class="btn btn-success">

                    </div> 
        </form>


    </div>
</div>

<?php include('includes/footer.php'); ?>


<?php 
    //Process the Value from Form and Save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked
        //echo "Button Clicked";

        //1. Get the Data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with MD5

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO admin SET 
            full_name='$full_name',
            username='$username',
            password='$password'
        ";
 
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
            //Redirect Page to Manage Admin
            header("location:".BASEURL.'admin/manage-admin.php');
        }
        else
        {
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            //Redirect Page to Add Admin
            header("location:".BASEURL.'admin/add-admin.php');
        }

    }
    
?>