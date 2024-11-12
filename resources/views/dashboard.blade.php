<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                @role('user')
                <div class="p-6 text-gray-900">
                    <div class="container flex flex-wrap">
                        <div id="current-weather" class="flex-grow p-4 m-2 bg-blue-100 rounded shadow-md section">
                            <h2 class="font-sans font-bold text-center">Current Weather</h2>
                            <div class="weather-item">Temperature: <span id="current-temp"></span> °C</div>
                            <div class="weather-item">Feels Like: <span id="feels-like"></span> °C</div>
                            <div class="weather-item">Weather: <span id="current-desc"></span></div>
                            <div class="weather-item">Humidity: <span id="current-humidity"></span>%</div>
                            <div class="weather-item">Wind Speed: <span id="current-wind-speed"></span> m/s</div>
                            <div class="weather-item">Wind Direction: <span id="current-wind-dir"></span>°</div>
                            <div id="extreme-weather-warning" class="hidden mt-2 font-bold text-red-600"></div>
                        </div>

                        <div id="monthly-forecast" class="flex-grow p-4 m-2 bg-green-100 rounded shadow-md section">
                            <h2 class="font-bold text-center text-pretty">Five Day Weather Forecast</h2>
                        </div>

                        <div id="chart" class="flex-grow p-4 m-2 bg-white rounded shadow-md section" style="height: 400px;">
                        </div>
                    </div>

                    <div id="farming-advice " class="p-4 mt-4 bg-orange-100 rounded shadow-md">
                        <h2 class="font-bold text-center text-pretty">Farming Advice</h2>
                        <p id="advice-text" class="font-semibold"></p>
                    </div>

                    <div id="crop-recommendations" class="p-4 mt-4 bg-purple-100 rounded shadow-md">
                        <h2 class="text-center">Recommended Crops</h2>
                        <p id="crop-advice-text" class="font-semibold"></p>
                    </div>
                </div>
                @endrole
                <section style="background-image:url({{ asset('images/leaves.jpg') }}); background-iMAGE:cover" >
                    {{-- What will be viewed by everyone else --}}
                </section>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    const apiKey = '0313060b2a3f16f4ea52556af917c9a6';
    const city = 'Chiredzi';

    async function getWeather() {
        try {
            const currentWeatherResponse = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`);
            const currentWeather = await currentWeatherResponse.json();
            displayCurrentWeather(currentWeather);

            const forecastResponse = await fetch(`https://api.openweathermap.org/data/2.5/forecast?q=${city}&appid=${apiKey}&units=metric`);
            if (!forecastResponse.ok) {
                throw new Error('Network response was not ok');
            }
            const forecast = await forecastResponse.json();
            console.log(forecast); // Log the forecast data for debugging
            const dailyForecast = processForecastData(forecast);
            displayMonthlyForecast(dailyForecast);

            // Prepare data for charts
            prepareChartData(dailyForecast);
        } catch (error) {
            console.error('Error fetching weather data:', error);
        }
    }

    function processForecastData(forecast) {
        const dailyData = {};
        forecast.list.forEach(item => {
            const date = new Date(item.dt * 1000).toLocaleDateString();
            if (!dailyData[date]) {
                dailyData[date] = {
                    temp: item.main.temp,
                    description: item.weather[0].description,
                    rain: item.rain ? item.rain['3h'] : 0,
                    windSpeed: item.wind.speed,
                    windDir: item.wind.deg // Wind direction in degrees
                };
            } else {
                dailyData[date].temp = (dailyData[date].temp + item.main.temp) / 2;
                dailyData[date].rain += item.rain ? item.rain['3h'] : 0;
                dailyData[date].windSpeed += item.wind.speed; // Average wind speed
                dailyData[date].windDir = (dailyData[date].windDir + item.wind.deg) / 2; // Average wind direction
            }
        });
        return Object.entries(dailyData).map(([date, data]) => ({ date, ...data }));
    }

    function displayCurrentWeather(weather) {
        document.getElementById('current-temp').innerText = weather.main.temp;
        document.getElementById('feels-like').innerText = weather.main.feels_like;
        document.getElementById('current-desc').innerText = weather.weather[0].description;
        document.getElementById('current-humidity').innerText = weather.main.humidity;
        document.getElementById('current-wind-speed').innerText = weather.wind.speed;
        document.getElementById('current-wind-dir').innerText = weather.wind.deg;

        checkExtremeWeather(weather);
    }

    function checkExtremeWeather(weather) {
        const tempThresholdHigh = 35; // Example threshold for high temperature
        const tempThresholdLow = 0; // Example threshold for low temperature
        const extremeWeatherDiv = document.getElementById('extreme-weather-warning');

        if (weather.main.temp > tempThresholdHigh) {
            extremeWeatherDiv.innerText = "⚠️ Extreme Heat Warning!";
            extremeWeatherDiv.classList.remove("hidden");
        } else if (weather.main.temp < tempThresholdLow) {
            extremeWeatherDiv.innerText = "⚠️ Extreme Cold Warning!";
            extremeWeatherDiv.classList.remove("hidden");
        } else {
            extremeWeatherDiv.classList.add("hidden");
        }

        // Provide farming advice based on current conditions
        provideFarmingAdvice(weather);
    }

    function provideFarmingAdvice(weather) {
        const adviceText = document.getElementById('advice-text');

        let advice = "";

        if (weather.main.temp > 30) {
            advice += "Ensure crops are adequately watered due to high temperatures. Consider implementing irrigation systems.\n";
        }
        if (weather.main.temp < 0) {
            advice += "Protect sensitive crops from frost using row covers or other protective measures.\n";
        }

        if (weather.rain && weather.rain['1h'] > 20) {
            advice += "Prepare for potential flooding; ensure drainage systems are clear.\n";
        }

        if (advice === "") {
            advice += "Conditions are normal. Continue regular farming practices.";
        }

        adviceText.innerText = advice;
    }

    function displayMonthlyForecast(forecast) {
        const monthlyForecastDiv = document.getElementById('monthly-forecast');
        monthlyForecastDiv.innerHTML += '';

        let totalRainfall = 0;
        let shouldIrrigateDays = [];

        forecast.forEach(day => {
            const temp = day.temp;
            const rain = day.rain;

            totalRainfall += rain;

            monthlyForecastDiv.innerHTML += `
                <div class="weather-item">
                    <strong>${day.date}</strong>: ${temp.toFixed(1)} °C, ${day.description}, Rain: ${rain.toFixed(1)} mm, Wind Speed: ${day.windSpeed.toFixed(1)} m/s, Wind Direction: ${day.windDir.toFixed(1)}°
                </div>
            `;

            // Determine if irrigation is needed
            if (temp > 30 && rain < 5) {
                shouldIrrigateDays.push(day.date);
            }
        });

        // Display irrigation recommendation
        if (shouldIrrigateDays.length > 0) {
            monthlyForecastDiv.innerHTML += ` Irrigation recommended on: ${shouldIrrigateDays.join(', ')}.`;
        } else {
            monthlyForecastDiv.innerHTML += 'No irrigation needed.';
        }

       // Suggest crops based on current conditions
       suggestCrops(forecast);
    }

    function suggestCrops(forecast) {
       const cropAdviceText = document.getElementById('crop-advice-text');
       let cropsToGrow = [];

       forecast.forEach(day => {
           if (day.temp > 30 && day.rain === 0) {
               cropsToGrow.push("Drought-resistant crops like millet and sorghum.");
           } else if (day.temp <= 30 && day.rain > 10) {
               cropsToGrow.push("Crops that thrive in moist soil like rice and leafy greens.");
           } else if (day.windSpeed > 20) {
               cropsToGrow.push("Low-growing plants such as radishes, carrots, and dwarf kale.");
           }
       });

       cropAdviceText.innerText = cropsToGrow.length > 0 ? `Recommended crops to grow: ${cropsToGrow.join(', ')}` : 'Conditions are suitable for a variety of crops.';
   }

    function prepareChartData(forecast) {
        const dates = forecast.map(item => item.date);
        const temperatures = forecast.map(item => item.temp);
        const rainfalls = forecast.map(item => item.rain);

        renderChart(dates, temperatures, rainfalls);
    }

    function renderChart(dates, temperatures, rainfalls) {
       var options = {
           chart: {
               height: 350,
               type: 'line',
               zoom: { enabled: false },
           },
           series: [
               {
                   name: 'Temperature (°C)',
                   type: 'line',
                   data: temperatures,
               },
               {
                   name: 'Rainfall (mm)',
                   type: 'column',
                   data: rainfalls,
               }
           ],
           xaxis: {
               categories: dates,
               title: { text: 'Date' },
           },
           yaxis: [
               {
                   title: { text: 'Temperature (°C)' },
                   min: 0,
               },
               {
                   opposite: true,
                   title: { text: 'Rainfall (mm)' },
                   min: 0,
               }
           ],
           tooltip: {
               shared: true,
               intersect: false,
           },
       };

       var chart = new ApexCharts(document.querySelector("#chart"), options);
       chart.render().then(() => console.log("Chart rendered successfully!")); // Confirmation log
    }

    getWeather();
</script>

<style>
.container {
    display: flex;
    justify-content: space-between; /* Space between sections */
}

.section {
    flex-grow: 1; /* Allow sections to grow equally */
    margin-right: 10px; /* Space between sections */
}

.section:last-child {
    margin-right: 0; /* Remove margin from the last section */
}

.weather-item {
    margin-bottom: 10px; /* Space between weather items */
}

#extreme-weather-warning, #crop-recommendations h2, #farming-advice h2{
   font-weight:bold;
}
</style>
