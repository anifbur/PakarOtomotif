@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>Konsultasi Motor Matic</h4>

    </div>

    <div class="card-body">

        <form method="POST" action="{{ route('proses.diagnosa') }}">

            @csrf

            <div class="mb-3">

                <label>Nama Pengguna</label>

                <input type="text"
                       name="nama_user"
                       class="form-control"
                       required>

            </div>

            <hr>

            <h5>Pilih Gejala yang Dialami</h5>

            <table class="table table-bordered">

                <thead>

                <tr>

                    <th width="45%">
                        Gejala
                    </th>

                    <th width="25%">
                        Tingkat Keyakinan
                    </th>

                </tr>

                </thead>

                <tbody>

                @foreach($gejalas as $gejala)

                    <tr>

                        <td>

                            {{ $gejala->kode }}
                            -
                            {{ $gejala->nama_gejala }}

                        </td>

                        <td>

                            <select
                                class="form-control"
                                name="gejala[{{ $gejala->id }}]">

                                <option value="">
                                    Tidak Dipilih
                                </option>

                                <option value="0.2">
                                    Tidak Yakin
                                </option>

                                <option value="0.4">
                                    Kurang Yakin
                                </option>

                                <option value="0.6">
                                    Cukup Yakin
                                </option>

                                <option value="0.8">
                                    Yakin
                                </option>

                                <option value="1">
                                    Sangat Yakin
                                </option>

                            </select>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

            <button class="btn btn-primary">

                Proses Diagnosa

            </button>

        </form>

    </div>

</div>

@endsection