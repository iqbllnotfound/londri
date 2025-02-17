@extends('headers.headers')

@section('content')

    <div class="container">
        <div class="title-home">All Order Laundry</div>
        <hr>
        <div class="search-date">
            @if (isset($resultDate))
            <div class="title-total">TOTAL : {{ count($resultDate) }}</div>
            @else
            <div class="title-total">TOTAL : {{ count($datas) }}</div>
            @endif
            <form action="{{ route('search.date') }}" class="d-flex justify-content-end align-items-center">
                <input type="date" name="date" id="date">
                <button class="btn search-date-btn d-flex align-items-center justify-content-center ms-2">
                    <span class="material-symbols-outlined">
                        search
                        </span></button>
            </form>
        </div>
        <div class="table-responsive section-table-admin">
            <table class="table table-sm table-admin">
                <thead>
                    <tr>
                        <th>Nama Pemesan</th>
                        <th>Nomor Telepon</th>
                        <th>Total Berat (KG)</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($resultDate))
                    @if(count($resultDate) == 0)
                    <tr>
                        <td colspan="6">Data Tidak Ditemukan</td>
                    </tr>
                    @else
                    @foreach ($resultDate as $data)
                    <tr>
                        <td>{{ $data->nama }}</td>
                        <td>+62 {{ $data->noHp }}</td>
                        <td>{{ $data->total_berat }} KG</td>
                        <td>Rp {{ number_format($data->total_harga, 0, ',' , '.') }}</td>
                        <td>{{ $data->created_at->format('d-m-y') }}</td>
                        <td>{{ $data->status }}</td>
                    </tr>
                    @endforeach
                    @endif
                    @else
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->nama }}</td>
                        <td>+62 {{ $data->noHp }}</td>
                        <td>{{ $data->total_berat }} KG</td>
                        <td>Rp {{ number_format($data->total_harga, 0, ',' , '.') }}</td>
                        <td>{{ $data->created_at->format('d-m-y') }}</td>
                        <td>{{ $data->status }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            </div>
    </div>

@endsection
