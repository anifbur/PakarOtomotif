@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        Tambah Gejala
    </div>

    <div class="card-body">

        <form action="{{ route('gejala.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label>Kode Gejala</label>

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

                <label>Nama Gejala</label>

                <input type="text"
                       name="nama_gejala"
                       class="form-control">

                @error('nama_gejala')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <button class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('gejala.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection