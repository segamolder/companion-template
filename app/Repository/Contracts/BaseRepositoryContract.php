<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 04.11.2019
 * Time: 22:42
 */

namespace App\Repository\Contracts;


interface BaseRepositoryContract
{
    public function all();

    public function getById(int $id);

    public function create(array $attr);

    public function update(int $id, array $attr);

    public function delete($id);
}
