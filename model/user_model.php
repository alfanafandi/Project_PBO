<?php
require_once __DIR__ . '/../domain_object/node_user.php';

class ModelUser
{
    private $users = [];
    private $nextId = 1;
    private $modelRole;

    public function __construct($modelRole)
    {
        $this->modelRole = $modelRole;
        if (isset($_SESSION['users'])) {
            $this->users = unserialize($_SESSION['users']);
            $this->nextId = count($this->users) + 1;
        } else {
            $this->initializeDefaultUser();
        }
    }

    public function initializeDefaultUser()
    {
        $this->addUser("Alfan", "alfan123", "password1", 1);
        $this->addUser("Afandi", "afandi123", "password2", 2);
        $this->addUser("Pratama", "pratama123", "password3", 3);
    }

    public function addUser($user_nama, $user_username, $user_password, $role_id)
    {
        $role = $this->modelRole->getRoleById($role_id);
        if ($role) {
            $usr = new User($this->nextId++, $user_nama, $user_username, $user_password, $role);
            $this->users[] = $usr;
            $this->saveToSession();
        } else {
            throw new Exception("Role tidak ditemukan untuk ID: $role_id");
        }
    }

    private function saveToSession()
    {
        $_SESSION['users'] = serialize($this->users);
    }

    public function getAllUser()
    {
        return $this->users;
    }

    public function getUserById($user_id)
    {
        foreach ($this->users as $user) {
            if ($user->user_id == $user_id) {
                return $user;
            }
        }
        return null;
    }

    public function updateUser($user_id, $user_nama, $user_username, $user_password)
    {
        foreach ($this->users as $user) {
            if ($user->user_id == $user_id) {
                $user->user_nama = $user_nama;
                $user->user_username = $user_username;
                $user->user_password = $user_password;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function deleteUser($user_id)
    {
        foreach ($this->users as $key => $user) {
            if ($user->user_id == $user_id) {
                unset($this->users[$key]);
                $this->users = array_values($this->users);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function getUserByRole($role)
    {
        $result = [];
        foreach ($this->users as $user) {
            if (is_object($role) && isset($role->namaPeran)) {
                if ($user->role->namaPeran == $role->namaPeran) {
                    $result[] = $user;
                }
            } elseif (is_string($role)) {
                if ($user->role->namaPeran == $role) {
                    $result[] = $user;
                }
            }
        }
        return $result;
    }


    public function getUserByName($user_nama)
    {
        foreach ($this->users as $user) {
            if ($user->user_nama == $user_nama) {
                return $user;
            }
        }
        return null;
    }
}
