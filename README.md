Uploaded skeleton code that follows SOA.
Its been tested to work in Azure web apps and returns a JSON array of match objects.
Make sure to read the comment sections in the code to know what needs to be added in.

Link to web app test:
https://4633testapi.azurewebsites.net/


11/24/20 update -----------

General outline of how the API works:
  a web app makes a call to either getScheduleByTeam, getScheduleByLocation, or getScheduleByMonth via url. It will send a variable with the call which will be transferred into the API's POST or GET variable. For example if I call getScheduleByTeam, I'll be sending a "team1" variable along with the call that getScheduleByTeam will recieve and store into its POST variable.
  each of these API call files (requesters) have their own instance of the ScheduleProvider class. The ScheduleProvider has all the functions to query the database and does most of the real work. The requester passes its POST variable into the matching ScheduleProvider function. If we called getScheduleByTeam.php, it will create a Provider instance and call the getScheduleByTeam(team1) function from the provider. Inside this function, we take the team1 variable and use it to query the database. The results are put into a "match" object which just holds data about the match. Since multiple matches can be returned for one call, we have to put this inside a loop and store each result into an array every iteration. ScheduleProvider has an instance of the ScheduleService class. ScheduleService basically just holds an array of matches with some functions to return it. We store the result of the database query into the array inside ScheduleService at the end of the getScheduleByTeam function. At the end of the requester service getScheduleByTeam.php, it returns SchedulService's array of matches as a JSON object. The web app recieves all the data in one nice JSON object.
  


things left to add to the API:

config.php file
  this file needs to establish the connection to the database and then included at the top of ScheduleProvider.

In ScheduleProvider.php, we need to add code in each of the three methods. This file is where most of the heavy lifting goes on. The code needs to query the databse and return results. Since one query can result in multiple matches, we need to query inside a loop and store each match into the scheduleService object once per iteration. The code for each method will look pretty similar, the difference being whether its querying by location, date, etc.


create getScheduleByLocation.php
  you can copy the code from getScheduleByTeam.php and then change the variable from "team1" to "location". Both these variables will need to be GET or POST. There is a commented out example of team1 being set to POST in getSCheduleByTeam.php. 

create getScheduleByMonth.php
  this is pretty much the same as the file above. The variable for this file would need to be "month"

All the other files should be fine.
