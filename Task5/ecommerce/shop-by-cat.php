<?php
$title = 'Category Shop';
include_once "views/layouts/header.php";
include_once "views/layouts/nav.php";
include_once "views/layouts/breadcrumb.php";
include_once "app/database/models/Category.php";
include_once "app/database/models/Subcategory.php";
include_once "app/database/models/Product.php";
$subcategoryObject = new Subcategory;
$categoryObject = new Category;
if ($_GET) {
    if (isset($_GET['cat'])) {

        if (is_numeric($_GET['cat'])) {
            $categoryObject->setId($_GET['cat']);
            $categoryFindResult = $categoryObject->find();
            if ($categoryFindResult) {
                $subcategoryObject->setCategory_id($_GET['cat']);
                $subcategoriesValues = $subcategoryObject->getSubByCat();
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
            if (isset($subcategoriesValues)) {
                if (!empty($subcategoriesValues)) {
                    $subcats = $subcategoriesValues->fetch_all(MYSQLI_ASSOC);
                        foreach ($subcats as $i => $v) {
            ?>
                            <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30 mt-20 ml-3">
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="shop.php?sub=<?= $v['id'] ?>">
                                            <img alt="" src="assets/img/subcategory/<?=$v['image']?>">
                                        </a>
                                        <!-- <div class="product-action">
                                                    <a class="action-wishlist" href="#" title="Wishlist">
														<i class="ion-android-favorite-outline"></i>
													</a>
													<a class="action-cart" href="#" title="Add To Cart">
														<i class="ion-ios-shuffle-strong"></i>
													</a>
													<a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
														<i class="ion-ios-search-strong"></i>
													</a>
                                                </div> -->
                                    </div>
                                    <div class="product-content text-left">
                                        <div class="product-hover-style">
                                            <div class="product-title">
                                                <h4>
                                                    <a href="shop.php?sub=<?= $v['id'] ?>"><?= $v['name_en'] ?></a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-list-details">
                                        <h4>
                                            <a href="shop.php?sub=<?= $v['id'] ?>"><?= $v['name_en'] ?></a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
            <?php
                        }
                    
                }
                else
                {
                    echo "<div class='alert alert-warning col-12 text-center'>NO Subcategories For This Category.</div>";
                }
            }
           
            ?>
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