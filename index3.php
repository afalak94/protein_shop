<?php

include_once 'header.php';

$id = $_GET['id'];
$id = (int)$id;
$sql = "SELECT * FROM products WHERE id = '$id'";
$result = $conn->query($sql);
$product = mysqli_fetch_assoc($result);

$brand_num = $product['brand'];
$sql2 = "SELECT * FROM brand WHERE id = '$brand_num'";
$brand_result = $conn->query($sql2);
$brand = mysqli_fetch_assoc($brand_result);

$sql3 = "SELECT * FROM comments WHERE product_id = '$id'";
$comment_result = $conn->query($sql3);


?>
<head>
    <!-- Custom CSS -->
    <link href="css/half-slider.css" rel="stylesheet">

    <style type="text/css">
    
        .comment-box {
        width: 650px;
        padding: 20px;
        margin-bottom: 4px;
        background-color: #fff;
        border-radius: 4px;
        }

        .comment-insert-text {
            width: 100%;
            margin-top: 10px;
            height: 80px;
        }

    </style>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</head>
    <!-- Page Content -->
    <div class="container" style="margin-top: 70px;">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Protein Shop</p>
               
            </div>

            <div class="col-md-9">

                <div class="thumbnail">
                    <img class="img-responsive" src="<?= $product['image']; ?>" alt="">
                    <div class="caption-full">
                        <h2 class="pull-right"><?= $product['price']; ?> kn</h2>
                        <h2 style="color: blue;"><strong><?=$product['title'];?></strong></h2>
                        <h3><?=$brand['brand'];?></h3><br>
                        <?=$product['description'];?><br>
                    </div>
                    <div class="ratings">
                        <p class="pull-right"><?= $product['reviews']; ?> reviews</p>
                        <p><?php $num_stars = $product['stars']; ?>
                            <?php for ($x = 0; $x < $num_stars; $x++) : ?>
                                <span class="glyphicon glyphicon-star"></span>
                            <?php endfor; ?>
                            <?php for ($x = 0; $x < (5 - $num_stars); $x++) : ?>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            <?php endfor; ?>
                        </p>
                    </div>

                    <!-- shopping cart -->
                    <form action="add_cart.php" method="post" id="add_product_form">
                        <input type="hidden" name="product_id" value="<?= $id; ?>">
                        <div class="form-group">
                            <div class="col-xs-3"><label for="quantity">Quantity:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity">
                            </div><br><div class="col-xs-9">&nbsp;</div><br>
                        </div>
                        <div class="form-group"><br>
                            <label for="size">Size:</label>
                            <select name="size" id="size" class="form-control">
                                <option value="<?=$product['size1'];?>"><?= $product['size1']; ?></option>
                                <option value="<?=$product['size2'];?>"><?= $product['size2']; ?></option>
                                <option value="<?=$product['size3'];?>"><?= $product['size3']; ?></option>
                            </select>
                        </div>
                    </form>

                    <span id="modal_errors" class="bg-danger"></span>
                    <button class="btn btn-warning" onclick="add_to_cart();return false;"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>

                </div>


                <!-- REVIEWS -->
                <div class="well">
                <form action="comment.php" method="POST">

                    <div class="well">
                         
                        <textarea name="comment-post-text" class="comment-insert-text"></textarea>

                        <input type="hidden" name="userId" value="<?=$_SESSION['u_uid'];?>">
                        <input type="hidden" name="productId" value="<?=$id;?>">
                        <input type="hidden" name="date" value="<?=date("Y-m-d");?>">
                        <div class="col-xs-3"><label for="rating">Rating:</label>
                        <input type="number" class="form-control" name="rating">
                        </div>
                        <div class="text-right">
                            <button class="btn btn-success" type="submit" name="submit">Leave a Review</button>
                        </div>
                        <hr>
                    </div>
                </form>
                
                

                    <?php while($comments = mysqli_fetch_assoc($comment_result)): ?>
                        <div class="row">
                            <div class="col-md-12">

                                <p><?php $num_stars = $comments['rating']; ?>
                                <?php for ($x = 0; $x < $num_stars; $x++) : ?>
                                <span class="glyphicon glyphicon-star"></span>
                                <?php endfor; ?>
                                <?php for ($x = 0; $x < (5 - $num_stars); $x++) : ?>
                                <span class="glyphicon glyphicon-star-empty"> </span>
                                <?php endfor; ?>

                                <?= $comments['user_id']; ?></p>
                                <span class="pull-right"><?= $comments['date']; ?></span>
                                <p><?= $comments['comment']; ?></p>
                            </div>
                        </div>
                        <hr>
                    <?php endwhile; ?>

                    <hr>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <script>

        function add_to_cart(){
            jQuery('#modal_errors').html("");
            var size = jQuery('#size').val();
            var quantity = jQuery('#quantity').val();
            var error = '';
            var data = jQuery('#add_product_form').serialize();
            if (quantity == '' || quantity == 0) {
                error += '<p class="text-danger text-center">You must choose a quantity.</p>';
                jQuery('#modal_errors').html(error);
                return;
            } else {
                jQuery.ajax({
                    url: '/masa/add_cart.php',
                    method: 'post',
                    data: data,
                    success: function(){
                        location.reload();
                    },
                    error: function(){alert("something went wrong");}
                });
            }
        }
    </script>
</body>

</html>
