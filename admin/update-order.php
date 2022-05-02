<?php include('includes/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>


        <?php

        //CHeck whether id is set or not
        if (isset($_GET['id'])) {
            //GEt the Order Details
            $id = $_GET['id'];

            //Get all other details based on this id
            //SQL Query to get the order details
            $sql = "SELECT * FROM food_orders WHERE id=$id";
            //Execute Query
            $res = mysqli_query($conn, $sql);
            //Count Rows
            $count = mysqli_num_rows($res);

            if ($count == 1) {
                //Detail Availble
                $row = mysqli_fetch_assoc($res);

                $food = $row['food'];
                $price = $row['price'];
                $qty = $row['qty'];
                $status = $row['status'];
                $customer_name = $row['customer_name'];
                $customer_contact = $row['customer_contact'];
                $customer_email = $row['customer_email'];
                $customer_address = $row['customer_address'];
            } else {
                //DEtail not Available/
                //Redirect to Manage Order
                header('location:' . BASEURL . 'admin/manage-order.php');
            }
        } else {
            //REdirect to Manage ORder PAge
            header('location:' . BASEURL . 'admin/manage-order.php');
        }

        ?>

        <form class="form-control" action="" method="POST">
            <div class="table-responsive">
                <table class="tbl-30 table ">
                    <tr>
                        <td>Food Name</td>
                        <td><b> <?php echo $food; ?> </b></td>
                    </tr>

                    <tr>
                        <td>Price</td>
                        <td>
                            <b> $ <?php echo $price; ?></b>
                        </td>
                    </tr>

                    <tr>
                        <td>Qty</td>
                        <td>
                            <div class="form-group">
                                <input class="form-control" type="number" name="qty" value="<?php echo $qty; ?>">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td>
                            <div class="form-group">
                                <select class="form-control" name="status">
                                    <option <?php if ($status == "Ordered") {
                                                echo "selected";
                                            } ?> value="Ordered">Ordered</option>
                                    <option <?php if ($status == "On Delivery") {
                                                echo "selected";
                                            } ?> value="On Delivery">On Delivery</option>
                                    <option <?php if ($status == "Delivered") {
                                                echo "selected";
                                            } ?> value="Delivered">Delivered</option>
                                    <option <?php if ($status == "Cancelled") {
                                                echo "selected";
                                            } ?> value="Cancelled">Cancelled</option>
                                </select>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>Customer Name: </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="customer_name" value="<?php echo $customer_name; ?>">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>Customer Contact: </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="customer_contact" value="<?php echo $customer_contact; ?>">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>Customer Email: </td>
                        <td>
                            <div class="form-group">
                                <input class="form-control" type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>Customer Address: </td>
                        <td>
                            <div class="form-group">
                                <textarea name="customer_address" cols="30" class="form-control" rows="5"><?php echo $customer_address; ?></textarea>
                            </div>
                        </td>
                    </tr>

                    <tr  style="padding-bottom: 10px;">
                        <td clospan="2">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="price" value="<?php echo $price; ?>">

                                <input type="submit" name="submit" value="Update Order" class="btn btn-info">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>
<?php
//CHeck whether Update Button is Clicked or Not
if (isset($_POST['submit'])) {
    //echo "Clicked";
    //Get All the Values from Form
    $id = $_POST['id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $total = $price * $qty;
    // echo $total;
    //                 return;
    $status = $_POST['status'];

    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];

    //Update the Values
    $sql2 = "UPDATE food_orders SET 
                    qty = $qty,
                    total = $total,
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    WHERE id=$id
                ";

    //Execute the Query
    $res2 = mysqli_query($conn, $sql2);
    // echo BASEURL;
    //                 return;
    //CHeck whether update or not
    //And REdirect to Manage Order with Message
    if ($res2) {
        //Updated
        $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
        // header('location:'.BASEURL.'admin/manage-order.php');
    } else {
        //Failed to Update
        $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
        // header('location:'.BASEURL.'admin/manage-order.php');
    }
    echo '<script>window.location.href ="' . BASEURL . 'admin/manage-order.php";</script>';
    // header('Location:'.BASEURL.'admin/manage-order.php');
}
?>
 
<?php include('includes/footer.php'); ?>