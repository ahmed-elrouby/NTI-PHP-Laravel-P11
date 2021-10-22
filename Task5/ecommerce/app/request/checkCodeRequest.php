<?php
class checkCodeRequest
{
    private $code;

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
    public function codeValidation()
    {
        $error = [];
        if (empty($this->code)) {
            $errors['code-required'] = "<div class='alert alert-danger'>Code Is Required</div>";
        } else {
            if (!is_numeric($this->code)) {
                $errors['code-numeric'] = "<div class='alert alert-danger'>Code Must Be Number</div>";
            } else {
                if (strlen($this->code) != 5) {
                    $errors['code-invalid'] = "<div class='alert alert-danger'>Invalid Code</div>";
                }
            }
        }

        return $errors;
    }
}
