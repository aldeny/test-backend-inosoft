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

  public function getKendaraanId($id)
  {
    return $this->kendaraanRepository->getId($id);
  }

  public function updateKendaraan(array $data, $id)
  {
   return $this->kendaraanRepository->update($data, $id); 
  }

  public function deleteKendaraan($id)
  {
    return $this->kendaraanRepository->delete($id);
  }

  public function getStokKendaraan()
  {
    return $this->kendaraanRepository->getStok();
  }

}