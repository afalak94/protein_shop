<?php

include_once 'header.php';
$sql = "SELECT * FROM categories WHERE parent = 0";
$pquery = $conn->query($sql); 

if (isset($_GET['cat'])) {
    $cat_id = $_GET['cat'];
} else {
    $cat_id = '';
}

$sql = "SELECT * FROM products WHERE categories = '$cat_id'";
$productQ = $conn->query($sql);

?>
<head>
    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
</head>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Protein Shop</p>

                <!-- categories -->
                <div class="list-group">

                    <?php while($parent = mysqli_fetch_assoc($pquery)) : ?>
                    <a href="category.php?cat=<?= $parent['id']; ?>" class="list-group-item"><?php echo $parent['category']; ?></a>
                    <?php endwhile; ?>

                </div>

            </div>

            <div class="col-md-9">

                <div class="row carousel-holder" style="margin-bottom: 10px;">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="images/gym-workout.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/workout1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/workout2.jpg" alt="">
                                </div>
                            </div>

                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>

<!-- category products -->
                <div class="row">

                    <?php while($product = mysqli_fetch_assoc($productQ)) : ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?= $product['image']; ?>" alt="">
                            <div class="caption">
                                <h4 class="pull-right"><?= $product['price']; ?>kn</h4><br>
                                <h4><a href="index3.php?id=<?= $product['id']; ?>"><?= $product['title']; ?></a></h4>
                            </div>
                            <div class="ratings"><?php $num_stars = $product['stars']; ?>
                                <p class="pull-right"><?= $product['reviews']; ?> reviews</p>
                                <p>
                                <?php for ($x = 0; $x < $num_stars; $x++) : ?>
                                    <span class="glyphicon glyphicon-star"></span>
                                <?php endfor; ?>
                                <?php for ($x = 0; $x < (5 - $num_stars); $x++) : ?>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                <?php endfor; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; ?>

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
                    <p>Copyright &copy; Prvo Masa 2017</p>
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