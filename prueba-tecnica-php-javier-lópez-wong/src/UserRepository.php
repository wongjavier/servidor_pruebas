<?php
declare(strict_types=1);

namespace App;
require __DIR__.'/../tests/bootstraptest.php';
use PDO;
class UserRepository{    
    
   /**
     * @throws UpdateException
     * */
    public function update($user, $id){
        try {
            $dsn=sprintf('mysql:dbname=%s;host=%s',$_ENV['DB_NAME'],$_ENV['DB_HOST']);            
            $db = new PDO($dsn,$_ENV['DB_USER'],$_ENV['DB_PASS']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $id_cliente = $id;
            $nombre = $user->getName();
            $email = $user->getEmail();
            $pass = $user->getPass();            
            $sentencia = $db->prepare("UPDATE users set nombre=?, email=?, contrasena=? WHERE id_usuario=?");
            $result=$sentencia->execute([$nombre,$email, $pass,$id_cliente]);
            $db = null;
                                
        } catch (PDOException $error) {
            echo "Error 100: " . $error->getMessage();
        }        
        if($sentencia->rowCount()==0)throw new UpdateException();
        
    }
   /**
     * @throws InsertException
     * */
    public function insert($user){
        try{
            $dsn=sprintf('mysql:dbname=%s;host=%s',$_ENV['DB_NAME'],$_ENV['DB_HOST']);            
            $db = new PDO($dsn,$_ENV['DB_USER'],$_ENV['DB_PASS']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $nombre = $user->getName();
            $email = $user->getEmail();
            $pass = $user->getPass();
            $sentencia = $db->prepare("INSERT INTO users(nombre,email,contrasena) VALUES(?,?,?);");
            $result=$sentencia->execute([$nombre,$email,$pass]);
            $db = null;           
        }
        catch(PDOException $error)
        {
            echo "Error 105: " . $error->getMessage();
        }            
    }
     /**
     * @throws DeleteException
     * */
    public function delete($id){
        try {
            $dsn=sprintf('mysql:dbname=%s;host=%s',$_ENV['DB_NAME'],$_ENV['DB_HOST']);            
            $db = new PDO($dsn,$_ENV['DB_USER'],$_ENV['DB_PASS']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $id_cliente =  $id;            
            $sentencia = $db->prepare("delete from users WHERE  id_usuario=?");
            $result=$sentencia->execute([$id_cliente]);
            $db = null;  
                        
            
        } catch (PDOException $error) {
            echo "Error 101: " . $error->getMessage();
        }
        if($sentencia->rowCount()==0)throw new DeleteException();
    }
    /**
     * @throws UserDoesNotExistException
     * */
    public function getByIdOrFail($id){
        
        try {
            $dsn=sprintf('mysql:dbname=%s;host=%s',$_ENV['DB_NAME'],$_ENV['DB_HOST']);            
            $db = new PDO($dsn,$_ENV['DB_USER'],$_ENV['DB_PASS']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
            $sentencia = $db->prepare("select count(*) from users where id_usuario=?");
            $count = $sentencia->execute([$id]);            
            $db = null;

            
           
        } catch (PDOException $error) {
            echo "Error 103: " . $error->getMessage();
        }        
        
        
        if($sentencia->fetchColumn() === 0)throw new UserDoesNotExistException();
        else
        return $id;
    }
}