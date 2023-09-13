@extends('admin.layouts.backend')
@section('js')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <!-- Page JS Code -->
    @vite(['resources/js/pages/datatables.js', 'resources/js/components.js'])
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="row items-push">
            <div class="col-xl-12">
                <div class="block block-rounded h-100 mb-0">
                    <div class="block-header block-header-default">
                        <div class="d-flex flex-row gap-4">
                            <h3 class="block-title">
                                Data Surat
                            </h3>
                            <div class="space-x-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="Surat Masuk" name="tipe_surat"
                                        value="Surat Masuk">
                                    <label class="form-check-label" for="Surat Masuk">Surat Masuk</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="Surat Keluar" name="tipe_surat"
                                        value="Surat Keluar">
                                    <label class="form-check-label" for="Surat Keluar">Surat Keluar</label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('surat.create') }}" class="btn btn-secondary float-end">Tambah Data</a>
                        </div>
                    </div>
                    <!-- Dynamic Table with Export Buttons -->
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
                                        <th id="tujuan_surat"></th>
                                        <th>gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-muted text-nowrap"">{{ $item->jenis->nama }}</td>
                                            <td class="text-muted text-nowrap"">{{ $item->no_surat }}</td>
                                            <td class="text-muted text-nowrap"">{{ $item->tgl_surat }}</td>
                                            <td class="text-muted text-nowrap"">{{ $item->hal }}</td>
                                            <td class="text-muted text-nowrap"">{{ $item->dari_ke }}</td>
                                            <td class="text-muted text-nowrap"">
                                                @php
                                                    $gambar = 'images/no-image.png';
                                                    if ($item->gambar) {
                                                        $gambar = $item->gambar;
                                                    }
                                                @endphp
                                                <a href={{ asset("$gambar") }} target="_blank">
                                                    <img class="img-thumbnail" src={{ asset("$gambar") }}>
                                                </a>

                                            </td>
                                            <td class="text-muted d-flex justify-content-around">
                                                {{-- edit --}}
                                                <a class="text-warning" href="{{ route('surat.edit', $item->id) }}">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </a>
                                                {{-- hapus --}}
                                                <span class="text-danger hapus" role="button" title="Hapus"
                                                    data-url="surat" data-id="{{ $item->id }}">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- END Dynamic Table with Export Buttons -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
