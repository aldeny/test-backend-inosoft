<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\KendaraanServiceInterface;

class KendaraanController extends Controller
{

    private $kendaraanService;
    
    public function __construct(KendaraanServiceInterface $kendaraanService)
    {
        $this->kendaraanService = $kendaraanService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kendaraan = $this->kendaraanService->getAllKendaraan();

        return response()->json([
            'message' => 'data index',
            'data'    => $kendaraan
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
            'tahun_keluar'  => 'required|numeric',
            'warna'         => 'require',
            'harga'         => 'required|numeric',
            'jenis'         => 'require|in:mobil,motor',
            'detail'        => 'require|array',
            'detail.mesin'  => 'require'
        ]);

        if ($validator -> fails()) {
            return response()->json([
                'error'     => 'Validasi error',
                'messages'  => $validator->errors(),
            ], 400);
        }

        $data = $request->only([
            'tahun_keluar',
            'warna',
            'harga',
            'jenis',
            'detail'
        ]);

        $kendaraan = $this->kendaraanService->createKendaraan($data);

        return response()->json([
            'message' => 'Kendaraan berhasil ditambahkan',
            'data' => $kendaraan
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
        //
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
}
