@extends('template-web.layout')

@section('content')

 <!-- Hero Section -->
 <section id="hero" class="hero section light-background" style="background-image: url('{{ asset('web') }}/assets/img/bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">

    <div class="container" data-aos="zoom-out">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <h2>Pojok Islam</h2>
          <p>Hai, <span class="typed" data-typed-items="Anak-anak, Guru">Selamat Datang di Pojok Islam</span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
          
        </div>
      </div>
    </div>

  </section><!-- /Hero Section -->

@endsection
