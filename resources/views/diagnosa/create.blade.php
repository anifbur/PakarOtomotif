@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        Tambah Diagnosa
    </div>

    <div class="card-body">

        <form action="{{ route('diagnosa.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label>Kode Diagnosa</label>

                <input type="text"
                       name="kode"
                       class="form-control">

                @error('kode')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="mb-3">

                <label>Nama Diagnosa</label>

                <input type="text"
                       name="nama_diagnosa"
                       class="form-control">

                @error('nama_diagnosa')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="mb-3">

                <label>Solusi</label>

                <textarea name="solusi"
                          rows="5"
                          class="form-control"></textarea>

                @error('solusi')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <button class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('diagnosa.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection