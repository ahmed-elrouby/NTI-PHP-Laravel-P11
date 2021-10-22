<?php
require_once __DIR__ . "\..\database\models\User.php";
class registerRequest
{
    private $email;
    private $password;
    private $confirmpassword;
    private $phone;
    private $errors = [];
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
        $this->password =$password;

        return $this;
    }

    /**
     * Get the value of confirmpassword
     */
    public function getConfirmpassword()
    {
        return $this->confirmpassword;
    }

    /**
     * Set the value of confirmpassword
     *
     * @return  self
     */
    public function setConfirmpassword($confirmpassword)
    {
        $this->confirmpassword = $confirmpassword;

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

    public function emailValidation()
    {
        $pattern = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
        if (empty($this->email)) {
            $this->errors["email-required"] = "<div class='alert alert-warning'>Email Is Required </div>";
        }
        else {
            if (!preg_match($pattern, $this->email)) {
                $this->errors["email-pattern"] = "<div class='alert alert-warning'>Email Is Invalid </div>";
            }
        }
        return $this->errors;
    }
    public function passwordValidation()
    {
        //required , regex , confirmed
        $pattern = "/^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[a-z]).{8,}$/";
        if (empty($this->password)) {
            $this->errors["password-required"] = "<div class='alert alert-warning'>Password Is Required </div>";
        }   
        if (empty($this->confirmpassword)) {
            $this->errors["confirmpassword-required"] = "<div class='alert alert-warning'>Confirm Password Is Required </div>";
        }
        if (empty($this->errors)) {
            if ($this->password !== $this->confirmpassword)
                $this->errors["password-confirm"] = "<div class='alert alert-warning'>Password And Confirm Password Doesn't Match </div>";
            if (!preg_match($pattern, $this->password))
                $this->errors["password-pattern"] = "<div class='alert alert-warning'>1 Capital character and 1 Small character and 1 Special character and Minmum 8 characters </div>";
        }
        return $this->errors;
    }
    public function emailExists()
    {
        $userobject = new User;
        $userobject->setEmail($this->email);
        $result = $userobject->chekIfEmailExists();
        if ($result) {
            $this->errors['email-unique'] = "<div class='alert alert-warning'>Email Already Exists</div>";
        }
        return $this->errors;
    }
    public function phoneExists()
    {
        $userobject = new User;
        $userobject->setPhone($this->phone);
        $result = $userobject->chekIfPhoneExists();
        if ($result) {
            $this->errors['phone-unique'] = "<div class='alert alert-warning'>Phone Already Exists</div>";
        }
        return $this->errors;
    }

    
}
