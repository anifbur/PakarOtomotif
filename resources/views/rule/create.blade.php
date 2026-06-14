@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        Tambah Rule
    </div>

    <div class="card-body">

        <form action="{{ route('rule.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label>Diagnosa</label>

                <select name="diagnosa_id"
                        class="form-control">

                    @foreach($diagnosas as $diagnosa)

                    <option value="{{ $diagnosa->id }}">
                        {{ $diagnosa->nama_diagnosa }}
                    </option>

                    @endforeach

                </select>

            </div>

           <table class="table table-bordered">

    <thead>
        <tr>
            <th width="10%">Pilih</th>
            <th>Gejala</th>
            <th width="20%">CF Pakar</th>
        </tr>
    </thead>

    <tbody>

    @foreach($gejalas as $gejala)

        <tr>

            <td>

                <input type="checkbox"
                       name="rule_details[{{ $gejala->id }}][aktif]"
                       value="1">

            </td>

            <td>

                {{ $gejala->kode }}
                -
                {{ $gejala->nama_gejala }}

            </td>

            <td>

                <input type="number"
                       step="0.01"
                       min="0"
                       max="1"
                       value="0.80"
                       class="form-control"
                       name="rule_details[{{ $gejala->id }}][cf]">

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

            <button class="btn btn-success">
                Simpan
            </button>

        </form>

    </div>

</div>

@endsection