package MyPackage;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.sql.Date;
import java.time.Instant;
import java.time.ZoneId;
import java.time.ZonedDateTime;
import java.time.format.DateTimeFormatter;
import java.time.format.TextStyle;
import java.util.Locale;
import java.util.Scanner;

import com.google.gson.Gson;
import com.google.gson.JsonArray;
import com.google.gson.JsonObject;
import com.google.gson.JsonParser;

/**
 * Servlet implementation class MyServlet
 */
@WebServlet("/MyServlet")
public class MyServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public MyServlet() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		//Get The City FroThe From Input
		String city = request.getParameter("city");
		
		//Api Setup
		String apikey = "b63378832b72e6c89ca2fa3a50a2cf86";
		//The Complte url from open wether API request
		String apiUrl = "https://api.openweathermap.org/data/2.5/weather?q="+city+"&appid="+apikey;
		
		//API Intergration
		URL url = new URL(apiUrl);
		HttpURLConnection connection = (HttpURLConnection) url.openConnection();
		connection.setRequestMethod("GET");
		
		
		//Reading The Data From Network 
		InputStream inputstream = connection.getInputStream();
		InputStreamReader reader = new InputStreamReader(inputstream);
		
		//Want To Store In String
		StringBuilder responseContent = new StringBuilder();
		
		//For Taking Input From Reader, will crete scanner object
		
		Scanner scanner = new Scanner(reader);
		
		while(scanner.hasNext())
		{
			responseContent.append(scanner.nextLine());
		}
		
		scanner.close();
//		System.out.println(responseContent);
		
		// Do Typecasting or parsing the String to JSON fromat
		Gson gson = new Gson();
		JsonObject jsonobject = gson.fromJson(responseContent.toString(),JsonObject.class);
//		System.out.println(jsonobject);
		
		//Now We Going To Seprate The Some Data In JSON Format
		
		//Date And Time
		long dateTime = jsonobject.get("dt").getAsLong() * 1000;
		String date = new Date(dateTime).toString();
	     int timezoneOffset = jsonobject.get("timezone").getAsInt();
	     
		 // Convert timestamp to a day of the week
        Instant instant = Instant.ofEpochSecond(dateTime + timezoneOffset); // Adjust with timezone
        Instant now = Instant.now();
        ZonedDateTime dateTime1 = now.atZone(ZoneId.of("Asia/Kolkata"));
        String day = dateTime1.getDayOfWeek().getDisplayName(TextStyle.FULL, Locale.ENGLISH);
        
 

		//Temperature     
		double temperatureKelvin = jsonobject.getAsJsonObject("main").get("temp").getAsDouble();
		int temperatureCelsius = (int) (temperatureKelvin - 273.15);
		JsonObject main = jsonobject.getAsJsonObject("main");
		double minTempKelvin = main.get("temp_min").getAsDouble();
        double maxTempkelvin = main.get("temp_max").getAsDouble();
        int minTemp = (int) (minTempKelvin - 273.15);
        int maxTemp = (int) (maxTempkelvin - 273.15);
        
        
		//Humidity
		int humidity = jsonobject.getAsJsonObject("main").get("humidity").getAsInt();
		
		//Wind Speed
		double windspeed = jsonobject.getAsJsonObject("wind").get("speed").getAsInt();
		
		//weater conditon
		String weathercondition = jsonobject.getAsJsonArray("weather").get(0).getAsJsonObject().get("main").getAsString();
		
		
		//Set the data as request attributes (for sending to the JSp Page)
		
		  request.setAttribute("date", date);
          request.setAttribute("city", city);
          request.setAttribute("temperature", temperatureCelsius);
          request.setAttribute("weatherCondition", weathercondition); 
          request.setAttribute("humidity", humidity);    
          request.setAttribute("windSpeed", windspeed);
          request.setAttribute("mintemp", minTemp);
          request.setAttribute("maxtemp", maxTemp);

          request.setAttribute("day", day);
          request.setAttribute("weatherData", responseContent.toString());
          connection.disconnect();
          
          //Forward the request to the weather.jsp page for rendering
          request.getRequestDispatcher("index.jsp").forward(request, response);
	}

}
