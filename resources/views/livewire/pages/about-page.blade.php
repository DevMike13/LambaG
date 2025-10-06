<div class="flex flex-col items-center w-full h-auto bg-gradient-to-r lg:pt-0 md:pt-10 bg-[#d9d9d9]">
    <div class="flex flex-col justify-center items-center w-full lg:max-w-[90%] py-16">
        <h1 class="font-bold">ABOUT US</h1>
        <div class="flex flex-col lg:flex-row justify-between items-center mt-14 gap-8 px-5 lg:px-0">
            <img src="{{ asset('/images/distillery.png') }}" alt="" class="lg:max-w-[350px] w-full">
            <p>Welcome to LambaG, a web-based IoT fermentation monitoring and automated regulation system designed for Lambanog production at Capistrano Distillery. The system integrates sensors, automation, and real-time data visualization to improve the accuracy, efficiency, and safety of traditional fermentation practices. With LambaG, key parameters such as pH level, alcohol vapor concentration, liquid temperature, ambient temperature and humidity, sugar content (°Bx), and liquid level are monitored and regulated, ensuring consistent quality in every batch. Capistrano Distillery, founded in 1983 by Ireneo A. Capistrano, a chemical engineer, has been producing authentic Lambanog for decades. Known for its dedication to tradition and quality, the distillery has become one of the most recognized names in Quezon. In 2024, Quezon Lambanog, represented by distilleries such as Capistrano, was named the 2nd best spirit in the world by TasteAtlas.com, bringing pride to the Philippines.</p>
        </div>
        <div class="flex flex-col lg:flex-row-reverse justify-between items-center mt-14 gap-8 px-5 lg:px-0">
            <img src="{{ asset('/images/distillery.png') }}" alt="" class="lg:max-w-[350px] w-full">
            <p>The owners of Capistrano Distillery also cooperated with our team during interviews, providing valuable insights and details that guided the design and completion of the LambaG project. <br><br> This project is the result of hard work, dedication, and collaboration. Our team worked tirelessly to research, design, and develop this system, overcoming challenges to make sure it provides practical solutions for Lambanog production. The effort poured into this project reflects our commitment not only to innovation and technology but also to supporting the heritage of local distilleries. LambaG represents the merging of tradition with modern technology, showing how teamwork and perseverance can turn ideas into reality.</p>
        </div>
        <div class="flex flex-col-reverse lg:flex-row mt-14 w-full relative px-5 lg:px-0">
            <div class="flex flex-col justify-start">
                <h3 class="font-semibold">LambaG Developers:</h3>
                <p>John Loyd Bolado</p>
                <p>Von Ryan Albos</p>
                <p>Raphael Mallari</p>

                <p><span class="font-semibold">Contact Us:</span> 09304137222 If you have any concerns, contact us at: <a href="mailto:lambagwebsite23@gmail.com">lambagwebsite23@gmail.com</a></p>
                <p>Copyright © 2025 <span class="font-semibold">LambaG</span></p>
            </div>
            <a href="{{ url()->previous() !== url()->current() ? url()->previous() : route('home') }}"
                class="lg:absolute lg:bottom-5 lg:right-5 mx-auto mb-5 lg:mx-0 lg:mb-0">
                 <button type="button" 
                     class="py-2 px-8 uppercase rounded-full flex justify-center items-center text-sm font-medium text-white shadow-sm bg-[#4071f4] hover:bg-[#4071f4] disabled:opacity-50 disabled:pointer-events-none">
                     BACK
                 </button>
            </a>
        </div>
        <p class="font-semibold text-xs mt-14">© 2025 LambaG</p>
    </div>
</div>
