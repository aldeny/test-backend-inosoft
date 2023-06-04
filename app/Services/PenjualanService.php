<?php

namespace App\Services;

use App\Repositories\PenjualanRepositoryInterface;

class PenjualanService implements PenjualanServiceInterface{

  private $penjualanRepository;

  public function __construct(PenjualanRepositoryInterface $penjualanRepository)
  {
    $this->penjualanRepository = $penjualanRepository;
  }

  public function createPenjualan(array $data)
  {
    return $this->penjualanRepository->create($data);
  }

  public function getAllPenjualan()
  {
    return $this->penjualanRepository->get();
  }

  public function getPenjualanId($id)
  {
    return $this->penjualanRepository->getId($id);
  }

  public function updatePenjualan(array $data, $id)
  {
   return $this->penjualanRepository->update($data, $id); 
  }

  public function deletePenjualan($id)
  {
    return $this->penjualanRepository->delete($id);
  }

}