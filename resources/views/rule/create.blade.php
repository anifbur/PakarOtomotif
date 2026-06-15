@extends('Layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-3xl font-bold text-white mb-2 flex items-center gap-2">
                <svg class="w-8 h-8 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Rule
            </h2>
            <p class="text-zinc-400">Buat relasi baru antara diagnosa dan gejala yang mendasarinya.</p>
        </div>
        <a href="{{ route('rule.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-zinc-800 hover:bg-zinc-700 text-white font-medium rounded-xl transition-colors border border-zinc-700 shadow-lg">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <!-- Form Container -->
    <form action="{{ route('rule.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Diagnosa Selection -->
        <div class="bg-zinc-900/50 backdrop-blur-md border border-zinc-800 rounded-2xl shadow-xl p-6 md:p-8">
            <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-purple-500/20 text-purple-400 text-xs">1</span>
                Pilih Diagnosa (THEN)
            </h3>
            <div class="relative">
                <select name="diagnosa_id" class="appearance-none w-full bg-zinc-950 border border-zinc-800 rounded-xl pl-4 pr-10 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all cursor-pointer">
                    <option value="" disabled selected class="text-zinc-500">-- Pilih Diagnosa --</option>
                    @foreach($diagnosas as $diagnosa)
                        <option value="{{ $diagnosa->id }}">{{ $diagnosa->nama_diagnosa }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-zinc-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Gejala Selection -->
        <div class="bg-zinc-900/50 backdrop-blur-md border border-zinc-800 rounded-2xl shadow-xl overflow-hidden flex flex-col">
            <div class="p-6 md:p-8 border-b border-zinc-800 bg-zinc-950/30">
                <h3 class="text-lg font-bold text-white mb-1 flex items-center gap-2">
                    <span class="flex items-center justify-center w-6 h-6 rounded-full bg-purple-500/20 text-purple-400 text-xs">2</span>
                    Pilih Gejala Terkait (IF ... AND)
                </h3>
                <p class="text-zinc-400 text-sm ml-8">Centang gejala yang menjadi bagian dari rule ini dan tentukan nilai CF (Certainty Factor) pakar.</p>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-zinc-950/50 border-b border-zinc-800 text-zinc-400 text-sm uppercase tracking-wider">
                            <th class="px-6 py-4 font-medium w-16 text-center">Pilih</th>
                            <th class="px-6 py-4 font-medium">Gejala</th>
                            <th class="px-6 py-4 font-medium w-40 text-center">CF Pakar</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/50">
                        @foreach($gejalas as $gejala)
                            <tr class="hover:bg-zinc-800/20 transition-colors group">
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center">
                                        <input type="checkbox"
                                               name="rule_details[{{ $gejala->id }}][aktif]"
                                               value="1"
                                               id="gejala_{{ $gejala->id }}"
                                               class="w-5 h-5 rounded border-zinc-700 text-purple-500 focus:ring-purple-500 bg-zinc-950 cursor-pointer">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <label for="gejala_{{ $gejala->id }}" class="cursor-pointer block">
                                        <span class="inline-flex px-2 py-0.5 rounded border border-zinc-700 bg-zinc-800 text-xs font-bold text-zinc-300 mr-2">
                                            {{ $gejala->kode }}
                                        </span>
                                        <span class="font-medium text-white">{{ $gejala->nama_gejala }}</span>
                                    </label>
                                </td>
                                <td class="px-6 py-4">
                                    <input type="number"
                                           step="0.01"
                                           min="0"
                                           max="1"
                                           value="0.80"
                                           class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3 py-2 text-center text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all font-mono"
                                           name="rule_details[{{ $gejala->id }}][cf]">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="p-6 md:p-8 bg-zinc-950/30 border-t border-zinc-800 flex justify-end">
                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-purple-500 to-indigo-500 hover:from-purple-400 hover:to-indigo-400 text-white font-bold rounded-xl transition-all shadow-lg shadow-purple-500/25 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Rule
                </button>
            </div>
        </div>
    </form>
</div>
@endsection