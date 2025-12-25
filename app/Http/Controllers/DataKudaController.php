<?php

namespace App\Http\Controllers;

use App\Models\DataKuda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataKudaController extends Controller
{    
    public function index()
    {
        return DataKuda::with('jenis')->get();
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jeniskuda_id' => 'required|exists:jeniskuda,id',
            'nama' => 'required|string',
            'berat' => 'required|numeric',
            'tahunlahir' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096'
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('kuda', 'public');
        }

        $data = DataKuda::create($validated);

        return response()->json([
            'success' => true,
            'data' => $data->load('jenis')
        ]);
    }
    
    public function show($id)
    {
        return DataKuda::with('jenis')->findOrFail($id);
    }
    
    public function update(Request $request, $id)
    {
        $data = DataKuda::findOrFail($id);

        $validated = $request->validate([
            'jeniskuda_id' => 'sometimes|exists:jeniskuda,id',
            'nama' => 'sometimes|string',
            'berat' => 'sometimes|numeric',
            'tahunlahir' => 'sometimes',
            'gambar' => 'sometimes|image|mimes:jpg,jpeg,png,webp|max:4096'
        ]);

        if ($request->hasFile('gambar')) {

            if ($data->gambar && Storage::disk('public')->exists($data->gambar)) {
                Storage::disk('public')->delete($data->gambar);
            }

            $validated['gambar'] = $request->file('gambar')
                ->store('kuda', 'public');
        }

        $data->update($validated);

        return response()->json([
            'success' => true,
            'data' => $data->load('jenis')
        ]);
    }

        public function destroy($id)
    {
        $data = DataKuda::findOrFail($id);

        if ($data->gambar && Storage::disk('public')->exists($data->gambar)) {
            Storage::disk('public')->delete($data->gambar);
        }

        $data->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data kuda dihapus'
        ]);
    }
}
