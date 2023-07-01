<?php
require_once("models/UserModels.php");



class UserController {

    protected $user;
    public function __construct(){
    $this->user=new UserModels();
    

    }


    public function findAll()
    {
//try catch
try{
$get = $this->user->findAll();

$response= array ("response"=>$get);
http_response_code(200);
echo json_encode($response);


}catch(Exception $e)
{
    $response = array("error"=>$e_>getMessage());

    echo json_encode($response);
    http_response_code(400);

}



    }
    public function create($usuario)
    {



try{

$guardar= $this->user->save($usuario);
$response=array("response"=>"creado");
echo json_encode($response);
http_response_code(200);

}catch (Exception $e)
{
$response= array("error"=>$e->getMessage());
echo json_encode($response);
http_response_code(400);



}




    }

    
public function update($user)
{

try{

$this->user->update($user);
$response = array("response" => "actualizado");
http_response_code(200);
echo json_encode($response);


}catch(Exception $e)

{
$response = array("response"=>$e->getMessage());
http_response_code(400);
echo json_encode($response);


}
}

public function delete($id)
{
 try{
    $this->user->delete($id);
    $response = array("response" => "Eliminado");
    http_response_code(200);
    echo json_encode($response);
    

    
}catch(Exception $e)

{
$response = array("response"=>$e->getMessage());
http_response_code(400);
echo json_encode($response);


}

}



}