<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Peminjaman</title>
    <link rel="stylesheet" href="{{ asset('css/main/app.css') }}" />
    <style>
        body {
            font-family: arial;
            background-color: white;
            color: black;
        }

        *,
        h6,
        h5,
        h4 {
            color: black;
        }

        p {
            margin: 0;
        }

        hr {
            height: 5px;
            background-color: black
        }
    </style>
</head>

<body>
    {{-- kop surat --}}
    <div class="row">
        <div class="col-2">
            <img src={{ asset('/images/logo/unib.png') }} width="140px">
        </div>
        <div class="col-10 text-center">
            <h5>KEMENTRIAN RISET TEKNOLOGI DAN PENDIDIKAN TINGGI</h5>
            <h5>UNIVERSITAS BENGKULU</h5>
            <h4>FAKULTAS TEKNIK</h4>
            <h4>PROGRAM STUDI INFORMATIKA</h4>
            <p>Jalan W.R. Supratman Kandang Limun Bengkulu</p>
            <p>Bengkulu 38371 A Telepon : (0736) 344087, 22105 – 227</p>
        </div>
    </div>
    <hr>

    {{-- header --}}
    <div class="row text-center">
        <h4>Laporan Peminjaman Barang</h4>
    </div>

    <div class="row text-center mb-4">
        <p>Dari tanggal {{ $startDate }} sampai {{ $endDate }}</p>
    </div>

    {{-- tabel data --}}
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NPM</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam Pinjam</th>
                    <th scope="col">Jam Kembali</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrowings as $borrowing)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <span class="">{{ $borrowing->student->identification_number }}</span>
                        </td>
                        <td>
                            <span class="">{{ $borrowing->student->name }}</span>
                        </td>
                        <td>{{ $borrowing->item->name }}</td>
                        <td>{{ $borrowing->date }}</td>
                        <td>
                            <span>
                                {{ $borrowing->time_start }}
                            </span>
                        </td>
                        <td>
                            @if ($borrowing->time_end === null)
                                <span>Sedang dipinjam</span>
                            @else
                                <span>
                                    {{ $borrowing->time_end }}
                                </span>
                            @endif
                        </td>
                        <td>
                            @if ($borrowing->validated !== null)
                                <span>Barang sudah divalidasi</span>
                            @else
                                <span>Barang belum divalidasi</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($borrowings->isEmpty())
            <p class="text-center">--Belum ada data--</p>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.print();
        });
    </script>

</body>

</html>
