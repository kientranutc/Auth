<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public  function  __construct(RoleRepositoryInterface $role)
    {
        $this->role = $role;
    }

    public function  index()
    {
        $dataRole = $this->role->all();
        $stt = 0;
        return view('backend.role.index', compact('stt', 'dataRole'));
    }

    public function  add()
    {
        return view('backend.role.add');
    }

    public  function processAdd(CreateRoleRequest $request) {
        $dataRequest = $request->except(['_token']);
        if ($this->role->save($dataRequest) ){
            return redirect()->route('role.index')-> with('success', 'Add role successfully');
        } else {
            return redirect()->back()->withErrors("Error add role");
        }
    }

    public  function  update($id)
    {
        $dataUpdate = $this->role->find($id);
        $arrRole['name'] = $dataUpdate->name;
        $arrRole['id'] = $dataUpdate->id;
        $arrRole['permission'] = json_decode($dataUpdate->permission);
        return view('backend.role.update', compact('arrRole'));
    }

    public function  processUpdate(UpdateRoleRequest $request, $id)
    {
        $dataRequest = $request->except(['_token']);
        if ($this->role->update($dataRequest, $id) ){
            return redirect()->route('role.index')-> with('success', 'Update role successfully');
        } else {
            return redirect()->back()->withErrors("Error update role");
        }
    }

    public function  delete($id)
    {
        if ($this->role->delete($id)) {
            return redirect()->route('role.index')-> with('success', 'Delete role successfully');
        } else {
            return redirect()->route('role.index')->withErrors("Error delete role");
        }
    }
}
