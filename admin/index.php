
<?php include('includes/menu.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div style="text-align:center;" class="wrapper">
                <h1> Dashboard</h1>
               
                </div>
                  <!-- <div  class="col-md-12 "> -->
<div class="row text-align:center;">
                <div style="background-color:#006E7F;color:#ffffff;" class="col-4 text-center ">

                    <?php
                        //Sql Query
                        $sql = "SELECT * FROM food_categories";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Food Categories
                </div>

                <div style="background-color:#189AB4;color:#ffffff;" class="col-4 text-center ">

                    <?php
                        //Sql Query
                        $sql2 = "SELECT * FROM food_varieties";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Foods
                </div>

                <div style="background-color:#050A30;color:#ffffff;" class="col-4 text-center ">
                    
                    <?php
                        //Sql Query
                        $sql3 = "SELECT * FROM food_orders";
                        //Execute Query
                        $res3 = mysqli_query($conn, $sql3);
                        //Count Rows
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Total Orders
                </div>

                <div style="background-color:#81B622;color:#ffffff;" class="col-4 text-center ">
                    
                    <?php
                        //Creat SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        $sql4 = "SELECT SUM(total) AS Total FROM food_orders WHERE status='Delivered'";

                        //Execute the Query
                        $res4 = mysqli_query($conn, $sql4);

                        //Get the VAlue
                        $row4 = mysqli_fetch_assoc($res4);
                        
                        //GEt the Total REvenue
                        $total_revenue = $row4['Total'];

                    ?>

                    <h1>$<?php echo $total_revenue; ?></h1>
                    <br />
                    Revenue Collected
                </div>

                <div style="background-color:#81B622;color:#ffffff;" class="col-4 text-center ">
                    
                    <?php
                        //Sql Query
                        $sql6 = "SELECT * FROM food_orders WHERE status = 'Ordered'";
                        //Execute Query
                        $res6 = mysqli_query($conn, $sql6);
                        //Count Rows
                        $count6 = mysqli_num_rows($res6);
                    ?>

                    <h1><?php echo $count6; ?></h1>
                    <br />
                    Pending Orders
                </div>

                <div style="background-color:#006E7F;color:#ffffff;" class="col-4 text-center ">
                    
                    <?php
                        //Sql Query
                        $sql7 = "SELECT * FROM food_orders WHERE status = 'On Delivery'";
                        //Execute Query
                        $res7 = mysqli_query($conn, $sql7);
                        //Count Rows
                        $count7 = mysqli_num_rows($res7);
                    ?>

                    <h1><?php echo $count7; ?></h1>
                    <br />
                    On Delivery Orders
                </div>


                <div style="background-color:#ff0000;color:#ffffff;" class="col-4 text-center ">
                    
                    <?php
                        //Sql Query
                        $sql7 = "SELECT * FROM food_orders WHERE status = 'Cancelled'";
                        //Execute Query
                        $res7 = mysqli_query($conn, $sql7);
                        //Count Rows
                        $count7 = mysqli_num_rows($res7);
                    ?>

                    <h1><?php echo $count7; ?></h1>
                    <br />
                    Cancelled Orders
                </div>


                <div style="background-color:#006E7F;color:#ffffff;" class="col-4 text-center ">
                    
                    <?php
                        //Sql Query
                        $sql8 = "SELECT * FROM admin";
                        //Execute Query
                        $res8 = mysqli_query($conn, $sql8);
                        //Count Rows
                        $count8 = mysqli_num_rows($res8);
                    ?>

                    <h1><?php echo $count8; ?></h1>
                    <br />
                    System Administrator
                </div>
                </div>
                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content Setion Ends -->

<?php include('includes/footer.php') ?>