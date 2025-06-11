@extends('template-admin.layout')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <i class="bx bx-smile text-warning me-2"></i>Profil Saya
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:;"><i class="bx bx-home-alt text-success"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Profil Saya</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="container">
                <div class="main-body">
                    <div class="row">
                        <!-- Profil Card -->
                        <div class="col-lg-4">
                            <div class="card shadow-sm border-0" style="background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);">
                                <div class="card-header bg-transparent border-0">
                                    <h5 class="mb-0 text-white">
                                        <i class="bx bx-user-circle me-2"></i>Informasi Profil
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center mb-4">
                                        <div class="position-relative">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTML0gExaohZHdZW3609F12nUmVc14WXYNx_w&s" 
                                                 alt="Admin" 
                                                 class="rounded-circle p-1 bg-white" 
                                                 width="110"
                                                 style="border: 3px solid #fff; box-shadow: 0 0 15px rgba(0,0,0,0.1);">
                                            <div class="position-absolute bottom-0 end-0">
                                                <span class="badge bg-success rounded-circle p-2">
                                                    <i class="bx bx-check text-white"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <h4 class="text-white">{{ $data->nama }}</h4>
                                            <p class="text-white-50 mb-1">Administrator</p>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush bg-transparent">
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap bg-transparent border-0">
                                            <h6 class="mb-0 text-white">
                                                <i class="bx bx-user me-2"></i>Nama
                                            </h6>
                                            <span class="text-white">{{ $data->nama }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap bg-transparent border-0">
                                            <h6 class="mb-0 text-white">
                                                <i class="bx bx-user-pin me-2"></i>Username
                                            </h6>
                                            <span class="text-white">{{ $data->username }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Form Edit Profil -->
                        <div class="col-lg-8">
                            <div class="card shadow-sm border-0" style="background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);">
                                <div class="card-header bg-transparent border-0">
                                    <h5 class="mb-0 text-white">
                                        <i class="bx bx-edit me-2"></i>Edit Profil
                                    </h5>
                                </div>
                                <form action="{{ route('profil.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <!-- Nama -->
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0 text-white">Nama</h6>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white border-0">
                                                        <i class="bx bx-user text-primary"></i>
                                                    </span>
                                                    <input type="text" name="nama" class="form-control border-0" value="{{ $data->nama }}" />
                                                </div>
                                                <small class="text-danger">
                                                    @foreach ($errors->get('nama') as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </small>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0 text-white">Email</h6>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white border-0">
                                                        <i class="bx bx-envelope text-primary"></i>
                                                    </span>
                                                    <input type="email" name="email" class="form-control border-0" value="{{ $data->email }}" />
                                                </div>
                                                <small class="text-danger">
                                                    @foreach ($errors->get('email') as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </small>
                                            </div>
                                        </div>
                                        <hr class="my-4 border-white" />

                                        <!-- Username -->
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0 text-white">Username</h6>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white border-0">
                                                        <i class="bx bx-user-pin text-primary"></i>
                                                    </span>
                                                    <input type="text" name="username" class="form-control border-0" value="{{ $data->username }}" />
                                                </div>
                                                <small class="text-danger">
                                                    @foreach ($errors->get('username') as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Password -->
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0 text-white">Password</h6>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white border-0">
                                                        <i class="bx bx-lock-alt text-primary"></i>
                                                    </span>
                                                    <input type="password" name="password" class="form-control border-0" placeholder="Kosongkan jika tidak ingin mengubah" />
                                                </div>
                                                <small class="text-danger">
                                                    @foreach ($errors->get('password') as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Konfirmasi Password -->
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0 text-white">Konfirmasi Password</h6>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white border-0">
                                                        <i class="bx bx-lock text-primary"></i>
                                                    </span>
                                                    <input type="password" name="password_confirmation" class="form-control border-0" placeholder="Kosongkan jika tidak ingin mengubah" />
                                                </div>
                                                <small class="text-danger">
                                                    @foreach ($errors->get('password_confirmation') as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-light px-4 text-primary">
                                                    <i class="bx bx-save me-1"></i> Simpan Perubahan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end wrapper-->
@endsection
