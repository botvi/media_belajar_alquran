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
                            <li class="breadcrumb-item active" aria-current="page">Master Materi</li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--breadcrumb-->

            <div class="row">
                <div class="col-xl-7 mx-auto">
                    <hr />
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <h5 class="mb-0 text-primary">{{ $materi->judul }}</h5>
                            <hr>
                            <div class="mt-3">
                                <audio controls style="width: 200px; height: 40px;">
                                    <source src="{{ asset('suara/' . $materi->suara) }}" type="audio/mpeg">
                                    Browser Anda tidak mendukung pemutaran audio.
                                </audio>
                                {!! $materi->konten !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

