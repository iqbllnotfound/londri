@extends('headers.headers')

@section('content')

    <div class="container">
        <div class="title-home">Order Input</div>
        <hr>
        <div class="section-form-input">
            <div class="table-responsive m-5">
                <table class="table table-borderless">
                    <form action="{{ route('store') }}" method="POST">
                        @csrf
                        <tr>
                            <td class="w-25"><label for="nama">Nama</label></td>
                            <td>:</td>
                            <td>
                                <input class="form-control" type="text" id="nama" placeholder="Masukkan Nama" aria-label="Masukkan Nama" name="nama" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"><label for="noHp">Nomor HP</label></td>
                            <td>:</td>
                            <td>
                                <input class="form-control" type="number" id="noHp" placeholder="Masukkan Nomor HP" aria-label="Masukkan Nomor HP" name="noHp" required >
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"><label for="totalBerat">Total Berat (KG)</label></td>
                            <td>:</td>
                            <td>
                                <input class="form-control" type="number" id="totalBerat" placeholder="Masukkan Total Berat" aria-label="Masukkan Total Berat" name="totalBerat" required>
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
