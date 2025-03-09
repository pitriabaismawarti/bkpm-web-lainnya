<?php

namespace App\Http\Controllers\Backend;

use App\Models\Pendidikan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function index()
    {
        $pendidikan = Pendidikan::get();
        return view('backend.pendidikan.index', compact('pendidikan'));
    }
    public function create()
    {
        $pendidikan = null;
        return view('backend.pendidikan.create', compact('pendidikan'));
    }
    public function store(Request $request)
    {
        Pendidikan::create($request->all());
        return redirect()->route('pendidikan.index')
        ->with('success','Data Pendidikan Baru Telah Berhasil Disimpan');
    }

    public function edit(Pendidikan $pendidikan)
    {
        return view('backend.pendidikan.create', compact('pendidikan'));
    }

    public function update(Request $request, Pendidikan $pendidikan)
    {
        $pendidikan->update($request->all());
        return redirect()->route('pendidikan.index')
        ->with('success','Data Pendidikan Berhasil Diperbarui');
    }

    public function destroy(Pendidikan $pendidikan)
    {
        $pendidikan->delete();
        return redirect()->route('pendidikan.index')
        ->with('success','Data Pendidikan Berhasil Dihapus');
    }
}
