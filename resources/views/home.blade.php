<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('assets/css/styleHome.css') }}" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand p-2" href="#">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" width="50" height="50"
                    class="d-inline-block align-text-center me-2" />
                Laundry
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end me-3" id="navbarNav">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cek Produk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="header mt-5">
        <!-- <div class="container"> -->
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('assets/img/question.png') }}" alt="" class="img-fluid question-mark-1" />
                <img src="{{ asset('assets/img/question.png') }}" alt="" class="img-fluid question-mark-2" />
                <div class="text-header text-start">
                    <p>Ingin cuci pakaian anda?</p>
                    <p>Tapi bingung cari tempat cuci yang cepat dimana</p>
                    <p>Di Laundy Citra Negara aja!</p>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('assets/img/header.png') }}" alt="" class="img-fluid" />
            </div>
        </div>
        <!-- </div> -->
    </section>

    <section class="about">
        <div class="container">
            <div class="row all-card-about">
                <div class="col-md-4">
                    <div class="card-about mx-auto shadow">
                        <i class="fa-regular fa-clock icon-about"></i>
                        <p class="mt-3 title-card">Waktu Buka</p>
                        <p>24 Jam / 7</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-about mx-auto shadow">
                        <i class="fa-solid fa-dollar-sign icon-about"></i>
                        <p class="mt-3 title-card">Harga</p>
                        <p>Rp. 10.000 / kg</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-about mx-auto shadow">
                        <i class="fa-solid fa-hands-bubbles icon-about"></i>
                        <p class="mt-3 title-card">Wangi Cucian</p>
                        <p>Ada berbagai pewangi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="search">
        <div class="container">
            <div class="row">
                <div class="col-md-7 search-div">
                    <span class="search-title">Cari Pesanan Anda!</span>
                    <form class="d-flex" role="search" action="{{ route('search.noHp') }}" method="POST">
                        @csrf
                        <input class="form-control me-2" type="search" placeholder="Masukan Nomor Telepon"
                            aria-label="Search" name="noHp" />
                        <button class="btn btn-outline-success" type="submit" id="cariPesanan">
                            Search
                        </button>
                    </form>
                    @if (isset($datas))
                        <table class="table table-striped table-hover mt-5">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No Handphone</th>
                                    <th>Cek Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>+62 {{ $data->noHp }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $data->id }}">
                                                Check Detail
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                <div class="col-md-5">
                    <img src="{{ asset('assets/img/search-picture.png') }}" alt="" class="img-fluid" />
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid img-footer">
            <div class="footer-text text-center">
                <span>Jl. Tanah Baru Jl. Kemiri Jaya No.99, Beji, Kecamatan Beji, Kota Depok, Jawa Barat 16421</span>
            </div>
        </div>
        <div class="copyright text-center">
            <p class="mb-0">Copyright &copy; 2023 Laundry Citra Negara</p>
        </div>
    </footer>

    {{-- Modal --}}
    @if (isset($datas))
        @foreach ($datas as $data)
            <div class="modal fade" id="staticBackdrop{{ $data->id }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Pesanan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Nama Pemesan : {{ $data->nama }}</p>
                            <p>No Handphone : +62 {{ $data->noHp }}</p>
                            <p>Total Harga : Rp. {{ number_format($data->total_harga, 0, ',', '.' ) }}</p>
                            <p>Tanggal Pemesanan : {{ $data->created_at->format('d-m-y') }}</p>
                            @if($data->status == 'Selesai')
                            <p>Status : <span class="text-success">{{ $data->status }}</span></p>
                            @else
                            <p>Status : <span class="text-warning">{{ $data->status }}</span></p>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.getElementById("cariPesanan").addEventListener("submit", function(event) {
            event.preventDefault();
        });
    </script>
    <script src="https://kit.fontawesome.com/f1fd297175.js" crossorigin="anonymous"></script>
</body>

</html>




















{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark"  data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Laundry Bersih</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse d-flex justify-content-end align-items-center" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

        <div class="container section-serch-bar">
            <form class="d-flex mx-auto" role="search" action="{{ route('search.noHp') }}" method="POST">
              @csrf
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="noHp">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>

            @if (isset($datas))
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
            @endif
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html> --}}
