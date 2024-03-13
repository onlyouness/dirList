<?php
// Models
$header_contact = App\Models\ContactUs::first();
$languages = App\Models\Language::all();
$menus = App\Models\Navigation::get();
$webText = App\Models\ManageText::all();
$notification = App\Models\NotificationText::all();
$sections = App\Models\HomeSection::all();
$locations= App\Models\Location::all();
$categories = App\Models\ListingCategory::all();
?>

<html lang="{{ getSessionLanguage() }}" @if (getSessionLanguage() == 'ar') dir="rtl" @else dir="ltr" @endif>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>DirList - Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('notifJs/notify.js') }}"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="node_modules/animejs/lib/anime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  



    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.scss') }}">
    <style>
            .swiper {
        /* width: 600px; */
        height: 180px;
      }
      .swiper-button-prev svg{
        fill: white;
      }
      .swiper-slide {
        /* background-color: rgb(140, 207, 252); */
        /* padding: 10px; */
      }
      .containerSlide {
        width: calc(100% - 20px); 
        /* margin-right: 20px; */
        /* height: 100%; */
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
      }
        .first_section{
            background-image: url("images/londonbg.jpg");
            height: 420px;
            background-size:cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }
        .first_section::before{
            content: '';
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            right: 0;
            z-index: 1;
            top: 0;
            background-color: rgba(105, 99, 255, 0.8);
        }

        ul li a i {
            color: #6963ff;
        }

        .right_header li a i {
            color: #6963ff;
            font-size: 13px;
            cursor: pointer;
        }

        .right_header li a i:hover {
            color: #5a54f8
        }

        ul li a i:hover {
            color: #5a54f8
        }
    </style>
</head>

<body>
    <header>
        <div class="w-full border-b border-gray-100 pb-3 bg-gray-50">
            <div class="mx-auto w-11/12 pt-3">


                <div class="flex items-center justify-between ">
                    <div class="flex items-center justify-center gap-6">
                        <ul class="flex gap-6">
                            <li class="facebookIcon"><a href="{{ $header_contact->facebook }}"><i
                                        class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="{{ $header_contact->twitter }}"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="{{ $header_contact->linkedin }}"><i class="fa-brands fa-linkedin-in"></i></a>
                            </li>
                            <li><a href="mailto:{{ $header_contact->topbar_email }}"><i
                                        class="fa-brands fa-google-plus-g"></i></a></li>
                        </ul>
                        <div class="drops">
                            {{-- Drop downs --}}
                            <div>
                                {{-- language dropDown Icon --}}
                                <div class="relative inline-block text-left">
                                    <div>
                                        <button onclick="openFunction()"
                                            class="lang hover:text-primaryHover focus:text-primaryHover text-gray-500">
                                            <span>{{ $menus->where('id', 17)->first()->translated_navbar }}</span>
                                            <i class=" fa-solid fa-caret-down"></i>
                                        </button>
                                    </div>
                                    <div>
                                        <div id="dropdown"
                                            class="w-40 bg-white absolute hidden z-10  right-0 shadow p-5"
                                            style="top:32px">
                                            <form action="/set-lang" method="POST" class="flex flex-col gap-2 m-0">
                                                @csrf
                                                @foreach ($languages as $lang)
                                                    <button name="action" class="text-gray-500 hover:text-primaryHover"
                                                        type="submit"
                                                        value="{{ $lang->code }}">{{ $lang->name }}</button>
                                                @endforeach
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function openFunction() {
                                        document.getElementById('dropdown').classList.toggle("hidden");
                                    }

                                    window.addEventListener("click", function(e) {
                                        var langDiv = document.querySelector('.lang');
                                        var dropDown = document.getElementById('dropdown')

                                        if (e.target !== langDiv && !langDiv.contains(e.target) && !dropDown.classList.contains("hidden")) {
                                            dropDown.classList.add('hidden')

                                        }
                                    })
                                </script>
                                {{-- end  of Language dropdown --}}
                            </div>
                        </div>
                    </div>
                    <div class="topbarLeft">
                        <ul class="flex gap-4 right_header text-gray-400 ">

                            <li class=""><button onclick="openRegister()" class="hover:text-primaryHover"><a
                                        href="javascript::void"><i class="fa-solid fa-user"></i><span
                                            class="text-sm ml-2 ">{{ $menus->where('id', 11)->first()->translated_navbar }}</span></a></button>
                            </li>
                            <li><button onclick="LoginModel()" type="button" class="login hover:text-primaryHover"><a
                                        href="javascript::void"><i class="fa-solid fa-arrow-right-to-bracket"></i><span
                                            class="text-sm hover:text-primaryHover ml-2">{{ $menus->where('id', 12)->first()->translated_navbar }}</span></a></button>
                            </li>
                            <li><button class="hover:text-primaryHover"><a href="javascript::void"><i
                                            class="fa fa-house-user"></i> <span
                                            class="text-sm ml-1 hover:text-primaryHover">{{ $menus->where('id', 10)->first()->translated_navbar }}</span>
                                    </a></button></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        {{-- Menu navbar Section --}}
        <section class="w-4/5 mx-auto my-2 sticky ">
            <nav class="bg-white border-gray-200 ">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <a href="/" class="flex navbar:order-1 order-2 items-center space-x-3 rtl:space-x-reverse">
                        {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" /> --}}
                        <span
                            class="self-center text-2xl text-logoColor font-semibold whitespace-nowrap ">Dirlist</span>
                    </a>
                    <div class="flex space-x-3 navbar:hidden navbar:space-x-0 rtl:space-x-reverse">
                        <button onclick="menuDrop()" class="langButton" data-collapse-toggle="navbar-cta" type="button"
                            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg navbar:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200  "
                            aria-controls="navbar-cta" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>
                    </div>
                    <span class="order-3 navbar:hidden"><a class="text-primary hover:text-primaryHover"
                            href="callto:{{ $header_contact->topbar_phone }}"><i
                                class="fa-solid fa-phone"></i></a></span>
                    <div class=" items-center order-4 justify-between hidden w-full  navbar:flex navbar:w-auto navbar:order-2"
                        id="navbar-cta">
                        <ul
                            class="flex flex-col font-medium p-4 navbar:p-0 mt-4 border border-gray-100 rounded-lg navbar:space-x-8 rtl:space-x-reverse navbar:flex-row navbar:mt-0 navbar:border-0 ">



                            <li>
                                <a href="#"
                                    class="block py-2 px-3 navbar:p-0 text-white bg-blue-700 rounded md:bg-transparent navbar:text-blue-700 "
                                    aria-current="page">{{ $menus->where('id', 1)->first()->translated_navbar }}</a>
                            </li>

                            <li>
                                <a href="#"
                                    class="block py-2 px-3 navbar:p-0 text-gray-900 rounded hover:bg-gray-100 navbar:hover:bg-transparent navbar:hover:text-blue-700  ">{{ $menus->where('id', 2)->first()->translated_navbar }}</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-3 navbar:p-0 text-gray-900 rounded hover:bg-gray-100 navbar:hover:bg-transparent navbar:hover:text-blue-700 ">{{ $menus->where('id', 3)->first()->translated_navbar }}</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-3 navbar:p-0 text-gray-900 rounded hover:bg-gray-100 navbar:hover:bg-transparent navbar:hover:text-blue-700 ">{{ $menus->where('id', 4)->first()->translated_navbar }}</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-3 navbar:p-0 text-gray-900 rounded hover:bg-gray-100 navbar:hover:bg-transparent navbar:hover:text-blue-700 ">{{ $menus->where('id', 7)->first()->translated_navbar }}</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-3 navbar:p-0 text-gray-900 rounded hover:bg-gray-100 navbar:hover:bg-transparent navbar:hover:text-blue-700 ">{{ $menus->where('id', 8)->first()->translated_navbar }}</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-3 navbar:p-0 text-gray-900 rounded hover:bg-gray-100 navbar:hover:bg-transparent navbar:hover:text-blue-700 ">{{ $menus->where('id', 5)->first()->translated_navbar }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <script>
                function menuDrop() {
                    document.getElementById('navbar-cta').classList.toggle("hidden");
                }
            </script>




        </section>

    </header>

    <section id="loginModel" class="bg-gray-50 hidden  ">
        <div
            class="flex fixed w-full  z-40 bg-black  bg-opacity-20 top-0 left-0 flex-col items-center justify-start px-6 py-8 mx-auto md:h-screen lg:py-0">

            <div id="logOp" class=" w-full relative  bg-white  rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0  ">
                <div id="divReveal" class="p-6 loginDiv  space-y-4 md:space-y-6 sm:p-8">
                    <button onclick="LoginModel()" style="top:2.5rem"
                        class="absolute top-8 {{ getSessionLanguage() == 'ar' ? 'left-8' : 'right-8' }}"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <h1 style="margin:0"
                        class="text-xl font-bold m-0 leading-tight tracking-tight text-gray-900 md:text-2xl ">
                        {{ $webText->where('id', 1713)->first()->translated_custom_text }}
                    </h1>

                    <form class="space-y-4 md:space-y-6" id="loginSubmitForm">

                        @csrf
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 ">{{ $webText->where('id', 38)->first()->translated_custom_text }}</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="name@gmail.com" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 ">{{ $webText->where('id', 61)->first()->translated_custom_text }}</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                required="">
                        </div>
                        <div class="flex items-center justify-between">

                            <button onclick="openRegister()">
                                <a href="javascript::void"
                                    class="text-sm font-medium text-primary-600 hover:underline ">{{ $menus->where('id', 13)->first()->translated_navbar }}?</a>
                            </button>
                        </div>
                        <button type="submit" id=""
                            class="w-full flex justify-center items-center gap-5 text-white bg-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                            <div role="status" id="loadingBtn" class="hidden">
                                <svg aria-hidden="true"
                                    class="inline w-6 h-6 text-gray-300 animate-spin  fill-blue-600"
                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                        fill="currentColor" />
                                    <path
                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                        fill="currentFill" />
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                            <span class="spanBtn">{{ $menus->where('id', 12)->first()->translated_navbar }}</span>
                        </button>
                        <p class="text-sm font-light text-gray-500 ">
                            {{ $webText->where('id', 1711)->first()->translated_custom_text }} <button onclick="openRegister()"><a
                                    href="#"
                                    class="font-medium text-primary-600 hover:underline dark:text-primary-500">{{ $menus->where('id', 11)->first()->translated_navbar }}</a></button>
                        </p>

                        <?php
                        $notify1 = $notification->where('id', 26)->first()->custom_text;
                        $notify = [
                            'message' => $notify1,
                            'type' => 'normal',
                        ];
                        
                        ?>
                        {{-- <button id="testBtn" onclick="testFun()" type="button">Click</button> --}}

                        <script type="text/javascript">
                            function testFun() {
                                // var  notifyArea = <?php echo json_encode($notify); ?>;   
                                console.log(notifyArea);
                                sessionStorage.setItem("notification", JSON.stringify(notifyArea));
                                //call the function notification
                                showNotification();
                            }
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <section id="registerModel" class="bg-gray-50 hidden  ">
        <div
            class="flex fixed w-full z-40 bg-black  bg-opacity-20 top-0 left-0 flex-col items-center justify-start px-6 py-8 mx-auto md:h-screen lg:py-0">

            <div id="logOp" class="w-full relative  bg-white  rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0  ">
                <div  class="p-6 loginDiv space-y-4 md:space-y-6 sm:p-8">
                    <button onclick="openRegister()" style="top:2.5rem"
                        class="absolute top-8 {{ getSessionLanguage() == 'ar' ? 'left-8' : 'right-8' }}"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <h1 style="margin:0"
                        class="text-xl font-bold m-0 leading-tight tracking-tight text-gray-900 md:text-2xl ">
                        {{ $webText->where('id', 13)->first()->translated_custom_text }}
                    </h1>

                    <form class="space-y-4 md:space-y-6" id="registerSubmitForm">

                        @csrf
                        <div>
                            <label for="nameRegister"
                                class="block mb-2 text-sm font-medium text-gray-900 ">{{ $webText->where('id', 37)->first()->translated_custom_text }}</label>
                            <input type="text" name="name" id="nameRegister"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="John Gish" >
                                <span class="text-red-500 ml-2 name"></span>
                            <span>
                               
                               
                            
                            </span>
                        </div>
                        <div>
                            <label for="emailRegister"
                                class="block mb-2 text-sm font-medium text-gray-900 ">{{ $webText->where('id', 38)->first()->translated_custom_text }}</label>
                            <input type="email" name="email" id="emailRegister"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="name@gmail.com" >
                                <span class=" text-red-500 ml-2 email"></span>
                        </div>
                        <div>
                            <label for="passwordRegister"
                                class="block mb-2 text-sm font-medium text-gray-900 ">{{ $webText->where('id', 61)->first()->translated_custom_text }}</label>
                            <input type="password" name="password" id="passwordRegister" placeholder="••••••••"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                >
                                <span class=" text-red-500 ml-2 password"></span>
                        </div>
                        
                        <button type="submit" 
                            class="w-full flex justify-center items-center gap-5 text-white bg-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                            <div role="status" id="loadingReBtn" class="hidden">
                                <svg aria-hidden="true"
                                    class="inline w-6 h-6 text-gray-300 animate-spin  fill-blue-600"
                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                        fill="currentColor" />
                                    <path
                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                        fill="currentFill" />
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                            <span class="spanReBtn">{{ $menus->where('id', 11)->first()->translated_navbar }}</span>
                        </button>
                     

                        <?php
                        $notify1 = $notification->where('id', 26)->first()->custom_text;
                        $notify = [
                            'message' => $notify1,
                            'type' => 'normal',
                        ];
                        
                        ?>
                        {{-- <button id="testBtn" onclick="testFun()" type="button">Click</button> --}}

                        <script type="text/javascript">
                            function testFun() {
                                // var  notifyArea = <?php echo json_encode($notify); ?>;   
                                console.log(notifyArea);
                                sessionStorage.setItem("notification", JSON.stringify(notifyArea));
                                //call the function notification
                                showNotification();
                            }
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </section>


    
        @include('userIdex.content')
    


    {{-- register --}}


    <script>
        function openRegister() {
            console.log("open the register")
            document.getElementById("registerModel").classList.toggle("hidden")
            document.getElementById('loginModel').classList.addClass('hidden');


        }
    </script>







    <script>
        function LoginModel() {

            document.getElementById('loginModel').classList.toggle('hidden');
            // document.getElementById('divReveal').classList.toggle('loginReveal');
            var logOp = document.getElementById('logOp');
            if (!loginModel.classList.contains("hidden")) {
                logOp.classList.remove("opacity-0");
                logOp.classList.add("opacity-100");
                logOp.classList.add("transition-all");
                loginModel.classList.add("transition-all");
            }

        }
        ScrollReveal().reveal(".loginReveal", {
        delay: 300,
        // opacity:1,
        distance: "20px",
        origin: "top",
        easing: "ease-out",
        reset: true,
      });




        window.onclick = function(e) {
            var langDiv = document.querySelector('.login')
            var loginModel = document.getElementById('loginModel')
            var loginDiv = document.querySelector('.loginDiv');

            if (!loginDiv.contains(e.target) && !langDiv.contains(e.target)) {
                if (!loginModel.classList.contains("hidden")) {
                    loginModel.classList.add('hidden')
                }
            }
        }
    </script>



    <?php
    $notify2 = $notification->where('id', 26)->first()->custom_text;
    $notify3 = [
        'message' => $notify2,
        'type' => 'success',
    ]; ?>
    <script>
        $(document).ready(function() {
            console.log("submited")
            $("#loginSubmitForm").on("submit", function(e) {
                if ($("#loadingBtn").hasClass("hidden")) {
                    $("#loadingBtn").removeClass("hidden")
                    $(".spanBtn").toggleClass("opacity-80")
                } else {
                    $("#loadingBtn").addClass("hidden");

                }
                e.preventDefault();
                console.log("submit")
                var form = document.getElementById("loginSubmitForm");


                console.log()
                $.ajax({
                    url: "/login",
                    type: "post",
                    data: $("#loginSubmitForm").serialize(),
                    success: function(response) {
                       
                        if(response.success){
                            console.log('sucessfully signed', response)
                            //  var notifyArea = <?php echo json_encode($notify3); ?>;
                            var notifyArea = response.success;
                            console.log(notifyArea[0])
                        
                        var url = "/user/dashboard/?message=" + encodeURIComponent(notifyArea[0]) +
                            "&type=" + encodeURIComponent(notifyArea[1]);
                            console.log(url)
                        
                        window.location.href = url;
                            
                        }
                        if(response.error){
                            if ($(" #loadingBtn ").hasClass("hidden ")) {
                                $("#loadingBtn").removeClass("hidden")
                            } else {
                                $("#loadingBtn").addClass("hidden");
                                $(".spanBtn").toggleClass("opacity-80")
                                $("#password").val("")

                                }
                                showNotification(response.errorP)
                                            
                        }
                        if(response.errorP){
                            console.log('the user unsigned', response.errorP)
                            
                            if ($(" #loadingBtn ").hasClass("hidden ")) {
                                $("#loadingBtn").removeClass("hidden")
                            } else {
                                $("#loadingBtn").addClass("hidden");
                                $(".spanBtn").toggleClass("opacity-80")
                                $("#password").val("")

                                }
                                showNotification(response.errorP)
                                            
                            
                        }
                        if(response.errorEmail){
                            if ($(" #loadingBtn ").hasClass("hidden ")) {
                                $("#loadingBtn").removeClass("hidden")
                            } else {
                                $("#loadingBtn").addClass("hidden");
                                $(".spanBtn").toggleClass("opacity-80")
                                $("#password").val("")

                                }
                                showNotification(response.errorEmail)
                        }

                    },
                    error:function(error){
                        console.error(error)

                    }
                })
            })


            // Register Submition:
            $("#registerSubmitForm").on("submit", function(e) {
               console.log( $("#loadingReBtn"))
                if ($("#loadingReBtn").hasClass("hidden")) {
                    $("#loadingReBtn").removeClass("hidden")
                    $(".spanReBtn").toggleClass("opacity-80")
                } else {
                    $("#loadingReBtn").addClass("hidden");

                }
                e.preventDefault();
                console.log(" Register submit")
                var form = document.getElementById("registerSubmitForm");


                console.log($("#registerSubmitForm").serialize())
                $( '.name' ).empty();
                        $( '.email' ).empty();
                        $( '.password' ).empty();
                $.ajax({
                    url: "/register",
                    type: "post",
                    data: $("#registerSubmitForm").serialize(),
                    
                    success: function(response) {

                       console.log(response)
                        if(response.success){
                            console.log('sucessfully signed', response)
                            //  var notifyArea = <?php echo json_encode($notify3); ?>;
                            var notifyArea = response.success;
                            console.log(notifyArea[0])
                        
                        var url = "/user/dashboard/?message=" + encodeURIComponent(notifyArea[0]) +
                            "&type=" + encodeURIComponent(notifyArea[1]);
                            console.log(url)
                        
                        window.location.href = url;
                            
                        }

                    },
                    error:function(error,response){
                        if ($("#loadingReBtn").hasClass("hidden")) {
                    $("#loadingReBtn").removeClass("hidden")
                    $(".spanReBtn").toggleClass("opacity-80")
                } else {
                    $("#loadingReBtn").addClass("hidden");

                }
                        console.error(error)
                       
                        console.log(error.responseJSON.errors[0])
                        $.each(error.responseJSON.errors,function(key,value){
                            
                            // var ErrorSpan = document.getElementsByClassName(key)
                            console.log("here is the element",$('.'+key));
                            $( '.' + key ).empty();
                            $( '.' + key ).text( value ) 

                        })
                        
                        

                    }
                })
            })
            $("#searchForm").on("submit",function(e){
                e.preventDefault();
                if ($("#loadingSearchBtn").hasClass("hidden")) {
                    $("#loadingSearchBtn").removeClass("hidden")
                    $(".btnSearchContent").toggleClass("opacity-80")
                } else {
                    $("#loadingSearchBtn").addClass("hidden");

                }
                $.ajax({
                    url:"/searchList",
                    type:"POST",
                    data:$(this).serialize(),
                    success:function(response){
                        console.log(response)
                        if(response.error){
                            if ($("#loadingSearchBtn").hasClass("hidden")) {
                                    $("#loadingSearchBtn").removeClass("hidden")
                                    $(".btnSearchContent").toggleClass("opacity-80")
                            } else {
                                    $("#loadingSearchBtn").addClass("hidden");
                                    $(".btnSearchContent").removeClass("opacity-80")
                                }
                            console.log(response.error)
                            showNotification(response.error)
                        }
                        if(response.success){
                            console.log(response.success)
                            if ($("#loadingSearchBtn").hasClass("hidden")) {
                                    $("#loadingSearchBtn").removeClass("hidden")
                                    $(".btnSearchContent").toggleClass("opacity-80")
                            } else {
                                    $("#loadingSearchBtn").addClass("hidden");
                                    $(".btnSearchContent").removeClass("opacity-80")
                                }
                            window.location = "/listings"
                        }
                    },
                    error:function(xhr,status,error){
                        if ($("#loadingReBtn").hasClass("hidden")) {
                    $("#loadingReBtn").removeClass("hidden")
                    $(".spanReBtn").toggleClass("opacity-80")
                } else {
                    $("#loadingReBtn").addClass("hidden");

                }
                        console.log(error);
                    }
                })

            })


        })
    </script>










</body>

</html>
