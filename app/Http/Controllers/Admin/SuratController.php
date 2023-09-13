<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jenis;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\TOOLS\ImgTools;

class SuratController extends Controller
{
    public $ImgTools;

    public function __construct()
    {
        // memanggil controller image
        $this->ImgTools = new ImgTools();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tipe = $request->tipe;
        $data = Surat::where('tipe', $tipe)
            ->orderBy('tgl_surat', 'desc')
            ->get();
        return view('admin.surat.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = Jenis::all();
        return view('admin.surat.create', [
            'jenis' => $jenis
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data_req = $request->all();
        // remove _token from data_req
        unset($data_req['_token']);
        // export gambar
        if ($request->hasFile('gambar')) {
            $gambar = $this->ImgTools->addImage('gambar_surat', $data_req['gambar']);
            $data_req['gambar'] = "storage/$gambar";
        }
        $data = Surat::create($data_req);
        return redirect()->route('surat.index', 'tipe=' . $data->tipe);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Surat::findOrFail($id);
        $jenis = Jenis::all();
        return view('admin.surat.edit', [
            'data' => $data,
            'jenis' => $jenis
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data_req = $request->all();
        // remove _token from data_req
        unset($data_req['_token']);
        unset($data_req['_method']);
        $data = Surat::findOrFail($id);
        // find file gambar
        $gambar = $data->gambar;
        // export gambar
        if ($request->hasFile('gambar')) {
            // remove file gambar jika ada
            if ($gambar) {
                File::delete($gambar);
            }
            $gambar = $this->ImgTools->addImage('gambar_surat', $data_req['gambar']);
            $data_req['gambar'] = "storage/$gambar";
        } else {
            $data_req['gambar'] = $gambar;
        }

        $data->update($data_req);
        return redirect()->route('surat.index', 'tipe=' . $data->tipe);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // destroy surat
        $data = Surat::findOrFail($id);
        $gambar = $data->gambar;
        // remove gambar gambar
        if ($gambar) {
            File::delete($gambar);
        }
        // delete data
        $data->delete();

        return redirect()->route('surat.index');
    }
}
