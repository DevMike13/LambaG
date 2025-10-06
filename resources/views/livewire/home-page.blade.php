<div class="flex flex-col md:flex-row w-full h-screen bg-gradient-to-r lg:pt-0 md:pt-10 bg-[#ffffff] overflow-hidden">
    <div class="w-full h-full flex flex-col lg:flex-row mx-auto">
        <div class="w-full lg:w-[70%] h-full flex flex-col justify-center px-5 md:px-16 gap-5 bg-[#ffffff] lg:rounded-r-3xl">
            <div class="w-16 h-24 flex mx-auto lg:hidden">
                <img src="{{ asset('/images/lambag-logo.png') }}" alt="logo" class="w-full h-auto">
            </div>
            <h1 class="font-bold text-4xl md:text-6xl text-[#797979] text-center lg:text-left">LAMBAG</h1>
            {{-- <h2 class="font-semibold text-xl text-white text-center lg:text-left">LAMBAG</h2> --}}
            <p class="text-[#797979] text-center lg:text-left">An IoT Web-based System for Real-Time Fermentation Monitoring and Alcohol Level Analysis with SMS Notification for Lambanog Production at Capistrano Distillery</p>
            <a href="{{ route('lambag.about') }}" class="mx-auto md:mx-0">
                <button type="button" class="py-2 px-8 uppercase rounded-full flex justify-center items-center text-sm font-medium text-white shadow-sm bg-[#4071f4] hover:bg-[#4071f4] disabled:opacity-50 disabled:pointer-events-none">
                   ABOUT
                </button>
            </a>
        </div>
        <div class="w-full lg:w-[30%] h-full lg:h-fit lg:my-auto lg:mx-5 lg:border-2 lg:border-black lg:rounded-2xl lg:shadow-lg flex flex-col py-5 lg:gap-8 justify-between items-center bg-[#ffffff] lg:bg-[#ffffff]">
            <div class="w-16 h-24 hidden lg:flex">
                <img src="{{ asset('/images/lambag-logo.png') }}" alt="logo" class="w-full h-auto">
            </div>
            <div class="flex flex-col justify-center items-center">
                <h1 class="text-2xl font-semibold text-[#797979] hidden lg:flex">LAMBAG</h1>
                <h2 class="text-md font-semibold text-[#797979] hidden lg:flex">WELCOME</h2>
                <div class="w-full max-w-full lg:max-w-60 flex flex-col lg:flex-col justify-center items-center mt-5 space-y-2">
                    <a href="lambag-admin/register" class="w-full">
                        <button type="button" class="w-full py-2 px-3 uppercase rounded-full flex justify-center items-center text-sm font-medium text-white shadow-sm bg-[#4071f4] hover:bg-[#4071f4] disabled:opacity-50 disabled:pointer-events-none">
                            SIGN UP
                        </button>
                    </a>
                    <a href="lambag-admin/login" class="w-full">
                        <button type="button" class="w-full py-2 px-3 uppercase rounded-full flex justify-center items-center text-sm font-medium text-white shadow-sm bg-[#4071f4] hover:bg-[#4071f4] disabled:opacity-50 disabled:pointer-events-none">
                            LOGIN
                        </button>
                    </a>
                </div>                         
            </div>
            <p class="text-[#797979] text-xs">© 2025 LAMBAG</p>
        </div>
    </div>
</div>
