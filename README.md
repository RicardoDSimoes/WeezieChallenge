# Welcome to WeezieChallenge!

Hi! Here it's possible to see the resolution of the *"problem"* sent by **Pedro Branco** from **Weezie**.

## **Original problem:**
_"Write a simple API (using the Laravel Framework) to display a list of users, create new users, and change or delete an existing user._

_Feel free to use any other frameworks/libraries along with Laravel, and any database for data persistence. The definition of the User's model/table is up to you._


# Libraries Used 

To make my work a little bit more easier I used some libraries:

 1. Built-in Authentication;
 2. Yajra Data-tables;
 
 ## Database
 No changes were made to the database, the built-in Authentication did the necessary changes creating new table to users.  
	 
 
## How to work with the API

To try the API functionalities first of all, it's necessary to make the user register and can run the command **php artisan db:seed** to create data to can make the tests.
After creating account and make login, should go to the URL: *127.0.0.1:8000/users* to see all Users registered.

In the table it's possible to see 2 different buttons, green button to **update** user's info and a red button to **remove** the user.


