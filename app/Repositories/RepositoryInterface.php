<?php


namespace App\Repositories;

interface RepositoryInterface
{
    public function where($conditions, $operator = null, $value = null);

    public function orWhere($conditions, $operator = null, $value = null);

    public function count();

    public function orderBy();
    
    public function get($columns = ['*']);

    public function lists($column, $key = null);

    public function paginate($perPage = 20, $columns = ['*']);

    public function find($id, $columns = ['*']);

    public function create(array $data);

    public function update(array $data, $id, $attribute = 'id', $withSoftDeletes = false);

    public function delete($id);

    public function deleteAll();
}
