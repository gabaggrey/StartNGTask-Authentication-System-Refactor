To setup this application for test, kindly follow the following steps:

1. Install Wampserver
2. After Installing Wampserver, navigate to your system "C:\" drive. Here you will find a folder named "wamp", open it and here you will find a folder named "www". Open this folder, create a folder with the name "coronaSchools".
3. Download and this project into that folder.
4. Open your browser
5. Navigate to 'Localhost/coronaSchools' or 'Localhost/coronaSchools/coronaSchools' .

=================================
6. To set the reset password pages, open an account with mailtrap.io
7. Get your email and password from SMTP settings on mailtrap.io active
8. Google "sendmail exe", click the first result, download the zip file and unzip.active
9. copy the sendmail folder and paste it into the "C:\wamp" directory
10. in the "C:\wamp" directory, open the bin folder, open the apache folder, open the next apache folder
open the bin folder, then open php.ini file.active
11. search for smtp. edit it to look like this: SMTP = smtp.mailtrap.io
12. uncomment the port
13. add your admin email here: sendmail_from =""
14. put in your password and username, gotten from mailtrap.io. 

15. Go back the wamp directory and open the sendmail folder.
16. open the sendmail.ini file
17. make sure the port number is the same as the one in the php.ini file. (eg smtp_port=2525)
18. edit the smtp_server to this: smtp_server=smtp.mailtrap.io
19. scroll down to enter your username and password as gotten from mailtrap.io 
20. restart your local server and try resending your email from forgot.php

21. You will receive the email in your inbox at mailtrap.io
22. go back the php.ini file, past in your username and password
23. also  paste in the directory to the sendmail.exe in your wamp directory (eg: sendmail_path ="C:\wamp64\sendmail\sendmail.exe -t -i")