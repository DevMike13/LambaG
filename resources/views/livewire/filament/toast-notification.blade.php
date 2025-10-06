<div 
    x-data="{ 
        show: @entangle('show'), 
        type: @entangle('type'),
        countdown: 10,
        startCountdown() {
            this.countdown = 10
            let interval = setInterval(() => {
                if (this.countdown > 1) {
                    this.countdown--
                } else {
                    clearInterval(interval)
                    this.show = false // auto-close after reaching 0
                }
            }, 1000)
        }
    }" 
    x-show="show"
    x-effect="if (show) { startCountdown() }"
    class="fixed inset-0 flex items-center justify-center z-[9999]"
>
    <div 
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 scale-95"
        class="text-white px-6 py-3 rounded-lg shadow-lg text-lg flex flex-col items-center relative"
        :style="{
            backgroundColor: type === 'error' ? '#b91c1c' : '#06402a'
        }"
    >
        <!-- Close button -->
        <button 
            @click="show = false" 
            class="absolute top-2 right-2 text-white hover:text-gray-200 focus:outline-none"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="flex items-center space-x-2 gap-2 px-8">
            <!-- Success Icon -->
            <template x-if="type === 'success'">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </template>

            <!-- Error Icon -->
            <template x-if="type === 'error'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>                  
            </template>

            <span style="margin-left: 10px">{{ $message }}</span>
        </div>

        <span class="text-sm text-gray-200 mt-1">Closing in <span x-text="countdown"></span>s</span>
    </div>
</div>



<script type="module">
    import { initializeApp } from 'https://www.gstatic.com/firebasejs/10.14.1/firebase-app.js'

    import { getAuth } from 'https://www.gstatic.com/firebasejs/10.14.1/firebase-auth.js'
    import { getFirestore } from 'https://www.gstatic.com/firebasejs/10.14.1/firebase-firestore.js'
    import { getDatabase, ref, onValue } from 'https://www.gstatic.com/firebasejs/10.14.1/firebase-database.js';
    
    // Initialize Firebase (replace with your Firebase config)
    var apiKey = "{{ env('API_KEY_FRB')}}";
    var authDomain = "{{ env('AUTH_DOMAIN')}}";
    var databaseURL = "https://lambag-9007f-default-rtdb.asia-southeast1.firebasedatabase.app";
    var projectId = "{{ env('PROJECT_ID_FRB') }}";
    var storageBucket = "{{ env('STORAGE_BUCKET_FRB') }}";
    var messagingSenderId = "{{ env('MESSAGING_SENDER_ID_FRB') }}";
    var appId = "{{ env('APP_ID_FRB') }}";
   
    // Initialize Firebase (replace with your Firebase config)
    const firebaseConfig = {
        apiKey: apiKey,
        authDomain: authDomain,
        databaseURL: databaseURL,
        projectId: projectId,
        storageBucket: storageBucket,
        messagingSenderId: messagingSenderId,
        appId: appId
    };
    
    const app = initializeApp(firebaseConfig);

    const database = getDatabase(app);
    const distillationRef = ref(database, "/System/DistillationStatus");
    const temperatureRef = ref(database, "/Temperature/SensorValue");

    onValue(distillationRef, (snapshot) => {
        if (snapshot.exists() && snapshot.val() === "Ready") {
            console.log('Status: ', snapshot.val());
            Livewire.dispatch('showToast', [{ message: 'Ready For Distillation' }]);
        }
    });

    onValue(temperatureRef, (snapshot) => {
        if (snapshot.exists()) {
            const temp = snapshot.val();
            console.log('Temperature: ', temp);

            if (temp > 30) { 
                // too hot
                Livewire.dispatch('showToast', [{
                    message: `Temperature is high: ${temp}°C`,
                    type: 'error'
                }]);
            } else if (temp < 20) {
                // too low
                Livewire.dispatch('showToast', [{
                    message: `Temperature is low: ${temp}°C`,
                    type: 'error'
                }]);
            }
        }
    });

</script>
