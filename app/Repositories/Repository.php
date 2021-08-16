<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
class Repository implements RepositoryInterface {
    public function all(){
        echo __METHOD__;
        //select * from users
    }

    public function create(array $data){
        //insert into from users
    }

    public function update(array $data, $id){
        //update users
    }

    public function delete($id){
        //delete from users
    }

    public function show($id){
        //select * from users where id = id
    }

}