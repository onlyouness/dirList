<section class="w-full first_section "  >
    <div class="relative z-10 h-full w-4/5 mx-auto text-white ">
        <div class="flex justify-center items-center gap-5 flex-col h-full">
            <div class="banner-title  flex justify-center items-center gap-3 flex-col">
                <h1 class=" text-4xl text-center  ">{{$sections->where("id",1)->first()->translated_header}}</h1>
                <p class="text-center">{{$sections->where("id",1)->first()->translated_description}}</p>
            </div>
            <script>
                ScrollReveal().reveal(".banner-title", {
        delay: 200,
        distance: "20px",
        origin: "top",
        easing: "ease-out",
        reset: true,
      });
            </script>
            <div class="w-full max-w-5xl">
                

<form
method="POST"
id="searchForm"
action="/searchList"
 class=" w-full mx-auto flex justify-center flex-col lg:flex-row items-center gap-2 bg-gray-800 bg-opacity-30 rounded-lg py-4 px-2">
    @csrf
 <div class=" lg:w-1/3 w-full">


      <input type="text"  name="searchItem" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="{{$webText->where("id",1)->first()->translated_custom_text}}"  />
    </div>
    <div class="flex items-center w-full lg:w-3/5 justify-center flex-col lg:flex-row  gap-4 lg:gap-0">
  <div class="w-full lg:w-9/12">

      {{-- <input type="text" name="locationItem" class="shadow-sm  bg-gray-50 border lg:w-full border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block {{getSessionLanguage() == "ar" ? 'lg:rounded-l-none'  : 'lg:rounded-r-none'}} w-full p-2.5 lg:border" placeholder="{{$webText->where("id",470)->first()->translated_custom_text}}"  /> --}}
      <select name="locationItem" id="" class=" bg-gray-50 border lg:w-full border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block {{getSessionLanguage() == "ar" ? 'lg:rounded-l-none'  : 'lg:rounded-r-none'}} w-full p-2.5 lg:border">
        <option selected  value="all">{{$webText->where("id",3)->first()->translated_custom_text}}</option>
        @foreach ($locations as $location)
        <option value="{{$location->id}}">{{$location->location}}</option>
        @endforeach
      </select>
    </div>

   
    <button type="submit"   class="text-white flex justify-center items-center gap-2 bg-secondary lg:w-4/12  w-full  focus:ring-4 focus:outline-none   rounded-lg text-sm px-5 py-3 text-center {{getSessionLanguage() == "ar" ? 'lg:rounded-r-none'  : 'lg:rounded-l-none'}}  ">
      <div role="status" id="loadingSearchBtn" class="hidden">
        <svg aria-hidden="true"
            class="inline w-5 h-5 text-gray-300 animate-spin  fill-blue-600"
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
      <span class="btnSearchContent"><i class="fa-solid fa-magnifying-glass"></i> {{$webText->where("id",4)->first()->translated_custom_text}}</span></button>
  
    </div>
  
</form>

<script>

</script>
  

            </div>
        </div>

    </div>
    
</section>

{{-- Locations --}}

<section style="width: clamp()" class="my-5 mx-auto w-4/5 ">
    <article class="flex gap-3 flex-col pb-6 location-title">
        <h1 class=" text-4xl text-gray-700 text-center">{{$sections->where("id",5)->first()->translated_header}}</h1>
        <p class="text-center text-gray-600">{{$sections->where("id",1)->first()->translated_description}}</p>
        
    </article>

    <article class="my-5">
        <div class="grid mobile:grid-cols-2 sm:grid-cols-1 lg:grid-cols-3 gap-5">
            @foreach ($locations as $location)
            <div class="locationParent locationContent">
                <div class="locationChild " style="background-image: url({{asset($location->image)}})">
                    <div class="text-white  h-full relative z-50 flex justify-center items-center">
                        <div  class="flex  justify-center items-center  flex-col">
                            <?php
                            $list = $location->listings->where("location_id",$location->id);
                           
                            ?>
                            <h1 class=" text-2xl">{{count($list)}}</h1>
                            <div class="flex justify-center items-center gap-3">
                                <i class="fa-solid fa-location-dot"></i>
                            <h1 class=" text-xl font-light">{{$location->translated_location}}</h1>

                            </div>
                            
                            
                        </div>

                    </div>
                </div>

            </div>
                
            @endforeach
        </div>
    </article>
<script>
            ScrollReveal().reveal(".location-title", {
                    delay: 200,
                    distance: "20px",
                    origin: "top",
                    easing: "ease-out",
                    reset: false,
            });
            ScrollReveal().reveal(".locationContent",{
                    delay: 200,
                    distance: "20px",
                    origin: "left",
                    easing: "ease-out",
                    reset: true,
            });
        </script>
</section>
<section class="bg-gray-50 my-10">
    <div class="w-4/5  mx-auto py-10  ">
      <div class="mb-7">
        <div class="  flex justify-center items-center gap-3 flex-col">
          <h1 class=" text-4xl text-center text-gray-600  ">{{$sections->where("id",4)->first()->translated_header}}</h1>
          <p class="text-center text-gray-500">{{$sections->where("id",4)->first()->translated_description}}</p>
      </div>

      </div>
      <div class="swiper ">
        <div class="swiper-wrapper h-4/5 w-1/2 px-5">
          @foreach ($categories as $category)
          <div class="swiper-slide">
            <a href="">
            <div class="containerSlide flex justify-center items-center flex-col gap-4">
              <i class="{{$category->icon}} bg-gradient-to-r text-transparent bg-clip-text from-blue-300 to-blue-600 text-4xl"></i>
              <h1 class="text-base font-medium">{{$category->name}}</h1>

            </div></a>
          </div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
  
        <!-- If we need navigation buttons -->
        {{-- <div class="swiper-button-prev"></div> --}}
        {{-- <div class="swiper-button-next"></div> --}}
      </div>
    
    </div>
  </section>
<script>
    const swiper = new Swiper(".swiper", {
      // Optional parameters
      // direction: "vertical",
      loop: true,
      // effect: "coverflow",
      spaceBetween: 10,
      autoplay:{
        delay:3000,
      },
      // freeMode:{
      //   enabled:true,
      //   sticky:true,
      // },
      // slidesPerView: 3,
      speed:400,
      // slidesPerGroup:2,
      breakpoints:{

        1024:{
          slidesPerView:4,
        },
        320:{
          slidesPerView:2,
        },
      },
   
  

      

      // If we need pagination
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      mousewheel: {
        invert: true,
      },

      // Navigation arrows
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
{{-- end Locations --}}




{{-- Featured Listings --}}
<section class="my-10">
  <div>
    <div class="banner-title  flex justify-center items-center gap-3 flex-col">
      <h1 class=" text-4xl text-center  ">{{$sections->where("id",6)->first()->translated_header}}</h1>
      <p class="text-center">{{$sections->where("id",6)->first()->translated_description}}</p>
  </div>
  </div>
</section>


{{-- End Featured Listings --}}