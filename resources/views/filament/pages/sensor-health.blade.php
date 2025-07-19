<x-filament-panels::page>
    <wireui:scripts />
    @livewireStyles
    @livewireScripts
    @vite(['resources/css/custom.css', 'resources/css/app.css', 'resources/js/app.js'])

    <livewire:pages.sensor-health-page />
    <x-dialog z-index="z-50" blur="md" align="center" />
    <script>
        window.addEventListener('reload', event => {
            window.location.reload();
        })
    </script>

    <script type="module">
        import { initializeApp } from 'https://www.gstatic.com/firebasejs/10.14.1/firebase-app.js'
        import { getAuth } from 'https://www.gstatic.com/firebasejs/10.14.1/firebase-auth.js'
        import { getFirestore } from 'https://www.gstatic.com/firebasejs/10.14.1/firebase-firestore.js'
        import { getDatabase, ref, onValue } from 'https://www.gstatic.com/firebasejs/10.14.1/firebase-database.js';

        var apiKey = "{{ env('API_KEY_FRB')}}";
        var authDomain = "{{ env('AUTH_DOMAIN')}}";
        var databaseURL = "https://lambag-9007f-default-rtdb.asia-southeast1.firebasedatabase.app";
        var projectId = "{{ env('PROJECT_ID_FRB') }}";
        var storageBucket = "{{ env('STORAGE_BUCKET_FRB') }}";
        var messagingSenderId = "{{ env('MESSAGING_SENDER_ID_FRB') }}";
        var appId = "{{ env('APP_ID_FRB') }}";

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

        // Alcohol Sensor
        const alcoholSensorRef = ref(database, 'SensorHealth/AlcoholSensor');
        onValue(alcoholSensorRef, (snapshot) => {
            const alcoholSensor = snapshot.val();
            console.log('Alcohol Sensor: ', alcoholSensor);
            Livewire.dispatch('updateAlcoholSensor', { alcoholSensor });
        });

        // Analog PH Sensor
        const analogPHSensorRef = ref(database, 'SensorHealth/AnalogPHSensor');
        onValue(analogPHSensorRef, (snapshot) => {
            const analogPHSensor = snapshot.val();
            console.log('Analog Sensor: ', analogPHSensor);
            Livewire.dispatch('updateAnalogPHSensor', { analogPHSensor });
        });

        // GSM Module
        const gsmModuleRef = ref(database, 'SensorHealth/GSMModule');
        onValue(gsmModuleRef, (snapshot) => {
            const GSMModule = snapshot.val();
            console.log('GSM Module: ', GSMModule);
            Livewire.dispatch('updateGSMModule', { GSMModule });
        });

        // Tem & Humid Sensor
        const tempHumidSensorRef = ref(database, 'SensorHealth/Temperature&HumiditySensor');
        onValue(tempHumidSensorRef, (snapshot) => {
            const TempHumidSensor = snapshot.val();
            console.log('Temp & Humid Sensor: ', TempHumidSensor);
            Livewire.dispatch('updateTempHumidSensor', { TempHumidSensor });
        });

        // Ultrasonic Sensor
        const ultrasonicSensorRef = ref(database, 'SensorHealth/UltrasonicSensor');
        onValue(ultrasonicSensorRef, (snapshot) => {
            const UltrasonicSensor = snapshot.val();
            console.log('Ultrasonic Sensor: ', UltrasonicSensor);
            Livewire.dispatch('updateUltrasonicSensor', { UltrasonicSensor });
        });

         // Waterproof
         const waterproofRef = ref(database, 'SensorHealth/Waterproof');
        onValue(waterproofRef, (snapshot) => {
            const WaterProof = snapshot.val();
            console.log('Waterproof: ', WaterProof);
            Livewire.dispatch('updateWaterProof', { WaterProof });
        });
    </script>
</x-filament-panels::page>
