<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li>
            <a href="#" class="nav-link nav-link-lg nav-link-user">
                {{-- <img alt="image" src="{{ asset('assets/img/avatar/avatar-3.png') }}" class="rounded-circle mr-1"> --}}
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin')
                    <img class="rounded-circle mr-1" src="{{ asset('assets/img/avatar/avatar-3.png') }}"
                        alt="Foto Profil Default">
                @else
                    @if (auth()->user()->santri)
                        <img class="rounded-circle mr-1"
                            src="{{ asset('storage/photosSantri/' . auth()->user()->santri->photo) }}"
                            alt="Foto Profil">
                    @else
                        <img class="rounded-circle mr-1" src="{{ asset('assets/img/avatar/avatar-3.png') }}"
                            alt="Foto Profil Default">
                    @endif
                @endif

                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin')
                        Admin
                    @else
                        {{ auth()->user()->santri->nama_lengkap }}
                    @endif
                </span>


            </a>
        </li>
    </ul>
</nav>
