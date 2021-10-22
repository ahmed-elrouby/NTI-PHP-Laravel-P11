<?php
$title = 'Offers Shop';
include_once "views/layouts/header.php";
include_once "views/layouts/nav.php";
include_once "views/layouts/breadcrumb.php";
include_once "app/database/models/Offer.php";
$offerInstanse = new Offer;
if ($_GET) {
    if (isset($_GET['offer'])) {
        if (is_numeric($_GET['offer'])) {
            $offerInstanse->setId($_GET['offer']);
            $offerFindResult = $offerInstanse->find();
            if ($offerFindResult) {
                $offerResults = $offerInstanse->getOffersProducts();
            } else {
                header("location:views/errors/404.php");
                die;
            }
        } else {
            header("location:views/errors/404.php");
            die;
        }
    } else {
        header("location:views/errors/404.php");
        die;
    }
}

?>
<div class="grid-list-product-wrapper">
    <div class="product-grid product-view pb-20">
        <div class="row">
            <?php
            if (!empty($offerResults)) {
                $productResult = $offerResults->fetch_all(MYSQLI_ASSOC);
                foreach ($productResult as $i => $v) {
            ?>

                    <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="product-details.php?pro=<?= $v['id'] ?>">
                                    <img alt="" src="assets/img/product/<?php echo $v['image']; ?>" width="200px" height="200px">
                                </a>
                                
                                <?php 
                                    if($v['discount_type']=='2')
                                    {
                                        echo "<span>-{$v['discount']}%</span>";
                                    }
                                    elseif($v['discount_type']=='3')
                                    {
                                        echo "<span>-{$v['discount']} LE</span>";
                                    }
                                     ?>
                                    
                                <div class="product-action">
                                    <a class="action-wishlist" href="#" title="Wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="action-cart" href="#" title="Add To Cart">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content text-left">
                                <div class="product-hover-style">
                                    <div class="product-title">
                                        <h4>
                                            <a href="product-details.php"><?php echo $v['name_en']; ?></a>
                                        </h4>
                                    </div>
                                    <div class="cart-hover">
                                        <h4><a href="product-details.php">+ Add to cart</a></h4>
                                    </div>
                                </div>
                                <div class="product-price-wrapper">
                                    <span><?php
                                            if ($v['discount_type'] == '2') {
                                                echo $v['price'] - ($v['price'] * ($v['discount'] / 100));
                                            } elseif ($v['discount_type'] == '3') {
                                                echo $v['price'] - $v['discount'];
                                            } else {
                                                echo $v['price'];
                                            }
                                            ?></span>
                                    <!-- <span class="product-price-old">$120.00 </span> -->
                                </div>
                            </div>
                            <div class="product-list-details">
                                <h4>
                                    <a href="product-details.php">Nature Close Tea</a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span>$100.00</span>
                                    <span class="product-price-old">$120.00 </span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <div class="shop-list-cart-wishlist">
                                    <a href="#" title="Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                    <a href="#" title="Add To Cart"><i class="ion-ios-shuffle-strong"></i></a>
                                    <a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<div class='alert alert-danger'>Some Thing Went Wrong</div>";
            }
            ?>
        </div>
    </div>
    <div class="pagination-total-pages">
        <div class="pagination-style">
            <ul>
                <li><a class="prev-next prev" href="#"><i class="ion-ios-arrow-left"></i> Prev</a></li>
                <li><a class="active" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">10</a></li>
                <li><a class="prev-next next" href="#">Next<i class="ion-ios-arrow-right"></i> </a></li>
            </ul>
        </div>
        <div class="total-pages">
            <p>Showing 1 - 20 of 30 results </p>
        </div>
    </div>
</div>



<!-- </div>
            <div class="col-lg-3">
               
            </div>
        </div>
    </div>
</div> -->
<?php
include_once "views/layouts/footer.php";
?>