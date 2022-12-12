<?php 
declare(strict_types=1);
namespace App\Tests;
use App\UserRepository;
use App\User;
use APP\MissingNameException;
use APP\MissingEmailException;
use APP\InvalidArgumentEmailException;
use APP\MissingPassException;
use APP\UserDoesNotExistException;
use PDOException;
use APP\UpdateException;
use APP\DeleteException;
class UserTest extends \PHPUnit\Framework\TestCase
{
    private $userRepository;   
    private $user;
    
    
    
    public function testMissingNameExceptionIsThrown()
    {
        $this->expectException(MissingNameException::class);
        $this->User = new User('','javier@gmail.com','Omega1988.');
    }
    public function testMissingEmailExceptionIsThrown()
    {
        $this->expectException(MissingEmailException::class);       
        $this->User = new User('javier','','Omega1988.');
    }
    public function testInvalidArgumentExceptionIsThrown()
    {             
         $this->expectException(InvalidArgumentEmailException::class);
         $this->User = new User('javier',"javier@hu@.com",'Omega1988.');         
    }
    public function testMissingPassExceptionIsThrown()
    {
         $this->expectException(MissingPassException::class);
         $this->User = new User('javier','javier@gmail.com','');
    }         
    public function testwhenUserIsNotFoundByIdErrorIsThrown(): void
    {
        $this->userRepository = new UserRepository();
        $this->expectException(UserDoesNotExistException::class);
        $this->userRepository->getByIdOrFail((int)$_ENV['USER_ID']);
    }
    public function testExistUserInDatabaseExceptionIsThrown()
    {
         $this->userRepository = new UserRepository();
         $this->expectException(PDOException::class);
        $this->userRepository->insert(new User("juan","juan@gmail.com","AlphaRomeo32."));
    } 
    public function testNotExistUserInDatabaseExceptionIsThrown()
    {
        $this->userRepository = new UserRepository();
         $this->expectException(UpdateException::class);
        $this->userRepository->update(new User("jorge","jorge@gmail.com","CaffeOffice16."),36);
    } 
    public function testNotCanDeleteUserInDatabaseExceptionIsThrown()
    {
        $this->userRepository = new UserRepository();
         $this->expectException(DeleteException::class);
        $this->userRepository->delete(150);
    }
    public function testSavetUserInDatabaseExceptionIsThrown()
    {
         $this->userRepository = new UserRepository();
         $this->expectException(PDOException::class);
        $this->userRepository->insert(new User($_ENV['USER_NAME'],$_ENV['USER_EMAIL'],$_ENV['USER_PASS']));
    } 
}