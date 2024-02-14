<!doctype html>
<html data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.3/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <title>Penerimaan Santri Baru | Yayasan Pendidikan Islam Nurul Adzim</title>
    <!-- Tambahkan link CDN untuk AOS.js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif !important;
        }

        .backgroundCustom {
            background-image: url('{{ asset('landingPage/wave.jpg') }}');
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            /* Opsi lain untuk background-repeat, background-color, dll. */
        }
    </style>
</head>

<body>
    <header>
        <nav class="container mx-auto">
            <div class="navbar bg-base-100">
                <div class="navbar-start">
                    <div class="dropdown">
                        <label tabindex="0" class="btn btn-ghost lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </label>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a>Home</a></li>
                            <li><a>Brosur</a></li>
                            <li><a>F.Q.A</a></li>
                            <li><a>Kontak</a></li>
                        </ul>
                    </div>
                    <a class="font-bold normal-case text-xl hidden lg:block" data-aos="fade-left">PPDB Nurul Adzim</a>
                </div>
                <div class="navbar-end hidden lg:flex" data-aos="fade-right">
                    <ul class="menu menu-horizontal px-1">
                        <li><a>Home</a></li>
                        <li><a>Brosur</a></li>
                        <li><a>FAQ</a></li>
                        <li><a>Kontak</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <article class="backgroundCustom h-screen flex items-center justify-start">
            <div class="container mx-auto lg:px-24 px-10 z-10">
                <h1 class="text-[3rem] font-bold text-slate-50" data-aos="zoom-in">Penerimaan Siswa Baru</h1>
                <p class="mt-3 mb-2 text-xl text-slate-50" data-aos="fade-left">Yayasan Pendidikan Islam Nurul Adzim</p>
                <p class="text-slate-50 text-lg" data-aos="fade-left">Tahun Ajaran 2024-2025</p>
                <br>
                <a href="/register">
                    <button class="bg-sky-500 text-white px-6 py-3 rounded-lg" data-aos="zoom-in">Daftar
                        sekarang</button>
                </a>
            </div>
        </article>

        <!-- Kenapa memilih kami ?  -->
        <article class="mb-24">
            <h4 class="my-10 text-center text-slate-700 text-xl" data-aos="zoom-in">Kenapa anak perlu di masukkan ke
                dalam pondok pesantren
                ?</h4>
            <div class="grid grid-cols-12 justify-center gap-x-4 gap-y-4 container mx-auto">

                @foreach ($data as $index => $item)
                    <div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine"
                        class="lg:w-full container mx-auto col-span-12 w-3/4 lg:col-span-3 px-4 py-10 border-b-4 rounded-lg border-{{ $color[$index] }}-500 hover:bg-{{ $color[$index] }}-300 group hover:text-white shadow-lg">
                        <div
                            class="border border-{{ $color[$index] }}-100 p-4 w-20 bg-{{ $color[$index] }}-100 group-hover:bg-white">
                            <box-icon name={{ $item['icon'] }} type="solid" color="{{ $color[$index] }}"
                                size="md"></box-icon>
                        </div>
                        <div class="mt-4 mb-2">
                            <h1 class="text-slate-900 group-hover:text-white font-semibold text-xl">
                                {{ $item['title'] }}
                            </h1>
                            <p class="text-slate-900/80 group-hover:text-white text-md mt-1">{{ $item['desc'] }}
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </article>

        <article class="mb-24 mx-auto w-full">
            <h4 class="my-10 text-center text-slate-700 text-xl">Pilih jenjang pendaftaran</h4>
            <div class="grid grid-cols-12 justify-center gap-x-4 gap-y-4 container mx-auto">
                @foreach ($jenjang as $index => $item)
                    <div data-aos="fade-left"
                        class="lg:w-full container mx-auto col-span-12 w-3/4 lg:col-span-3 text-center px-4 py-10 border-b-4 rounded-lg border-{{ $color[$index] }}-500 hover:bg-{{ $color[$index] }}-300 group hover:text-white shadow-lg ">
                        <div
                            class="border border-{{ $color[$index] }}-100 p-4 w-20 bg-{{ $color[$index] }}-100 text-center group-hover:bg-white mx-auto">
                            <box-icon name='user-circle' type="solid" color="{{ $color[$index] }}"
                                size="md"></box-icon>
                        </div>
                        <div class="mt-4 mb-2">
                            <h1 class="text-slate-900 group-hover:text-white font-semibold text-xl">
                                {{ $item->name }}
                            </h1>
                            <p class="text-slate-900/80 group-hover:text-white text-md mt-1">Kuota tinggal
                                <strong>{{ $item->kuota }}</strong>
                                Siswa/siswi
                            </p>
                            <br>
                            <a class="text-{{ $color[$index] }}-500 group-hover:text-slate-900 text-lg font-semibold mt-1 pointer"
                                href="/register">Daftar
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>


        <!-- Pilih Visi Misi -->
        <article class="mb-24  mx-auto w-full">
            <h4 class="my-10 text-center text-slate-700 text-xl">Visi & Misi Yayasan Pendidikan Islam Nurul Adzim</h4>
            <div class="grid grid-cols-12 justify-center gap-x-4 gap-y-4 container mx-auto">
                @php
                    $visiMisi = \App\Models\VisiMisi::first();
                @endphp
                <div data-aos="fade-left"
                    class="lg:w-full container mx-auto col-span-12 w-3/4 lg:col-span-6 text-center px-4 py-10 border-b-4 rounded-lg border-blue-500 hover:bg-blue-300 group hover:text-white shadow-lg">
                    <div class="mt-4 mb-2">

                        <h1 class="text-slate-900 group-hover:text-white font-semibold text-xl">
                            Visi Yayasan Pendidikan Islam Nurul Adzim
                        </h1>
                        <p class="text-slate-900/80 group-hover:text-white text-md mt-1">{{ $visiMisi->visi }}</p>
                    </div>
                </div>

                <div data-aos="fade-left"
                    class="lg:w-full container mx-auto col-span-12 w-3/4 lg:col-span-6 text-center px-4 py-10 border-b-4 rounded-lg border-green-500 hover:bg-green-300 group hover:text-white shadow-lg">
                    <div class="mt-4 mb-2">

                        <h1 class="text-slate-900 group-hover:text-white font-semibold text-xl">
                            Misi Yayasan Pendidikan Islam Nurul Adzim
                        </h1>
                        <p class="text-slate-900/80 group-hover:text-white text-md mt-1">{{ $visiMisi->misi }}</p>
                    </div>
                </div>

            </div>
        </article>


        <!-- F.A.Q -->
        <article class="mb-24">
            <p class="mt-10 mb-2 text-center text-slate-700 text-xl">F.A.Q</p>
            <h3 class="text-center text-slate-900 text-3xl font-semibold">Pertanyaan Seputar Pendaftaran</h3>
            <div class="grid grid-cols-12 gap-x-4 container mx-auto px-12 lg:px-0 mt-10">
                <div class="lg:col-span-6 col-span-12 flex flex-col gap-y-2 my-1">
                    <div class="collapse collapse-plus bg-base-200">
                        <input type="radio" name="my-accordion-3" />
                        <div class="collapse-title text-xl font-medium">
                            Bagaimana cara mendaftar?
                        </div>
                        <div class="collapse-content">
                            <p>Caranya cukup mudah dengan cara klik tombol daftar yang ada di pojok kanan atas atau klik
                                disini</p>
                        </div>
                    </div>
                    <div class="collapse collapse-plus bg-base-200">
                        <input type="radio" name="my-accordion-3" />
                        <div class="collapse-title text-xl font-medium">
                            Dokumen apa saja yang harus disiapkan?
                        </div>
                        <div class="collapse-content">
                            <ul class="list-disc pl-5">
                                <li class="mb-2">Surat Keterangan Lulus (SKL), FC. Ijazah & SKHU legalisir 2 lembar
                                </li>
                                <li class="mb-2">FC. Akta Kelahiran & Kartu Keluarga 1 lembar</li>
                                <li class="mb-2">Foto warna latar merah untuk 2x3, 3x4 masing-masing 3 lembar</li>
                                <li class="mb-2">Surat keterangan berprestasi ranking 1,2,3 dari sekolah asal dengan
                                    lampiran FC. raport terakhir untuk <strong>BEASISWA</strong></li>
                                <li class="mb-2">Surat keterangan dari desa setempat dan FC. KIP bagi calon
                                    siswa-siwa kategori yatim dan dhuafa untuk program BSM/PIP</li>
                            </ul>


                        </div>
                    </div>
                    <div class="collapse collapse-plus bg-base-200">
                        <input type="radio" name="my-accordion-3" />
                        <div class="collapse-title text-xl font-medium">
                            Apakah daftarnya wajib online?
                        </div>
                        <div class="collapse-content">
                            <p>Wajib online, tapi boleh offline bagi yang berkenan datang langsung ke pondok pesantren
                            </p>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-6 col-span-12 flex flex-col gap-y-2 my-1">
                    <div class="collapse collapse-plus bg-base-200">
                        <input type="radio" name="my-accordion-3" />
                        <div class="collapse-title text-xl font-medium">
                            Berapa biaya yang harus dikeluarkan?
                        </div>
                        <div class="collapse-content">
                            <ul class="list-disc pl-5">
                                <li class="mb-2">Biaya pendaftaran dan keg. Ta'aruf Rp. 100.000</li>
                                <li class="mb-2">Dana Sumbangan Pendampingan BOP (DSP) Rp. 1.200.000</li>
                                <li class="mb-2">Seragam batik, koko dan kaos olahraga Rp. 300.000</li>
                                <li class="mb-2">Buku tahsin dan map raport/ijazah Rp. 50.000</li>
                                <li class="mb-2">Infaq perawatan/pemeliharaan sarpras Rp. 150.000</li>
                            </ul>
                        </div>
                    </div>
                    <div class="collapse collapse-plus bg-base-200">
                        <input type="radio" name="my-accordion-3" />
                        <div class="collapse-title text-xl font-medium">
                            Apa saja fasilitas yang disediakan?
                        </div>
                        <div class="collapse-content">
                            <p>Untuk informasi mengenai fasilitas dapat dilihat disini
                            </p>
                        </div>
                    </div>
                    <div class="collapse collapse-plus bg-base-200">
                        <input type="radio" name="my-accordion-3" />
                        <div class="collapse-title text-xl font-medium">
                            Apakah tesnya boleh online?
                        </div>
                        <div class="collapse-content">
                            <p>Untuk tes masuk wajib offline yaitu datang langsung ke pondok pesantren</p>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <!-- Kontak -->
        <article class="mb-24">
            <p class="mt-10 mb-2 text-center text-slate-700 text-xl">Kontak</p>
            <h3 class="text-center text-slate-900 text-3xl font-semibold mb-12">Kontak Kami</h3>
            <div class="grid grid-cols-12 gap-x-4 container mx-auto px-12">
                <div class="lg:col-span-6 col-span-12 grid grid-cols-12">
                    <div class="p-4 lg:col-span-6 col-span-12">
                        <box-icon name='map' color="teal" size="lg"></box-icon>
                        <p class="font-semibold text-lg my-2 text-slate-900">Alamat</p>
                        <p class="text-sm text-slate-900/80">Jl. Nusa Indah, Suliliran Baru, Paser, Kalimantan Timur
                        </p>
                    </div>
                    <div class="p-4 lg:col-span-6 col-span-12">
                        <box-icon name='whatsapp' type="logo" color="teal" size="lg"></box-icon>
                        <p class="font-semibold text-lg my-2 text-slate-900">Chat</p>
                        <p class="text-sm text-slate-900/80">0822-5080-3144 (Putra) <br>
                            0856-5410-9976 (Putri)</p>
                    </div>
                    <div class="p-4 lg:col-span-6 col-span-12">
                        <box-icon name='envelope' color="teal" size="lg"></box-icon>
                        <p class="font-semibold text-lg my-2 text-slate-900">Email</p>
                        <p class="text-sm text-slate-900/80">psb@nuruladzim.com</p>
                    </div>
                    <div class="p-4 lg:col-span-6 col-span-12">
                        <box-icon name='time-five' color="teal" size="lg"></box-icon>
                        <p class="font-semibold text-lg my-2 text-slate-900">Pelayanan</p>
                        <p class="text-sm text-slate-900/80">Senin - Jumat 08.00 - 16.00</p>
                    </div>
                </div>
                <div class="lg:col-span-6 col-span-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.142891749079!2d106.80218137040431!3d-6.244892779915898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1658d8644dd%3A0x87d3b8a649d41abc!2sStadion%20Olah%20Raga%20PTIK!5e0!3m2!1sid!2sid!4v1698133365704!5m2!1sid!2sid"
                        class="w-full h-full" style="border:0;" allowfullscreen="true" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </article>
    </main>
    <footer class="text-center py-4 bg-sky-300 w-full text-slate-900">
        <p>Copyright © 2023 PPDB Yayasan Pendidikan Islam Nurul Adzim</p>
    </footer>
    <!-- Modal -->
    <div id="galleryModal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-75 hidden">
        <div class="flex items-center justify-center h-full">
            <div id="modalContent" class="bg-white p-8 max-w-2xl rounded-lg overflow-y-auto relative">
                {{-- Modal content will be dynamically added here --}}
                <button id="closeModal" class="absolute top-4 right-4 text-gray-700 cursor-pointer">&#215;</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        // Inisialisasi AOS.js
        AOS.init();
    </script>

</body>


</html>
