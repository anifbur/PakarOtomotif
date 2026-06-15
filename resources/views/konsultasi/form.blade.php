@extends('Layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-white mb-2">Konsultasi Kerusakan</h2>
        <p class="text-zinc-400">Pilih gejala yang dialami pada motor matic Anda beserta tingkat keyakinannya.</p>
    </div>

    <form method="POST" action="{{ route('proses.diagnosa') }}" class="space-y-8" x-data="{ 
        hasGejala: false,
        checkGejala() {
            const selects = document.querySelectorAll('.gejala-select');
            let hasValue = false;
            selects.forEach(s => {
                if (s.value !== '') hasValue = true;
            });
            this.hasGejala = hasValue;
        }
    }">
        @csrf

        <!-- User Info Card -->
        <div class="bg-zinc-900/50 backdrop-blur-md border border-zinc-800 rounded-2xl p-6 shadow-xl">
            <h3 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Informasi Pengguna
            </h3>
            
            <div>
                <label for="nama_user" class="block text-sm font-medium text-zinc-400 mb-2">Nama Pengguna</label>
                <input type="text" 
                       id="nama_user"
                       name="nama_user" 
                       class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white placeholder-zinc-600 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all"
                       placeholder="Masukkan nama Anda..."
                       required>
            </div>
        </div>

        <!-- Symptoms Selection -->
        <div class="bg-zinc-900/50 backdrop-blur-md border border-zinc-800 rounded-2xl p-6 shadow-xl">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Pilih Gejala
                </h3>
                <span class="text-xs font-medium px-2.5 py-1 bg-zinc-800 text-zinc-300 rounded-full">
                    Minimal pilih 1 gejala
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($gejalas as $gejala)
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-r from-rose-500/10 to-orange-500/10 rounded-xl blur-sm opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative bg-zinc-950 border border-zinc-800 rounded-xl p-4 hover:border-zinc-700 transition-colors flex flex-col justify-between h-full">
                        
                        <div class="mb-4">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="px-2 py-0.5 rounded text-xs font-bold bg-zinc-800 text-zinc-300 border border-zinc-700">{{ $gejala->kode }}</span>
                            </div>
                            <p class="text-white text-sm font-medium leading-relaxed">{{ $gejala->nama_gejala }}</p>
                        </div>

                        <div>
                            <label class="block text-xs text-zinc-500 mb-1.5">Tingkat Keyakinan:</label>
                            <div class="relative">
                                <select class="gejala-select appearance-none w-full bg-zinc-900 border border-zinc-700 rounded-lg pl-3 pr-10 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all cursor-pointer"
                                        name="gejala[{{ $gejala->id }}]"
                                        @change="checkGejala()">
                                    <option value="" class="text-zinc-500">Tidak Dipilih</option>
                                    <option value="0.2">Tidak Yakin (0.2)</option>
                                    <option value="0.4">Kurang Yakin (0.4)</option>
                                    <option value="0.6">Cukup Yakin (0.6)</option>
                                    <option value="0.8">Yakin (0.8)</option>
                                    <option value="1">Sangat Yakin (1.0)</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-zinc-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Submit Action -->
        <div class="flex justify-end pt-4">
            <button type="submit" 
                    :disabled="!hasGejala"
                    :class="{'opacity-50 cursor-not-allowed': !hasGejala, 'hover:scale-[1.02] hover:shadow-rose-500/25': hasGejala}"
                    class="px-8 py-4 bg-gradient-to-r from-rose-500 to-orange-500 text-white font-bold rounded-xl shadow-lg transition-all flex items-center gap-2">
                <span>Proses Diagnosa</span>
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </div>

    </form>
</div>
@endsection