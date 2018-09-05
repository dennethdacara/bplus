<?php 

namespace App\Repositories\Crudable;
use Illuminate\Database\Eloquent\Model;

class GenericCrudRepository implements GenericCrudRepositoryInterface
{
  protected $model;

  public function __construct(Model $model)
  {
    $this->model = $model;
  }

  public function getAll()
  {
    return $this->model->all();
  }

  public function store(array $data)
  {
    return $this->model->create($data);
  }

  public function storeCollection($data)
  {
    return $this->model->create($data->all());
  }

  public function update(array $data, $id)
  {
    $record = $this->model->find($id);
    return $record->update($data);
  }

  public function delete($id)
  {
    return $this->model->destroy($id);
  }

  public function show($id)
  {
    return $this->model->findOrFail($id);
  }

  public function exists($name)
  {
    return $this->model->where('name', 'LIKE', $name)->first();
  }

}