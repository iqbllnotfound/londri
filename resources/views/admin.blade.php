@extends('headers.headers')

@section('content')

    <div class="container">
        <div class="title-home">Dashboard Admin</div>
        <hr>
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->nama }}</td>
                        <td>+62 {{ $data->noHp }}</td>
                        <td>{{ $data->total_berat }} KG</td>
                        <td>Rp {{ number_format($data->total_harga, 0, ',' , '.') }}</td>
                        <td>{{ $data->created_at->format('d-m-y') }}</td>
                        <td>{{ $data->status }}</td>
                        <td class="td-aksi">
                            <a href="{{ route('edit', $data->id) }}" class="btn btn-outline-primary">Edit</a>
                            <form action="{{ route('delete', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger ms-1">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
    </div>

@endsection
