<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
      IS-USG
    </title>
    <meta name="description" content="Simple landing page" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gridlex/2.7.1/gridlex.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,500;0,900&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
      .gradient {
        background: linear-gradient(90deg, #5F6F52 0%, #FEFAE0 100%);
      }

      .tall-50 {
            min-height: 50vh;
        }
        .padded {
            padding: 5%;
        }

        .bg-image {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .bgm-image {
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            height: 500px;
            width: 100%;
            border-radius: 10px; 
        }
        .bg-1 {
            background-image: url('assets/images/website/dashboard.png');
        }
        .bg-2 {
            background-image: url('assets/images/website/datadomba.png');
        }
        .bg-3 {
            background-image: url('assets/images/website/pemeriksaanawal.png');
        }
        .bg-4 {
            background-image: url('assets/images/website/tandavital.png');
        }
        .bg-5 {
            background-image: url('assets/images/website/radiologi.png');
        }
        .bgm-1 {
            background-image: url('assets/images/mobile/dashboard.jpg');
        }
        .bgm-2 {
            background-image: url('assets/images/mobile/detaildatadomba.jpg');
        }
        .bgm-3 {
            background-image: url('assets/images/mobile/pemeriksaanawal.jpg');
        }
        .bgm-4 {
            background-image: url('assets/images/mobile/tandavital.jpg');
        }
        .bgm-5 {
            background-image: url('assets/images/mobile/radiologi.jpg');
        }
        .bgm-6 {
            background-image: url('assets/images/mobile/qrcode.jpg');
        }

        h2 {
            font-size: 2.5rem;
            font-weight: 900;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }
        .h-80 {
            height: 400px;
        }
        p {
            font-weight: 300;
            line-height: 1.4;
            margin-bottom: 0.8rem;
        }
        .fitur-website {
            background: #ffffff;
            padding: 2rem 1rem;
            position: relative;
            z-index: 1;
        }

        .fitur-website h2 {
            color: #000000;
        }

        .fitur-website p {
            color: #333333;
        }

        footer {
            background-color: #222;
            color: #f5f5f5;
            padding: 20px 0;
        }

        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 0 20px;
        }

        .footer-section {
            flex: 1;
            min-width: 250px;
            margin: 10px 20px;
        }

        .footer-section h2 {
            color: #5F6F52;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .footer-section p, 
        .footer-section ul {
            font-size: 14px;
            line-height: 1.8;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 8px;
        }

        .footer-section ul li a {
            color: #f5f5f5;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section ul li a:hover {
            color: #5F6F52;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            border-top: 1px solid #444;
            padding-top: 10px;
        }

      
    </style>
  </head>
  <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
          <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">

            </svg>
            IS-USG
          </a>
        </div>
        <div class="block lg:hidden pr-4">
          <button id="nav-toggle" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
          <ul class="list-reset lg:flex justify-end flex-1 items-center">
            <li class="mr-3">
              <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="#">Home</a>
            </li>
            <li class="mr-3">
              <a class="inline-block py-2 px-4 text-black no-underline" href="#fitur-website">Fitur Website</a>
            </li>
            <li class="mr-3">
              <a class="inline-block py-2 px-4 text-black no-underline" href="#fitur-mobile">Fitur Mobile</a>
            </li>
          </ul>
          <a
            id="navAction"
            href="{{ route('login') }}"
            class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
        >
            LOGIN
          </a>

        </div>
      </div>
      <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
    
    <div class="pt-10">
      <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        
        <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
          <img src="assets/images/logos/gmf-farm.png" alt="Logo" class="w-32 h-32 mb-4 mx-auto md:mx-0">
          <h1 class="my-4 text-5xl font-bold leading-tight">
            Intelligent System Ultrasonography
          </h1>
          <p class="leading-normal text-2xl mb-8">
            Welcome!
          </p>
        </div>
        
        <div class="w-full md:w-3/5 py-6 text-center">
          <img class="w-full md:w-4/5 z-50" src="assets/images/sheep/funny.png" />
        </div>
      </div>
    </div>
    <div class="relative -mt-12 lg:-mt-24">
      <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
            <path
              d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
              opacity="0.100000001"
            ></path>
            <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
          </g>
          <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path
              d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
            ></path>
          </g>
        </g>
      </svg>
      
      <div id="fitur-website" class="fitur-website">
          <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            Fitur Wesite
          </h2>
    <section class="grid">
      <div class="col-6_sm-12 bg-image bg-1 tall-50"></div>
      <div class="col-6_sm-12-middle padded">
          <h2>Dashboard</h2>
          <p>"Pada bagian dashboard, terdapat informasi mengenai jumlah keseluruhan domba, jumlah domba jantan, dan jumlah domba betina. Selain itu, terdapat grafik yang menunjukkan jumlah domba bunting dan domba tidak bunting, dengan rekapitulasi per bulan dan per tahun."</p>
      </div>
  </section>

  <section class="grid flex-flip-sm">
      <div class="col-6_sm-12-middle padded">
          <h2>Data Domba</h2>
          <p>"Pada bagian data domba, terdapat fitur CRUD untuk menambah data domba. Setelah data ditambahkan, informasi tersebut akan ditampilkan seperti pada gambar berikut."</p>
      </div>
      <div class="col-6_sm-12 bg-image bg-2 tall-50"></div>
  </section>

  <section class="grid">
      <div class="col-6_sm-12 bg-image bg-3 tall-50 hide-sm"></div>
      <div class="col-6_sm-12-middle padded">
          <h2>Pemeriksaan Awal</h2>
          <p>"Pada bagian pemeriksaan awal, terdapat fitur CRUD untuk menambahkan kondisi fisik domba."</p>
      </div>
  </section>

  <section class="grid flex-flip-sm">
      <div class="col-6_sm-12-middle padded">
          <h2>Tanda Vital</h2>
          <p>"Pada bagian tanda vital, terdapat fitur CRUD untuk menambahkan kondisi vital domba."</p>
      </div>
      <div class="col-6_sm-12 bg-image bg-4 tall-50"></div>
  </section>

  <section class="grid">
      <div class="col-6_sm-12 bg-image bg-5 tall-50 hide-sm"></div>
      <div class="col-6_sm-12-middle padded">
          <h2>Radiologi</h2>
          <p>"Pada bagian radiologi, akan ditentukan apakah domba bunting atau tidak, serta dapat menambahkan foto hasil USG domba."</p>
      </div>
  </section>
      </div>

      <div id="fitur-mobile" class="fitur-website">
        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            Fitur Mobile
        </h2>
    
        <section class="flex flex-col md:flex-row items-center">
            <div class="w-full md:w-1/2 bgm-image bgm-1"></div>
            <div class="w-full md:w-1/2 p-4">
                <h2>Dashboard</h2>
                <p>"Pada bagian dashboard, terdapat informasi mengenai jumlah domba jantan, jumlah domba betina, dan data domba yang ditampilkan."</p>
            </div>
        </section>
    
        <section class="flex flex-col md:flex-row-reverse items-center">
            <div class="w-full md:w-1/2 bgm-image bgm-2"></div>
            <div class="w-full md:w-1/2 p-4">
                <h2>Data Domba</h2>
                <p>"Pada bagian data domba, terdapat fitur CRUD untuk menambah data domba."</p>
            </div>
        </section>
    
        <section class="flex flex-col md:flex-row items-center">
            <div class="w-full md:w-1/2 bgm-image bgm-3"></div>
            <div class="w-full md:w-1/2 p-4">
                <h2>Pemeriksaan Awal</h2>
                <p>"Pada bagian pemeriksaan awal, akan ditampilkan data pemeriksaan yang telah ditambahkan melalui website."</p>
            </div>
        </section>
    
        <section class="flex flex-col md:flex-row-reverse items-center">
            <div class="w-full md:w-1/2 bgm-image bgm-4"></div>
            <div class="w-full md:w-1/2 p-4">
                <h2>Tanda Vital</h2>
                <p>"Pada bagian tanda vital, akan ditampilkan data vital yang telah ditambahkan melalui website."</p>
            </div>
        </section>
    
        <section class="flex flex-col md:flex-row items-center">
            <div class="w-full md:w-1/2 bgm-image bgm-5"></div>
            <div class="w-full md:w-1/2 p-4">
                <h2>Radiologi</h2>
                <p>"Pada bagian radiologi, akan ditampilkan data radiologi yang telah ditambahkan melalui website."</p>
            </div>
        </section>

        <section class="flex flex-col md:flex-row-reverse items-center">
          <div class="w-full md:w-1/2 bgm-image bgm-6"></div>
          <div class="w-full md:w-1/2 p-4">
              <h2>QR CODE</h2>
              <p>"Fitur QR code ini digunakan untuk memindai barcode domba dan menampilkan data domba sesuai dengan barcode yang dipindai."</p>
          </div>
      </section>


    </div>

    <footer>
      <div class="footer-container">
        <div class="footer-section about">
          <h2>Tentang Kami</h2>
          <p>Website ini menyediakan sistem cerdas untuk analisis data USG domba, membantu peternak dan dokter hewan dengan solusi yang akurat dan terpercaya.</p>
        </div>
        <div class="footer-section links">
          <h2>Tautan Cepat</h2>
          <ul>
            <li><a href="#home">Beranda</a></li>
            <li><a href="#features">Fitur</a></li>
            <li><a href="#contact">Kontak</a></li>
            <li><a href="#faq">FAQ</a></li>
          </ul>
        </div>
        <div class="footer-section contact">
          <h2>Hubungi Kami</h2>
          <p>Email: <a href="mailto:info@example.com"></a></p>
          <p>Telepon:</p>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2024 Intelligent System Ultrasonographi | All Rights Reserved</p>
      </div>
    </footer>                
                <script>
                    var scrollpos = window.scrollY;
                    var header = document.getElementById("header");
                    var navcontent = document.getElementById("nav-content");
                    var navaction = document.getElementById("navAction");
                    var brandname = document.getElementById("brandname");
                    var toToggle = document.querySelectorAll(".toggleColour");
              
                    document.addEventListener("scroll", function () {

                      scrollpos = window.scrollY;
              
                      if (scrollpos > 10) {
                        header.classList.add("bg-white");
                        navaction.classList.remove("bg-white");
                        navaction.classList.add("gradient");
                        navaction.classList.remove("text-gray-800");
                        navaction.classList.add("text-white");
                        
                        for (var i = 0; i < toToggle.length; i++) {
                          toToggle[i].classList.add("text-gray-800");
                          toToggle[i].classList.remove("text-white");
                        }
                        header.classList.add("shadow");
                        navcontent.classList.remove("bg-gray-100");
                        navcontent.classList.add("bg-white");
                      } else {
                        header.classList.remove("bg-white");
                        navaction.classList.remove("gradient");
                        navaction.classList.add("bg-white");
                        navaction.classList.remove("text-white");
                        navaction.classList.add("text-gray-800");
                        
                        for (var i = 0; i < toToggle.length; i++) {
                          toToggle[i].classList.add("text-white");
                          toToggle[i].classList.remove("text-gray-800");
                        }
              
                        header.classList.remove("shadow");
                        navcontent.classList.remove("bg-white");
                        navcontent.classList.add("bg-gray-100");
                      }
                    });
                  </script>
                  <script>
              
                    var navMenuDiv = document.getElementById("nav-content");
                    var navMenu = document.getElementById("nav-toggle");
              
                    document.onclick = check;
                    function check(e) {
                      var target = (e && e.target) || (event && event.srcElement);
              
                      
                      if (!checkParent(target, navMenuDiv)) {
                       
                        if (checkParent(target, navMenu)) {
                          
                          if (navMenuDiv.classList.contains("hidden")) {
                            navMenuDiv.classList.remove("hidden");
                          } else {
                            navMenuDiv.classList.add("hidden");
                          }
                        } else {
                          
                          navMenuDiv.classList.add("hidden");
                        }
                      }
                    }
                    function checkParent(t, elm) {
                      while (t.parentNode) {
                        if (t == elm) {
                          return true;
                        }
                        t = t.parentNode;
                      }
                      return false;
                    }
                  </script>
                </body>
              </html>
              

    
    
