@extends('admin.layout.base')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @if (Session::has('success'))
            <div class="alert alert-success col-lg-6">
                {!! Session::get('success') !!}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @endif
        @if (Session::has('errors'))
            <div class="alert alert-danger col-lg-6">
                {{ Session::get('errors') }}
                @php
                    Session::forget('errors');
                @endphp
            </div>
        @endif
        <div class="col-lg-6 mb-4">
            <h2>Lihat Detail Keluhan</h2>
        </div>
        <form action="{{ route('admin.complaint.give_result', $complaint->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

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
            @if ($complaint->status == 1)
                <div class="form-group col-lg-6">
                    <label for="result">Hasil Pembahasan</label>
                    <textarea class="form-control" required rows="5" id="result" name="result"></textarea>
                </div>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Batal</button>
                </div>
            @else
                <div class="form-group col-lg-6">
                    <label for="result">Hasil Pembahasan</label>
                    <textarea class="form-control" readonly rows="5" id="result" name="result">{{ $complaint->result }}</textarea>
                </div>
            @endif
        </form>
    </div>
    <!-- /.container-fluid -->
@endsection
