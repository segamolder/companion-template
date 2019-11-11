<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 04.11.2019
 * Time: 22:42
 */

namespace App\Repository\Eloquent;


use App\Repository\Contracts\BaseRepositoryContract;

abstract class BaseRepository implements BaseRepositoryContract
{
    public $model;

    /**
     * BaseRepository constructor.
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }


    public function all()
    {
        return $this->model->all();
    }

    public function getById(int $id)
    {
        return $this->model->findorFail($id);
    }

    public function create(array $attr)
    {
        return $this->model->create($attr);
    }

    public function update(int $id, array $attr)
    {
        $temp = $this->model->findOrFail($id);
        $temp->update($attr);
        return $temp;
    }

    public function delete($id)
    {
        return $this->getById($id)->delete();
    }
}
