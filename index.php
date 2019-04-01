<?php
    include("includes/db.php");
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyShop</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
</head>
<body>

    <div class="main_wrapper">
        <!-- Header Section -->
        <div class="header_wrapper"> 
            <img src="images/onlineshop.gif" style="float:left; width:150px; height:100px;" >
            <img src="images/1.gif" style="float:right; height:100px; width:850px;">
        
        </div>
        <!-- Navigation Bar -->
        <div id="navbar" >
            <ul id="menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">All Products</a></li>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Sign Up</a></li>
                <li><a href="#">Shopping Cart</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>

            <div id="form">
                <form method="get" action="result.php" ecntype="multipart/form-data">
                <input type="text" name="user_query" placeholder="Search a Product" />
                <input type="submit" name="search" value="search" />
                </form>
            </div>

        
        </div>
        <!-- Content Area -->
        <div class="content_wrapper"> 
            <div id="left_sidebar">
                <div id="sidebar_title">Categories
                </div>

                <ul id="cats">

                    <?php
                    
                        $get_cats = "select * from categories";

                        $run_cats = mysqli_query($con, $get_cats);

                        while($row_cats = mysqli_fetch_array($run_cats)){

                            $cat_id = $row_cats['cat_id'];
                            $cat_title = $row_cats['cat_title'];

                        
                            echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
                            // <li><a href="#">Mobiles</a></li>


                        }

                    ?>


                </ul>

                <div id="sidebar_title">Brands
                </div>

                <ul id="cats">
                   
                    <?php
                        
                        $get_brands = "select * from brands";

                        $run_brands = mysqli_query($con, $get_brands);

                        while($row_brands = mysqli_fetch_array($run_brands)){

                            $brand_id = $row_brands['brand_id'];
                            $brand_title = $row_brands['brand_title'];

                        
                            echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
                            // <li><a href="#">Mobiles</a></li>


                        }

                    ?>



                </ul>

            
            </div>

            <!-- right content goes here -->
            <div id="right_content">

                <div id="headline">
                        <div id="headline_content">
                            <b>Welcome Guest!</b>
                            <b style="color:yellow;">Shopping Cart</b>
                            <span>- Items: - Price:</span>

                        </div>

                </div>

                <div id="products_box">
                            <?php   
                                $get_products = "select * from products order by rand() LIMIT 0,6";
                                $run_products = mysqli_query($con, $get_products);

                                while($row_products=mysqli_fetch_array($run_products)){

                                    $prod_id = $row_products['product_id'];
                                    $prod_title = $row_products['product_title'];
                                    $prod_cat = $row_products['cat_id'];
                                    $prod_brand = $row_products['brand_id'];
                                    $prod_desc = $row_products['product_desc'];
                                    $prod_price = $row_products['product_price'];
                                    $prod_image = $row_products['product_img1'];


                                    echo "
                                        <div id='single_product'>
                                            <h3>$prod_title</h3>
                                            <img src='admin_area/product_images/$prod_image' width='180' height='180' /><br>

                                            <p><b>Price: $prod_price INR</b></p>
                                            <a href='details.php?prod_id=$prod_id' style='float:left;'>Details</a>

                                            <a href='index.php?add_cart=$prod_id'><button style='float:right;'>Add to Cart</button></a>
                                        </div>
                                    
                                    
                                    ";

                                }   


                            ?>

                </div>
            
            
            
            
            </div>
    

        
        <!-- Footer Area -->
        <div class="footer">
            <h1 style="color:#000; padding-top:30px; text-align:center; font-size:18px; font-weight:bold"> &copy; 2019   -   By @nkit_sinha031 </h1>
        
        </div>
        




    </div>
    
</body>
</html>