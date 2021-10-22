<?php

include_once "views/layouts/header.php";


include_once "app/database/models/Product.php";
$productObject = new Product;
if ($_GET) {
    if (isset($_GET['pro'])) {

        if (is_numeric($_GET['pro'])) {
            $productObject->setId($_GET['pro']);
            $productFindResult = $productObject->find();
            if ($productFindResult) {
                $product = $productFindResult->fetch_object();
                //specs of product 
                $specsResult = $productObject->getProductSpecs();
                //total reviews of product 
                $ReviewsResult = $productObject->getProductReviews();
                $TotalReviews = $ReviewsResult->fetch_object();
                //users reviews for product
                $UsersReviewResult = $productObject->getUserReviewProduct();
                //related products 
                $RelateProductsResult = $productObject->getRelatedProduct();
                //tag for product
                $TagProductResult = $productObject->getProductTag();
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
$title = $product->name_en;
include_once "views/layouts/nav.php";
include_once "views/layouts/breadcrumb.php";

?>
<!-- Product Deatils Area Start -->
<div class="product-details pt-100 pb-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="product-details-img">
                    <img class="zoompro" src="assets/img/product-details/<?php
                                                                            if (isset($product)) {
                                                                                if (!empty($product)) {
                                                                                    echo $product->image;
                                                                                }
                                                                            }
                                                                            ?>" data-zoom-image="assets/img/product-details/product-detalis-bl1.jpg" alt="<?php
                                                                                                                                                            if (isset($product)) {
                                                                                                                                                                if (!empty($product)) {
                                                                                                                                                                    echo $product->image;
                                                                                                                                                                }
                                                                                                                                                            }
                                                                                                                                                            ?>" />
                    <!-- <div id="gallery" class="mt-20 product-dec-slider owl-carousel">
                        <a data-image="assets/img/product-details/product-detalis-l1.jpg" data-zoom-image="assets/img/product-details/product-detalis-bl1.jpg">
                            <img src="assets/img/product-details/product-detalis-s1.jpg" alt="">
                        </a>
                        <a data-image="assets/img/product-details/product-detalis-l2.jpg" data-zoom-image="assets/img/product-details/product-detalis-bl2.jpg">
                            <img src="assets/img/product-details/product-detalis-s2.jpg" alt="">
                        </a>
                        <a data-image="assets/img/product-details/product-detalis-l3.jpg" data-zoom-image="assets/img/product-details/product-detalis-bl3.jpg">
                            <img src="assets/img/product-details/product-detalis-s3.jpg" alt="">
                        </a>
                        <a data-image="assets/img/product-details/product-detalis-l4.jpg" data-zoom-image="assets/img/product-details/product-detalis-bl4.jpg">
                            <img src="assets/img/product-details/product-detalis-s4.jpg" alt="">
                        </a>
                        <a data-image="assets/img/product-details/product-detalis-l5.jpg" data-zoom-image="assets/img/product-details/product-detalis-bl5.jpg">
                            <img src="assets/img/product-details/product-detalis-s5.jpg" alt="">
                        </a>
                        <a data-image="assets/img/product-details/product-detalis-l2.jpg" data-zoom-image="assets/img/product-details/product-detalis-bl2.jpg">
                            <img src="assets/img/product-details/product-detalis-s2.jpg" alt="">
                        </a>
                    </div> -->
                    <!-- <span>-29%</span> -->
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="product-details-content">
                    <h4><?php
                        if (isset($product)) {
                            if (!empty($product)) {
                                echo $product->name_en;
                            }
                        }
                        ?></h4>
                    <div class="rating-review">
                        <div class="pro-dec-rating">
                            <?php
                            if (!empty($TotalReviews)) {
                                for ($i = 0; $i < $TotalReviews->reviews_average; $i++) {
                            ?>
                                    <i class="ion-android-star-outline theme-star"></i>
                                <?php
                                }
                                for ($x = $TotalReviews->reviews_average; $x < 5; $x++) {
                                ?>
                                    <i class="ion-android-star-outline"></i>
                            <?php
                                }
                            }
                            ?>

                            <!-- <i class="ion-android-star-outline theme-star"></i> -->
                            <!-- <i class="ion-android-star-outline theme-star"></i>
                            <i class="ion-android-star-outline theme-star"></i>
                            <i class="ion-android-star-outline theme-star"></i> -->
                        </div>
                        <div class="pro-dec-review">
                            <ul>
                                <?php
                                if (!empty($TotalReviews)) {

                                ?>
                                    <li><?php if (isset($TotalReviews->reviews_count)) {
                                            echo $TotalReviews->reviews_count;
                                        } else {
                                            echo '0';
                                        }
                                        ?> Reviews </li>
                                <?php
                                }
                                ?>

                                <li> Add Your Reviews</li>
                            </ul>
                        </div>
                    </div>
                    <span><?php
                            if (isset($product)) {
                                if (!empty($product)) {
                                    echo $product->price;
                                }
                            }
                            ?> EGP</span>
                    <?php
                    if (isset($product)) {
                        if (!empty($product)) {
                            if ($product->quantity >= 5) {
                                $stock = "In Stock";
                                $color = "success";
                            } else if ($product->quantity < 5 && $product->quantity >= 1) {
                                $stock = "In Stock";
                                $color = "warning";
                            } else {
                                $stock = "Out Of Stock";
                                $color = "danger";
                            }
                        }
                    }
                    ?>
                    <div class="in-stock">
                        <p>Available:
                            <span class="text-<?= $color ?>"><?= $stock ?></span>
                        </p>
                    </div>
                    <p><?=$product->desc_en?></p>
                    <div class="pro-dec-feature">
                        <ul>
                            <?php
                            if (isset($specsResult)) {
                                if (!empty($specsResult)) {
                                    $productspecs = $specsResult->fetch_all(MYSQLI_ASSOC);
                                    foreach ($productspecs as $i => $spec) {
                            ?>
                                        <li><input type="checkbox"><?php echo  $spec['name_en'] . " : "; ?><span><?php echo  $spec['spec_value']; ?></span></li>
                            <?php
                                    }
                                }
                            }
                            ?>
                            <!-- <li><input type="checkbox"> Remote Holder: <span> $9.99</span></li>
                            <li><input type="checkbox"> Koral Alexa Voice Remote Case: <span> Red $16.99</span></li>
                            <li><input type="checkbox"> Amazon Basics HD Antenna: <span>25 Mile $14.99</span></li> -->
                        </ul>
                    </div>
                    <div class="quality-add-to-cart">
                        <div class="quality">
                            <label>Qty:</label>
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value=<?php
                                                                                                    if (isset($product)) {
                                                                                                        if (!empty($product)) {
                                                                                                            echo $product->quantity;
                                                                                                        }
                                                                                                    }
                                                                                                    ?>>
                        </div>
                        <div class="row">
                            <div class="col-2 h1">
                                <a title="Add To Cart" href="#" class="text-success">
                                    <i class="fas fa-cart-arrow-down"></i>
                                </a>
                            </div>
                            <div class="col-2  h1">
                                <a title="Wishlist" href="#" class="text-danger">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="pro-dec-categories">
                        <ul>
                            <?php
                            if(isset($TagProductResult))
                            {
                                if(!empty($TagProductResult))
                                $TagProdct=$TagProductResult->fetch_object();
                                ?>
                                <li><a href="shop-by-cat.php?cat=<?= $TagProdct->cat_id ?>"><?= $TagProdct->cat_name ?>, </a></li>
                                <li><a href="shop.php?sub=<?= $TagProdct->sub_id ?>"><?= $TagProdct->sub_name?>, </a></li>
                                <li><a href="shop.php?brand=<?= $TagProdct->brand_id ?>"><?= $TagProdct->brand_name ?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Deatils Area End -->
<div class="description-review-area pb-70">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav text-center">
                <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                <a data-toggle="tab" href="#des-details2">Tags</a>
                <a data-toggle="tab" href="#des-details3">Review</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p><?=$product->desc_en?></p>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p> -->
                        <!-- <ul>
                            <li>- Typi non habent claritatem insitam</li>
                            <li>- Est usus legentis in iis qui facit eorum claritatem. </li>
                            <li>- Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</li>
                            <li>- Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</li>
                        </ul> -->
                    </div>
                </div>
                <div id="des-details2" class="tab-pane">
                    <div class="product-anotherinfo-wrapper">
                        <ul>
                            <li><span>Tags:</span></li>
                            <li><a href="#"> Green,</a></li>
                            <li><a href="#"> Herbal,</a></li>
                            <li><a href="#"> Loose,</a></li>
                            <li><a href="#"> Mate,</a></li>
                            <li><a href="#"> Organic ,</a></li>
                            <li><a href="#"> special</a></li>
                        </ul>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="rattings-wrapper">
                        <?php
                        if(isset($UsersReviewResult)){
                        if (!empty($UsersReviewResult)) {
                            $UserReviews = $UsersReviewResult->fetch_all(MYSQLI_ASSOC);
                            foreach ($UserReviews as $i => $userReview) {
                        ?>
                        <div class="sin-rattings">
                            <div class="star-author-all">
                                <div class="ratting-star f-left">
                                    <?php
                                    for($i=0;$i<$userReview['value'];$i++)
                                    {
                                        ?>
                                        <i class="ion-star theme-color"></i>
                                        <?php
                                    }
                                    for($x=$userReview['value']; $x < 5; $x++)
                                    {
                                        ?>
                                         <i class="ion-android-star-outline"></i>
                                        <?php
                                    }
                                    ?>
                                    <span>(<?=$userReview['value']?>)</span>
                                </div>
                                <div class="ratting-author f-right">
                                    <h3><?=$userReview['user_name']?></h3>
                                    <span><?=date("h:i A",strtotime($userReview['create_at']))?></span>
                                    <span><?=date("d/M/Y",strtotime($userReview['create_at']))?></span>
                                </div>
                            </div>
                            <p><?=$userReview['comment']?></p>
                        </div>
                        <?php
                            }
                        }
                    }
                        ?>
                        
                        <!-- <div class="sin-rattings">
                            <div class="star-author-all">
                                <div class="ratting-star f-left">
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="ratting-author f-right">
                                    <h3>Kahipo Khila</h3>
                                    <span>12:24</span>
                                    <span>9 March 2018</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
                        </div> -->
                    </div>
                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        <div class="ratting-form-wrapper">
                            <h3>Add your Comments :</h3>
                            <div class="ratting-form">
                                <form action="#">
                                    <div class="star-box">
                                        <h2>Rating:</h2>
                                        <div class="ratting-star">
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="rating-form-style mb-20">
                                                <input placeholder="Name" type="text" value="<?php echo $_SESSION['user']->first_name . " " . $_SESSION['user']->last_name; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="rating-form-style mb-20">
                                                <input placeholder="Email" type="text" value="<?php echo $_SESSION['user']->email; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="rating-form-style form-submit">
                                                <textarea name="message" placeholder="Message"></textarea>
                                                <input type="submit" value="add review">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pb-100">
    <div class="container">
        <div class="product-top-bar section-border mb-35">
            <div class="section-title-wrap">
                <h3 class="section-title section-bg-white">Related Products</h3>
            </div>
        </div>
        <div class="row">
            <?php
            if (isset($RelateProductsResult)) {
                if (!empty($RelateProductsResult)) {
                    $RelateProducts = $RelateProductsResult->fetch_all(MYSQLI_ASSOC);
                    foreach ($RelateProducts as $i => $Relateproduct) {
            ?>
                        <div class="col-3">
                            <div class="product-img">
                                <a href="product-details.php?pro=<?= $Relateproduct['id'] ?>">
                                    <img alt="" src="assets/img/product/<?= $Relateproduct['image'] ?>" width="200" height="400">
                                </a>
                                <!-- <span>-30%</span> -->
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
                                            <a href="product-details.php?pro=<?= $Relateproduct['id'] ?>"><?= $Relateproduct['name_en'] ?></a>
                                        </h4>
                                    </div>
                                    <div class="cart-hover">
                                        <h4><a href="product-details.php?pro=<?= $Relateproduct['id'] ?>">+ Add to cart</a></h4>
                                    </div>
                                </div>
                                <div class="product-price-wrapper">
                                    <span><?= $Relateproduct['price'] ?></span>
                                    <!-- <span class="product-price-old">$120.00 </span> -->
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>

            <!-- <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-2.jpg">
                    </a>
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
                                <a href="product-details.php">Society Ice Tea</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-3.jpg">
                    </a>
                    <span>-30%</span>
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
                                <a href="product-details.php">Green Tea Tulsi</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-4.jpg">
                    </a>
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
                                <a href="product-details.php">Best Friends Tea</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-5.jpg">
                    </a>
                    <span>-30%</span>
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
                                <a href="product-details.php">Instant Tea Premix</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<?php
include_once "views/layouts/footer.php"
?>