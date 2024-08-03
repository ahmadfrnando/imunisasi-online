<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.ico">
    <link rel="stylesheet" href="build/tailwind.css">

    <title>PUSKESMAS PEMBANTU SUMBER MULYOREJO</title>
    @vite('resources/css/app.css')

    <style>
        #menu-toggle:checked+#menu {
            display: block;
        }

        #dropdown-toggle:checked+#dropdown {
            display: block;
        }

        a,
        span {
            position: relative;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a.arrow,
        span.arrow {
            display: flex;
            align-items: center;
            font-weight: 600;
            line-height: 1.5;
        }

        a.arrow .arrow_icon,
        span.arrow .arrow_icon {
            position: relative;
            margin-left: 0.5em;
        }

        a.arrow .arrow_icon svg,
        span.arrow .arrow_icon svg {
            transition: transform 0.3s 0.02s ease;
            margin-right: 1em;
        }

        a.arrow .arrow_icon::before,
        span.arrow .arrow_icon::before {
            content: "";
            display: block;
            position: absolute;
            top: 50%;
            left: 0;
            width: 0;
            height: 2px;
            background: #38b2ac;
            transform: translateY(-50%);
            transition: width 0.3s ease;
        }

        a.arrow:hover .arrow_icon::before,
        span.arrow:hover .arrow_icon::before {
            width: 1em;
        }

        a.arrow:hover .arrow_icon svg,
        span.arrow:hover .arrow_icon svg {
            transform: translateX(0.75em);
        }

        .cover {
            border-bottom-right-radius: 128px;
        }

        .bg-blue-teal-gradient {
            background: rgb(49, 130, 206);
            background: linear-gradient(90deg, rgba(49, 130, 206, 1) 0%, rgba(56, 178, 172, 1) 100%);
        }

        @media (min-width: 1024px) {
            .cover {
                border-bottom-right-radius: 256px;
            }
        }
    </style>
</head>

<body class="antialiased bg-white font-sans text-gray-900 scroll-smooth">

    <main class="w-full">

        <!-- start header -->
        <header class="absolute top-0 left-0 w-full z-50 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64">
            <div class="flex flex-wrap items-center justify-between py-6">
                <div class="w-1/2 md:w-auto">
                    <a href="index.html" class="text-white font-bold text-2xl">
                        PUSKESMAS PEMBANTU SUMBER MULYOREJO
                    </a>
                </div>

                <label for="menu-toggle" class="pointer-cursor md:hidden block"><svg class="fill-current text-white"
                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <title>menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg></label>

                <input class="hidden" type="checkbox" id="menu-toggle">

                <div class="hidden md:block w-full md:w-auto" id="menu">
                    <nav
                        class="w-full bg-white md:bg-transparent rounded shadow-lg px-6 py-4 mt-4 text-center md:p-0 md:mt-0 md:shadow-none">
                        <ul class="md:flex items-center">
                            <li><a class="py-2 inline-block md:text-white md:hidden lg:block font-semibold"
                                    href="#">Home</a></li>
                            <li class="md:ml-4"><a class="py-2 inline-block md:text-white md:px-2 font-semibold"
                                    href="#about">About</a></li>
                            <li class="md:ml-4"><a class="py-2 inline-block md:text-white md:px-2 font-semibold"
                                    href="#gallery">Gallery</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!-- end header -->

        <!-- start hero -->
        <div class="bg-gray-100">
            <section
                class="cover bg-blue-teal-gradient relative bg-blue-600 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden py-48 flex items-center min-h-screen">
                <div class="h-full absolute top-0 left-0 right-0 z-0">
                    <img src="images/cover-bg2.jpg" alt="" class="w-full h-full object-cover opacity-20">
                </div>

                <div class="lg:w-3/4 xl:w-2/4 relative z-10 h-100 lg:mt-16">
                    <div>
                        <h1 class="text-white text-4xl md:text-5xl xl:text-6xl font-bold leading-tight">Kesehatan Anak
                            Anda adalah Prioritas Kami</h1>
                        <p class="text-blue-100 text-xl md:text-2xl leading-snug mt-4">Selamat datang di Puskesmas
                            Pembantu Sumber Mulyorejo Binjai. Kami berkomitmen untuk memberikan layanan imunisasi
                            terbaik untuk memastikan kesehatan dan perkembangan optimal bagi anak-anak Anda.</p>
                    </div>
                </div>
            </section>
        </div>
        <!-- end hero -->

        <!-- start about -->
        <section id="about" class="relative px-4 py-16 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 lg:py-32">
            <div class="flex flex-col lg:flex-row lg:-mx-8">
                <div class="w-full lg:w-1/2 lg:px-8">
                    <h2 class="text-3xl leading-tight font-bold mt-4">Tentang Puskesmas Pembantu Sumber Mulyorejo Binjai
                    </h2>
                    <p class="mt-2 leading-relaxed text-justify">Jl. Dr. Wahidin No.24, Sumber Mulyorejo, Kec. Binjai
                        Tim., Kota Binjai, Sumatera Utara 20351, Indonesia</p>
                </div>

                <div class="w-full lg:w-1/2 lg:px-8 mt-12 lg:mt-0">
                    <div class="md:flex">
                        <div>
                            <div class="w-16 h-16 bg-blue-600 rounded-full"></div>
                        </div>
                        <div class="md:ml-8 mt-4 md:mt-0">
                            <h4 class="text-xl font-bold leading-tight">Layanan Imunisasi Lengkap</h4>
                            <p class="mt-2 leading-relaxed">Kami menawarkan berbagai jenis vaksinasi untuk melindungi
                                anak Anda dari berbagai penyakit menular. Tim medis kami yang berpengalaman siap
                                memberikan informasi dan layanan imunisasi yang diperlukan untuk kesehatan anak Anda.
                            </p>
                        </div>
                    </div>

                    <div class="md:flex mt-8">
                        <div>
                            <div class="w-16 h-16 bg-blue-600 rounded-full"></div>
                        </div>
                        <div class="md:ml-8 mt-4 md:mt-0">
                            <h4 class="text-xl font-bold leading-tight">Pendekatan Berbasis Keluarga</h4>
                            <p class="mt-2 leading-relaxed">Kami memahami bahwa setiap keluarga memiliki kebutuhan unik.
                                Oleh karena itu, kami berkomitmen untuk memberikan layanan imunisasi yang sesuai dengan
                                kebutuhan spesifik anak dan keluarga Anda.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:flex md:flex-wrap mt-24 text-center md:-mx-4">
                <div class="md:w-1/2 md:px-4 lg:w-1/4">
                    <div class="bg-white rounded-lg border border-gray-300 p-8">
                        <img src="images/suntik.svg" alt="" class="h-20 mx-auto">
                        <h4 class="text-xl font-bold mt-4">Imunisasi Dasar</h4>
                        <p class="mt-1">Kami menyediakan imunisasi dasar yang penting untuk melindungi anak dari
                            penyakit umum.</p>
                    </div>
                </div>

                <div class="md:w-1/2 md:px-4 mt-4 md:mt-0 lg:w-1/4">
                    <div class="bg-white rounded-lg border border-gray-300 p-8">
                        <img src="images/medical.svg" alt="" class="h-20 mx-auto">

                        <h4 class="text-xl font-bold mt-4">Vaksinasi Tambahan</h4>
                        <p class="mt-1">Kami juga menawarkan vaksinasi tambahan untuk perlindungan ekstra terhadap
                            penyakit tertentu.</p>
                    </div>
                </div>

                <div class="md:w-1/2 md:px-4 mt-4 md:mt-8 lg:mt-0 lg:w-1/4">
                    <div class="bg-white rounded-lg border border-gray-300 p-8">
                        <img src="images/perawat.svg" alt="" class="h-20 mx-auto">

                        <h4 class="text-xl font-bold mt-4">Konsultasi Kesehatan</h4>
                        <p class="mt-1">Dapatkan konsultasi kesehatan dan informasi lebih lanjut tentang imunisasi dan
                            perawatan anak.</p>
                    </div>
                </div>

                <div class="md:w-1/2 md:px-4 mt-4 md:mt-8 lg:mt-0 lg:w-1/4">
                    <div class="bg-white rounded-lg border border-gray-300 p-8">
                        <img src="images/catat.svg" alt="" class="h-20 mx-auto">
                        <h4 class="text-xl font-bold mt-4">Pencatatan Imunisasi</h4>
                        <p class="mt-1 line-clamp-3">Kami menyimpan catatan lengkap mengenai imunisasi anak Anda untuk memudahkan
                            pelacakan dan tindak lanjut.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end about -->

        <!-- start testimonials -->
        <section class="relative bg-gray-100 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-16 lg:py-32">
            <div class="flex flex-col lg:flex-row lg:-mx-8">
                <div class="w-full lg:w-1/2 lg:px-8">
                    <h2 class="text-3xl leading-tight font-bold mt-4">Mengapa Memilih Puskesmas Kami?</h2>
                    <p class="mt-2 leading-relaxed">Kami berkomitmen untuk memberikan layanan imunisasi yang terbaik
                        dan terpercaya untuk anak-anak Anda. Dengan fasilitas yang modern dan tim medis yang
                        berpengalaman, kami siap membantu menjaga kesehatan dan kesejahteraan anak Anda.</p>
                </div>

                <div class="w-full md:max-w-md md:mx-auto lg:w-1/2 lg:px-8 mt-12 mt:md-0">
                    <img src="images/gallery1.jpg" alt="">
                    <p class="italic text-sm mt-2 text-center">Kami berfokus pada kesehatan anak Anda dengan pendekatan
                        yang penuh perhatian dan profesional.</p>
                </div>
            </div>
        </section>
        <!-- end testimonials -->

        <!-- start blog -->
        <section id="gallery" class="relative bg-white px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-32">
            <div class="">
                <h2 class="text-3xl leading-tight font-bold">Gallery</h2>
            </div>

            <div class="md:flex mt-12 md:-mx-4">
                <div class="md:px-4 md:w-1/2 xl:w-1/4">
                    <div class="bg-white rounded border border-gray-300">
                        <img src="images/gallery2.jpg" class="object-cover" alt="">
                    </div>
                </div>
                <div class="md:px-4 md:w-1/2 xl:w-1/4">
                    <div class="bg-white rounded border border-gray-300">
                        <img src="images/gallery3.jpg" class="object-cover" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!-- start footer -->
        <footer class="relative bg-gray-900 text-white px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-12 lg:py-24">
            <div class="flex justify-center">
                <div class="text-center">
                    <h3 class="font-bold text-2xl">PUSKESMAS PEMBANTU SUMBER MULYOREJO BINJAI</h3>
                    <p class="text-gray-400 mt-2">
                        Jl. Dr. Wahidin No.24, Sumber Mulyorejo, Kec. Binjai Tim., Kota Binjai, Sumatera Utara 20351,
                        Indonesia
                    </p>
                </div>
            </div>
        </footer>

        <!-- end footer -->

    </main>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131505823-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-131505823-4');
    </script>

</body>

</html>
