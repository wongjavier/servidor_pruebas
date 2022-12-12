<?php 
declare(strict_types=1);
namespace App;
class User 
{
     /**
     * @throws MissingNameException
     * @throws MissingEmailException
     * @throws MissingPassException
     * @throws InvalidArgumentEmailException
     */
    public function __construct(string $name, string $email, string $pass)
    { 
        $this->validate($name, $email, $pass);                
    }
     /**
     * @throws MissingNameException
     * @throws MissingEmailException
     * @throws MissingPassException
     * @throws InvalidArgumentEmailException
     */
    public function validate(string $name, string $email, string $pass)
    {              
        $this->setName($name);
        $this->setEmail($email);
        $this->setPass($pass);
    }
    public function setName($name)
    {       
        if(empty($name) || strlen($name) > 100)
        {
            throw new MissingNameException();
        } 
        $this->name=$name;
    }
    public function getName():String
    {        
        return $this->name;
    }
    public function setEmail($email)
    {       
        if(empty($email) || strlen($email) > 100)
        {
            throw new MissingEmailException();
        }        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            throw new InvalidArgumentEmailException();
        } 
        $this->email=$email;
    }
    public function getEmail()
    {        
        return $this->email;
    }
    public function setPass($pass)
    {        
        if(empty($pass) || (strlen($pass) > 100 && strlen($name) < 8))
        {
            throw new MissingPassException();
        }
        $this->pass=$pass;
    }
    public function getPass()
    {        
        return $this->pass;
    }
}