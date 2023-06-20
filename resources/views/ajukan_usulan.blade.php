@extends('layout.base')
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
        <div class="col-lg-6">
            <h2>Rekam Usulan</h2>
        </div>
        <form action="{{ route('usulan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group col-lg-6">
                <label for="background">Latar Belakang/Kondisi Terkini</label>
                <textarea class="form-control" required rows="2" id="background" name="background"></textarea>
            </div>
            <div class="form-group col-lg-6">
                <label for="description">Usulan/Saran Perbaikan</label>
                <textarea class="form-control" required rows="5" id="description" name="description"></textarea>
            </div>
            <div class="form-group col-lg-6">
                <label for="file">Upload Gambar/Dokumen Pendukung (opsional)</label>
                <input type="file" id="file" name="file">
            </div>
            <div class="form-group col-lg-3">
                <label for="initial">Tambahkan nama/inisial (opsional)</label>
                <input type="text" class="form-control" name="initial" id="initial">
            </div>
            <div class="form-group col-lg-6">
                <label for="category">Pilih Kategori</label>
                <select class="form-control" name="category" id="category">
                    <option value="Manajerial">Manajerial</option>
                    <option value="Administrasi & Proses Bisnis">Administrasi & Proses Bisnis</option>
                    <option value="Pelayanan Wajib Pajak">Pelayanan Wajib Pajak</option>
                    <option value="Sarana Prasarana">Sarana Prasarana</option>
                    <option value="Teknologi Informasi dan Komunikasi">Teknologi Informasi dan Komunikasi</option>
                    <option value="Sumber Daya Manusia">Sumber Daya Manusia</option>
                    <option value="Kepegawaian dan Keuangan">Kepegawaian dan Keuangan</option>
                    <option value="Lain-lain">Lain-lain</option>
                </select>
            </div>
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </div>
        </form>
    </div>
    <!-- /.container-fluid -->
@endsection
