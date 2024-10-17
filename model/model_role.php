<?php
require_once 'domain_object/node_role.php';

class modelRole
{
    private $roles = [];
    private $next_id = 1;

    public function __construct()
    {

        if (isset($_SESSION['roles'])) {
            $this->roles = unserialize($_SESSION['roles']);
            $this->next_id = count($this->roles) + 1;
        } else {
            $this->initializeDefaultRole();
        }
    }

    public function initializeDefaultRole()
    {
        $this->addRole("Admin", "Administrator", 1, new Department("IT Department", "Third Floor"));
        $this->addRole("User", "Customer/member", 1, new Department("Marketing Department", "First Floor"));
        $this->addRole("Kasir", "Pembayaran", 0, new Department("Finance Department", "Second Floor"));
        $this->saveToSession();
    }

    public function addRole($namaPeran, $descPeran, $statusPekerjaan, Department $departemen)
    {
        $peran = new \Role($this->next_id++, $namaPeran, $descPeran, $statusPekerjaan, $departemen);
        $this->roles[] = $peran;
        $this->saveToSession();
    }

    private function saveToSession()
    {
        $_SESSION['roles'] = serialize($this->roles);
    }

    public function getAllRoles()
    {
        return $this->roles;
    }

    public function getRoleById($role_id)
    {
        foreach ($this->roles as $role) {
            if ($role->idPeran == $role_id) {
                return $role;
            }
        }
        return null;
    }

    public function updateRole($role_id, $namaPeran, $descPeran, $statusPekerjaan, Department $departemen)
    {
        foreach ($this->roles as $role) {
            if ($role->idPeran == $role_id) {
                $role->namaPeran = $namaPeran;
                $role->descPeran = $descPeran;
                $role->statusPekerjaan = $statusPekerjaan;
                $role->departemen = $departemen;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function deleteRole($role_id)
    {
        foreach ($this->roles as $key => $role) {
            if ($role->idPeran == $role_id) {
                unset($this->roles[$key]);
                $this->roles = array_values($this->roles);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function getRoleByName($namaPeran)
    {
        foreach ($this->roles as $role) {
            if ($namaPeran == $role->namaPeran) {
                return $role;
            }
        }
        return null;
    }
}
