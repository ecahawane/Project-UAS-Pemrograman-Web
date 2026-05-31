<?php

namespace App\Http\Controllers;

use App\Models\Infokus;

class DashboardController extends Controller
{
    public function index()
    {
        $totalInfokus = Infokus::count();

        $totalDipinjam = Infokus::where('status', 'dipinjam')->count();

        $totalTersedia = Infokus::where('status', 'tersedia')->count();

        return view('dashboard', compact(
            'totalInfokus',
            'totalDipinjam',
            'totalTersedia'
        ));
    }
}