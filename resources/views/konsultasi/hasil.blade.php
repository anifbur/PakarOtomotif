@extends('Layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-emerald-500/10 text-emerald-500 mb-4">
            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <h2 class="text-3xl font-bold text-white mb-2">Hasil Diagnosa</h2>
        <p class="text-zinc-400">Berikut adalah hasil analisis berdasarkan gejala yang Anda masukkan.</p>
    </div>

    <div class="space-y-6">
        @forelse($hasil as $index => $item)
            <div class="bg-zinc-900/50 backdrop-blur-md border {{ $index === 0 ? 'border-emerald-500/50 shadow-emerald-500/10' : 'border-zinc-800' }} rounded-2xl p-6 sm:p-8 shadow-xl relative overflow-hidden group">
                <!-- Highlight border top for the highest probability (assuming it's sorted) -->
                @if($index === 0)
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-500 to-teal-400"></div>
                    <div class="absolute top-4 right-4 px-3 py-1 bg-emerald-500/10 text-emerald-400 text-xs font-bold rounded-full border border-emerald-500/20">
                        Kemungkinan Terbesar
                    </div>
                @endif

                <div class="flex flex-col md:flex-row gap-6 md:items-center justify-between mb-6">
                    <div class="flex-1">
                        <h4 class="text-2xl font-bold text-white mb-2">{{ $item['diagnosa'] }}</h4>
                        
                        <!-- Progress Bar for CF -->
                        <div class="mt-4">
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-sm font-medium text-zinc-400">Tingkat Keyakinan</span>
                                <span class="text-sm font-bold text-white">{{ $item['cf'] }}%</span>
                            </div>
                            <div class="w-full bg-zinc-800 rounded-full h-2.5 overflow-hidden">
                                <div class="h-2.5 rounded-full transition-all duration-1000 ease-out {{ $item['cf'] >= 80 ? 'bg-gradient-to-r from-emerald-500 to-teal-400' : ($item['cf'] >= 50 ? 'bg-gradient-to-r from-orange-500 to-amber-400' : 'bg-gradient-to-r from-rose-500 to-red-400') }}" 
                                     style="width: 0%"
                                     x-data x-init="setTimeout(() => { $el.style.width = '{{ $item['cf'] }}%' }, 300)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 pt-6 border-t border-zinc-800/50">
                    <h5 class="text-sm font-bold text-zinc-300 uppercase tracking-wider mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Solusi Penanganan
                    </h5>
                    <div class="bg-zinc-950/50 rounded-xl p-4 text-zinc-400 text-sm leading-relaxed border border-zinc-800/50">
                        {{ $item['solusi'] }}
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-zinc-900/50 border border-zinc-800 rounded-2xl p-12 text-center">
                <svg class="w-16 h-16 text-zinc-600 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-xl font-bold text-white mb-2">Tidak ada diagnosa ditemukan</h3>
                <p class="text-zinc-400">Silakan coba lagi dengan memilih gejala yang berbeda.</p>
            </div>
        @endforelse
    </div>

    <!-- Actions -->
    <div class="mt-8 flex justify-center gap-4">
        <a href="{{ route('konsultasi') }}" class="px-6 py-3 bg-zinc-800 hover:bg-zinc-700 text-white font-medium rounded-xl transition-colors border border-zinc-700">
            Konsultasi Ulang
        </a>
        <a href="/riwayat-diagnosa" class="px-6 py-3 bg-gradient-to-r from-rose-500 to-orange-500 text-white font-medium rounded-xl hover:from-rose-400 hover:to-orange-400 transition-colors shadow-lg shadow-rose-500/20">
            Lihat Riwayat
        </a>
    </div>
</div>
@endsection