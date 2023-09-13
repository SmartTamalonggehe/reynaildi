@extends('admin.layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="row items-push">
            <div class="col-xl-12">
                <div class="block block-rounded h-100 mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Data Surat
                        </h3>
                    </div>
                    <div class="block-content text-muted">
                        <p>
                            Silahkan manambah data surat
                        </p>
                    </div>
                    {{-- form --}}
                    <div class="block-content">
                        <form class="js-validation" action="{{ route('surat.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Regular -->
                            <div class="row items-push">
                                <div class="mb-4 col-12 col-md-4">
                                    <label class="form-label" for="val-jenis">Jenis Surat<span
                                            class="text-danger">*</span></label>
                                    <select class="tom-select" id="val-jenis" name="jenis_id" required>
                                        <option value="">Pilih Jenis</option>
                                        @foreach ($jenis as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4 col-12 col-md-4">
                                    <label class="form-label" for="val-tipe">Surat Masuk/Keluar <span
                                            class="text-danger">*</span></label>
                                    <div class="mb-4">
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="Surat Masuk"
                                                    name="tipe" value="Surat Masuk" checked="">
                                                <label class="form-check-label" for="Surat Masuk">Surat Masuk</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="Surat Keluar"
                                                    name="tipe" value="Surat Keluar">
                                                <label class="form-check-label" for="Surat Keluar">Surat Keluar</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 col-12 col-md-4">
                                    <label class="form-label" for="val-no_surat">No. Surat <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-no_surat" name="no_surat" required
                                        placeholder="Masukan No. Surat...">
                                </div>
                                <div class="mb-4 col-12 col-md-6">
                                    <label class="form-label" for="val-hal">Hal <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-hal" name="hal" required
                                        placeholder="Masukan hal...">
                                </div>
                                <div class="mb-4 col-12 col-md-3">
                                    <label class="form-label" for="val-dari_ke">Dari <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-dari_ke" name="dari_ke" required
                                        placeholder="Masukan dari...">
                                </div>
                                <div class="mb-4 col-12 col-md-3">
                                    <label class="form-label" for="val-tgl_surat">Tanggal Surat <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="val-tgl_surat" name="tgl_surat" required
                                        placeholder="Masukan Tanggal Surat...">
                                </div>
                                <div class="mb-4 col-12">
                                    <input type="file" accept="image/*" id="foto" name="gambar">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <div class="image-preview"></div>
                                        </div>
                                        <div class="col-4 ml-4" id="container_foto_lama">
                                            <div class="foto_lama"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- END Regular -->
                            <!-- Submit -->
                            <div class="row items-push justify-content-end">
                                <div class="col-2">
                                    <button type="submit" class="btn btn-primary float-end">Simpan</button>
                                </div>
                            </div>
                            <!-- END Submit -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection

@section('js')
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/pages/be_forms_validation.min.js') }}"></script>

    @vite(['resources/js/components.js'])
@endsection
