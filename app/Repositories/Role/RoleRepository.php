<?php
namespace  App\Repositories\Role;
use App\Models\Role;
class RoleRepository implements  RoleRepositoryInterface
{
    public function  all()
    {
        return Role::all();
    }
    public function  find($id)
    {
        return Role::find($id);
    }
    public  function  save($data){
        $role =  new Role();
        if (isset($data['name'])) {
            $role->name = $data['name'];
        } else {
            $role->name = '';
        }
        if (isset($data['permission'])) {
            $role->permission = json_encode($data['permission']);
        } else {
            $role->permission = '';
        }
        $role ->created_user = '';
        return $role->save();
    }

    public function  update($data, $id)
    {
        $role = Role::find($id);
        if ($role) {
            if (isset($data['name'])) {
                $role->name = $data['name'];
            } else {
                $role->name = '';
            }
            if (isset($data['permission'])) {
                $role->permission = json_encode($data['permission']);
            } else {
                $role->permission = '';
            }
            return $role->save();
        } else {
            return false;
        }

    }

    public  function  delete($id)
    {
        $role =Role::find($id);
        if ($role) {
            return $role->delete();
        } else {
            return false;
        }
    }
}
?>