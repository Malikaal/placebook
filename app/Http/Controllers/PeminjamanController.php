<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeminjamanRuangan;
use App\Ruangan;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = PeminjamanRuangan::all();

        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        $user_roles = null;
        $ruangans=Ruangan::all()->pluck('nama','id');
        $user = User::pluck('username','id');
        $peminjam_id=null;

        return view('admin.peminjaman.create', compact('user', 'user_roles'))->with(compact('ruangans','peminjam_id'));
    }

    public function destroy($id)
    {
                $peminjaman = PeminjamanRuangan::find($id);
        $peminjaman->delete();
        toast()->success('Data peminjaman berhasil dihapus');

        return redirect()->route('peminjaman.index');
    }
     public function cancel($id)
    {
        $peminjaman = PeminjamanRuangan::find($id);
        $peminjaman->peminjaman_status_id=2;
        $peminjaman->save();
        toast()->success('Data peminjaman berhasil dibatalkan');

        return redirect()->route('peminjaman.index');
    }
    public function store(Request $request)
    {
        
        $ruangans=new PeminjamanRuangan();

        $ruangans->ruangan_id=$request['ruangan_id'];
        $ruangans->peminjam_id=$request['peminjam_id'];
        $ruangans->tanggal_pengajuan=$request['tanggal_pengajuan'];
        $ruangans->tanggal_mulai=$request['tanggal_mulai'];
        $ruangans->jam_mulai=$request['jam_mulai'];
        $ruangans->tanggal_selesai=$request['tanggal_selesai'];
        $ruangans->jam_selesai=$request['jam_selesai'];
        $ruangans->peminjaman_status_id=$request['peminjaman_status_id'];
        $ruangans->tujuan=$request['tujuan'];
        $ruangans->save();
        toast()->success('Berhasil menambahkan data');
        return redirect('/peminjaman');
    }
}
