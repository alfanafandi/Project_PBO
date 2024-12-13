<?php
require_once 'model/user_model.php';
class controllerUser
{
    private $userModel;
    private $modelRole;
    public function __construct($modelRole)
    {
        $this->modelRole = $modelRole;
        $this->userModel = new ModelUser($modelRole);
    }

    public function listUser()
    {
        $users = $this->userModel->getAllUser();
        include 'views/user_list.php';
    }

    public function updateUser($user_id, $user_nama, $user_username, $user_password, $user_role_id)
    {
        $this->userModel->updateUser($user_id, $user_nama, $user_username, $user_password, $user_role_id);
        header('Location: index.php?modul=user');
    }

    public function addUser($user_nama, $user_username, $user_password, $role_id)
    {
        $role = $this->modelRole->getRoleById($role_id);
        $this->userModel->addUser($user_nama, $user_username, $user_password, $role_id);
        header('location: index.php?modul=user');
    }

    public function editById($user_id)
    {
        $user = $this->userModel->getUserById($user_id);
        include 'views/user_update.php';
    }

    public function deleteUser($id)
    {
        $cek = $this->userModel->deleteUser($id);
        if ($cek == false) {
            throw new Exception('gak onok coy');
        } else {
            header('location: index.php?modul=user');
        }
    }

    public function listUsers()
    {
        $users = $this->userModel->getAllUser();
        include 'views/user_list.php';
    }

    public function getUsers()
    {
        return $this->userModel->getAllUser();
    }

    public function getUserById($id)
    {
        return $this->userModel->getUserById($id);
    }

    public function getUserByName($name)
    {
        return $this->userModel->getUserByName($name);
    }
}
