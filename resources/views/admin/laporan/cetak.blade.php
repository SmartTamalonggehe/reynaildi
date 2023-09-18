@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Surat</title>

    <style>
        /* reset */
        body {
            margin: 0 10px;
            padding: 0;
            box-sizing: border-box;
            font-size: 12px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            margin: 0;
            padding: 0;
        }

        ol,
        ul {
            margin: 0;
            padding-left: 20px
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-underline {
            text-decoration: underline;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .text-capitalize {
            text-transform: capitalize;
        }

        .mt-1 {
            margin-top: 0.3em;
        }

        .mt-2 {
            margin-top: 0.5em;
        }

        .mt-3 {
            margin-top: 1em;
        }

        .mt-4 {
            margin-top: 1.5em;
        }

        hr {
            margin: 0;
        }

        hr.garis_surat {
            border: 1px solid #000;
            height: 1px;
            background-color: #000;
            margin-bottom: 2px
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table td,
        th {
            padding: 3px 0;
            vertical-align: top;
        }

        .table-bordered td,
        th {
            border: 1px solid #000;
            padding: 3px 5px;
        }

        .isi-gaji {
            width: auto;
            margin: auto
        }

        .clearfix {
            clear: both;
        }

        .float-left {
            float: left;
        }

        .float-right {
            float: right;
        }

        .d-inline {
            display: inline;
        }

        .d-inline-block {
            display: inline-block;
        }

        .img {
            width: 50px;
            height: auto;
        }

        .hal-kwitansi {
            margin-left: 400px;
        }
    </style>
</head>

<body>
    <div class="text-center">
        <h2 class="mt-1">Dinas Perumahan Rakyat dan Kawasan Permukiman Kabupaten Tambrauw</h2>
        <h3>Laporan Arsip {{ $tipe }}
            @if ($bulan != '')
                Bulan {{ $bulan }}
            @endif
            @if ($tahun != '')
                Tahun {{ $tahun }}
            @endif
        </h3>
    </div>
    <hr class="garis_surat mt-2">
    <hr>
    {{-- table --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Surat</th>
                <th>No. Surat</th>
                <th>Tgl. Surat</th>
                <th>hal</th>
                @if ($tipe == 'Surat Keluar')
                    <th>Ke</th>
                @elseif ($tipe == 'Surat Masuk')
                    <th>Dari</th>
                @else
                    <th colspan="2">Dari/Ke</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($surat as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->no_surat }}</td>
                    <td>
                        {{ Carbon::createFromFormat('Y-m-d', $item->tgl_surat)->format('d-m-Y') }}
                    </td>
                    <td>{{ $item->hal }}</td>
                    <td>{{ $item->dari_ke }}</td>
                    @if ($tipe == '')
                        <td>{{ $item->tipe }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
