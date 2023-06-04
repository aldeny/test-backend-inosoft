<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Services\PenjualanServiceInterface;
use Illuminate\Support\Facades\Validator;

class PenjualanController extends Controller
{

    private $penjualanService;
    
    public function __construct(PenjualanServiceInterface $penjualanService)
    {
        $this->penjualanService = $penjualanService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = $this->penjualanService->getAllPenjualan();

        if (!$penjualan) {
            return response()->json([
                'status' => 404,
                'message' => 'data tidak ditemukan'
            ], 404);
        }
        return response()->json([
            'status' => 200,
            'message' => 'berhasil',
            'data' => $penjualan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kendaraan_id'  => 'required|string',
            'nama_pembeli'  => 'required|string',
            'harga'         => 'required|numeric'
        ]);

        if ($validator -> fails()) {
            return response()->json([
                'error'     => 'Validasi error',
                'messages'  => $validator->errors(),
            ], 400);
        }

        $data = $request->only([
            'kendaraan_id',
            'nama_pembeli',
            'harga',
        ]);

        $penjualan = $this->penjualanService->createPenjualan($data);

        if (!$penjualan) {
            return response()->json([
                'status' => 400,
                'message' => 'gagal menambahkan'
            ], 400);
        }
        return response()->json([
            'message' => 'Kendaraan berhasil ditambahkan',
            'data' => $penjualan
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penjualan = $this->penjualanService->getPenjualanId($id);
        $penjualan->load('kendaraan');

        return response()->json([
            'data' => $penjualan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getLaporanPenjualan($jenis){
        $laporan = Kendaraan::with('penjualan')->where('jenis', $jenis)->get();

        $dataLaporan = [];
        foreach ($laporan as $kendaraan) {
            $dataLaporan[] = [
                'kendaraan' => $kendaraan->toArray()
            ];
        }
        

        return response()->json($dataLaporan);
    }
}
