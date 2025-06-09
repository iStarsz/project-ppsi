<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="bg-[#F7EFE8] min-h-screen flex flex-col w-full">

    <div class="bg-[#F7EFE8] mx-auto flex-1">
        <!-- Navbar -->
        <div class="flex justify-between items-center z-20 top-0 sticky shadow px-5 py-4 border-b bg-white">
            <!-- Logo di kiri -->
            <div class="text-2xl font-bold">
                <img src="/assets/img/ambrlogo.png" alt="Facebook" class="h-12 object-contain" width="100" height="80">
            </div>

            <!-- Kontainer tombol di kanan, menggunakan flex untuk tombol berdekatan -->
            <div class="flex items-center space-x-4">
                <!-- Tombol untuk export PDF -->
                <button class="p-2 hover:text-gray-500 hover:bg-gray-100 text-[#AAA577] rounded-full">
                    Export to PDF
                </button>

                <button class="p-1 rounded-full hover:bg-gray-100">
                    <span class="material-icons cursor-pointer hover:text-gray-500 text-[#AAA577]">
                        translate
                    </span>
                </button>

            </div>
        </div>

        <div>
            <!-- Popup Modal untuk ganti bahasa -->
            <div id="language-modal" class="fixed inset-0 bg-gray-700 bg-opacity-50 flex justify-center items-center z-50 hidden">
                <div class="bg-white p-5 rounded-lg w-full max-w-sm">
                    <h2 class="text-xl font-bold mb-4">Pilih Bahasa</h2>
                    <div class="flex flex-col gap-4">
                        <!-- Bahasa Button -->
                        <button class="p-2 border rounded bg-gray-100">Bahasa Indonesia</button>
                        <button class="p-2 border rounded bg-gray-100">English</button>
                    </div>
                </div>
            </div>

            <div class="w-full">
                <div id="carousel" class="relative mx-auto max-w-screen-xl">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden md:h-96">
                        <!-- Carousel items -->
                        <div class="flex transition-transform duration-700 ease-in-out" id="carousel-items">
                            <div class="carousel-item w-full flex-shrink-0">
                                <img src="/assets/img/relief.png" class="w-full h-full object-cover aspect-[16/9]" alt="Image 1">
                            </div>
                            <div class="carousel-item w-full flex-shrink-0">
                                <img src="/assets/img/relief.png" class="w-full h-full object-cover aspect-[16/9]" alt="Image 2">
                            </div>
                            <div class="carousel-item w-full flex-shrink-0">
                                <img src="/assets/img/relief.png" class="w-full h-full object-cover aspect-[16/9]" alt="Image 3">
                            </div>
                        </div>
                    </div>

                    <!-- Slider indicators -->
                    <div class="absolute bottom-5 left-1/2 transform -translate-x-1/2 flex space-x-3 rtl:space-x-reverse">
                        <button class="w-3 h-3 rounded-full transition-colors bg-white bg-opacity-50" data-slide="0"></button>
                        <button class="w-3 h-3 rounded-full transition-colors bg-white bg-opacity-10" data-slide="1"></button>
                        <button class="w-3 h-3 rounded-full transition-colors bg-white bg-opacity-10" data-slide="2"></button>
                    </div>

                    <!-- Slider controls -->
                    <button type="button" class="absolute top-1/2 left-0 transform -translate-y-1/2 z-30 flex items-center justify-center w-6 h-6 rounded-full bg-white opacity-50 mx-2 focus:outline-none" id="prev">
                        <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white text-black">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-1/2 right-0 transform -translate-y-1/2 z-30 flex items-center justify-center w-6 h-6 rounded-full bg-white opacity-50 mx-2 focus:outline-none" id="next">
                        <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white text-black">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>


                <!-- Detail Objek -->
                <div class="object-detail-wrapper mb-4 mx-5">
                    <h1 class="text-2xl font-poppins mb-4">Object Name</h1>
                    <p class="text-base font-poppins mb-4"><span class="material-icons mr-2">location_on</span> Main Lobby</p>

                    <div id="object-description" class="desc-wrapper text-base mb-4 font-poppins font-light">
                        <!-- Description content here -->
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut cupiditate itaque, quae facilis doloremque magnam incidunt enim alias quidem similique possimus reiciendis totam ab aspernatur magni sit error vero molestiae vel ipsam? Expedita excepturi recusandae deleniti optio repudiandae ipsam exercitationem.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut cupiditate itaque, quae facilis doloremque magnam incidunt enim alias quidem similique possimus reiciendis totam ab aspernatur magni sit error vero molestiae vel ipsam? Expedita excepturi recusandae deleniti optio repudiandae ipsam exercitationem.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut cupiditate itaque, quae facilis doloremque magnam incidunt enim alias quidem similique possimus reiciendis totam ab aspernatur magni sit error vero molestiae vel ipsam? Expedita excepturi recusandae deleniti optio repudiandae ipsam exercitationem.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-[#9F9B6E] text-white p-4 mt-auto">
            <p class="text-center font-normal mb-3">ROYAL AMBARRUKMO YOGYAKARTA</p>
            <p class="text-center font-light mb-3">
                Jalan Laksada Adisucipto No. 81, <br />Yogyakarta 55281 - Indonesia
            </p>
            <p class="text-center font-light mb-3">Tel : +62 274 488 488</p>
            <p class="text-center font-light mb-3">
                Email : info@royalambarrukmo.com
            </p>
            <hr class="border-t-2 border-[#8F8B5E] mb-4" />

            <div class="flex justify-center space-x-6 mt-4 mb-4">
                <a href="#" aria-label="Facebook">
                    <img src="/assets/img/Facebook.png" alt="Facebook" class="h-8 w-8 hover:opacity-80" width="32" height="32">
                </a>
                <a href="#" aria-label="Instagram">
                    <img src="/assets/img/Instagram.png" alt="Instagram" class="h-8 w-8 hover:opacity-80" width="32" height="32">
                </a>
                <a href="#" aria-label="You Tube">
                    <img src="/assets/img/Youtube.png" alt="You Tube" class="h-8 w-8 hover:opacity-80" width="32" height="32">
                </a>
            </div>
            <hr class="border-t-2 border-[#8F8B5E] mb-4" />
            <p class="text-center font-light text-sm">
                © Royal Ambarrukmo Yogyakarta 2024
            </p>
        </footer>

    </div>

    <script>
        // Event listener untuk tombol yang membuka modal
        translateButton.addEventListener('click', () => {
            languageModal.classList.remove('hidden');
        });

        // Menutup modal jika area luar modal diklik
        languageModal.addEventListener('click', (event) => {
            if (event.target === languageModal) {
                closeModal();
            }
        });


        const carousel = document.getElementById('carousel');
        const itemsWrapper = carousel.querySelector('#carousel-items');
        const items = carousel.querySelectorAll('.carousel-item');
        const indicators = carousel.querySelectorAll('[data-slide]');
        let currentIndex = 0;

        function showSlide(index) {
            const offset = -index * 100; // Slide width is 100%
            itemsWrapper.style.transform = `translateX(${offset}%)`;
            indicators.forEach((indicator, i) => {
                indicator.classList.toggle('bg-opacity-50', i === index);
                indicator.classList.toggle('bg-opacity-10', i !== index);
            });
        }

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

        indicators.forEach((indicator, i) => {
            indicator.addEventListener('click', () => {
                currentIndex = i;
                showSlide(currentIndex);
            });
        });

        // Initialize the carousel
        showSlide(currentIndex);

        // Auto slide every 5 seconds
        setInterval(nextSlide, 5000);
    </script>

</body>

</html>


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="bg-[#F7EFE8] min-h-screen flex flex-col w-full">

    <div class="bg-[#F7EFE8] mx-auto flex-1">
        <!-- Navbar -->
        <div class="flex justify-between items-center z-20 top-0 sticky shadow px-5 py-4 border-b bg-white">
            <!-- Logo di kiri -->
            <div class="text-2xl font-bold">
                <img src="/assets/img/ambrlogo.png" alt="Facebook" class="h-12 object-contain" width="100" height="80">
            </div>

            <!-- Kontainer tombol di kanan, menggunakan flex untuk tombol berdekatan -->
            <div class="flex items-center space-x-4">
                <!-- Tombol untuk export PDF -->
                <button class="p-2 hover:text-gray-500 hover:bg-gray-100 text-[#AAA577] rounded-full">
                    Export to PDF
                </button>

                <button class="p-1 rounded-full hover:bg-gray-100">
                    <span class="material-icons cursor-pointer hover:text-gray-500 text-[#AAA577]">
                        translate
                    </span>
                </button>

            </div>
        </div>

        <div>
            <!-- Popup Modal untuk ganti bahasa -->
            <div id="language-modal" class="fixed inset-0 bg-gray-700 bg-opacity-50 flex justify-center items-center z-50 hidden">
                <div class="bg-white p-5 rounded-lg w-full max-w-sm">
                    <h2 class="text-xl font-bold mb-4">Pilih Bahasa</h2>
                    <div class="flex flex-col gap-4">
                        <!-- Bahasa Button -->
                        <button class="p-2 border rounded bg-gray-100">Bahasa Indonesia</button>
                        <button class="p-2 border rounded bg-gray-100">English</button>
                    </div>
                </div>
            </div>

            <div class="w-full">
                <!-- Gambar objek berjajar horizontal -->
                <div>
                    <div id="image-gallery" class="flex overflow-x-hidden space-x-4 py-[0px] mb-4">
                        <!-- Gambar, bisa diisi dengan data gambar dinamis -->
                        <div class="relative w-full aspect-video flex-shrink-0">
                            <img src="/assets/img/relief.png" alt="Image 1" class="absolute inset-0 w-full h-full object-cover" crossOrigin="anonymous">
                        </div>

                        <div class="relative w-full aspect-video flex-shrink-0">
                            <img src="/assets/img/relief.png" alt="Image 1" class="absolute inset-0 w-full h-full object-cover" crossOrigin="anonymous">
                        </div>

                        <div class="relative w-full aspect-video flex-shrink-0">
                            <img src="/assets/img/relief.png" alt="Image 1" class="absolute inset-0 w-full h-full object-cover" crossOrigin="anonymous">
                        </div>
                    </div>

                    <!-- Tombol navigasi -->
                    <div class="absolute sm:top-[290px] top-[180px] left-[10px] right-[10px] flex justify-between items-center z-10 py-2">
                        <button class="material-icons text-white text-4xl opacity-30">
                            arrow_circle_left
                        </button>
                        <button class="material-icons text-white text-4xl opacity-30">
                            arrow_circle_right
                        </button>
                    </div>
                </div>

                <!-- Detail Objek -->
                <div class="object-detail-wrapper mb-4 mx-5">
                    <h1 class="text-2xl font-poppins mb-4">Object Name</h1>
                    <p class="text-base font-poppins mb-4"><span class="material-icons mr-2">location_on</span> Main Lobby</p>

                    <div id="object-description" class="desc-wrapper text-base mb-4 font-poppins font-light">
                        <!-- Description content here -->
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut cupiditate itaque, quae facilis doloremque magnam incidunt enim alias quidem similique possimus reiciendis totam ab aspernatur magni sit error vero molestiae vel ipsam? Expedita excepturi recusandae deleniti optio repudiandae ipsam exercitationem.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut cupiditate itaque, quae facilis doloremque magnam incidunt enim alias quidem similique possimus reiciendis totam ab aspernatur magni sit error vero molestiae vel ipsam? Expedita excepturi recusandae deleniti optio repudiandae ipsam exercitationem.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut cupiditate itaque, quae facilis doloremque magnam incidunt enim alias quidem similique possimus reiciendis totam ab aspernatur magni sit error vero molestiae vel ipsam? Expedita excepturi recusandae deleniti optio repudiandae ipsam exercitationem.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-[#9F9B6E] text-white p-4 mt-auto">
            <p class="text-center font-normal mb-3">ROYAL AMBARRUKMO YOGYAKARTA</p>
            <p class="text-center font-light mb-3">
                Jalan Laksada Adisucipto No. 81, <br />Yogyakarta 55281 - Indonesia
            </p>
            <p class="text-center font-light mb-3">Tel : +62 274 488 488</p>
            <p class="text-center font-light mb-3">
                Email : info@royalambarrukmo.com
            </p>
            <hr class="border-t-2 border-[#8F8B5E] mb-4" />

            <div class="flex justify-center space-x-6 mt-4 mb-4">
                <a href="#" aria-label="Facebook">
                    <img src="/assets/img/Facebook.png" alt="Facebook" class="h-8 w-8 hover:opacity-80" width="32" height="32">
                </a>
                <a href="#" aria-label="Instagram">
                    <img src="/assets/img/Instagram.png" alt="Instagram" class="h-8 w-8 hover:opacity-80" width="32" height="32">
                </a>
                <a href="#" aria-label="You Tube">
                    <img src="/assets/img/Youtube.png" alt="You Tube" class="h-8 w-8 hover:opacity-80" width="32" height="32">
                </a>
            </div>
            <hr class="border-t-2 border-[#8F8B5E] mb-4" />
            <p class="text-center font-light text-sm">
                © Royal Ambarrukmo Yogyakarta 2024
            </p>
        </footer>

    </div>

    <script>
        // Mendapatkan elemen modal dan tombol
        const languageModal = document.getElementById('language-modal');
        const translateButton = document.querySelector('button span.material-icons');
        const closeModal = () => languageModal.classList.add('hidden');

        // Event listener untuk tombol yang membuka modal
        translateButton.addEventListener('click', () => {
            languageModal.classList.remove('hidden');
        });

        // Menutup modal jika area luar modal diklik
        languageModal.addEventListener('click', (event) => {
            if (event.target === languageModal) {
                closeModal();
            }
        });
    </script>

</body>

</html> --}}