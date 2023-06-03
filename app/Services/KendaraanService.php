<?php

namespace App\Services;

use App\Repositories\KendaraanRepositoryInterface;

class KendaraanService implements KendaraanServiceInterface{

  private $kendaraanRepository;

  public function __construct(KendaraanRepositoryInterface $kendaraanRepository)
  {
    $this->kendaraanRepository = $kendaraanRepository;
  }

  public function createKendaraan(array $data)
  {
    return $this->kendaraanRepository->create($data);
  }

  public function getAllKendaraan()
  {
    return $this->kendaraanRepository->get();
  }

}