<?php

class UploadImage
{
    private $image;
    private $directory;
    private $userId;
    const maxUploadFile = 10 ** 6;
    const allowedExtension = ['png', 'jpg', 'jpeg','JPG','JPEG','PNG'];
    public function __construct($image,$directory)
    {
        $this->image=$image;
        $this->directory=$directory;
    }
    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }
    public function ValidationExtention()
    {
        $errors=[];
        $extension = $this->getExtentions();
        if (!in_array($extension, self::allowedExtension)) 
        {
            $msg = "<div class='alert alert-danger'>Allowed Extension Is ";
            // foreach (self::allowedExtension as $k => $v)
            // {
            //     $msg .= $v . " , ";
            // }
            $msg.=implode(', ',self::allowedExtension);
            $msg .= "</div>";
            $errors['extension'] = "<div class='alert alert-danger'>$msg</div>";
        }
        return $errors;
    }
    public function ValidationSize()
    {
        $errors=[];
        
        if ($this->image['size'] > self::maxUploadFile) {
            $errors['size'] = "<div class='alert alert-danger'>Too Large Image.</div>";
        }
        return $errors;
    }
    public function UploadNewImage()
    {
        $photoName = time() . "-" .$this->userId. '.' . $this->getExtentions();
        $fullPath = $this->directory . $photoName;
        $status['status']=move_uploaded_file($this->image['tmp_name'], $fullPath);
        $status['name']=$photoName;
        return $status;
    }
    public function getExtentions()
    {
        return pathinfo($this->image['name'], PATHINFO_EXTENSION);
    }
}