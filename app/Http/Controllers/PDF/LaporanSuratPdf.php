<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class LaporanSuratPdf extends Controller
{
    function index(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $tipe = $request->tipe;

        $surat = DB::table('surat')
            ->join('jenis', 'surat.jenis_id', '=', 'jenis.id')
            ->select('surat.*', 'jenis.nama as jenis')
            ->where('surat.tipe', "like", "%$tipe%")
            ->when($tahun, function ($query, $tahun) {
                return $query->whereYear('surat.tgl_surat', $tahun);
            })
            ->when($bulan, function ($query, $bulan) {
                return $query->whereMonth('surat.tgl_surat', $bulan);
            })
            ->get();

        $pdf = PDF::loadView('admin.laporan.cetak', [
            'surat' => $surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'tipe' => $tipe
        ]);
        return $pdf->stream("Laporan Surat $tipe $bulan $tahun.pdf");

        return view('admin.laporan.cetak', [
            'surat' => $surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'tipe' => $tipe
        ]);
    }
}
