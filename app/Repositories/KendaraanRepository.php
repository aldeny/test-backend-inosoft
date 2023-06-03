<?php

namespace App\Repositories;

use App\Models\Kendaraan;

class KendaraanRepository implements KendaraanRepositoryInterface {

  /* function create insert kedalam database */
  public function create(array $data)
  {
    return Kendaraan::create($data);
  }

  /* function get mengambil semua data */
  public function get()
  {
    return Kendaraan::all();
  }

  
  /* function show menampilkan data berdasarkan id */
  public function getId($id)
  {
    return Kendaraan::find($id);
  }

  /* function show menampilkan data berdasarkan id */
  public function update(array $data, $id)
  {
    $kendaraan = Kendaraan::find($id);
    if ($kendaraan) {
      $kendaraan->update($data);
      return $kendaraan;
    }
    return null;
  }

  /* function delete hapus data berdasarkan id */
  public function delete($id)
  {
    $kendaraan = Kendaraan::find($id);
    if ($kendaraan) {
      $kendaraan->delete();
      return true;
    }
    return false;
  }
}