@extends('admin.layout.base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                <h4 class="mb-3 mt-3">Rekap Usulan</h4>
                <a href="{{ route('admin.recommendation.download.excel') }}" class="btn btn-success mb-4">Download Excel</a>
                <div class="table-responsive">
                    <table id="usulan" class="table table-bordred table-striped">
                        <thead>
                            <th style="text-align: center">No. Tiket</th>
                            <th style="text-align: center">Tanggal Rekam</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Tindak Lanjut</th>
                        </thead>
                        <tbody>
                            @foreach ($recommendations as $recommendation)
                                <tr>
                                    <td style="text-align: center">{{ $recommendation->ticket }}</td>
                                    <td style="text-align: center">{{ $recommendation->created_at }}</td>
                                    <td style="text-align: center">
                                        @if ($recommendation->status == 1)
                                            Dalam Proses
                                        @else
                                            Selesai Diproses
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        <a href="{{ route('admin.recommendation.show', $recommendation->id) }}"
                                            class="btn btn-primary">Lihat Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#usulan').DataTable();
    });
</script>
