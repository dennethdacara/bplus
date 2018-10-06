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

  public function getServices()
  {
    return $this->model->join('service_type', 'service_type.id', 'services.service_type_id')
      ->join('expertise', 'expertise.id', 'services.expertise_id')
      ->select('services.*', 'service_type.name as service_type', 'expertise.name as expertise')
      ->get();
  }

  public function getSalaries()
  {
    return $this->model->join('users as employees', 'employees.id', 'salary.employee_id')
      ->join('expertise', 'expertise.id', 'employees.expertise_id')
      ->select('salary.id as salary_id', 'salary.employee_salary', 'salary.created_at', 'employees.firstname', 'employees.lastname', 'expertise.name as expertise')
      ->get();
  }

  public function findSalary($id)
  {
    return $this->model->join('users as employees', 'employees.id', 'salary.employee_id')
      ->join('expertise', 'expertise.id', 'employees.expertise_id')
      ->select('salary.id as salary_id', 'salary.employee_salary', 'salary.created_at', 
        'employees.firstname', 'employees.lastname', 'expertise.name as expertise')
      ->where('salary.id', $id)
      ->first();
  }

}