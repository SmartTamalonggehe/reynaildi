@extends('admin.layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="row items-push">
            <div class="col-12">
                <div class="block block-rounded h-100 mb-2">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Grafik Berdasarkan Surat Masuk dan Keluar
                        </h3>
                        <div class="d-flex gap-2">
                            <select name="bulan" id="bulan_tipe" class="form-select">
                                <option value="">Pilih Bulan</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <select name="tahun" id="tahun_tipe" class="form-select">
                                @php
                                    $tahun = date('Y');
                                @endphp
                                <option value="">Pilih Tahun</option>
                                @for ($i = $tahun; $i > $tahun - 5; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor

                            </select>
                        </div>
                    </div>
                    <div class="block-content text-muted">

                        <div id="grafik-by-tipe"></div>
                    </div>
                    <div class="block-header block-header-default mt-4">
                        <h3 class="block-title">
                            Grafik Berdasarkan Jenis Surat
                        </h3>
                        <div class="d-flex gap-2">
                            <select name="bulan" id="bulan_jenis" class="form-select">
                                <option value="">Pilih Bulan</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <select name="tahun" id="tahun_jenis" class="form-select">
                                @php
                                    $tahun = date('Y');
                                @endphp
                                <option value="">Pilih Tahun</option>
                                @for ($i = $tahun; $i > $tahun - 5; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor

                            </select>
                        </div>
                    </div>
                    <div class="block-content text-muted">

                        <div id="grafik-by-jenis"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection

@section('js')
    @vite(['resources/js/components.js'])
@endsection
