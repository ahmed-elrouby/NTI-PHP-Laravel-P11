<?php
// echo __DIR__."\..\config\connection.php";
require_once __DIR__ . "\..\config\connection.php";
require_once __DIR__ . "\..\config\crud.php";
class Product extends connection implements crud
{
    private $id;
    private $name_ar;
    private $name_en;
    private $price;
    private $image;
    private $status;
    private $desc_ar;
    private $desc_en;
    private $quantity;
    private $created_at;
    private $updated_at;
    private $subcategory_id;
    private $brand_id;


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of name_ar
     */
    public function getName_ar()
    {
        return $this->name_ar;
    }

    /**
     * Set the value of name_ar
     *
     * @return  self
     */
    public function setName_ar($name_ar)
    {
        $this->name_ar = $name_ar;

        return $this;
    }

    /**
     * Get the value of name_en
     */
    public function getName_en()
    {
        return $this->name_en;
    }

    /**
     * Set the value of name_en
     *
     * @return  self
     */
    public function setName_en($name_en)
    {
        $this->name_en = $name_en;

        return $this;
    }


    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of desc_ar
     */
    public function getDesc_ar()
    {
        return $this->desc_ar;
    }

    /**
     * Set the value of desc_ar
     *
     * @return  self
     */
    public function setDesc_ar($desc_ar)
    {
        $this->desc_ar = $desc_ar;

        return $this;
    }

    /**
     * Get the value of desc_en
     */
    public function getDesc_en()
    {
        return $this->desc_en;
    }

    /**
     * Set the value of desc_en
     *
     * @return  self
     */
    public function setDesc_en($desc_en)
    {
        $this->desc_en = $desc_en;

        return $this;
    }

    /**
     * Get the value of quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
    /**
     * Get the value of subcategory_id
     */
    public function getSubcategory_id()
    {
        return $this->subcategory_id;
    }

    /**
     * Set the value of subcategory_id
     *
     * @return  self
     */
    public function setSubcategory_id($subcategory_id)
    {
        $this->subcategory_id = $subcategory_id;

        return $this;
    }
    /**
     * Get the value of brand_id
     */
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }
    public function create()
    {
    }
    public function read()
    {
        $query = "select id,name_en,price,desc_en,image from products where status='1' order by price desc";
        return $this->runDQL($query);
    }
    public function update()
    {
    }
    public function delete()
    {
    }
    public function getProductBySub()
    {
        $query = "select id,name_en,price,desc_en,image from products where status='1' and subcategory_id='$this->subcategory_id'";
        return $this->runDQL($query);
    }
    public function getProductByBrand()
    {
        $query = "select id,name_en,price,desc_en,image from products where status='1' and brand_id='$this->brand_id'";
        return $this->runDQL($query);
    }
    public function find()
    {

        $query = "select * from products where status='1' and id= '$this->id'";
        return $this->runDQL($query);
    }
    public function getNewProducts()
    {

        $query = "select * from `products` WHERE `status`='1' and `quantity` > 0   ORDER by `create_at`  DESC  LIMIT 4";
        return $this->runDQL($query);
    }
    public function getProductSpecs()
    {

        $query = "SELECT `specs`.`name_en`,`specs_products`.`product_id`,`specs_products`.`spec_value` FROM `specs` join `specs_products` on `specs_products`.`spec_id`=`specs`.`id` WHERE `specs_products`.`product_id`= '$this->id'";
        return $this->runDQL($query);
    }
    public function getRelatedProduct()
    {
        //related products by category and all subcategory
        // $query="SELECT * from products WHERE subcategory_id in(SELECT id FROM subcategories where category_id=(SELECT category_id FROM subcategories where subcategories.id=(SELECT subcategory_id from products where id='$this->id'))) order by create_at desc limit 4";
        
        //related products by one subcategory 
        $query = "SELECT products.name_en,products.image,products.id,products.price FROM products WHERE subcategory_id=(SELECT subcategory_id from products where id= '$this->id')and id<> '$this->id' order by create_at desc limit 4";
        return $this->runDQL($query);
    }
    public function getProductReviews()
    {
        $query = "SELECT round(AVG(`value`)) as reviews_average,count(`product_id`)as reviews_count FROM `reviews` WHERE product_id = '$this->id'";
        return $this->runDQL($query);
    }
    public function getUserReviewProduct()
    {
        $query = "SELECT CONCAT(users.first_name,' ',users.last_name) as user_name ,`reviews`.`comment`,`reviews`.`value`,`reviews`.`create_at` From `reviews` join `users` on `reviews`.`user_id`=`users`.id WHERE reviews.product_id='$this->id' order by create_at desc ";
        return $this->runDQL($query);
    }
    public function getMostRatedProducts()
    {
        $query = "SELECT sum(reviews.value) as total_review,round(AVG(reviews.value),2) as average_review ,products.* FROM `reviews`JOIN products on reviews.product_id = products.id GROUP by reviews.product_id ORDER by total_review desc,average_review desc limit 4";
        return $this->runDQL($query);
    }
    public function getMostViewedProducts()
    {
        $query = "SELECT products.*,`views`.`user_id`,COUNT(`views`.`product_id`) as view_count FROM `views`JOIN products on`views`.`product_id`=products.id  GROUP BY `views`.product_id ORDER by view_count DESC limit 4";
        return $this->runDQL($query);
    }
    public function getMostOrderProducts()
    {
        //get most ordered by calculate sum quantity of product and height quantity will most orderd
        // $query = "SELECT products.*,sum(orders_products.quantity) as order_prodduct_total FROM `orders_products` join products on orders_products.product_id=products.id GROUP by orders_products.product_id ORDER by order_prodduct_total DESC limit 4";

        //get most ordered by calculate number of order on product
        $query = "SELECT products.*,count(orders_products.product_id) as order_prodduct_total FROM `orders_products` join products on orders_products.product_id=products.id GROUP by orders_products.product_id ORDER by order_prodduct_total DESC limit 4";

        return $this->runDQL($query);
    }
    public function getProductTag()
    {
        $query = "SELECT
        products.id AS pro_id,
        products.brand_id AS brand_id,
        products.subcategory_id AS sub_id,
        categories.id AS cat_id,
        products.name_en AS pro_name,
        subcategories.name_en AS sub_name,
        categories.name_en AS cat_name,
        brands.name_en AS brand_name
    FROM
        products
    LEFT JOIN brands ON products.brand_id = brands.id
    LEFT JOIN subcategories ON products.subcategory_id = subcategories.id
    LEFT JOIN categories ON subcategories.category_id = categories.id
    WHERE
        products.id ='$this->id'";  
        return $this->runDQL($query);
    }
}
