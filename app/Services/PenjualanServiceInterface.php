<?php

namespace App\Services;

interface PenjualanServiceInterface {

  public function createPenjualan(array $data);

  public function getAllPenjualan();

  public function getPenjualanId($id);

  public function updatePenjualan(array $data, $id);

  public function deletePenjualan($id);

}