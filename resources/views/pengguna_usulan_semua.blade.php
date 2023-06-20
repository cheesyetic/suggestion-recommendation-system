@extends('layout.base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-5 mt-3">Monitoring Usulan</h4>
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
                                        @if ($recommendation->status == 1)
                                            <a class="btn btn-success">Dalam antrian pembahasan.</a>
                                        @else
                                            <a href="{{ route('usulan.detail', $recommendation->id) }}"
                                                class="btn btn-primary">Lihat Hasil</a>
                                        @endif
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
