<div>
    <div>
       {{-- <h1 class="text-2xl font-bold">1️⃣ Setting Up the Device</h1>
       <ol class="ml-10 mt-5">
            <li class="list-decimal font-semibold">Check the Power Supply</li>
            <ul class="ml-5 mt-3">
                <li class="list-[circle]">Make sure the 5V power adapter is plugged in and the indicator light on the device is ON.</li>
                <li class="list-[circle] mt-5">Verify that pumps, heater, and sensors are connected securely.</li>
            </ul>
            <li class="list-decimal mt-5 font-semibold">Check Solution Levels</li>
            <ul class="ml-5 mt-3">
                <li class="list-[circle]">Look at the small containers for:</li>
                    <ul class="ml-5 mt-3">
                        <li class="list-square">Phosphoric acid (for lowering pH)</li>
                        <li class="list-square">Potassium bicarbonate (for raising pH)</li>
                        <li class="list-square">Sugar syrup (for sugar adjustments)</li>
                    </ul>
                <li class="list-[circle] mt-3">Refill them if they’re low.</li>
            </ul>

            <li class="list-decimal mt-5 font-semibold">Turn On the Device</li>
                <ul class="ml-5 mt-3">
                    <li class="list-[circle]">Use the power switch (if installed) or simply plug it in.</li>
                    <li class="list-[circle] mt-5">Wait about 30 seconds for the system to boot and connect to the internet.</li>
                    <li class="list-[circle] mt-5">The GSM module will send an SMS if there’s no internet.</li>
                </ul>
       </ol> --}}
       <h1 class="text-2xl font-bold">1️⃣ Device Guide Power Supply</h1>
       <ol class="ml-10 mt-5">
            {{-- <li class="list-decimal font-semibold">Check the Power Supply</li> --}}
            <ul class="ml-5 mt-3">
                <li class="list-disc">The device is powered directly from an outlet using a 12V adapter (no battery).</li>
                <li class="list-disc mt-5">Turn <span class="font-semibold">ON/OFF switch</span> to turn the system on or off.</li>
            </ul>
            <li class="mt-5 font-semibold">Automatic Connection</li>
                <ul class="ml-5 mt-3">
                    <li class="list-disc">Once powered on, wait about <span class="font-semibold">3-5 seconds</span> for the system to boot.</li>
                    <li class="list-disc mt-5">It will automatically connect to Wi-Fi.</li>
                    <li class="list-disc mt-5">If no internet is detected, the <span class="font-semibold">GSM module</span> will send an SMS notification to both Admin and User warning that the device is offline.</li>
                </ul>

            <li class="mt-5 font-semibold">Real-Time Monitoring</li>
                <ul class="ml-5 mt-3">
                    <li class="list-disc">The device immediately begins sending data from the sensors:</li>
                    <ul class="ml-5 mt-3">
                        <li class="list-[circle] ml-5">pH Sensor (liquid acidity/alkalinity)</li>
                        <li class="list-[circle] ml-5 mt-5">DS18B20 (liquid temperature)</li>
                        <li class="list-[circle] ml-5 mt-5">DHT22 (ambient temperature & humidity)</li>
                        <li class="list-[circle] ml-5 mt-5">MQ-3 (alcohol vapor level)</li>
                        <li class="list-[circle] ml-5 mt-5">Refractometer Analog Brix Sensor(Brix Level)</li>
                        <li class="list-[circle] ml-5 mt-5">Ultrasonic Sensor (liquid level)</li>
                        <li class="list-[circle] ml-5 mt-5">Mini Heater (Regulate the liquid temperature)</li>
                    </ul>
                    <li class="list-disc mt-5">Mini water pumps are activated automatically for corrections (pH Up, pH Down, or Sugar Solution ).</li>
                    <li class="list-disc mt-5">A mini heater is also controlled automatically to regulate fermentation temperature.</li>
                </ul>

            <li class="mt-5 font-semibold">Solution Containers</li>
                <ul class="ml-5 mt-3">
                    <li class="list-disc">Three containers must always have enough solution:</li>
                    <ul class="ml-5 mt-3">
                        <li class="list-[circle] ml-5"><span class="font-semibold">Phosphoric Acid</span> → lowers pH.</li>
                        <li class="list-[circle] ml-5 mt-5"><span class="font-semibold">Potassium Bicarbonate</span> → raises pH.</li>
                        <li class="list-[circle] ml-5 mt-5"><span class="font-semibold">Sugar Solution</span> → increases sugar/Brix level.</li>
                    </ul>
                    <li class="list-disc mt-5">Each pump dispenses at —- for precise adjustments.</li>
                </ul>
       </ol>
       <h1 class="text-2xl font-bold mt-5">2️⃣ Web System Guide (Dashboard Access)</h1>
       <ol class="ml-10 mt-5">
            <li class="font-semibold">Login / Sign Up</li>
            <ul class="ml-5 mt-3">
                <li class="list-disc">Open any browser (Chrome, Edge, Safari) on phone or PC.</li>
                <li class="list-disc mt-5">Enter the provided web address. <br><br> <span class="text-blue-600 italic">https://lambag.online/</span></li>
                <li class="list-disc mt-5"><span class="font-semibold">New User:</span> Click Sign Up → Enter full name, email, mobile number, password, and agree to Data Privacy Policy.</li>
                <li class="list-disc mt-5"><span class="font-semibold">Existing User:</span> Click Login and enter your credentials.</li>
            </ul>
            <li class="mt-5 font-semibold">Dashboard Features</li>
            <li class="ml-5 mt-5 font-semibold">1. Parameters Monitoring</li>
            <ul class="ml-16 mt-3">
                <li class="list-[circle]">Displays real-time readings for pH, temperature, humidity, alcohol level, sugar (manual input), and liquid level.</li>
            </ul>

            <li class="ml-5 mt-5 font-semibold">2. Daily Records</li>
            <ul class="ml-16 mt-3">
                <li class="list-[circle]">Stores all readings with <span class="font-semibold">time and date stamps</span>.</li>
                <li class="list-[circle] mt-5">Admin can also <span class="font-semibold">export logs (PDF/Excel)</span> for analysis.</li>
            </ul>

            <li class="ml-5 mt-5 font-semibold">3. Operator Management (Admin Only)</li>
            <ul class="ml-16 mt-3">
                <li class="list-[circle]">Admins can add/remove operators.</li>
                <li class="list-[circle] mt-5">Operators help monitor the system but have limited access.</li>
            </ul>

            <li class="ml-5 mt-5 font-semibold">4. Threshold Customization (Admin Only)</li>
            <ul class="ml-16 mt-3">
                <li class="list-[circle]">Allows Admins to set <span class="font-semibold">upper and lower limits</span> for pH, temperature, humidity, sugar, and alcohol level.</li>
                <li class="list-[circle] mt-5">Regular users can only view these limits but cannot change them.</li>
            </ul>
            
            <li class="ml-5 mt-5 font-semibold">5. Sensor Health Status</li>
            <ul class="ml-16 mt-3">
                <li class="list-[circle]">Shows if each sensor is functioning normally.</li>
                <li class="list-[circle] mt-5">If “⚠️ Warning” appears → Check the wiring or replace the sensor.</li>
            </ul>

            <li class="ml-5 mt-5 font-semibold">6. Guide Section</li>
            <ul class="ml-16 mt-3">
                <li class="list-[circle]">Provides users with troubleshooting steps and basic instructions.</li>
            </ul>
        </ol>

        <h1 class="text-2xl font-bold mt-5">3️⃣ Using the Dashboard</h1>
        <ol class="ml-10 mt-5">
            <li class="font-semibold">a) Parameter Monitoring</li>
            <ul class="ml-5 mt-3">
                <li class="list-disc ml-5">Shows <b>pH</b>, <b>temperature</b>, <b>alcohol level</b>, <b>humidity</b>, <b>sugar content</b>, and <b>liquid level</b>.</li>
                <li class="list-disc mt-5 ml-5">Colors help you see status quickly:</li>
                    <ul class="ml-5 mt-3">
                        <li class="list-[circle] ml-5">🟢 Green = Normal</li>
                        <li class="list-[circle] ml-5 mt-5">🟡 Yellow = Close to limit</li>
                        <li class="list-[circle] ml-5 mt-5">🔴 Red = Out of range (alert)</li>
                    </ul>
            </ul>
            
            <li class="font-semibold mt-5">b) Daily Records</li>
            <ul class="ml-5 mt-3">
                <li class="list-disc ml-5">Tap <b>Daily Records</b> to see a list of previous readings with date and time.</li>
            </ul>

            <li class="font-semibold mt-5">c) Alerts & Notifications</li>
            <ul class="ml-5 mt-3">
                <li class="list-disc ml-5">If any parameter exceeds limits, you will:</li>
                <ul class="ml-5 mt-3">
                    <li class="list-[circle] ml-5">See a pop-up alert on the dashboard.</li>
                    <li class="list-[circle] ml-5 mt-5">Receive an SMS on your phone.</li>
                </ul>
            </ul>

            <li class="font-semibold mt-5">d) Sensor Health Status</li>
            <ul class="ml-5 mt-3">
                <li class="list-disc ml-5">Check if all sensors are working.</li>
                <li class="list-disc ml-5 mt-5">If you see <b>Warning</b>, inspect the wiring or replace the sensor.</li>
            </ul>
        </ol>

        <h1 class="text-2xl font-bold mt-5">4️⃣ Adjusting Thresholds (Admins Only)</h1>
        <ol class="ml-10 mt-5">
            <li class="list-decimal">Go to <b>Threshold Customization</b>.</li>
            <li class="list-decimal mt-5">Choose a parameter (pH, temperature, etc.).</li>
            <li class="list-decimal mt-5">Set the upper and lower limits, then click <b>Save</b>.</li>
            <li class="list-none mt-5">Regular Users can only view readings  they cannot change limits.</li>
       </ol>

        <h1 class="text-2xl font-bold mt-5">6️⃣ Troubleshooting</h1>
        <table class="min-w-full border border-gray-300 border-collapse mt-5">
            <thead class="bg-gray-200">
            <tr>
                <th class="border border-gray-300 px-4 py-2 text-center">Issue</th>
                <th class="border border-gray-300 px-4 py-2 text-center">What to Do</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="border border-gray-300 px-4 py-2">No power</td>
                <td class="border border-gray-300 px-4 py-2">Check the plug, adapter, and power switch.</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-4 py-2">Dashboard not loading</td>
                <td class="border border-gray-300 px-4 py-2">Check internet connection or GSM SMS for “offline” notice.</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-4 py-2">Alerts keep showing</td>
                <td class="border border-gray-300 px-4 py-2">Check if solution containers are empty or sensors need cleaning.</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-4 py-2">Sensor shows “Warning”</td>
                <td class="border border-gray-300 px-4 py-2">Inspect the wiring or replace the sensor as suggested.</td>
            </tr>
            </tbody>
        </table>
    
        <h1 class="text-2xl font-bold mt-5">7️⃣ Roles and Permissions</h1>
        <ol class="ml-10 mt-5">
            <li class="list-disc font-semibold">Admin</li>
            <ul class="ml-5 mt-3">
                <li class="list-[circle] ml-5">Can add operators, change thresholds, view all records, manage sensors.</li>
            </ul>
            <li class="list-disc mt-5 font-semibold">User</li>
            <ul class="ml-5 mt-3">
                <li class="list-[circle] ml-5">Can only view parameters, daily records, and their own profile.
                </li>
            </ul>
        </ol>
    </div>
</div>
