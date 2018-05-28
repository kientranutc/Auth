<?php

namespace App\Http\Controllers\Backend;

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
        return view('backend.role.index');
    }

    public function  add()
    {
        return view('backend.role.add');
    }

    public  function processAdd(Request $request) {
        $dataRequest = $request->except(['_token']);
        if ($this->role->save($dataRequest) ){
            return redirect()->route('role.index');
        } else {

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

    public function  processUpdate(Request $request, $id)
    {
        $dataRequest = $request->except(['_token']);
        if ($this->role->update($dataRequest, $id) ){
            return redirect()->route('role.index');
        } else {

        }
    }
}
