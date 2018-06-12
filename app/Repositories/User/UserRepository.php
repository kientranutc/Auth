<?php
namespace  App\Repositories\User;
use App\Models\User;
use App\Models\UserRole;
class UserRepository implements  UserRepositoryInterface
{
    public  function  all()
    {
        return UserRole::select('users.*','users.id as user_id', 'role.name as role_name')
            ->join('users', 'users.id', '=', 'user_role.user_id')
            ->join('role', 'role.id', '=', 'user_role.role_id')
            ->get();
    }

    public function  find($id)
    {
        return User::find($id);
    }

    public  function  findUserOfRole($id)
    {
        return UserRole::select('users.*','users.id as user_id', 'user_role.role_id as role_id')
            ->join('users', 'users.id', '=', 'user_role.user_id')
            ->first();
    }

    public function  save($data)
    {
        $user = new User();

        if (isset($data['username'])) {
            $user->username = $data['username'];
        } else {
            $user->username = '';
        }
        if (isset($data['email'])) {
            $user->email = $data['email'];
        } else {
            $user->email = '';
        }
        if (isset($data['image'])) {
            $user->image = $data['image'];
        } else {
            $user->image = '';
        }
        if (isset($data['fullname'])) {
            $user->fullname = $data['fullname'];
        } else {
            $user->fullname = '';
        }
        if (isset($data['password'])) {
            $user->password = bcrypt($data['password']);
        } else {
            $user->password = '';
        }
        if (isset($data['phone'])) {
            $user->phone = $data['phone'];
        } else {
            $user->phone = '';
        }
        if (isset($data['address'])) {
            $user->address = $data['address'];
        } else {
            $user->address = '';
        }
        if (isset($data['gender'])) {
            $user->gender = $data['gender'];
        } else {
            $user->gender = 1;
        }
        $user->save();
        return $user->id;


    }

    public function  update($data, $id)
    {
        $user = User::find($id);
        if ($user) {
            if (isset($data['username'])) {
                $user->username = $data['username'];
            }
            if (isset($data['email'])) {
                $user->email = $data['email'];
            }
            if (isset($data['image'])) {
                $user->image = $data['image'];
            } else {
                $user->image = '';
            }
            if (isset($data['fullname'])) {
                $user->fullname = $data['fullname'];
            } else {
                $user->fullname = '';
            }
            if (isset($data['password'])) {
                $user->password = bcrypt($data['password']);
            } else {
                $user->password = $user->password;
            }
            if (isset($data['phone'])) {
                $user->phone = $data['phone'];
            } else {
                $user->phone = '';
            }
            if (isset($data['address'])) {
                $user->address = $data['address'];
            } else {
                $user->address = '';
            }
            if (isset($data['gender'])) {
                $user->gender = $data['gender'];
            } else {
                $user->gender = 1;
            }
            return $user->save();
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $user = $this->find($id);
        if ($user) {
            return $user->delete();
        } else {
            return false;
        }


    }
}
?>