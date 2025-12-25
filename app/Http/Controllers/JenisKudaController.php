<?php

namespace App\Http\Controllers;

use App\Models\JenisKuda;
use Illuminate\Http\Request;

class JenisKudaController extends Controller
{    
    public function index()
    {
        return response()->json(JenisKuda::all());
    }

    public function show($id)
    {
        $jenis = JenisKuda::find($id);
        if (!$jenis) return response()->json(['message' => 'Not Found'], 404);

        return response()->json($jenis);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required'
        ]);

        $jenis = JenisKuda::create([
            'jenis' => $request->jenis
        ]);

        return response()->json($jenis, 201);
    }
    
    public function update(Request $request, $id)
    {
        $jenis = JenisKuda::find($id);
        if (!$jenis) return response()->json(['message' => 'Not Found'], 404);

        $request->validate([
            'jenis' => 'required'
        ]);

        $jenis->update([
            'jenis' => $request->jenis
        ]);

        return response()->json($jenis);
    }
    
    public function destroy($id)
    {
        $jenis = JenisKuda::find($id);
        if (!$jenis) return response()->json(['message' => 'Not Found'], 404);

        $jenis->delete();

        return response()->json(['message' => 'Deleted Successfully']);
    }
}
