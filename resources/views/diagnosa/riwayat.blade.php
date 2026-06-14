@extends('layouts.app')

@section('content')

<h3>Riwayat Diagnosa</h3>

<table class="table table-bordered">

    <thead>

    <tr>

        <th>No</th>

        <th>Nama</th>

        <th>Diagnosa</th>

        <th>CF</th>

        <th>Tanggal</th>

    </tr>

    </thead>

    <tbody>

    @foreach($riwayat as $item)

        <tr>

            <td>

                {{ $loop->iteration }}

            </td>

            <td>

                {{ $item->nama_user }}

            </td>

            <td>

                {{ $item->hasil_diagnosa }}

            </td>

            <td>

                {{ $item->nilai_cf }} %

            </td>

            <td>

                {{ $item->created_at }}

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

@endsection