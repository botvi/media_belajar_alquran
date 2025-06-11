@extends('template-web.layout')

@section('content')
    <!-- Sunnah Section -->
    <section id="sunnah" class="sunnah section" style="background-image: url('{{ asset('web') }}/assets/img/bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Daftar Sunnah Rasulullah</h2>
            <p>Berikut adalah daftar sunnah-sunnah yang diajarkan oleh Rasulullah SAW</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                @foreach($sunnah as $s)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($s->gambar)
                        <img src="{{ asset('uploads/gambar/' . $s->gambar) }}" class="card-img-top" alt="{{ $s->judul }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $s->judul }}</h5>
                            <div class="mb-2">
                                <span class="badge bg-primary">{{ $s->kategori }}</span>
                                <span class="badge bg-info">{{ $s->sumber }}</span>
                            </div>
                            <p class="card-text">{{ Str::limit($s->deskripsi, 100) }}</p>
                            <a href="{{ route('sunnah.detail', $s->judul) }}" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
