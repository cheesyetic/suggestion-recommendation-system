<?php

namespace App\Http\Controllers;

use App\Exports\RecommendationExport;
use App\Models\Recommendation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RecommendationController extends Controller
{
    public function index()
    {
        $recommendations = Recommendation::all();
        return view('admin.recommendation.index', compact('recommendations'));
    }

    public function show($id)
    {
        $recommendation = Recommendation::findOrFail($id);
        return view('admin.recommendation.show', compact('recommendation'));
    }

    public function give_result(Request $request, $id)
    {
        $request->validate([
            'result' => 'required',
            'status' => 'required',
        ]);

        $recommendation = Recommendation::findOrFail($id);
        $recommendation->update($request->all());
        return redirect()->route('admin.recommendation.index')->with('success', 'Berhasil memberi hasil pada usulan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'background' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        $ticket = uniqid();
        $input = $request->all();
        $input['ticket'] = $ticket;
        $input['user_id'] = $request->user()->id;
        if ($file = $request->file('file')) {
            $file = $request->file('file');
            $fileName = time() . '@@' . $request->file->getClientOriginalName();
            $file->storeAs('uploads/' . $request->user_id, $fileName, 'public');
            $input['file'] = $fileName;
        }

        Recommendation::create($input);
        return redirect()->back()->with('success', 'Terima kasih atas partisipasi saudara dalam usaha perbaikan KPP Pratama Surabaya Sukomanunggal. Usulan anda berhasil direkam dengan nomor tiket ' . $ticket . '. Silahkan menunggu konfirmasi dari kami.');
    }

    public function downloadExcel()
    {
        return Excel::download(new RecommendationExport(), 'usulan.xlsx');
    }
}
