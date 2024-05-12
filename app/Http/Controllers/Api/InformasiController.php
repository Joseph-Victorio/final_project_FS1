<?php

namespace App\Http\Controllers\Api;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Informasi::all();
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
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $data = Informasi::create($data);

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $data,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Informasi::findOrFail($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $data
            ]);
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
        $data = Informasi::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
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
            'data' => $data,
        ], 200, [
            'Content-Type' => 'application/json;charset=UTF-8',
        ], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Informasi::findOrFail($id);
        $data->delete();
        return response()->json([
            'status' => true,
            'message' => 'success',
        ], 200);
    }
}
