<?php
class loginRequest
{
    private $password;

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
        $this->password = $password;

        return $this;
    }
    public function passwordValidation()
    {
        //required , regex , confirmed
        $pattern = "/^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[a-z]).{8,}$/";
        if (empty($this->password)) {
            $this->errors["password-required"] = "<div class='alert alert-warning'>Password Is Required </div>";
        }
        else
        {
            if (!preg_match($pattern, $this->password))
                $this->errors["password-pattern"] = "<div class='alert alert-warning'>1 Capital character and 1 Small character and 1 Special character and Minmum 8 characters </div>";
        }

        return $this->errors;
    }
}