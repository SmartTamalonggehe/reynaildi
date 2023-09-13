<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratAPI extends Controller
{
    function index()
    {
        return DB::table('surat')
            ->join('jenis', 'surat.jenis_id', '=', 'jenis.id')
            ->select('surat.*', 'jenis.nama as jenis')
            ->get();
    }
}
