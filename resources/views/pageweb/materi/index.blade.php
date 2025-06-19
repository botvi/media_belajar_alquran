@extends('template-web.layout')

@section('content')
    <!-- Materi Section -->
    <section id="materi" class="materi section" style="background-image: url('{{ asset('web') }}/assets/img/bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Daftar Materi</h2>
            <p>Berikut adalah daftar materi pembelajaran</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                @foreach($materi as $m)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $m->judul }}</h5>
                            <a href="{{ route('materi.detail', $m->judul) }}" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
