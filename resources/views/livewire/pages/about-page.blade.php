<div class="flex flex-col md:flex-row w-full h-auto lg:h-screen bg-gradient-to-r lg:pt-0 md:pt-10 bg-[#d9d9d9]">
    <div class="w-full h-full flex flex-col lg:flex-row mx-auto">
        <div class="w-full lg:w-[30%] h-full flex flex-col px-5 py-5 md:py-8 md:px-10 gap-5 bg-[#6e8c80] lg:rounded-3xl relative">
            <a href="/">
                <h2 class="font-semibold text-4xl text-white text-center lg:text-left relative">CAPISTRANO</h2>
                <h2 class="font-semibold text-4xl text-white text-center lg:text-left -mt-1 relative">DISTILLERY</h2>
            </a>
            <div class="lg:absolute lg:top-1/2 lg:right-0 lg:-translate-y-1/2 lg:translate-x-[38%] bg-[#d9d9d9] p-2 rounded-xl lg:w-[550px] mt-10">
                <img src="{{ asset('/images/distillery.png') }}" alt="" class="w-auto">
            </div>
        </div>
        <div class="w-full lg:w-[70%] h-full flex flex-col items-end py-10 lg:pr-10 lg:bg-[#d9d9d9]">
            <div class="h-fit lg:h-screen w-full lg:w-96 flex flex-col items-center lg:justify-between justify-center gap-10 lg:gap-0 px-10 lg:px-0">
                <div class="py-2 px-8 uppercase rounded-full flex justify-center items-center text-sm font-medium text-white shadow-sm bg-[#254e24] disabled:opacity-50 disabled:pointer-events-none">
                    OUR STORY
                </div>
                <div class="w-full h-auto bg-[#6e8c80] px-5 py-5 rounded-3xl">
                    <p class="text-center font-semibold">Capistrano Distillery has been crafting Lambanog, a traditional Filipino distilled palm
                        liquor, since 1983. Founded by Ireneo A. Capistrano, a chemical engineer, the distillery
                        grew under the guidance of his family and gained recognition in the industry. Today,
                        Capistrano Distillery continues to uphold its legacy, and in 2024, Quezon lambanog was
                        named the 2nd best spirit in the world by TasteAtlas.com, bringing pride to the Philippines.</p>
                </div>
                <a href="{{ route('lambag.history') }}" class="mx-auto md:mx-0">
                    <button type="button" class="py-2 px-8 uppercase rounded-full flex justify-center items-center text-sm font-medium text-white shadow-sm bg-[#254e24] hover:bg-[#c0dac1] disabled:opacity-50 disabled:pointer-events-none">
                       LEARN MORE
                    </button>
                </a>
                <p>© 2025 LAMBAG</p>
            </div>
           
        </div>
    </div>
</div>
