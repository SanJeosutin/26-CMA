<?php
/*
 * User controller that containts the user methods
 */
class UserController extends BaseController
{
    private $errHeader = '';
    private $errDescription = '';
    private $reqMethod = '';

    public function list()
    {
        $this->reqMethod = $_SERVER['REQUEST_METHOD'];
        
        if(strtoupper($this->reqMethod) == 'GET'){
            try{
                $userModel = new UserModel();
                $users = $userModel->getUsers();
                $resData = json_encode($users);

            } catch (Exception $e) {
                $this->errDescription = "Something went wrong :/ " . $e->getMessage();
                $this->errHeader = "HTTP/1.1 500 Internal Server Error";
            }
        } else {
            $this->errDescription = "Cannot process request with method " . $this->reqMethod;
            $this->errHeader = "HTTP/1.1 422 Unprocessable Entity";
        }

        if(!$this->errDescription){
            $this->output($resData, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
        } else {
            $this->output(array('error' => $this->errDescription), array('Content-Type: application/json', $this->errHeader));
        }
    }

    public function find()
    {
        $this->reqMethod = $_SERVER['REQUEST_METHOD'];
        
        if(strtoupper($this->reqMethod) == 'GET'){
            try{
                $userModel = new UserModel();
                $uName = isset($_GET['username']) ? $_GET['username'] : ''; 
                $user = $userModel->getUserByName($uName);
                $resData = json_encode($user);

            } catch (Exception $e) {
                $this->errDescription = "Something went wrong :/ " . $e->getMessage();
                $this->errHeader = "HTTP/1.1 500 Internal Server Error";
            }
        } else {
            $this->errDescription = "Cannot process request with method " . $this->reqMethod;
            $this->errHeader = "HTTP/1.1 422 Unprocessable Entity";
        }

        if(!$this->errDescription){
            $this->output($resData, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
        } else {
            $this->output(array('error' => $this->errDescription), array('Content-Type: application/json', $this->errHeader));
        }
    }
}
?>