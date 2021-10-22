<?php
$title = 'Shop';
include_once "views/layouts/header.php";
include_once "views/layouts/nav.php";
include_once "views/layouts/breadcrumb.php";
include_once "app/database/models/Product.php";
include_once "app/database/models/Category.php";
include_once "app/database/models/Subcategory.php";
include_once "app/database/models/Brand.php";
$category = new Category;
$categoryResult = $category->read();
$Subcategory = new Subcategory;
$productObject = new Product;
$Brand = new Brand;
if ($_GET) {
    if (isset($_GET['sub'])) {

        if (is_numeric($_GET['sub'])) {
            $Subcategory->setId($_GET['sub']);
            $subCatFindResult = $Subcategory->find();
            if ($subCatFindResult) {
                $productObject->setSubcategory_id($_GET['sub']);
                $readResult = $productObject->getProductBySub();
            } else {
                header("location:views/errors/404.php");
                die;
            }
        } else {
            header("location:views/errors/404.php");
            die;
        }
    } elseif (isset($_GET['brand'])) {
        if (is_numeric($_GET['brand'])) {
            $Brand->setId($_GET['brand']);
            echo "{$_GET['brand']}<br>";
            $BrandFindResult = $Brand->find();
            // print_r($BrandFindResult);
            // die;
            if ($BrandFindResult) {
                $productObject->setBrand_id($_GET['brand']);
                $readResult = $productObject->getProductByBrand();
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
} else {
    $readResult = $productObject->read();
}
?>
<!-- Breadcrumb Area End -->
<!-- Shop Page Area Start -->
<div class="shop-page-area ptb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-topbar-wrapper">
                    <div class="shop-topbar-left">
                        <ul class="view-mode">
                            <li class="active"><a href="#product-grid" data-view="product-grid"><i class="fa fa-th"></i></a></li>
                            <li><a href="#product-list" data-view="product-list"><i class="fa fa-list-ul"></i></a></li>
                        </ul>
                        <p>Showing 1 - 20 of 30 results </p>
                    </div>
                    <div class="product-sorting-wrapper">
                        <div class="product-shorting shorting-style">
                            <label>View:</label>
                            <select>
                                <option value=""> 20</option>
                                <option value=""> 23</option>
                                <option value=""> 30</option>
                            </select>
                        </div>
                        <div class="product-show shorting-style">
                            <label>Sort by:</label>
                            <select>
                                <option value="">Default</option>
                                <option value=""> Name</option>
                                <option value=""> price</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grid-list-product-wrapper">
                    <div class="product-grid product-view pb-20">
                        <div class="row">
                            <?php
                            if (!empty($readResult)) {
                                $productResult = $readResult->fetch_all(MYSQLI_ASSOC);
                                foreach ($productResult as $i => $v) {
                            ?>

                                    <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="product-details.php?pro=<?= $v['id'] ?>">
                                                    <img alt="" src="assets/img/product/<?php echo $v['image']; ?>" width="200px" height="200px">
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
                                                            <a href="product-details.php"><?php echo $v['name_en']; ?></a>
                                                        </h4>
                                                    </div>
                                                    <div class="cart-hover">
                                                        <h4><a href="product-details.php">+ Add to cart</a></h4>
                                                    </div>
                                                </div>
                                                <div class="product-price-wrapper">
                                                    <span><?php echo $v['price']; ?></span>
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
            </div>
            <div class="col-lg-3">
                <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                    <div class="shop-widget">
                        <h4 class="shop-sidebar-title">Shop By Categories</h4>
                        <div class="shop-catigory">
                            <ul id="faq">
                                <?php
                                if ($categoryResult) {
                                    $categories = $categoryResult->fetch_all(MYSQLI_ASSOC);
                                    foreach ($categories as $i => $cat) {

                                ?><li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-1"><?php echo $cat['name_en']; ?> <i class="ion-ios-arrow-down"></i></a>
                                            <ul id="shop-catigory-1" class="panel-collapse collapse show">
                                                <?php
                                                $Subcategory->setCategory_id($cat['id']);
                                                $SubcategoryResult = $Subcategory->getSubByCat();
                                                if ($SubcategoryResult) {
                                                    $SubCategory = $SubcategoryResult->fetch_all(MYSQLI_ASSOC);
                                                    foreach ($SubCategory as $i => $sub) {
                                                ?>
                                                        <li><a href="shop.php?sub=<?php echo $sub['id']; ?>"><?php echo $sub['name_en']; ?></a></li>
                                                <?php
                                                    }
                                                } else {
                                                    echo "<div class='text-warning'>NO Subcategory Yet</div>";
                                                }

                                                ?>
                                            </ul>
                                        </li>
                                <?php
                                    }
                                }
                                ?>


                                <!-- <li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-2">Tea Trends<i class="ion-ios-arrow-down"></i></a>
                                            <ul id="shop-catigory-2" class="panel-collapse collapse">
                                                <li><a href="#">Pu'Erh</a></li>
                                                <li><a href="#">Black</a></li>
                                                <li><a href="#">White</a></li>
                                                <li><a href="#">Yellow Tea</a></li>
                                                <li><a href="#">Puer Tea</a></li>
                                            </ul>
                                        </li>
                                        <li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-3">Most Tea Map <i class="ion-ios-arrow-down"></i></a>
                                            <ul id="shop-catigory-3" class="panel-collapse collapse">
                                                <li><a href="#">Green Tea</a></li>
                                                <li><a href="#">Oolong Tea</a></li>
                                                <li><a href="#">Black Tea</a></li>
                                                <li><a href="#">Pu'erh Tea </a></li>
                                                <li><a href="#">Dark Tea</a></li>
                                            </ul>
                                        </li>
                                        <li> <a href="#">Herbal Tea</a> </li>
                                        <li> <a href="#">Rooibos Tea</a></li>
                                        <li> <a href="#">Organic Tea</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="shop-price-filter mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">Price Filter</h4>
                        <div class="price_filter mt-25">
                            <span>Range: $100.00 - 1.300.00 </span>
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <div class="label-input">
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                </div>
                                <button type="button">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">By Brand</h4>
                        <div class="sidebar-list-style mt-20">
                            <ul>
                                <li><input type="checkbox"><a href="#">Green </a>
                                <li><input type="checkbox"><a href="#">Herbal </a></li>
                                <li><input type="checkbox"><a href="#">Loose </a></li>
                                <li><input type="checkbox"><a href="#">Mate </a></li>
                                <li><input type="checkbox"><a href="#">Organic </a></li>
                                <li><input type="checkbox"><a href="#">White </a></li>
                                <li><input type="checkbox"><a href="#">Yellow Tea </a></li>
                                <li><input type="checkbox"><a href="#">Puer Tea </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">By Color</h4>
                        <div class="sidebar-list-style mt-20">
                            <ul>
                                <li><input type="checkbox"><a href="#">Black </a></li>
                                <li><input type="checkbox"><a href="#">Blue </a></li>
                                <li><input type="checkbox"><a href="#">Green </a></li>
                                <li><input type="checkbox"><a href="#">Grey </a></li>
                                <li><input type="checkbox"><a href="#">Red</a></li>
                                <li><input type="checkbox"><a href="#">White </a></li>
                                <li><input type="checkbox"><a href="#">Yellow </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">Compare Products</h4>
                        <div class="compare-product">
                            <p>You have no item to compare. </p>
                            <div class="compare-product-btn">
                                <span>Clear all </span>
                                <a href="#">Compare <i class="fa fa-check"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">Popular Tags</h4>
                        <div class="shop-tags mt-25">
                            <ul>
                                <li><a href="#">Green</a></li>
                                <li><a href="#">Oolong</a></li>
                                <li><a href="#">Black</a></li>
                                <li><a href="#">Pu'erh</a></li>
                                <li><a href="#">Dark </a></li>
                                <li><a href="#">Special</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Page Area End -->
<!-- Footer style Start -->
<?php
include_once "views/layouts/footer.php"
?>