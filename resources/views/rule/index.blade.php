@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h3>Data Rule</h3>

    <a href="{{ route('rule.create') }}"
       class="btn btn-primary">
        Tambah Rule
    </a>

</div>

@foreach($rules as $rule)

<div class="card mb-3">

    <div class="card-header">

    <strong>

        Rule #{{ $rule->id }}
        -
        {{ $rule->diagnosa->nama_diagnosa }}

    </strong>

</div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>
                    <th>Gejala</th>
                    <th width="20%">CF Pakar</th>
                </tr>

            </thead>

            <tbody>

                @foreach($rule->details as $detail)

                <tr>

                    <td>
                        {{ $detail->gejala->nama_gejala }}
                    </td>

                    <td>
                        {{ $detail->cf_pakar }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        <a href="{{ route('rule.edit',$rule->id) }}"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        <form action="{{ route('rule.destroy',$rule->id) }}"
              method="POST"
              style="display:inline">

            @csrf
            @method('DELETE')

            <button class="btn btn-danger btn-sm"
                    onclick="return confirm('Hapus rule?')">
                Hapus
            </button>

        </form>

    </div>

</div>

@endforeach

@endsection