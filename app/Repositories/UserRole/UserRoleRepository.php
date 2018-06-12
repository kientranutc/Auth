<?php
namespace  App\Repositories\UserRole;
use App\Models\UserRole;
class UserRoleRepository implements UserRoleRepositoryInterface
{
    public function  save($data)
    {
        $userRole =  new UserRole();
        if (isset($data['user_id'])) {
            $userRole->user_id = $data['user_id'];
        } else {
            $userRole->user_id = 0;
        }
        if (isset($data['role_id'])) {
            $userRole->role_id = $data['role_id'];
        } else {
            $userRole->role_id = 0;
        }
        return $userRole ->save();
    }

    public function update($id, $data)
    {

    }

    public function  delete($id)
    {
        $userRole = UserRole::where('user_id', $id);
        if ($userRole->count()>0) {
            return $userRole->delete();
        } else {
            return false;
        }
    }
}