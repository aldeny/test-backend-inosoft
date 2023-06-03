<?php

namespace App\Repositories;

use App\Models\Kendaraan;

class KendaraanRepository implements KendaraanRepositoryInterface {

  public function create(array $data)
  {
    return Kendaraan::create($data);
  }

  public function get()
  {
    return Kendaraan::all();
  }

}