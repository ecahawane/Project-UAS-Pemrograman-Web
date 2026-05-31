<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Infokus;

class PeminjamanController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 'admin') {
            $peminjaman = Peminjaman::with('user', 'infokus')
                ->latest()
                ->get();
        } else {
            $peminjaman = Peminjaman::with('user', 'infokus')
                ->where('user_id', auth()->user()->id)
                ->latest()
                ->get();
        }

        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $infokus = Infokus::where('status', 'tersedia')->get();

        return view('peminjaman.create', compact('infokus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'infokus_id' => 'required',
            'tanggal_kembali' => 'required|date',
        ]);

        $infokus = Infokus::findOrFail($request->infokus_id);

        if($infokus->status == 'dipinjam') {
            return back()->with('error', 'Infokus sedang dipinjam');
        }

        Peminjaman::create([
            'user_id' => auth()->user()->id,
            'infokus_id' => $request->infokus_id,
            'nama_dosen' => $request->nama_dosen,
            'mata_kuliah' => $request->mata_kuliah,
            'ruangan' => $request->ruangan,
            'tanggal_pinjam' => now(),
            'jam_pinjam' => now()->format('H:i'),
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'dipinjam',
        ]);

        $infokus->update([
            'status' => 'dipinjam',
        ]);

        return redirect('/peminjaman')
            ->with('success', 'Peminjaman berhasil');
    }

    public function show(string $id)
    {
        $peminjaman = Peminjaman::with('user', 'infokus')
            ->findOrFail($id);

        if(
            auth()->user()->role == 'user'
            &&
            $peminjaman->user_id != auth()->user()->id
        ) {
            abort(403);
        }

        return view('peminjaman.show', compact('peminjaman'));
    }

    public function edit(string $id)
    {
        if(auth()->user()->role != 'admin') {
            abort(403);
        }

        $peminjaman = Peminjaman::findOrFail($id);
        $infokus = Infokus::all();

        return view('peminjaman.edit', compact('peminjaman', 'infokus'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'status' => $request->status,
        ]);

        if($request->status == 'dikembalikan') {
            $peminjaman->infokus->update([
                'status' => 'tersedia',
            ]);
        }

        if($request->status == 'dipinjam') {
            $peminjaman->infokus->update([
                'status' => 'dipinjam',
            ]);
        }

        return redirect('/peminjaman')
            ->with('success', 'Status peminjaman berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if(
            auth()->user()->role == 'user'
            &&
            $peminjaman->status != 'dikembalikan'
        ) {
            return redirect('/peminjaman')
                ->with('error', 'Peminjaman belum dikembalikan');
        }

        $peminjaman->delete();

        return redirect('/peminjaman')
            ->with('success', 'Data peminjaman berhasil dihapus');
    }
}