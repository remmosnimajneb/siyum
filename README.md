# Siyum System

Project: Siyum System
Code Version: 1.0
Author: Benjamin Sommer
Theme Design by: HTML5 UP [HTML5UP.NET] - Theme `Editorial`
Licensing Information: CC BY-SA 4.0 (https://creativecommons.org/licenses/by-sa/4.0/)

## Table of Contents:
1. Overview
2. How it works
3. Requirements & Install Instructions
4. Updates to come

## SECTION 1 - OVERVIEW
```
If(Religion == "Jewish"){
	Keep.Reading();
	} else {
	Repository.Next();
	}
```

Ok just kidding, but this is a Jewish thing so just might not be interesting....
So your Jewish, we love making Siyums. For Birthdays, Bar Mitzvahs, Weddings, and other occasions. But how do we allow people to signup and organize this?
Here you are. Basically HadranAlach.com [Disclamer - Nothing to do with them!], But mine looks nicer.

Here's how it works.
You install on a server and you can now create Siyums of Tanach, Mishna or Gemara (Just not all at once) and allow people to signup for the siyum!
You can then download an Excel sheet with all the signups for your convienence! 

This program is 100% open source, feel free to do anything you want to it! Just make sure to remember to give me some credit and make sure to ShareAlike! (For the full licence and fine text stuff see creativecommons.org/licenses/by-sa/4.0/).

Also while speaking about giving credit, the HTML theme comes from html5up.net made by @ajlkn (twitter.com/ajlkn). This guy makes siiiiick stuff, make sure to check him out at html5up.net (Free HTML5 Stunning Mobile Friendly Website Templates (Free!)), carrd.co (An Incredible website builder that looks amazing and works even better!) and his Twitter page (@ajlkn).

## SECTION 2 - HOW IT WORKS:
So here's how it works.
-(Assuming you've done the whole install thing properly)
1. Navigate on the web to your install /admin.php
2. Login (Default is 'admin' and 'admin')
3. Add a new Siyum and enter the proper values
	-> Note that Homepage ID is a value that sets that siyum to be the homepage siyum, otherwise the siyum can be found at /siyum/?siyum=ID
4. Now send out your link and watch people grab up those Mitzvoth!
	-> Every time someone registers it will email them to confirm
	-> Note that this allows multiple submissions for a Volume!
5. You can now on the admin panel, Edit or Delete your siyum. You can also download an Excel sheet of Names and Emails who took what.
	-> Note you can't change the Type of Siyum, Like Mishna to Gemara, you'll need to delete and make a new one

## SECTION 3 - REQUIRMENTS & INSTALL INSTRUCTIONS
	
Requirments:

- A web server that can be accessed over the internet for use out of Local Area Network
- MySQL with PDO type PHP Extention (!Important!)
- PHP
- That's it

Aight, let's go! Let's install this thing already!!

Install: 

Here's how to install this
1. Drop all the files from the Repository to whatever directory you want them in
2. Install the SQL Code to the Database [File - SQLInstall.sql]
3. Configure the System by opening up functions.php with your favorite text editor [H/t mine is Sublime Text 3, it's dope!] and insert your
	-> Database connection Information
	-> Link to where this is on the web
	-> SMTP Information for Emails
	-> (Optional) Admin Credentials
4. That's it! Now login to /admin.php and add your first Siyum!

##SECTION 4 - UPDATES TO COME (MAYBE)

1. Allowing Siyum of Everything (Tanach, Mishna and Gemara)
2. Locking out certain things in a Siyum (Can't pick Seder Zeraim)
3. Allow to check if multiple submissions allowed or not allowed