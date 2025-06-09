<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Object Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="bg-white min-h-screen flex flex-col w-full">

    <div class="bg-white w-full flex-1">
        <!-- Navbar -->
        <div class="flex justify-between items-center z-20 top-0 sticky shadow px-5 py-4 border-b bg-[#e9f2f9]">
            <div class="text-2xl font-bold">
                <img src="/assets/img/swararupa-nobg.png" alt="Logo" class="h-12 object-contain" width="100" height="80">
            </div>
        </div>

        <div>
            <!-- Carousel dan Data dari Database -->
            <div id="carousel" class="relative mx-auto max-w-screen-xl">
                <!-- Carousel Items -->
                <div class="relative overflow-hidden aspect-[16/9]">
                    <div class="flex transition-transform duration-700 ease-in-out" id="carousel-items">
                        <!-- Loop Gambar dari Database -->
                        @if($object->image_url && is_array(json_decode($object->image_url)))
                        @foreach(json_decode($object->image_url) as $imageUrl)
                        <div class="carousel-item w-full flex-shrink-0">
                            <img src="{{ asset('images/aoqr_objects/' . basename($imageUrl)) }}" class="w-full h-full object-cover" alt="Object Image">
                        </div>
                        @endforeach
                        @else
                        <p>No images available.</p>
                        @endif
                    </div>
                </div>

                <!-- Slider Controls -->
                <button type="button" class="absolute top-1/2 left-0 transform -translate-y-1/2 z-30 flex items-center justify-center w-6 h-6 rounded-full bg-white opacity-50 mx-2 focus:outline-none" id="prev">
                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white text-black">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </span>
                </button>
                <button type="button" class="absolute top-1/2 right-0 transform -translate-y-1/2 z-30 flex items-center justify-center w-6 h-6 rounded-full bg-white opacity-50 mx-2 focus:outline-none" id="next">
                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white text-black">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </span>
                </button>

                <!-- Slider indicators -->
                <div id="carousel-indicators" class="absolute bottom-5 left-1/2 transform -translate-x-1/2 flex space-x-3 rtl:space-x-reverse">
                    <!-- Indikator akan ditambahkan melalui JavaScript -->
                </div>
            </div>

            <!-- Detail Objek -->
            <div class="object-detail-wrapper px-4 mb-4 my-10 relative mx-auto max-w-screen-xl">
                <h1 id="object-name" class="text-2xl font-poppins mb-4">{{ $object->name_object }}</h1>

                <p id="object-location" class="text-base font-poppins mb-4">
                    <span class="material-icons mr-2">location_on</span> {{ $object->location_object }}
                </p>

                <div id="object-description" class="desc-wrapper text-base mb-4 font-poppins font-light">
                    {!! nl2br(e($object->description_object)) !!}
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-[#1b325f] text-white p-4 mt-auto">
                <p class="text-center font-normal mb-3">MUSEUM SWARA RUPA</p>
                <p class="text-center font-light mb-3">
                    Jalan Wijaya Kusuma No. 45, <br />Yogyakarta 40123 – Indonesia
                </p>
                <p class="text-center font-light mb-3">Tel : +62 990 879 78</p>
                <p class="text-center font-light mb-3">
                    Email : info@museumswararupa.com
                </p>
                <hr class="border-t-2 border-[#1b325f] mb-4" />

                <div class="flex justify-center space-x-6 mt-4 mb-4">
                    <a href="" aria-label="Facebook">
                        <img src="/assets/img/Facebook.png" alt="Facebook" class="h-8 w-8 hover:opacity-80" width="32" height="32">
                    </a>
                    <a href="" aria-label="Instagram">
                        <img src="/assets/img/Instagram.png" alt="Instagram" class="h-8 w-8 hover:opacity-80" width="32" height="32">
                    </a>
                    <a href="" aria-label="You Tube">
                        <img src="/assets/img/Youtube.png" alt="You Tube" class="h-8 w-8 hover:opacity-80" width="32" height="32">
                    </a>
                </div>
                <hr class="border-t-2 border-[#1b325f] mb-4" />
                <p class="text-center font-light text-sm">
                    © Museum Swara Rupa Indonesia
                </p>
            </footer>

        </div>

        <script>
            // ===================================================================
            //                           Carosel
            // ===================================================================

            // Carousel functionality
            const carousel = document.getElementById('carousel');
            const itemsWrapper = carousel.querySelector('#carousel-items');
            const items = carousel.querySelectorAll('.carousel-item');
            const indicatorsContainer = document.getElementById('carousel-indicators');
            let currentIndex = 0;

            // Fungsi untuk menampilkan slide yang sesuai dengan index
            function showSlide(index) {
                const offset = -index * 100;
                itemsWrapper.style.transform = `translateX(${offset}%)`;
                updateIndicators(index);
            }

            // Fungsi untuk mengupdate indikator
            function updateIndicators(index) {
                const indicators = indicatorsContainer.querySelectorAll('button');
                indicators.forEach((indicator, i) => {
                    if (i === index) {
                        indicator.classList.add('bg-opacity-50');
                        indicator.classList.remove('bg-opacity-10');
                    } else {
                        indicator.classList.remove('bg-opacity-50');
                        indicator.classList.add('bg-opacity-10');
                    }
                });
            }

            // Fungsi untuk membuat indikator berdasarkan jumlah gambar
            function createIndicators() {
                items.forEach((item, index) => {
                    const indicator = document.createElement('button');
                    indicator.classList.add('w-3', 'h-3', 'rounded-full', 'transition-colors', 'bg-white', 'bg-opacity-10');
                    indicator.setAttribute('data-slide', index);
                    indicator.addEventListener('click', () => showSlide(index));
                    indicatorsContainer.appendChild(indicator);
                });
            }

            // Menambahkan event listener untuk tombol navigasi
            function nextSlide() {
                currentIndex = (currentIndex + 1) % items.length;
                showSlide(currentIndex);
            }

            function prevSlide() {
                currentIndex = (currentIndex - 1 + items.length) % items.length;
                showSlide(currentIndex);
            }

            document.getElementById('next').addEventListener('click', nextSlide);
            document.getElementById('prev').addEventListener('click', prevSlide);

            // Inisialisasi indikator dan tampilkan slide pertama
            createIndicators();
            showSlide(currentIndex);

            // Auto slide setiap 5 detik
            setInterval(nextSlide, 5000); // Ubah 5000 (5 detik) sesuai kebutuhan


            // ===================================================================
            //                           Carosel
            // ===================================================================
        </script>

</body>

</html>