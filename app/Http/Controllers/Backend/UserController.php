<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\UserRole\UserRoleRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(UserRepositoryInterface $user,
                                RoleRepositoryInterface $role,
                                UserRoleRepositoryInterface $userRole
    )
    {
        $this->role = $role;
        $this->user = $user;
        $this->userRole = $userRole;
    }

    public function  index()
    {
        $dataUser = $this->user->all();
        $stt = 0;
        return view('backend.user.index', compact('stt', 'dataUser'));
    }

    public function  add()
    {
        $dataRole = $this->role->all();
        return view('backend.user.add', compact('dataRole'));
    }

    public function  processAdd(CreateUserRequest $request)
    {
        $dataRequest = $request->except('_token');
        $userId = $this->user->save($dataRequest);
        if ($userId) {
            $data['user_id'] = $userId;
            $data['role_id'] = $dataRequest['role'];
            if ($this->userRole->save($data)) {
                return redirect()->route('user.index')->with('success', 'Add new user successfully!');
            } else {
                return redirect()->back()->withErrors('Error add role for user!');
            }
        } else {
            return redirect()->back()->withErrors('Error add new user!');
        }
    }

    public function  update($id)
    {
        $dataUserEdit = $this->user->findUserOfRole($id);
        $dataRole = $this->role->all();
        return view('backend.user.update', compact('dataUserEdit', 'dataRole'));
    }

    public function  processUpdate(UpdateUserRequest $request, $id)
    {
        $dataRequest = $request->except('_token');
        if ($this->user->update( $dataRequest, $id)) {
            if ($this->userRole->delete($id)) {
                $this->userRole->save([
                    'user_id'=>$id,
                    'role_id'=>$dataRequest['role']
                ]);
                return redirect()->route('user.index')->with('success', 'Edit user successfully!');
            } else {
                return redirect()->back()->withErrors('Error edit user!');
            }
        } else {
            return redirect()->back()->withErrors('Error edit user!');
        }


    }

    public function  delete($id)
    {
        if ($this->user->delete($id)) {
            return redirect()->back()->with('success', 'Delete user successfully!');
        } else {
            return redirect()->back()->withErrors('Error delete user!');
        }
    }
}
