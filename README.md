# 99UWU
By: Gallant Tang, Jon Kim, Rene Huang
For: Computer Science 304 - Introduction to Relational Databases
https://docs.google.com/document/d/1N7SbuS4jvwGlqt7fcjqG1YdA68M8K-AyB_1hYXzUnWw/edit

Files:
Oracle-test is the starter, let's use that to build everything else
SQL is what we'll be using to populate the database

UNIX:
for directory: dir
for navigating: cd
to open up execute permissions: chmod 711 ~/public_html
to open up file permissions: chmod 755 ~/public_html
to test permissions: ls -la ~/public_html
https://piazza.com/class/k4d36n4nx1n73z?cid=498

ssh jonkim99@remote.students.cs.ubc.ca

PHP set up: https://www.students.cs.ubc.ca/~cs-304/resources/php-oracle-resources/php-setup.html
test: https://www.students.cs.ubc.ca/~jonkim99/test.php

https://stackoverflow.com/questions/38709005/php-oci8-11g-dll-is-not-a-valid-win32-application
(this fucking saved my life^)

Use IntelliJ IDEA for php

Oracle SQL, OCILogon:
user: ora_jonkim99
pw: a46095295

Structure of project:
Following MVC framework:
M - Model
This component will be used to handle, process, and manipulate the input taken in from the view.
It will handle the updates coming in from the controller and update its state accordingly.

V - View 
This component handles all visual aspects of user interaction.
It will strictly be used to maintain the view of the web application that users will be interacting with. The data to be displayed is retrieved from the model.
The view can also 'alert' the controller about any input made by a user and awaits instruction from the model.

C - Controller
This component is the mediator between the model and the view. 
It handles and processes all interactions from the user.
Commands are sent by the controller to the model to update its state based on user inputs.
