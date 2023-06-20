@extends('layout.base')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="form-group col-lg-6">
            <label for="background">Latar Belakang</label>
            <textarea class="form-control" rows="5" id="background" readonly name="background">{{ $recommendation->background }}</textarea>
        </div>
        <div class="form-group col-lg-6">
            <label for="description">Deskripsi Keluhan</label>
            <textarea class="form-control" rows="5" id="description" readonly name="description">{{ $recommendation->description }}</textarea>
        </div>
        <div class="form-group col-lg-6">
            <label for="category">Kategori</label>
            <input type="text" readonly value="{{ $recommendation->category }}" class="form-control" name="category"
                id="category">
        </div>
        @if ($recommendation->file != null)
            <div class="form-group col-lg-6">
                <label for="image">Gambar/Dokumen Pendukung</label>
                <a href="{{ route('download.file', $recommendation->file) }}">Unduh Disini</a>
            </div>
        @endif
        @if ($recommendation->initial != null)
            <div class="form-group col-lg-3">
                <label for="initial">Nama/inisial</label>
                <input type="text" readonly value="{{ $recommendation->initial }}" class="form-control" name="initial"
                    id="initial">
            </div>
        @endif
        <div class="form-group col-lg-6">
            <label for="result">Hasil Pembahasan</label>
            <textarea class="form-control" readonly rows="5" id="result" name="result">{{ $recommendation->result }}</textarea>
        </div>
        <div class="form-group col-lg-6">
            <label for="initial">Status</label>
            <input type="text" readonly value="{{ $recommendation->status == 2 ? 'Public' : 'Private' }}"
                class="form-control" name="initial" id="initial">
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
