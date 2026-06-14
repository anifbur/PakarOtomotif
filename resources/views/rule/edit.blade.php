@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        Edit Rule
    </div>

    <div class="card-body">

        <form action="{{ route('rule.update',$rule->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Diagnosa</label>

                <select name="diagnosa_id"
                        class="form-control">

                    @foreach($diagnosas as $diagnosa)

                    <option value="{{ $diagnosa->id }}"
                        {{ $rule->diagnosa_id == $diagnosa->id ? 'selected' : '' }}>
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

        @php

        $detail = $rule->details
            ->where('gejala_id',$gejala->id)
            ->first();

        @endphp

        <tr>

            <td>

                <input type="checkbox"
                       name="rule_details[{{ $gejala->id }}][aktif]"
                       value="1"
                       {{ $detail ? 'checked' : '' }}>

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
                       class="form-control"
                       name="rule_details[{{ $gejala->id }}][cf]"
                       value="{{ $detail->cf_pakar ?? 0.80 }}">

            </td>

        </tr>

    @endforeach

    </tbody>

</table>
            <button class="btn btn-primary">
                Update
            </button>

        </form>

    </div>

</div>

@endsection