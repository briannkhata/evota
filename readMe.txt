This is an an online voter system version 0.0001. This means it does not have 
many features as it is a first version.

It has two types of users

Admin user
------------------
Username: admin
Password: admin

For now Admin users can be added through the mysql cmd.
But for other types of users, they can be added by admin through
UI

Admin can
1. View/add/delete/edit users
2. View/add/delete/edit posts
3. View/add/delete/edit candidates
4. View Votes


Normal user
--------------------
1. Can Vote
2. View Candidates
3. View votting results

Username:beatrice
Password:beatrice

Other users can be added through UI under users


Deployment
-------------------------------------
For local deployment
1.You will need to install xampp or wamp server 
  https://www.apachefriends.org/download.html and spend some time on the  documentation
  https://www.wampserver.com/en/ and spend some time on the  documentation
2.We have used codeigniter php framework to develop this small project and can be downloaded on 
  https://codeigniter.com/download and spend some time on it.
3.After doing the above steps, extract the evota.zip folder to the www directory in wamp server or htdocs in xampp
4.Login in to the phpmyadmin of either server in local development and Import the evota.sql file
5. This will create all the databases and the tables required for the project.
6. Go into url of your browser and access the project on localhost:8080/evota or 127.0.0.1/evota


To deply it online, differs from server to server but you can follow the steps on 
1. You initially need to buy a domain like www.evota.com from any affordable hoister
2  When uploading the project file online, the hoister will guide you as it varies from server to server


Enjoy the voting ):
