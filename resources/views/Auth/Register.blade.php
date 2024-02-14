@extends('layouts.Auth', ['title' => 'Register'])

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="name">Nama Lengkap Santri</label>
                        <input type="text" class="form-control form-control-user" name="name" id="name"
                            placeholder="Isi dengan nama lengkap">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jenjang" class="form-label">Pilih Jenjang:</label>
                    <select class="form-control" name="jenjang" id="jenjang">
                        @foreach ($jenjang as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} (Kuota:
                                {{ $item->kuota }})</option>
                        @endforeach
                    </select>
                    @error('jenjang')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Pilih Jenis Kelamin:</label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" class="form-control form-control-user" name="nama_ayah" id="nama_ayah"
                            placeholder="Nama Ayah">
                        @error('nama_ayah')
                            <small class="text-danger">Nama Sudah digunakan</small>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" class="form-control form-control-user" name="nama_ibu" id="nama_ibu"
                            placeholder="Nama Ibu">
                        @error('nama_ibu')
                            <small class="text-danger">Nama Sudah digunakan</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control form-control-user" id="email"
                        placeholder="Isi dengan email yang benar">
                    @error('email')
                        <small class="text-danger">Email sudah digunakan</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control form-control-user" id="password"
                        placeholder="Isi dengan password yang benar">
                    @error('password')
                        <small class="text-danger">password sudah digunakan</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Buat akun
                </button>
                <hr>
            </form>
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        Sudah punya akun ? <a href="{{ route('login') }}">Login</a>
    </div>
@endsection
