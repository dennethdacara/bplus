<?php namespace App\Repositories\Crudable;

interface GenericCrudRepositoryInterface
{
  public function getAll();

  public function store(array $data);

  public function storeCollection($data);

  public function update(array $data, $id);

  public function delete($id);

  public function show($id);

  public function exists($name);

  public function getServices();

  public function getSalaries();

  public function findSalary($id);

}