<?php

namespace App\Repositories;

use App\Models\Penjualan;

class PenjualanRepository implements PenjualanRepositoryInterface {

  /* function create insert kedalam database */
  public function create(array $data)
  {
    return Penjualan::create($data);
  }

  /* function get mengambil semua data */
  public function get()
  {
    return Penjualan::all();
  }

  
  /* function show menampilkan data berdasarkan id */
  public function getId($id)
  {
    return Penjualan::find($id);
  }

  /* function show menampilkan data berdasarkan id */
  public function update(array $data, $id)
  {
    $penjualan = Penjualan::find($id);
    if ($penjualan) {
      $penjualan->update($data);
      return $penjualan;
    }
    return null;
  }

  /* function delete hapus data berdasarkan id */
  public function delete($id)
  {
    $penjualan = Penjualan::find($id);
    if ($penjualan) {
      $penjualan->delete();
      return true;
    }
    return false;
  }
}