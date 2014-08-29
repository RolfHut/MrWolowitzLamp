MrWolowitzLamp
==============

Mr Wolowitz Lamp: use a spark core to switch a lamp from a website. 

This is inspired by the internet-lamp scene from The Big Bang Theory: [https://www.youtube.com/watch?v=BW9FbjjkKo4](https://www.youtube.com/watch?v=BW9FbjjkKo4)

I made this setup to show that one can controls once lamp using only "beginner level" examples, chained together. The examples are
* a standard Javascript application to send an api call to the spark cloud. 
* a standard php file to add data to a MySQL database and get a nice table back to display
* a standard example from the spark core: switching an LED from the internet
* a standard Velleman hardware kit to switch mains using low voltage signals.

I wrote a column in the dutch newspaper "De Volkskrant" of august 30th 2014 on this project

The files presented here represent code to switch on, or off, a lamp from a website. A running example can be found on:
[www.rolfhut.nl/wolowitzLamp.html](www.rolfhut.nl/wolowitzLamp.html). A more fancy example, in dutch, can be found on
[www.rolfhut.nl/hutskoffer4](www.rolfhut.nl/hutskoffer4). 

What you will need (hardware)
-----------------------------
* a spark core
* a LCD screen, I recommend the one that comes with the official Arduino Starter Kit, since spark supports the lcd library that comes with the arduino.
* a way to switch mains using a 3V signal. I used a Velleman K2634 board, but since I started on this project, I learned that Spark has produced a shield that does exactly that.
* if you want to show the result on your site, you also need a webcam and a way to upload images to your site. I recommend YawCam.


What you will need (software)
-----------------------------
* a website that runs php.
* a MySQL database in which you have created a table. See the comments in the php files for details.

How to install
--------------
The files provided in this repo contain all the software needed. 
* remotesetlamp.ino needs to be compiled and uploaded to your spark core using the spark build environment.
* the other files need to be uploaded to a single directory on your website. Before uploading make sure you open each file, scan for details that you might need to change. These include:
- your Spark Core Access Token. See the spark documentation on how to get one
- your database credentials
- the url of your website

Good luck and enjoy!
