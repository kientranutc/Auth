<?php
namespace App\Repositories\User;

interface  UserRepositoryInterface
{
    public  function  all();

    public function  find($id);

    public  function  findUserOfRole($id);

    public function  save($data);

    public function  update($data, $id);

    public function delete($id);
}

?>
