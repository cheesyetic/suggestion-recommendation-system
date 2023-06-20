<?php

namespace App\Http\Controllers;

use App\Exports\ComplaintExport;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::get();
        return view('admin.complaint.index', compact('complaints'));
    }

    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('admin.complaint.show', compact('complaint'));
    }

    public function give_result(Request $request, $id)
    {
        $request->validate([
            'result' => 'required',
        ]);

        $request->merge([
            'status' => 2,
        ]);

        $complaint = Complaint::findOrFail($id);
        $complaint->update($request->all());
        return redirect()->route('admin.complaint.index')->with('success', 'Berhasil memberi hasil pada keluhan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);
        $ticket = uniqid();
        $input = $request->all();
        $input['ticket'] = $ticket;
        $input['user_id'] = auth()->user()->id;
        if ($file = $request->file('file')) {
            $file = $request->file('file');
            $fileName = time() . '@@' . $request->file->getClientOriginalName();
            $file->storeAs('uploads/' . $request->user_id, $fileName, 'public');
            $input['file'] = $fileName;
        }

        Complaint::create($input);
        return redirect()->back()->with('success', 'Terima kasih atas partisipasi saudara dalam usaha perbaikan KPP Pratama Surabaya Sukomanunggal. Keluhan anda berhasil direkam dengan nomor tiket : ' . $ticket . '. Silahkan menunggu konfirmasi dari kami.');
    }

    public function downloadFile($file)
    {
        if (count(explode('@@', $file)) > 1) {
            $name = explode('@@', $file)[1];
        }
        if (substr($file, 0, 1) == '/') {
            $file = substr($file, 1);
        }
        return response()->download(public_path('storage/uploads/' . $file), $name);
    }

    public function downloadExcel()
    {
        return Excel::download(new ComplaintExport, 'keluhan.xlsx');
    }
}
