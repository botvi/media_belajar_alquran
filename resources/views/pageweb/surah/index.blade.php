@extends('template-web.layout')

@section('content')
    <!-- Surah Section -->
    <section id="surah" class="surah section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Daftar Surah Al-Qur'an</h2>
            <p>Berikut adalah daftar lengkap surah-surah yang terdapat dalam Al-Qur'an</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Nama Latin & Arti</th>
                            <th>Nama & Jumlah Ayat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($surah as $s)
                        <tr style="cursor: pointer;" onclick="window.location.href='{{ route('surah.detail', $s->nama) }}'">
                            <td>{{ $s->nomor }}</td>
                            <td>
                                <strong>{{ $s->nama_latin }}</strong><br>
                                <small>{{ $s->arti }}</small>
                            </td>
                            <td>
                                <strong>{{ $s->nama }}</strong><br>
                                <small>{{ $s->jumlah_ayat }} ayat</small>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
