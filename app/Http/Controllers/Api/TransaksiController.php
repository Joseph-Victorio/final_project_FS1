<?php

namespace App\Http\Controllers\Api;

use App\Models\Kelas;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::with('instruktur', 'kelas')->get();
        return response()->json(
            [
                'status' => true,
                'data' => $transaksi,
            ],
            200,
            [
                'Content-Type' => 'application/json;charset=UTF-8',
                'Access-Control-Allow-Origin' => '*',
            ],
            JSON_UNESCAPED_UNICODE
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_user' => 'required',
            'id_kelas' => 'required',
            'id_instruktur' => 'required',
            'total_pembayaran' => 'required',
            'status' => 'required',
        ]);
        $data = Transaksi::create($data);
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Transaksi::finOrFail($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'error'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Transaksi::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'id_user' => 'requirement',
            'id_instruktur' => 'requirement',
            'id_kelas' => 'requirement',
            'total_pembayaran' => 'requirement',
            'status' => 'requirement'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->error(),
            ], 404);
        }
        $data->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 
    }
}
