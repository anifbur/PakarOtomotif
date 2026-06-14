@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h3>Data Gejala</h3>

    <a href="{{ route('gejala.create') }}"
       class="btn btn-primary">
        Tambah Gejala
    </a>

</div>

<table class="table table-bordered">

    <thead>

        <tr>
            <th width="10%">No</th>
            <th width="15%">Kode</th>
            <th>Nama Gejala</th>
            <th width="20%">Aksi</th>
        </tr>

    </thead>

    <tbody>

        @forelse($gejalas as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $item->kode }}</td>

                <td>{{ $item->nama_gejala }}</td>

                <td>

                    <a href="{{ route('gejala.edit',$item->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('gejala.destroy',$item->id) }}"
                          method="POST"
                          style="display:inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus data?')">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="4" class="text-center">
                    Tidak ada data
                </td>
            </tr>

        @endforelse

    </tbody>

</table>

{{ $gejalas->links() }}

@endsection