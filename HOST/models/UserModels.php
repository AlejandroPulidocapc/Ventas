<?php

require_once("core/Conectar.php");

class UserModels{

protected $con;

public function __construct()
{

    $this->con = new conectar ();

}
public function findAll ()
{

    $con=$this->con->con();
    
    
    $stm=$con->prepare("SELECT * FROM user");

    if (!$stm->execute())
    {

        throw new Exception ("error de consulta");

    }else{
return $stm->fetchall(PDO::FETCH_OBJ);


    }
    }


    public function save($usuario)
    {

        $con= $this->con->con();
       
        $sql="INSERT INTO user(username,email,password)values(:username,:email,:password)";
$stm=$con->prepare($sql);

$stm->bindParam(':username' , $usuario->username);
$stm->bindParam(':password', md5($usuario->password));
$stm->bindParam(':email' , $usuario->email);

   






if(!$stm->execute())
{

throw new Exception("Error al insertar datos");

}
    }


public function update($user)
{

    $con = $this->con->con();


    $sql = "UPDATE user SET username = :username , 
    password = :password , email = :email WHERE id = :id";
    $stm = $con->prepare($sql);
    $stm->bindParam(":username" , $user->username);
    $stm->bindParam(":password" , md5($user->password));
    $stm->bindParam(":email" , $user->email);
    $stm->bindParam(":id" , $user->id);

    if(!$stm->execute())
    {
throw new Exception("Error al actualizar datos");


    }
}


public function delete($id)
{
$con = $this->con->con();

$sql = "DELETE FROM user WHERE id = :id";
$stm= $con->prepare($sql);
$stm->bindParam(":id" , $id);

if (!$stm->execute())

{

throw new Exception ("Error eliminado");


}

}



}






