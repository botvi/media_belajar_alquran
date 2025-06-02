@extends('template-admin.layout')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-12">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <h2 class="text-primary">Selamat Datang di Dunia Belajar yang Menyenangkan! 🎨</h2>
                                <p class="text-muted">Mari kita mulai petualangan belajar yang seru!</p>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card bg-light-primary">
                                        <div class="card-body text-center">
                                            <i class="fas fa-book fa-3x text-primary mb-3"></i>
                                            <h4>Materi Pembelajaran</h4>
                                            <p>Jelajahi berbagai materi menarik yang siap dipelajari!</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="card bg-light-success">
                                        <div class="card-body text-center">
                                            <i class="fas fa-gamepad fa-3x text-success mb-3"></i>
                                            <h4>Permainan Edukatif</h4>
                                            <p>Belajar sambil bermain dengan permainan yang seru!</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="card bg-light-warning">
                                        <div class="card-body text-center">
                                            <i class="fas fa-star fa-3x text-warning mb-3"></i>
                                            <h4>Pencapaian</h4>
                                            <p>Kumpulkan bintang dan lihat seberapa hebat kamu!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card bg-light-info">
                                        <div class="card-body">
                                            <h4 class="text-center mb-3">🎯 Tujuan Pembelajaran</h4>
                                            <div class="row text-center">
                                                <div class="col-md-3">
                                                    <i class="fas fa-brain fa-2x text-info mb-2"></i>
                                                    <h5>Berpikir Kritis</h5>
                                                </div>
                                                <div class="col-md-3">
                                                    <i class="fas fa-lightbulb fa-2x text-warning mb-2"></i>
                                                    <h5>Kreativitas</h5>
                                                </div>
                                                <div class="col-md-3">
                                                    <i class="fas fa-users fa-2x text-success mb-2"></i>
                                                    <h5>Kerjasama</h5>
                                                </div>
                                                <div class="col-md-3">
                                                    <i class="fas fa-smile fa-2x text-primary mb-2"></i>
                                                    <h5>Kesenangan</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
