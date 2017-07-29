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

?>
<head>
    <!-- Custom CSS -->
    <link href="css/half-slider.css" rel="stylesheet">
</head>
    <!-- Page Content -->
    <div class="container" style="margin-top: 70px;">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Protein Shop</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Proteini</a>
                    <a href="#" class="list-group-item">Vitamini</a>
                    <a href="#" class="list-group-item">Povećanje mičićne mase</a>
                    <a href="#" class="list-group-item">Odjeća i obuća</a>
                    <a href="#" class="list-group-item">Fitness sprave i oprema</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="thumbnail">
                    <img class="img-responsive" src="<?= $product['image']; ?>" alt="">
                    <div class="caption-full">
                        <h2 class="pull-right">299,99kn</h2>
                        <h2 style="color: blue;"><strong><?= $product['title']; ?></strong></h2>
                        <h3><?= $brand['brand']; ?></h3><br>
                        <?= $product['description']; ?><br>
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
                </div>


                <!-- REVIEWS -->
                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">12 days ago</span>
                            <p>I've alredy ordered another one!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
                        </div>
                    </div>

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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
