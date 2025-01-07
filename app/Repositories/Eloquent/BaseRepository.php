<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data) {
        $user = $this->find($id);
        if($user){
            $user->update($data);
            return $user;
        }
        return null;
    }

    public function delete($id) {
        $user = $this->find($id);
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }
}
