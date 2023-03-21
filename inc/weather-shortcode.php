<?php 

// Register custom shortcode [yco_weather]
add_shortcode('yco_weather', 'get_yco_weather');

function get_yco_weather() {
    $cache_key = 'yco_weather_data';
    $weather_data = get_transient($cache_key);

    if ($weather_data === false) {
        // Replace YOUR_API_KEY with your OpenWeatherMap API key
        $api_key = YCO_OPENSTREETMAP_API_KEY;
        $city = 'Olbia';
        $cityId = '3172086';
        $country = 'IT';
        //$url = "http://api.openweathermap.org/data/2.5/weather?q={$city},{$country}&appid={$api_key}&units=metric";
        $url = "https://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $api_key;
        $response = wp_remote_get($url);

        if (is_wp_error($response)) {
            return 'Error fetching weather data.';
        }

        $weather_data = json_decode(wp_remote_retrieve_body($response), true);
        
        // Cache the data for 24 hours
        set_transient($cache_key, $weather_data, 24 * HOUR_IN_SECONDS);
    }

    if (isset($weather_data['weather'][0]['icon'], $weather_data['main']['temp'])) {
        $icon = $weather_data['weather'][0]['icon'];
        $temp = round($weather_data['main']['temp']);

        return "<span class='me-3 text-white fw-semibold'><img src='" . get_stylesheet_directory_uri() . "/icons/weather/{$icon}.svg' class='me-2' alt='Yacht Club Olbia -  Meteo' width='22' height='22' /> {$temp}°C Olbia</span>";
    } else {
        return 'Dati meteo N/A.';
    }
}
