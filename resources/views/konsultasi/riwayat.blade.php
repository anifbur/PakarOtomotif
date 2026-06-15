@extends('Layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h2 class="text-3xl font-bold text-white mb-2">Riwayat Diagnosa</h2>
            <p class="text-zinc-400">Daftar riwayat konsultasi kerusakan motor matic yang pernah dilakukan.</p>
        </div>
        <a href="/konsultasi" class="inline-flex items-center gap-2 px-5 py-2.5 bg-rose-500 hover:bg-rose-600 text-white font-medium rounded-xl transition-colors shadow-lg shadow-rose-500/20">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Konsultasi Baru
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-zinc-900/50 backdrop-blur-md border border-zinc-800 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-zinc-950/50 border-b border-zinc-800 text-zinc-400 text-sm uppercase tracking-wider">
                        <th class="px-6 py-4 font-medium w-16 text-center">No</th>
                        <th class="px-6 py-4 font-medium">Nama Pengguna</th>
                        <th class="px-6 py-4 font-medium">Hasil Diagnosa</th>
                        <th class="px-6 py-4 font-medium">Nilai CF</th>
                        <th class="px-6 py-4 font-medium">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800/50">
                    @forelse($riwayat as $item)
                        <tr class="hover:bg-zinc-800/20 transition-colors group">
                            <td class="px-6 py-4 text-center text-zinc-500 group-hover:text-zinc-400">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-medium text-white">
                                {{ $item->nama_user }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                    {{ $item->hasil_diagnosa }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-16 bg-zinc-800 rounded-full h-1.5 overflow-hidden">
                                        <div class="h-1.5 rounded-full {{ $item->nilai_cf >= 80 ? 'bg-emerald-500' : ($item->nilai_cf >= 50 ? 'bg-orange-500' : 'bg-rose-500') }}" style="width: {{ $item->nilai_cf }}%"></div>
                                    </div>
                                    <span class="text-sm font-bold text-zinc-300">{{ $item->nilai_cf }}%</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-zinc-400">
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y, H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="inline-flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-zinc-600 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                    <span class="text-zinc-500 text-sm">Belum ada riwayat diagnosa.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if(method_exists($riwayat, 'links'))
            <div class="px-6 py-4 border-t border-zinc-800 bg-zinc-950/30">
                {{ $riwayat->links() }}
            </div>
        @endif
    </div>
</div>
@endsection