<?php
class User
{
    private $name;
    private $email;
    private $pass;
    public function setUp():void
    {
        $this->name = new name();
        $this->email = new email();
        $this->pass = new pass();
    }
    public function tearDown()
    {
        unset($this->name);
        unset($this->email);
        unset($this->pass);
    }
    public function Name($val)
    {        
        $name=$val;
    }
    public function Name()
    {        
        return $name;
    }
    public function Email($val)
    {        
        $email=$val;
    }
    public function Email()
    {        
        return $email;
    }
    public function Pass($val)
    {        
        $pass=$val;
    }
    public function Pass()
    {        
        return $pass;
    }
}