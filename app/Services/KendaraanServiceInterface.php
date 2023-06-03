<?php

namespace App\Services;

interface KendaraanServiceInterface {

  public function createKendaraan(array $data);

  public function getAllKendaraan();

}