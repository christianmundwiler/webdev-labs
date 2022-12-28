<?php
    $city_name = $_POST['city_name'];
    $appid = '1de81a9d055ef6a084d39b5b20a70b16';

    $url ='https://api.openweathermap.org/data/2.5/weather?q=' . $city_name . '&units=imperial&appid=' . $appid;

    $weather_contents = file_get_contents ($url);
    $json = json_decode ($weather_contents, true);

    //Display current weather
	echo '<p>Current Temperature: ' . $json['main']['temp'] . ' F' . '</p>';
    echo '<p>Feels Like: ' . $json['main']['feels_like'] . ' F' . '</p>';
	echo '<p>Humidity: ' . $json['main']['humidity'] . '%' . '</p>';
    echo '<p>Wind Speed: ' . $json['wind']['speed'] .' miles/hour' . '</p>';
    echo '<p>Wind Direction: ' . $json['wind']['deg'] . ' degrees' . '</p>';
	echo '<p>Weather Condition: ' . $json['weather'][0]['description'] . '</p>';

    //Extract image
	$imagecode =  $json['weather'][0]['icon'];
	$image_url = 'http://openweathermap.org/img/wn/' . $imagecode . '.png';
	$image = file_get_contents($image_url);
	
	//Save it on local drive
	file_put_contents('images/image.png', $image);
	//Display image
	echo '<img style="border:10px solid black;" src="images/image.png" width="300" height="300" />';
?>