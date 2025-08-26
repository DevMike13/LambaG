<x-filament-panels::page>
    <wireui:scripts />
    @livewireStyles
    @livewireScripts
    @vite(['resources/css/custom.css', 'resources/css/app.css', 'resources/js/app.js'])

    <livewire:pages.dashboard />

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
        
    
        // Initialize Firebase app and database
        const app = initializeApp(firebaseConfig);

        const database = getDatabase(app);
    
        // Listen for real-time updates on Temperature
        const tempRef = ref(database, '/Temperature/SensorValue');
        onValue(tempRef, (snapshot) => {
            const temperature = snapshot.val();
            console.log('Temperature: ', temperature);
            Livewire.dispatch('updateTemperature', { temperature: temperature});
        });

        // Listen for real-time updates on Humidity
        const humidRef = ref(database, '/Humidity/SensorValue');
        onValue(humidRef, (snapshot) => {
            const humidity = snapshot.val();
            console.log('Humidity: ', humidity);
            Livewire.dispatch('updateHumidity', { humidity: humidity});
        });

        // Listen for real-time updates on Liquid Temp
        const liquidTempRef = ref(database, '/LiquidTemp/SensorValue');
        onValue(liquidTempRef, (snapshot) => {
            const liquidTemp = snapshot.val();
            console.log('Liquid Temperature: ', liquidTemp);
            Livewire.dispatch('updateLiquidTemp', { liquidTemp: liquidTemp});
        });
        
        // Listen for real-time updates on Alcohol Level
        const alcoholLevelRef = ref(database, '/AlcoholLevel/SensorValue');
        onValue(alcoholLevelRef, (snapshot) => {
            const alcohol = snapshot.val();
            console.log('Alcohol Level: ', alcohol);
            Livewire.dispatch('updateAlcohol', { alcohol: alcohol});
        });

        // Listen for real-time updates on Brix
        const brixRef = ref(database, '/Brix/SensorValue');
        onValue(brixRef, (snapshot) => {
            const brix = snapshot.val();
            console.log('Brix: ', brix);
            Livewire.dispatch('updateBrix', { brix: brix});
        });

        // Listen for real-time updates on pH Level
        const pHLevelRef = ref(database, '/pHLevel/SensorValue');
        onValue(pHLevelRef, (snapshot) => {
            const pHLevel = snapshot.val();
            console.log('pH Level: ', pHLevel);
            Livewire.dispatch('updatePHLevel', { pHLevel: pHLevel});
        });

        // Listen for real-time updates on Liquid Level
        const liquidLevelRef = ref(database, '/LiquidLevel/SensorValue');
        onValue(liquidLevelRef, (snapshot) => {
            const liquidLevel = snapshot.val();
            console.log('Liquid Level: ', liquidLevel);
            Livewire.dispatch('updateLiquidLevel', { liquidLevel: liquidLevel});
        });
        
    </script>
    <script>
        window.addEventListener('reload', event => {
            window.location.reload();
        })
    </script>
</x-filament-panels::page>
