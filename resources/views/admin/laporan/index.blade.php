@extends('admin.layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="row items-push">
            <div class="col-12">
                <div class="block block-rounded h-100 mb-0">
                    <div class="block-header block-header-default">
                        <div class="d-flex flex-row gap-4">
                            <h3 class="block-title">
                                Laporan Surat
                            </h3>

                            <div class="">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="Surat Masuk" name="radio_tipe_lap"
                                        value="Surat Masuk">
                                    <label class="form-check-label" for="Surat Masuk">Surat Masuk</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="Surat Keluar" name="radio_tipe_lap"
                                        value="Surat Keluar">
                                    <label class="form-check-label" for="Surat Keluar">Surat Keluar</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <select name="bulan" id="bulan_tipe_lap" class="form-select">
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
                            <select name="tahun" id="tahun_tipe_lap" class="form-select">
                                @php
                                    $tahun = date('Y');
                                @endphp
                                <option value="">Pilih Tahun</option>
                                @for ($i = $tahun; $i > $tahun - 5; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor

                            </select>
                        </div>
                        <div>
                            <a id="cetak_lap" href="#" target="_blank" class="btn btn-secondary float-end">Cetak</a>
                        </div>
                    </div>
                    <div class="block block-rounded">
                        <div class="table-responsive">
                            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                            <table
                                class="table table-responsive table-bordered table-striped table-vcenter js-dataTable-buttons">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 80px;">#</th>
                                        <th>Jenis Surat</th>
                                        <th>no. surat</th>
                                        <th>tgl. surat</th>
                                        <th>hal</th>
                                        <th id="tujuan"></th>
                                    </tr>
                                </thead>
                                <tbody id="table_lap">
                                    {{-- text-muted text-nowrap --}}
                                </tbody>
                            </table>
                        </div>

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
