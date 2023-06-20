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
            <h2>Lihat Detail Usulan</h2>
        </div>
        <form action="{{ route('admin.recommendation.give_result', $recommendation->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group col-lg-6">
                <label for="background">Latar Belakang</label>
                <textarea class="form-control" rows="5" id="background" readonly name="background">{{ $recommendation->background }}</textarea>
            </div>
            <div class="form-group col-lg-6">
                <label for="description">Deskripsi Usulan</label>
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
                    <input type="text" readonly value="{{ $recommendation->initial }}" class="form-control"
                        name="initial" id="initial">
                </div>
            @endif
            @if ($recommendation->status == 1)
                <div class="form-group col-lg-6">
                    <label for="result">Hasil Pembahasan</label>
                    <textarea class="form-control" required rows="5" id="result" name="result"></textarea>
                </div>
                <div class="form-group col-lg-6">
                    <label for="status">Pilih Status:</label>
                    <select required class="form-control" id="status" name="status">
                        <option value="2">Public</option>
                        <option value="3">Private</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Batal</button>
                </div>
            @else
                <div class="form-group col-lg-6">
                    <label for="result">Hasil Pembahasan</label>
                    <textarea class="form-control" readonly rows="5" id="result" name="result">{{ $recommendation->result }}</textarea>
                </div>
                <div class="form-group col-lg-6">
                    <label for="initial">Status</label>
                    <input type="text" readonly value="{{ $recommendation->status == 2 ? 'Public' : 'Private' }}"
                        class="form-control" name="initial" id="initial">
                </div>
            @endif
        </form>
    </div>
    <!-- /.container-fluid -->
@endsection
