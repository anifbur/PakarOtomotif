@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        Edit Diagnosa
    </div>

    <div class="card-body">

        <form action="{{ route('diagnosa.update',$diagnosa->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Kode Diagnosa</label>

                <input type="text"
                       name="kode"
                       value="{{ $diagnosa->kode }}"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Nama Diagnosa</label>

                <input type="text"
                       name="nama_diagnosa"
                       value="{{ $diagnosa->nama_diagnosa }}"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Solusi</label>

                <textarea name="solusi"
                          rows="5"
                          class="form-control">{{ $diagnosa->solusi }}</textarea>

            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('diagnosa.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection