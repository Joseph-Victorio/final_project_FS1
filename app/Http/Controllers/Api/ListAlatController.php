<?php

namespace App\Http\Controllers\Api;

use App\Models\ListingAlat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ListAlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ListingAlat::all();
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
            'nama' => 'required',
            'merk' => 'required',
            'kondisi' => 'required',
            'foto' => 'nullable',
            'jumlah' => 'required',
        ]);
        if ($data) {
            ListingAlat::create($data);
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ListingAlat::findOrFail($id);
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
        $data = ListingAlat::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'merk' => 'required',
            'kondisi' => 'required',
            'foto' => 'nullable',
            'jumlah' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        } else {
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ListingAlat::findOrFail($id);
        $data->delete();
        return response()->json([
            'status' => true,
            'message' => 'success',
        ], 200);
    }
}
