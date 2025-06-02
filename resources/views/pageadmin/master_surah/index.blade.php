    @extends('template-admin.layout')

    @section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Forms</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Master Surah</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--breadcrumb-->
            <h6 class="mb-0 text-uppercase">Data Master Surah</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.surah.fetch') }}" class="btn btn-primary mb-3" id="fetchButton">
                            <i class="bx bx-download me-1"></i> Ambil Data dari API
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor</th>
                                    <th>Nama Surah</th>
                                    <th>Nama Latin</th>
                                    <th>Jumlah Ayat</th>
                                    <th>Tempat Turun</th>
                                    <th>Arti</th>
                                    <th>Deskripsi</th>
                                    <th>Audio 05</th>
                                    <th>Api Detail Link</th>
                                    <th>Aksi</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($surah as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->nomor }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->nama_latin }}</td>
                                    <td>{{ $data->jumlah_ayat }}</td>
                                    <td>{{ $data->tempat_turun }}</td>
                                    <td>{{ $data->arti }}</td>
                                    <td>{!! $data->deskripsi !!}</td>
                                    <td>
                                        @if($data->audio_05)
                                            <audio controls>
                                                <source src="{{ $data->audio_05 }}" type="audio/mpeg">
                                                Browser Anda tidak mendukung tag audio.
                                            </audio>
                                        @else
                                            <span class="text-muted">Tidak ada audio</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ $data->api_detail_link }}" target="_blank">{{ $data->api_detail_link }}</a></td>
                                    <td>
                                        <a href="{{ route('master-surah.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('master-surah.destroy', $data->id) }}" method="POST" style="display:inline;" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor</th>
                                    <th>Nama Surah</th>
                                    <th>Nama Latin</th>
                                    <th>Jumlah Ayat</th>
                                    <th>Tempat Turun</th>
                                    <th>Arti</th>
                                    <th>Deskripsi</th>
                                    <th>Audio 05</th>
                                    <th>Api Detail Link</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Script untuk delete confirmation
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data ini akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            // Script untuk fetch button
            const fetchButton = document.getElementById('fetchButton');
            fetchButton.addEventListener('click', function(e) {
                e.preventDefault();
                
                Swal.fire({
                    title: 'Ambil Data Surah?',
                    text: "Data surah akan diambil dari API dan disimpan ke database",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, ambil data!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Disable button dan ubah teks
                        fetchButton.disabled = true;
                        fetchButton.innerHTML = '<i class="bx bx-loader-alt bx-spin me-1"></i> Mengambil data...';
                        
                        // Gunakan AJAX untuk mengambil data
                        fetch(fetchButton.href, {
                            method: 'GET',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: data.message,
                                    icon: 'success'
                                }).then(() => {
                                    // Reload halaman setelah berhasil
                                    window.location.reload();
                                });
                            } else {
                                throw new Error(data.message || 'Terjadi kesalahan saat mengambil data');
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error!',
                                text: error.message,
                                icon: 'error'
                            });
                        })
                        .finally(() => {
                            // Reset button state
                            fetchButton.disabled = false;
                            fetchButton.innerHTML = '<i class="bx bx-download me-1"></i> Ambil Data dari API';
                        });
                    }
                });
            });
        });
    </script>
    @endsection