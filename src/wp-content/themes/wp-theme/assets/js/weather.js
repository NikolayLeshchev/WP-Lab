async function getWeather() {
    try{
        const response = await fetch('https://api.open-meteo.com/v1/forecast?latitude=53.9002&longitude=27.5665&current=temperature_2m,weather_code');
        const data = await response.json();
        console.log(data);
        console.log(data.current.weather_code);

        const weatherDescription = getWeatherDescription(data.current.weather_code);
        const weatherResults = document.createElement('div');
        weatherResults.classList.add('weather-results');    
        weatherResults.innerHTML = `
        <div class="weather-city">Минск</div>
        <div class="weather-temp">${data.current.temperature_2m}°C</div>
        <div class="weather-desc">${weatherDescription}</div>
        `;
        document.body.appendChild(weatherResults);
    } catch (error) {
        console.log(error);
    }
}

function getWeatherDescription(code) {
    const descriptions = {
        0: '☀️ Ясно',
        1: '🌤️ Малооблачно',
        2: '⛅ Переменная облачность',
        3: '☁️ Пасмурно',
        45: '🌫️ Туман',
        48: '🌫️ Туман',
        51: '🌦️ Морось',
        61: '🌧️ Дождь',
        63: '🌧️ Дождь',
        65: '🌧️ Сильный дождь',
        71: '🌨️ Снег',
        80: '🌧️ Ливень',
        95: '⛈️ Гроза'
    };
    return descriptions[code] || '🌡️ Погода';
}

getWeather();