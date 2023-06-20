<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Recommendation;

class PagesController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function ajukan_keluhan()
    {
        return view('ajukan_keluhan');
    }

    public function ajukan_usulan()
    {
        return view('ajukan_usulan');
    }

    public function keluhan_all()
    {
        $complaints = Complaint::where('status', 2)->get();
        return view('pengguna_keluhan_semua', compact('complaints'));
    }

    public function usulan_all()
    {
        $recommendations = Recommendation::where('status', 2)->get();
        return view('pengguna_usulan_semua', compact('recommendations'));
    }

    public function keluhan_pengguna()
    {
        $complaints = Complaint::where('user_id', auth()->user()->id)->get();
        return view('pengguna_keluhan', compact('complaints'));
    }

    public function usulan_pengguna()
    {
        $recommendations = Recommendation::where('user_id', auth()->user()->id)->get();
        return view('pengguna_usulan', compact('recommendations'));
    }

    public function keluhan_detail($id)
    {
        $complaint = Complaint::find($id);
        return view('lihat_hasil_keluhan', compact('complaint'));
    }

    public function usulan_detail($id)
    {
        $recommendation = Recommendation::find($id);
        return view('lihat_hasil_usulan', compact('recommendation'));
    }

    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }

    public function uki_dashboard()
    {
        return view('uki.dashboard');
    }
}
