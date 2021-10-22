<?php

include_once __DIR__."\..\config\connection.php";
include_once __DIR__."\..\config\crud.php";
class Offer extends connection implements crud
{

    private $id;
    private $title_ar;
    private $title_en;
    private $desc_en;
    private $desc_ar;
    private $image;
    private $discount;  
    private $discount_type;  
    private $start_date;  
    private $end_date;  
    private $created_at;  
    private $updated_at;  
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title_ar
     */ 
    public function getTitle_ar()
    {
        return $this->title_ar;
    }

    /**
     * Set the value of title_ar
     *
     * @return  self
     */ 
    public function setTitle_ar($title_ar)
    {
        $this->title_ar = $title_ar;

        return $this;
    }

    /**
     * Get the value of title_en
     */ 
    public function getTitle_en()
    {
        return $this->title_en;
    }

    /**
     * Set the value of title_en
     *
     * @return  self
     */ 
    public function setTitle_en($title_en)
    {
        $this->title_en = $title_en;

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
     * Get the value of discount
     */ 
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set the value of discount
     *
     * @return  self
     */ 
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get the value of discount_type
     */ 
    public function getDiscount_type()
    {
        return $this->discount_type;
    }

    /**
     * Set the value of discount_type
     *
     * @return  self
     */ 
    public function setDiscount_type($discount_type)
    {
        $this->discount_type = $discount_type;

        return $this;
    }

    /**
     * Get the value of start_date
     */ 
    public function getStart_date()
    {
        return $this->start_date;
    }

    /**
     * Set the value of start_date
     *
     * @return  self
     */ 
    public function setStart_date($start_date)
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * Get the value of end_date
     */ 
    public function getEnd_date()
    {
        return $this->end_date;
    }

    /**
     * Set the value of end_date
     *
     * @return  self
     */ 
    public function setEnd_date($end_date)
    {
        $this->end_date = $end_date;

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
    function create()
    {
    }
    function read()
    {
        $query="SELECT * FROM `offers` WHERE start_date<= '$this->start_date' and end_date>= '$this->end_date'";
        return $this->runDQL($query);
    }
    function update()
    {

    }
    function delete()
    {

    }
    public function find()
    {
         
        $query = "select * from offers where id= '$this->id'";
        return $this->runDQL($query);
    }
    public function getOffersProducts()
    {
        $query = "SELECT `offers`.`discount`,`offers`.`discount_type`,`products`.*  FROM `offers` JOIN `offers_products` on `offers_products`.`offer_id`=`offers`.`id` JOIN `products` on `offers_products`.`product_id`=`products`.`id` WHERE `offers`.id=$this->id";
        return $this->runDQL($query);
    }
}
