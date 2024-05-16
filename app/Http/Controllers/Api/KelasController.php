<?php

namespace App\Http\Controllers\Api;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kelas::all();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kelas' => 'required',
            'deskripsi' => 'required',
            'hari' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'kuota' => 'required',
            'foto' => 'nullable',
            'biaya' => 'required',
            'id_instruktur' => 'required',
        ]);

        $data = Kelas::create($data);
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
        $data = Kelas::findOrFail($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'error',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Kelas::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required',
            'deskripsi' => 'required',
            'hari' => 'required|date_format:Y-m-d',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
            'kuota' => 'required',
            'foto' => 'nullable',
            'biaya' => 'required',
            'id_instruktur' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        }
        $data->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $data
        ], 200, [
            'Content-Type' => 'application/json;charset=UTF-8',
            'Charset' => 'utf-8'
        ], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kelas::findOrFail($id);
        $data->delete();
        return response()->json([
            'status' => true,
            'message' => 'success',
        ], 200);
    }
}
