<?php
namespace  App\Repositories\Role;

interface  RoleRepositoryInterface {

    public function  all();

    public function  find($id);

    public  function  save($data);

    public function  update($data, $id);

    public  function  delete($id);
}
?>