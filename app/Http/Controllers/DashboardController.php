<?php

namespace App\Http\Controllers;

use App\Models\Infokus;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalInfokus = Infokus::count();
        $totalDipinjam = Infokus::where('status', 'dipinjam')->count();
        $totalTersedia = Infokus::where('status', 'tersedia')->count();
        
        // Total peminjaman
        $totalPeminjaman = Peminjaman::count();
        
        // Peminjaman aktif (sedang dipinjam)
        $peminjamanAktif = Peminjaman::where('status', 'dipinjam')->count();
        
        // Peminjaman selesai (sudah dikembalikan)
        $peminjamanSelesai = Peminjaman::where('status', 'dikembalikan')->count();
        
        // Data peminjaman per bulan (6 bulan terakhir)
        $peminjamanPerBulan = Peminjaman::select(
                DB::raw('MONTH(tanggal_pinjam) as bulan'),
                DB::raw('YEAR(tanggal_pinjam) as tahun'),
                DB::raw('COUNT(*) as total')
            )
            ->where('tanggal_pinjam', '>=', Carbon::now()->subMonths(6))
            ->groupBy('bulan', 'tahun')
            ->orderBy('tahun')
            ->orderBy('bulan')
            ->get();
        
        // Format data untuk chart
        $chartLabels = [];
        $chartData = [];
        $namaBulan = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        
        // Generate 6 bulan terakhir
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $chartLabels[] = $namaBulan[$date->month] . ' ' . $date->year;
            
            $found = $peminjamanPerBulan->first(function ($item) use ($date) {
                return $item->bulan == $date->month && $item->tahun == $date->year;
            });
            
            $chartData[] = $found ? $found->total : 0;
        }
        
        // Infokus per lokasi
        $infokusPerLokasi = Infokus::select('lokasi', DB::raw('COUNT(*) as total'))
            ->groupBy('lokasi')
            ->get();
        
        // Peminjaman terbaru
        $peminjamanTerbaru = Peminjaman::with(['user', 'infokus'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Status peminjaman untuk pie chart
        $statusPeminjaman = [
            'dipinjam' => $peminjamanAktif,
            'dikembalikan' => $peminjamanSelesai,
        ];

        // Daftar semua infokus untuk tabel
        $infokusList = Infokus::orderBy('nama_infokus')->get();

        // Top peminjam (user dengan peminjaman terbanyak)
        $topBorrowers = Peminjaman::select('user_id', DB::raw('COUNT(*) as total'))
            ->with('user')
            ->groupBy('user_id')
            ->orderByDesc('total')
            ->limit(5)
            ->get()
            ->map(function ($item) {
                return (object) [
                    'name' => $item->user->name ?? 'Unknown',
                    'total' => $item->total
                ];
            });

        return view('dashboard', compact(
            'totalInfokus',
            'totalDipinjam',
            'totalTersedia',
            'totalPeminjaman',
            'peminjamanAktif',
            'peminjamanSelesai',
            'chartLabels',
            'chartData',
            'infokusPerLokasi',
            'peminjamanTerbaru',
            'statusPeminjaman',
            'infokusList',
            'topBorrowers'
        ));
    }
}
