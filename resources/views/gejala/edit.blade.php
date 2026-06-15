@extends('Layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-white mb-2 flex items-center gap-2">
            <svg class="w-8 h-8 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit Gejala
        </h2>
        <p class="text-zinc-400">Perbarui informasi data gejala kerusakan motor matic.</p>
    </div>

    <!-- Form Card -->
    <div class="bg-zinc-900/50 backdrop-blur-md border border-zinc-800 rounded-2xl shadow-xl p-6 md:p-8">
        <form action="{{ route('gejala.update', $gejala->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Input Group: Kode Gejala -->
            <div>
                <label for="kode" class="block text-sm font-medium text-zinc-400 mb-2">Kode Gejala</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-zinc-500 sm:text-sm">#</span>
                    </div>
                    <input type="text"
                           id="kode"
                           name="kode"
                           value="{{ old('kode', $gejala->kode) }}"
                           class="w-full bg-zinc-950 border {{ $errors->has('kode') ? 'border-red-500 focus:ring-red-500' : 'border-zinc-800 focus:ring-amber-500' }} rounded-xl pl-8 pr-4 py-3 text-white placeholder-zinc-600 focus:outline-none focus:ring-2 focus:border-transparent transition-all"
                           placeholder="Contoh: G01">
                </div>
                @error('kode')
                    <p class="mt-2 text-sm text-red-500 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Input Group: Nama Gejala -->
            <div>
                <label for="nama_gejala" class="block text-sm font-medium text-zinc-400 mb-2">Nama Gejala</label>
                <input type="text"
                       id="nama_gejala"
                       name="nama_gejala"
                       value="{{ old('nama_gejala', $gejala->nama_gejala) }}"
                       class="w-full bg-zinc-950 border {{ $errors->has('nama_gejala') ? 'border-red-500 focus:ring-red-500' : 'border-zinc-800 focus:ring-amber-500' }} rounded-xl px-4 py-3 text-white placeholder-zinc-600 focus:outline-none focus:ring-2 focus:border-transparent transition-all"
                       placeholder="Contoh: Mesin sering mati mendadak">
                @error('nama_gejala')
                    <p class="mt-2 text-sm text-red-500 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="pt-4 flex flex-col sm:flex-row items-center gap-3">
                <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-400 hover:to-orange-400 text-white font-medium rounded-xl transition-all shadow-lg shadow-amber-500/20 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Perubahan
                </button>
                <a href="{{ route('gejala.index') }}" class="w-full sm:w-auto px-6 py-3 bg-zinc-800 hover:bg-zinc-700 text-white font-medium rounded-xl transition-colors border border-zinc-700 text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection