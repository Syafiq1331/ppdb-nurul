@extends('layouts.Auth', ['title' => 'Login'])

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail">Email:</label>
                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                        id="exampleInputEmail" aria-describedby="emailHelp" name="email"
                        placeholder="Enter Email Address..." value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword">Password:</label>
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                        name="password" id="exampleInputPassword" placeholder="Password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <p class="text-danger" style="font-size: 12px">*Isi dengan email & password yang
                        sudah di masukkan pada
                        saat registrasi akun</p>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                </button>
            </form>
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        Belum punya akun ? <a href="{{ route('register') }}">Register segera</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    @if (session('sweetAlert'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('sweetAlert') }}',
                showConfirmButton: true,
            });
        </script>
    @endif
@endsection
