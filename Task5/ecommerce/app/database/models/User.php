<?php
// echo __DIR__."\..\config\connection.php";
require_once __DIR__ . "\..\config\connection.php";
require_once __DIR__ . "\..\config\crud.php";
class User extends connection implements crud
{
    private $id;
    private $first_name;
    private $last_name;
    private $phone;
    private $email;
    private $password;
    private $status;
    private $code;
    private $image;
    private $verified_at;
    private $gender;
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
     * Get the value of first_name
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */
    public function setFirst_name($first_name)
    {

        $this->first_name = $this->SqlInjection($first_name);

        return $this;
    }

    /**
     * Get the value of last_name
     */
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */
    public function setLast_name($last_name)
    {
        $this->last_name = $this->SqlInjection($last_name);

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = sha1($password);

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
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode($code)
    {
        $this->code = $code;

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
     * Get the value of verified_at
     */
    public function getVerified_at()
    {
        return $this->verified_at;
    }   
    /**
     * Set the value of verified_at
     *
     * @return  self
     */
    public function setVerified_at($verified_at)
    {
        $this->verified_at = $verified_at;

        return $this;
    }
    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

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

    public function create()
    {
        $query = "insert into users(first_name,last_name,email,phone,gender,password,code) values ('$this->first_name','$this->last_name','$this->email','$this->phone','$this->gender','$this->password','$this->code')";
        return $this->runDML($query);
    }
    public function read()
    {
    }
    public function update()
    {
        $query = "update users set first_name= '$this->first_name', last_name= '$this->last_name', phone= '$this->phone', gender= '$this->gender'";
        if($this->image)
        {
            $query.=", image= '$this->image'";
        }
        $query .=" where email= '$this->email'";
        return $this->runDML($query);
    }
    public function delete()
    {
    }
    public function chekIfEmailExists()
    {
        $query = "select * from users where email= '$this->email'";
        return $this->runDQL($query);
    }
    public function chekIfPhoneExists()
    {
        $query = "select * from users where phone= '$this->phone'";
        return $this->runDQL($query);
    }
    public function checkCode()
    {
        $query = "select * from users where email= '$this->email' and code= '$this->code'";
        return $this->runDQL($query);
    }
    public function verifyUser()
    {
        $query = "update users set status='$this->status', verified_at= '$this->verified_at' where email= '$this->email'";
        return $this->runDML($query);
    }
    public function login()
    {
        $query = "select * from users where email= '$this->email' and password= '$this->password'";
        return $this->runDQL($query);
    }
    public function updateCode()
    {
        $query = "update users set code= '$this->code' where email= '$this->email'";
        return $this->runDML($query);
    }
    public function updatePassword()
    {
        $query = "update users set password= '$this->password' where email= '$this->email'";
        return $this->runDML($query);
    }
    public function updateEmail()
    {
        
        $query = "update users set email= '$this->email', status= '$this->status', verified_at= $this->verified_at, code= '$this->code' where id= '$this->id'";
        return $this->runDML($query);
    }
}
