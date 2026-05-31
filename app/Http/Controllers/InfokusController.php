<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infokus;

class InfokusController extends Controller
{
    public function index()
    {
        $infokus = Infokus::all();

        return view('infokus.index', compact('infokus'));
    }

    public function create()
    {
        return view('infokus.create');
    }

    public function store(Request $request)
    {
        Infokus::create($request->all());

        return redirect('/infokus')
            ->with(
                'success',
                'Infokus berhasil ditambahkan'
            );
    }

    public function show(string $id)  
    {
        $infokus = Infokus::findOrFail($id);

        return view('infokus.show', compact('infokus'));
    }

    public function edit(string $id)
    {
        $infokus = Infokus::findOrFail($id);

        return view('infokus.edit', compact('infokus'));
    }

    public function update(Request $request, string $id)
    {
        $infokus = Infokus::findOrFail($id);

        $infokus->update($request->all());

        return redirect('/infokus')
            ->with(
                'success',
                'Data infokus berhasil diupdate'
            );
    }

    public function destroy(string $id)
    {
        $infokus = Infokus::findOrFail($id);

        $infokus->delete();

        return redirect('/infokus')
            ->with(
                'success',
                'Data infokus berhasil dihapus'
            );
    }
}