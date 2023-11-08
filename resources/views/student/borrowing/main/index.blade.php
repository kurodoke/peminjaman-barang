@extends('layouts.app')

@section('title', 'Peminjamanku Hari Ini')
@section('description', 'Halaman Daftar Peminjamanku Hari Ini')

@section('content')
<section class="row">
  <div class="col-12">
    @include('utilities.alert')
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">@yield('title')</h4>
      </div>
      <div class="card-body">
        <div class="alert alert-warning" role="alert">
          <div class="fw-bold text-center">
            <span>
              Data ini adalah daftar data peminjaman yang khusus untuk hari ini saja yaitu tanggal {{now()}}
            </span>
          </div>
        </div>

        <x-button-group-flex>
          <button type="button" class="btn btn-success" data-bs-toggle="modal"
            data-bs-target="#availableItemModal">
            <i class="bi bi-collection-fill"></i>
            Daftar Barang Yang Tersedia
          </button>

          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBorrowingModal">
            <i class="bi bi-plus-circle-fill"></i>
            Tambah Peminjaman
          </button>
        </x-button-group-flex>

        <div class="table-responsive">
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Barang</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam Pinjam</th>
                <th scope="col">Jam Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($borrowings as $borrowing)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <th>
                  <span class="badge text-bg-primary" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="{{ $borrowing->student->identification_number }}">{{
                    $borrowing->student->name }}</span>
                </th>
                <td>{{ $borrowing->item->name }}</td>
                <td>{{ $borrowing->date }}</td>
                <td>
                  <span class="badge text-bg-secondary">
                    <i class="bi bi-clock-fill"></i>
                    {{ $borrowing->time_start }}
                  </span>
                </td>
                <td>
                  @if($borrowing->time_end === NULL)
                  <span class="badge text-bg-info" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Sedang dipinjam">
                    <i class="bi bi-clock"></i></span>
                  @else
                  <span class="badge text-bg-secondary">
                    <i class="bi bi-clock-fill"></i>
                    {{ $borrowing->time_end }}
                  </span>
                  @endif
                </td>
                <td>
                  @if($borrowing->validated !== NULL)
                  <span class="badge text-bg-success" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Barang sudah divalidasi">
                    <i class="bi bi-check-circle"></i>
                  </span>
                  @else
                  <span class="badge text-bg-warning" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Barang belum divalidasi!">
                    <i class="bi bi-exclamation-circle"></i>
                  </span>
                  @endif
                </td>
                <td>
                  <div class="btn-group gap-1">
                    <button type="button" class="btn btn-sm btn-success showBorrowingButton" data-bs-toggle="modal"
                      data-id="{{ $borrowing->id }}" data-bs-target="#detailBorrowingModal">
                      <i class="bi bi-eye-fill"></i>
                    </button>

                    @if($borrowing->time_end === NULL)
                    <button type="button" class="btn btn btn-sm btn-warning" data-bs-toggle="modal"
                      data-bs-target="#returnBorrowingModal">
                      <i class="bi bi-check-circle-fill"></i>
                    </button>

                    @push('modal')
                    @include('student.borrowing.main.modal.return-borrowing')
                    @endpush
                    @endif

                    @if($borrowing->time_end === NULL)
                    <button type="button" class="btn btn-sm btn-success editBorrowingButton" data-bs-toggle="modal"
                      data-id="{{ $borrowing->id }}" data-bs-target="#editBorrowingModal">
                      <i class="bi bi-pencil-fill"></i>
                    </button>
                    @endif
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('modal')
@include('student.borrowing.main.modal.create')
@include('student.borrowing.main.modal.show')
@include('student.borrowing.main.modal.edit')
@include('student.borrowing.main.modal.available-item')
@endpush

@push('script')
@include('student.borrowing.script')
@endpush
