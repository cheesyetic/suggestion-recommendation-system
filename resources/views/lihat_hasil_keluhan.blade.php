@extends('layout.base')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="form-group col-lg-6">
            <label for="description">Deskripsi Keluhan</label>
            <textarea class="form-control" required rows="5" id="description" readonly name="description">{{ $complaint->description }}</textarea>
        </div>
        @if ($complaint->file != null)
            <div class="form-group col-lg-6">
                <label for="image">Gambar/Dokumen Pendukung</label>
                <a href="{{ route('download.file', $complaint->file) }}">Unduh Disini</a>
            </div>
        @endif
        @if ($complaint->initial != null)
            <div class="form-group col-lg-3">
                <label for="initial">Nama/inisial</label>
                <input type="text" readonly value="{{ $complaint->initial }}" class="form-control" name="initial"
                    id="initial">
            </div>
        @endif
        <div class="form-group col-lg-6">
            <label for="result">Hasil Pembahasan</label>
            <textarea class="form-control" readonly rows="5" id="result" name="result">{{ $complaint->result }}</textarea>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
