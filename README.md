# protector
PHP Authenticator, Session Manager and Router Controller for vanilla PHP applications.

It implements a MVC controler to manage routes, and give access to models and views predefined.

This project is a boiler plate just havin all the basic setup to:

 - Requires Authentication
 _ Generate Password token using SHA 128, 256 or 512 in the client
 - Not allow plain password to the server, even through https
 - Manage dinamically the User Session
 - Allow access to defined public routes without authentication
 - Allow access to defined protected routes through authentication services
 - Register uses in Database
 - Protect Routes and direct access to PHP files
