<?php

namespace App\Repositories;

interface KendaraanRepositoryInterface {

  public function create (array $data);

  public function get();

  public function getId($id);

  public function update(array $data, $id);

  public function delete($id);

}