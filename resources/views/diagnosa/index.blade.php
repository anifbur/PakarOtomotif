@extends('Layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-3xl font-bold text-white mb-2 flex items-center gap-2">
                <svg class="w-8 h-8 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Data Diagnosa
            </h2>
            <p class="text-zinc-400">Kelola master data hasil diagnosa dan solusi penanganannya.</p>
        </div>
        <a href="{{ route('diagnosa.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-gradient-to-r from-teal-500 to-emerald-500 hover:from-teal-400 hover:to-emerald-400 text-white font-medium rounded-xl transition-all shadow-lg shadow-teal-500/20">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Diagnosa
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-zinc-900/50 backdrop-blur-md border border-zinc-800 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-zinc-950/50 border-b border-zinc-800 text-zinc-400 text-sm uppercase tracking-wider">
                        <th class="px-6 py-4 font-medium w-16 text-center">No</th>
                        <th class="px-6 py-4 font-medium w-28">Kode</th>
                        <th class="px-6 py-4 font-medium w-1/4">Diagnosa</th>
                        <th class="px-6 py-4 font-medium">Solusi</th>
                        <th class="px-6 py-4 font-medium w-32 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800/50">
                    @forelse($diagnosas as $item)
                        <tr class="hover:bg-zinc-800/20 transition-colors group">
                            <td class="px-6 py-4 text-center text-zinc-500 group-hover:text-zinc-400 align-top">
                                {{ $loop->iteration + ($diagnosas->currentPage() - 1) * $diagnosas->perPage() }}
                            </td>
                            <td class="px-6 py-4 align-top">
                                <span class="inline-flex px-2 py-1 rounded border border-zinc-700 bg-zinc-800 text-xs font-bold text-zinc-300">
                                    {{ $item->kode }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-medium text-white align-top">
                                {{ $item->nama_diagnosa }}
                            </td>
                            <td class="px-6 py-4 text-zinc-400 text-sm leading-relaxed">
                                {{ $item->solusi }}
                            </td>
                            <td class="px-6 py-4 align-top">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('diagnosa.edit', $item->id) }}" class="p-2 bg-amber-500/10 text-amber-500 hover:bg-amber-500 hover:text-white rounded-lg transition-colors border border-amber-500/20" title="Edit">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('diagnosa.destroy', $item->id) }}" method="POST" class="inline-block" x-data @submit.prevent="if(confirm('Hapus data diagnosa ini?')) $el.submit()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-rose-500/10 text-rose-500 hover:bg-rose-500 hover:text-white rounded-lg transition-colors border border-rose-500/20" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="inline-flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-zinc-600 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-zinc-500 text-sm">Belum ada data diagnosa.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if(method_exists($diagnosas, 'links'))
            <div class="px-6 py-4 border-t border-zinc-800 bg-zinc-950/30">
                {{ $diagnosas->links() }}
            </div>
        @endif
    </div>
</div>
@endsection