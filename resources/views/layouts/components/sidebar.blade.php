<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/dashboard') }}">PPDB Nurul Adzim</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/dashboard') }}">PPDB</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Master Data</li>
            @if ((auth()->check() && auth()->user()->role === 'admin') || auth()->user()->role === 'superadmin')
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                            class="fas fa-columns"></i>
                        <span>Data Master</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/admin/jenjang">Jenjang Sekolah</a></li>
                        <li><a class="nav-link" href="/admin/visi-misi">Pengaturan Visi Misi</a></li>
                        <li><a class="nav-link" href="/admin/pemberitahuan">Pemberitahuan</a></li>
                        <li><a class="nav-link" href="/admin/kelebihan-yayasan">Kelebihan Yayasan</a></li>
                        <li><a class="nav-link" href="/admin/contact">Contact</a></li>
                    </ul>
                </li>

                {{-- <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/admin/list-guru') }}">
                        <i class="fas fa-fw fa-users"></i>
                        <span>List Guru</span>
                    </a>
                </li> --}}

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                            class="fas fa-question-circle"></i>
                        <span>Data Ujian Online</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/admin/kategori-pertanyaan">Kategori Pertanyaan</a></li>
                        <li><a class="nav-link" href="/admin/pertanyaan">Pertanyaan</a></li>
                        <li><a class="nav-link" href="/admin/jawaban">Jawaban</a></li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/admin/list-santri') }}">
                        <i class="fas fa-fw fa-user-friends"></i>
                        <span>List Siswa Pendaftar</span>
                    </a>
                </li>


                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/admin/administrasi') }}">
                        <i class="fas fa-fw fa-money-bill"></i>
                        <span>Administrasi</span>
                    </a>
                </li>
            @endif

            @if (auth()->check() && auth()->user()->role === 'user')
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                            class="fas fa-columns"></i>
                        <span>Data Siswa</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/user/profile-siswa">Profile Calon Siswa</a></li>
                        <li><a class="nav-link" href="/user/profile-wali-siswa">Profile Wali Siswa</a></li>
                    </ul>
                </li>

                {{-- <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('user/administrasi') }}">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Administasi</span>
                    </a>
                </li> --}}

                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('user/pembayaran') }}">
                        <i class="fas fa-fw fa-money-bill-alt"></i>
                        <span>Pembayaran</span>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('user/exams') }}">
                        <i class="fas fa-fw fa-question-circle"></i>
                        <span>Ujian Online</span>
                    </a>
                </li>
            @endif
            <li class="menu-header">Logout</li>
            <form id="logout-form" action="{{ url('logout') }}" method="POST">
                @csrf
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" onclick="document.getElementById('logout-form').submit();"
                        style="cursor: pointer;">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </form>
        </ul>
    </aside>
</div>
