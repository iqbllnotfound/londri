@extends('headers.headers')

@section('content')

    <div class="container">
        <div class="title-home">Edit Order Input</div>
        <hr>
        <div class="section-form-input">
            <div class="table-responsive m-5">
                <table class="table table-borderless">
                    <form action="{{ route('update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <tr>
                            <td class="w-25"><label for="nama">Nama</label></td>
                            <td>:</td>
                            <td>
                                <input class="form-control" type="text" id="nama" placeholder="Masukkan Nama" aria-label="Masukkan Nama" name="nama" value="{{ $data->nama }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"><label for="noHp">Nomor HP</label></td>
                            <td>:</td>
                            <td>
                                <input class="form-control" type="number" id="noHp" placeholder="Masukkan Nomor HP" aria-label="Masukkan Nomor HP" name="noHp" value="{{ $data->noHp }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"><label for="totalBerat">Total Berat (KG)</label></td>
                            <td>:</td>
                            <td>
                                <input class="form-control" type="number" id="totalBerat" placeholder="Masukkan Total Berat" aria-label="Masukkan Total Berat" name="totalBerat" value="{{ $data->total_berat }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"><label for="totalBerat">Status</label></td>
                            <td>:</td>
                            <td>
                                <select class="form-select" aria-label="Default select example" name="status">
                                    <option value="{{ $data->status }}" selected>{{ $data->status }}</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Belum Selesai">Belum Selesai</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="btn-input" colspan="3">
                                <button type="submit" class="btn btn-outline-secondary">Submit</button>
                            </td>
                        </tr>
                    </form>
                    </table>
            </div>
        </div>
    </div>

@endsection
