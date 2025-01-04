<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html> 
<html>  
<head> 
    <title>Weather Page</title> 
    <link rel="stylesheet" href="style1.css"> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300">  
</head> 
  
<body> 
  <div class="container">
        <div class="weather-side">
            <div class="weather-gradient"></div>
            <div class="date-container">
                <h2 class="date-dayname">${day}</h2>
                <span class="date-day">${date}</span>
                <i class="fa-solid fa-location-dot"></i>
                <span class="location">${city}</span>
            </div>
            <div class="weather-container">
            	<input type="hidden" id="wc" value="${weatherCondition}"> </input>
                <span class="weather-icon"><img style ="width:50%;"src="" alt="Clouds" id="weather-icon"></span>
                <h1 class="weather-temp">${temperature} °C</h1>
                <h3 class="weather-desc">${weatherCondition}</h3>
            </div>
        </div>
        <div class="info-side">
            <div class="today-info-container">
                <div class="today-info">
                    <div class="humidity">
                        <span class="title"><i class="fa-solid fa-droplet"></i> HUMIDITY</span>
                        <span class="value">${humidity}%</span>
                        <div class="clear"></div>
                    </div>
                    <div class="wind">
                        <span class="title"><i class="fa-solid fa-wind"></i> WIND</span>
                        <span class="value"> ${windSpeed} km/h</span>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="week-container">
                <ul class="week-list">
                    <li>
                        <span class="day-name">${day}</span>
                        <span class="day-temp">${maxtemp}° / ${mintemp}°</span>
                        <span class="day-icon"><img style ="width:20%;"src="" alt="Clouds" id="day-icon"></span>
                    </li>
                    
                  
                   
                    <div class="clear"></div>
                </ul>
            </div>
            <div class="location-container">
                
                
                  <form action="MyServlet" method="post" class="searchInput">
            			<input class="location-input" type="text" placeholder="Enter City Name" id="searchInput"  name="city"/>
           				 <button id="searchButton"><i class="fa-solid fa-magnifying-glass"></i></button>
      			 </form>
            </div>
        </div>

    </div>

    <script src="myscript.js">	  </script>
            
</body> 
  
</html>