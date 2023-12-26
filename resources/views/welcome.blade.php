<!doctype html>
<html data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.3/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <title>Penerimaan Santri Baru | Pondok Pesantren Daarul Huffazh</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif !important;
        }

        .backgroundCustom {
            background-image: url('{{ asset('landingPage/wave.png') }}');
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
                    <a class="font-bold normal-case text-xl hidden lg:block">PPDB Pondok Daarul Huffazh</a>
                </div>
                <div class="navbar-end hidden lg:flex">
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
                <h1 class="text-[3rem] font-bold text-slate-900">Penerimaan Santri Baru</h1>
                <p class="mt-3 mb-2 text-xl text-slate-900">Pondok Pesantren Daarul Huffazh</p>
                <p class="text-slate-900/70 text-lg">Tahun Ajaran 2024-2025</p>
                <br>
                <button class="bg-sky-500 text-white px-6 py-3 rounded-lg">Daftar sekarang</button>
            </div>
        </article>

        <!-- Kenapa memilih kami ?  -->
        <article class="mb-24">
            <h4 class="my-10 text-center text-slate-700 text-xl">Kenapa Memilih Kami ?</h4>
            <div class="grid grid-cols-12 gap-x-4 gap-y-4 container mx-auto">

            </div>
        </article>

        <!-- Pilih jenjang pendaftaran -->
        <article class="mb-24">
            <h4 class="my-10 text-center text-slate-700 text-xl">Pilih jenjang pendaftaran</h4>
            <div class="grid grid-cols-12 gap-x-4 gap-y-4 container mx-auto">
                <!-- TK -->
                <div
                    class="lg:w-full mx-auto col-span-12 w-3/4 lg:col-span-3 text-center px-4 py-10 border-b-4 rounded-lg border-emerald-500 hover:bg-emerald-300 group hover:text-white shadow-lg ">
                    <div
                        class="border border-emerald-100 p-4 w-20 bg-emerald-100 text-center group-hover:bg-white mx-auto">
                        <box-icon name='male-sign' color="teal" size="md"></box-icon>
                    </div>
                    <div class="mt-4 mb-2">
                        <h1 class="text-slate-900 group-hover:text-white font-semibold text-xl">MTs Putra</h1>
                        <p class="text-slate-900/80 group-hover:text-white text-md mt-1">Kuota terbatas</p>
                        <br>
                        <a class="text-emerald-500 group-hover:text-slate-900 text-lg font-semibold mt-1 pointer">Daftar
                        </a>
                    </div>
                </div>
                <!-- SD -->
                <div
                    class="lg:w-full mx-auto col-span-12 w-3/4 lg:col-span-3 text-center px-4 py-10 border-b-4 rounded-lg border-green-500 hover:bg-green-300 group hover:text-white shadow-lg ">
                    <div
                        class="border border-emerald-100 p-4 w-20 bg-emerald-100 text-center group-hover:bg-white mx-auto">
                        <box-icon name='male-sign' color="teal" size="md"></box-icon>
                    </div>
                    <div class="mt-4 mb-2">
                        <h1 class="text-slate-900 group-hover:text-white font-semibold text-xl">MTs Putra</h1>
                        <p class="text-slate-900/80 group-hover:text-white text-md mt-1">Kuota terbatas</p>
                        <br>
                        <a class="text-green-500 group-hover:text-slate-900 text-lg font-semibold mt-1 pointer">Daftar
                        </a>
                    </div>
                </div>
                <!-- SMP -->
                <div
                    class="lg:w-full mx-auto col-span-12 w-3/4 lg:col-span-3 text-center px-4 py-10 border-b-4 rounded-lg border-blue-500 hover:bg-blue-300 group hover:text-white shadow-lg">
                    <div
                        class="border border-emerald-100 p-4 w-20 bg-emerald-100 text-center group-hover:bg-white mx-auto">
                        <box-icon name='male-sign' color="blue" size="md"></box-icon>
                    </div>
                    <div class="mt-4 mb-2">
                        <h1 class="text-slate-900 group-hover:text-white font-semibold text-xl">MTs Putra</h1>
                        <p class="text-slate-900/80 group-hover:text-white text-md mt-1">Kuota terbatas</p>
                        <br>
                        <a class="text-blue-500 group-hover:text-slate-900 text-lg font-semibold mt-1 pointer">Daftar
                        </a>
                    </div>
                </div>
                <!-- MTS -->
                <div
                    class="lg:w-full mx-auto col-span-12 w-3/4 lg:col-span-3 text-center px-4 py-10 border-b-4 rounded-lg border-teal-500 hover:bg-teal-300 group hover:text-white shadow-lg">
                    <div
                        class="border border-emerald-100 p-4 w-20 bg-emerald-100 text-center group-hover:bg-white mx-auto">
                        <box-icon name='male-sign' color="teal" size="md"></box-icon>
                    </div>
                    <div class="mt-4 mb-2">
                        <h1 class="text-slate-900 group-hover:text-white font-semibold text-xl">MTs Putra</h1>
                        <p class="text-slate-900/80 group-hover:text-white text-md mt-1">Kuota terbatas</p>
                        <br>
                        <a class="text-emerald-500 group-hover:text-slate-900 text-lg font-semibold mt-1 pointer">Daftar
                        </a>
                    </div>
                </div>

            </div>
        </article>

        <!-- Galery -->
        <article class="mb-24">
            <p class="mt-10 mb-2 text-center text-slate-700 text-xl">Galery</p>
            <h3 class="text-center text-slate-900 text-3xl font-semibold">Foto-foto kegiatan di pondok</h3>
        </article>

        <!-- F.A.Q -->
        <article class="mb-24">
            <p class="mt-10 mb-2 text-center text-slate-700 text-xl">F.A.Q</p>
            <h3 class="text-center text-slate-900 text-3xl font-semibold">Pertanyaan Seputar Pendaftaran</h3>
            <div class="grid grid-cols-12 gap-x-4 container mx-auto px-12 lg:px-0 mt-10">
                <div class="lg:col-span-6 col-span-12 flex flex-col gap-y-2 my-1">
                    <div class="collapse collapse-plus bg-base-200">
                        <input type="radio" name="my-accordion-3" checked="checked" />
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
                                <li class="mb-2">Ijazah/SKL</li>
                                <li class="mb-2">KTP Orang Tua/Wali</li>
                                <li class="mb-2">KIA/KTP Anak</li>
                                <li class="mb-2">Kartu Keluarga</li>
                                <li class="mb-2">Akte Kelahiran</li>
                                <li class="mb-2">Surat Keterangan Baik dari sekolah sebelumnya</li>
                                <li class="mb-2">
                                    Berkas Pendaftaran tambahan, <a class="text-blue-500"
                                        href="link-ke-berkas-pendaftaran">download
                                        disini</a>
                                </li>
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
                        <input type="radio" name="my-accordion-3" checked="checked" />
                        <div class="collapse-title text-xl font-medium">
                            Berapa biaya yang harus dikeluarkan?
                        </div>
                        <div class="collapse-content">
                            <ul class="list-disc pl-5">
                                <li class="mb-2">Biaya Pendaftaran Rp.</li>
                                <li class="mb-2">Biaya Santri Baru Rp.</li>
                                <li class="mb-2">Biaya Bulanan Putra Rp.</li>
                                <li class="mb-2">Biaya Bulanan Putri Rp.</li>
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
                    <div class="p-4 col-span-6">
                        <box-icon name='map' color="teal" size="lg"></box-icon>
                        <p class="font-semibold text-lg my-2 text-slate-900">Alamat</p>
                        <p class="text-sm text-slate-900/80">Jl. Nusa Indah, Suliliran Baru, Paser, Kalimantan Timur
                        </p>
                    </div>
                    <div class="p-4 col-span-6">
                        <box-icon name='whatsapp' type="logo" color="teal" size="lg"></box-icon>
                        <p class="font-semibold text-lg my-2 text-slate-900">Chat</p>
                        <p class="text-sm text-slate-900/80">0822-5080-3144 (Putra) <br>
                            0856-5410-9976 (Putri)</p>
                    </div>
                    <div class="p-4 col-span-6">
                        <box-icon name='envelope' color="teal" size="lg"></box-icon>
                        <p class="font-semibold text-lg my-2 text-slate-900">Email</p>
                        <p class="text-sm text-slate-900/80">psb@daarulhuffazh.com</p>
                    </div>
                    <div class="p-4 col-span-6">
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
        <p>Copyright © 2023 Pondok Pesantren Daarul Huffazh</p>
    </footer>
    <script src="https://your-eos-library-url.js"></script>
</body>

</html>
