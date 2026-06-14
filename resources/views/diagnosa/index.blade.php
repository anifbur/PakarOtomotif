@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h3>Data Diagnosa</h3>

    <a href="{{ route('diagnosa.create') }}"
       class="btn btn-primary">
        Tambah Diagnosa
    </a>

</div>

<table class="table table-bordered">

    <thead>

        <tr>
            <th width="5%">No</th>
            <th width="10%">Kode</th>
            <th width="25%">Diagnosa</th>
            <th>Solusi</th>
            <th width="20%">Aksi</th>
        </tr>

    </thead>

    <tbody>

        @forelse($diagnosas as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $item->kode }}</td>

                <td>{{ $item->nama_diagnosa }}</td>

                <td>{{ $item->solusi }}</td>

                <td>

                    <a href="{{ route('diagnosa.edit',$item->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('diagnosa.destroy',$item->id) }}"
                          method="POST"
                          style="display:inline">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Hapus data?')"
                            class="btn btn-danger btn-sm">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="5" class="text-center">
                    Tidak ada data
                </td>
            </tr>

        @endforelse

    </tbody>

</table>

{{ $diagnosas->links() }}

@endsection