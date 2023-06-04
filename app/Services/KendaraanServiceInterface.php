<?php

namespace App\Services;

interface KendaraanServiceInterface {

  public function createKendaraan(array $data);

  public function getAllKendaraan();

  public function getKendaraanId($id);

  public function updateKendaraan(array $data, $id);

  public function deleteKendaraan($id);

  public function getStokKendaraan();

}