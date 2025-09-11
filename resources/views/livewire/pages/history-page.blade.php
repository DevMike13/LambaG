<div class="flex flex-col md:flex-row w-full h-auto lg:h-screen bg-gradient-to-r lg:pt-0 md:pt-10 bg-[#d9d9d9]">
    <div class="w-full h-full flex flex-col lg:flex-row mx-auto">
        <div class="w-full lg:w-[30%] h-full flex flex-col px-5 py-5 md:py-8 md:px-10 gap-5 bg-[#6e8c80] lg:rounded-3xl relative">
            <a href="/">
                <h2 class="font-semibold text-4xl text-white text-center lg:text-left relative">CAPISTRANO</h2>
                <h2 class="font-semibold text-4xl text-white text-center lg:text-left -mt-1 relative">DISTILLERY</h2>
            </a>
            <div class="lg:absolute lg:top-1/2 lg:right-0 lg:-translate-y-1/2 lg:translate-x-[20%] rounded-xl w-full lg:w-[370px] mt-10">
                <img src="{{ asset('/images/family.png') }}" alt="" class="w-auto">
            </div>
        </div>
        <div class="w-full lg:w-[70%] h-full flex flex-col items-end py-10 lg:pr-10 lg:bg-[#d9d9d9]">
            <div class="h-fit lg:h-screen w-full lg:w-96 flex flex-col items-center lg:justify-between justify-center gap-10 lg:gap-0 px-10 lg:px-0">
                <div class="py-2 px-8 uppercase rounded-full flex justify-center items-center text-sm font-medium text-white shadow-sm bg-[#254e24] disabled:opacity-50 disabled:pointer-events-none">
                    HISTORY
                </div>
                <div class="w-full h-auto bg-[#6e8c80] px-5 py-5 rounded-3xl max-h-72 overflow-y-auto
                    [&::-webkit-scrollbar]:w-2
                    [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-track]:rounded-full
                    [&::-webkit-scrollbar-thumb]:bg-gray-300 [&::-webkit-scrollbar-thumb]:rounded-full
                    dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-track]:rounded-full
                    dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:[&::-webkit-scrollbar-thumb]:rounded-full">
                    <p class="text-center font-semibold">The lambanog production in Barangay Wakas, Tayabas, dates back to the 1960s when it
                        was initially produced by a single manufacturer. In 1983, Capistrano Distillery was founded
                        by the late Ireneo A. Capistrano, a graduate of BS Chemical Engineering, who saw the
                        potential in the business. The business continued to grow, and after Ireneo’s death in
                        1990, his wife took over the operations. It wasn’t until 1999 that various government
                        agencies began to aggressively help lambanog business owners. The Department of Trade
                        and Industry (DTI) initiated the Brand Development Program for Lambanog, inviting
                        distillers to participate. Only three, including Mallari, Buncayo, and Capistrano, completed
                        the program requirements. In 2021, unfortunately, Mrs. Isabelita O. Capistrano, has
                        passed away. Since then, Capistrano Distillery is being managed by her children.</p>
                </div>
                <a href="{{ route('lambag.about') }}" class="mx-auto md:mx-0">
                    <button type="button" class="py-2 px-8 uppercase rounded-full flex justify-center items-center text-sm font-medium text-white shadow-sm bg-[#254e24] hover:bg-[#c0dac1] disabled:opacity-50 disabled:pointer-events-none">
                       BACK
                    </button>
                </a>
                <p>© 2025 LAMBAG</p>
            </div>
           
        </div>
    </div>
</div>
