@extends('Layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-3xl font-bold text-white mb-2 flex items-center gap-2">
                <svg class="w-8 h-8 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                </svg>
                Data Rule (Basis Pengetahuan)
            </h2>
            <p class="text-zinc-400">Kelola basis pengetahuan (rule) yang menghubungkan gejala dengan diagnosa.</p>
        </div>
        <a href="{{ route('rule.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-gradient-to-r from-purple-500 to-indigo-500 hover:from-purple-400 hover:to-indigo-400 text-white font-medium rounded-xl transition-all shadow-lg shadow-purple-500/20">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Rule Baru
        </a>
    </div>

    <!-- Rules Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @forelse($rules as $rule)
            <div class="bg-zinc-900/50 backdrop-blur-md border border-zinc-800 rounded-2xl shadow-xl overflow-hidden flex flex-col hover:border-zinc-700 transition-colors">
                
                <!-- Rule Header -->
                <div class="px-6 py-4 border-b border-zinc-800 bg-zinc-950/50 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="px-2.5 py-1 rounded-full bg-purple-500/10 text-purple-400 text-xs font-bold border border-purple-500/20">
                            Rule #{{ $rule->id }}
                        </span>
                        <h4 class="text-lg font-bold text-white truncate max-w-xs" title="{{ $rule->diagnosa->nama_diagnosa }}">
                            {{ $rule->diagnosa->nama_diagnosa }}
                        </h4>
                    </div>
                    
                    <!-- Actions -->
                    <div class="flex items-center gap-2">
                        <a href="{{ route('rule.edit', $rule->id) }}" class="p-2 bg-amber-500/10 text-amber-500 hover:bg-amber-500 hover:text-white rounded-lg transition-colors border border-amber-500/20" title="Edit Rule">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        <form action="{{ route('rule.destroy', $rule->id) }}" method="POST" class="inline-block" x-data @submit.prevent="if(confirm('Hapus data rule ini?')) $el.submit()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 bg-rose-500/10 text-rose-500 hover:bg-rose-500 hover:text-white rounded-lg transition-colors border border-rose-500/20" title="Hapus Rule">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Rule Details -->
                <div class="p-0 flex-1">
                    <table class="w-full text-left text-sm">
                        <thead>
                            <tr class="bg-zinc-900/30 border-b border-zinc-800 text-zinc-500">
                                <th class="px-6 py-3 font-medium">Kondisi Gejala (IF)</th>
                                <th class="px-6 py-3 font-medium w-28 text-center">CF Pakar</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-800/50">
                            @foreach($rule->details as $index => $detail)
                                <tr class="hover:bg-zinc-800/20 transition-colors">
                                    <td class="px-6 py-3 text-zinc-300">
                                        <div class="flex items-start gap-2">
                                            @if($index > 0)
                                                <span class="text-xs font-bold text-purple-500 uppercase mt-0.5 w-8">AND</span>
                                            @else
                                                <span class="text-xs font-bold text-emerald-500 uppercase mt-0.5 w-8">IF</span>
                                            @endif
                                            <span>{{ $detail->gejala->nama_gejala }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-center">
                                        <span class="inline-flex px-2 py-1 rounded bg-zinc-800 text-white font-mono text-xs border border-zinc-700">
                                            {{ $detail->cf_pakar }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="bg-purple-500/5">
                                <td colspan="2" class="px-6 py-3">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs font-bold text-purple-400 uppercase w-8">THEN</span>
                                        <span class="font-semibold text-white">{{ $rule->diagnosa->nama_diagnosa }}</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        @empty
            <div class="col-span-1 lg:col-span-2 bg-zinc-900/50 border border-zinc-800 rounded-2xl p-12 text-center">
                <div class="inline-flex flex-col items-center justify-center">
                    <svg class="w-16 h-16 text-zinc-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                    <h3 class="text-xl font-bold text-white mb-2">Belum ada data rule</h3>
                    <p class="text-zinc-400 mb-6">Tambahkan rule pertama Anda untuk membangun basis pengetahuan.</p>
                    <a href="{{ route('rule.create') }}" class="px-6 py-3 bg-zinc-800 hover:bg-zinc-700 text-white font-medium rounded-xl transition-colors border border-zinc-700">
                        Buat Rule Sekarang
                    </a>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection