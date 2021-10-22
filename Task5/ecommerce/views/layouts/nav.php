 <?php
 include_once "app/database/models/Category.php";
 include_once "app/database/models/Subcategory.php";
 $category=new Category;
 $categoryResult=$category->read();
 $Subcategory=new Subcategory;
 ?>
 <!-- header start -->
      <header class="header-area gray-bg clearfix">
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="logo">
                                <a href="index.php">
                                    <img alt="" src="assets/img/logo/logo.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-6">
                            <div class="header-bottom-right">
                                <div class="main-menu">
                                    <nav>
                                        <ul>
                                            <li class="top-hover"><a href="index.php">home</a>
                                            </li>
                                            <li class="mega-menu-position top-hover"><a href="shop.php">shop</a>
                                            </li>
                                            <li class="mega-menu-position top-hover"><a href="#">Categorise</a>
                                                <ul class="mega-menu">
                                                    <?php
                                                    if($categoryResult)
                                                    {
                                                        $categories=$categoryResult->fetch_all(MYSQLI_ASSOC);
                                                        foreach($categories as $i=>$cat)
                                                        {
                                                            
                                                            ?><li>
                                                            <ul>
                                                            <a href="shop-by-cat.php?cat=<?php echo $cat['id']; ?>" class="h1 text-primary"><li class="mega-menu-title"><?php echo $cat['name_en'];?></li></a>
                                                                <?php
                                                                $Subcategory->setCategory_id($cat['id']);
                                                                $SubcategoryResult=$Subcategory->getSubByCat();
                                                                if($SubcategoryResult)
                                                                {
                                                                    $SubCategory=$SubcategoryResult->fetch_all(MYSQLI_ASSOC);
                                                                    foreach($SubCategory as $i=>$sub)
                                                                    {
                                                                        ?>
                                                                        <li><a href="shop.php?sub=<?php echo $sub['id']; ?>"><?php echo $sub['name_en']; ?></a></li>
                                                                        <?php
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    echo "<div class='text-warning'>NO Subcategory Yet</div>";
                                                                }
                                                                
                                                                ?>
                                                            </ul>
                                                        </li>
                                                        <?php
                                                        }
                                                    }
                                                    ?>
                                                    
                                                    <!-- <li>
                                                        <ul>
                                                            <li class="mega-menu-title">Categories 02</li>
                                                            <li><a href="shop.php">Balsam</a></li>
                                                            <li><a href="shop.php">Baneberry</a></li>
                                                            <li><a href="shop.php">Bee Balm</a></li>
                                                            <li><a href="shop.php">Begonia</a></li>
                                                            <li><a href="shop.php">Bellflower</a></li>
                                                            <li><a href="shop.php">Bergenia</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                            <li class="mega-menu-title">Categories 03</li>
                                                            <li><a href="shop.php">Caladium</a></li>
                                                            <li><a href="shop.php">Calendula</a></li>
                                                            <li><a href="shop.php">Carnation</a></li>
                                                            <li><a href="shop.php">Catmint</a></li>
                                                            <li><a href="shop.php">Celosia</a></li>
                                                            <li><a href="shop.php">Chives</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                            <li class="mega-menu-title">Categories 04</li>
                                                            <li><a href="shop.php">Daffodil</a></li>
                                                            <li><a href="shop.php">Dahlia</a></li>
                                                            <li><a href="shop.php">Daisy</a></li>
                                                            <li><a href="shop.php">Diascia</a></li>
                                                            <li><a href="shop.php">Dusty Miller</a></li>
                                                            <li><a href="shop.php">Dame’s Rocket</a></li>
                                                        </ul>
                                                    </li> -->
                                                </ul>
                                            </li>
                                            
                                           
                                            <li><a href="contact.php">contact</a></li>
                                            <li><a href="about-us.html">about</a></li>
                                        </ul>
                                    </nav>
                                </div>
								<div class="header-currency">
                                    <?php

                                    if(isset($_SESSION['user'])){
                                        // print_r($_SESSION['user']);
                                        echo "<span class='digit'>".$_SESSION['user']->first_name." ".$_SESSION['user']->last_name."<i class='ti-angle-down'></i></span>
                                        <div class='dollar-submenu'>
                                            <ul>
                                                <li><a href='profile.php'>MY Acount</a></li>
                                                <li><a href='logout.php'>Logout</a></li>
                                            </ul>
                                        </div>";
                                    }
                                    else
                                    {
                                        echo "<span class='digit'>Wecome <i class='ti-angle-down'></i></span>
                                        <div class='dollar-submenu'>
                                            <ul>
                                                <li><a href='login.php'>Login</a></li>
                                                <li><a href='register.php'>Register</a></li>
                                            </ul>
                                        </div>";
                                    }
                                    ?>
								</div>
                                <div class="header-cart">
                                    <a href="#">
                                        <div class="cart-icon">
                                            <i class="ti-shopping-cart"></i>
                                        </div>
                                    </a>
                                    <div class="shopping-cart-content">
                                        <ul>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="assets/img/cart/cart-1.jpg"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">Phantom Remote </a></h4>
                                                    <h6>Qty: 02</h6>
                                                    <span>$260.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="ion ion-close"></i></a>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="assets/img/cart/cart-2.jpg"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">Phantom Remote</a></h4>
                                                    <h6>Qty: 02</h6>
                                                    <span>$260.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="ion ion-close"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-total">
                                            <h4>Shipping : <span>$20.00</span></h4>
                                            <h4>Total : <span class="shop-total">$260.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-btn">
                                            <a href="cart-page.php">view cart</a>
                                            <a href="checkout.php">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul class="menu-overflow">
                                    <li><a href="#">HOME</a>
                                        <ul>
                                            <li><a href="index.php">home version 1</a></li>
                                            <li><a href="index-2.php">home version 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop.php"> Shop </a>
                                        <ul>
                                            <li><a href="#">Categories 01</a>
                                                <ul>
                                                    <li><a href="shop.php">Aconite</a></li>
                                                    <li><a href="shop.php">Ageratum</a></li>
                                                    <li><a href="shop.php">Allium</a></li>
                                                    <li><a href="shop.php">Anemone</a></li>
                                                    <li><a href="shop.php">Angelica</a></li>
                                                    <li><a href="shop.php">Angelonia</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Categories 02</a>
                                                <ul>
                                                    <li><a href="shop.php">Balsam</a></li>
                                                    <li><a href="shop.php">Baneberry</a></li>
                                                    <li><a href="shop.php">Bee Balm</a></li>
                                                    <li><a href="shop.php">Begonia</a></li>
                                                    <li><a href="shop.php">Bellflower</a></li>
                                                    <li><a href="shop.php">Bergenia</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Categories 03</a>
                                                <ul>
                                                    <li><a href="shop.php">Caladium</a></li>
                                                    <li><a href="shop.php">Calendula</a></li>
                                                    <li><a href="shop.php">Carnation</a></li>
                                                    <li><a href="shop.php">Catmint</a></li>
                                                    <li><a href="shop.php">Celosia</a></li>
                                                    <li><a href="shop.php">Chives</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Categories 04</a>
                                                <ul>
                                                    <li><a href="shop.php">Daffodil</a></li>
                                                    <li><a href="shop.php">Dahlia</a></li>
                                                    <li><a href="shop.php">Daisy</a></li>
                                                    <li><a href="shop.php">Diascia</a></li>
                                                    <li><a href="shop.php">Dusty Miller</a></li>
                                                    <li><a href="shop.php">Dame’s Rocket</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.php"> Contact us </a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>