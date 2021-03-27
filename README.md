# Print Requests
## About
Print Requests is a web application built on top of Laravel, Jetstream, and TailwindsCSS created to help traiage 3D print requests. It works by hooking into an Octoprint connected 3D printer and utilizing the REST API served through [OctoPrint Web](https://docs.octoprint.org/en/master/api/index.html).

## Setup and Installation
Please make sure your server or development environment meets the specifications outlined in https://laravel.com/docs/8.x/deployment or use a dedicated development environment like [Homestead](https://laravel.com/docs/8.x/homestead).

Clone the repo:
```
git clone https://github.com/dvigne/Print-Requests.git
```
Install the required dependencies
```
composer install
```
Create a production `.env` file
```
cp .env.example .env`
```
Generate a new seed for password salting and session keys
```
php artisan key:generate
```
Fill out the required environment variables by editing the new `.env` file. The key sections below are a good start.
```
# App URL and name to use for links and buttons
APP_NAME="Print Requests"
APP_URL=https://print.app

# Database Connection Strings
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=print
DB_USERNAME=
DB_PASSWORD=

# Octoprint API Server and API Key
OCTOPRINT_URL="http://0.0.0.0:5000"
OCTOPRINT_API_KEY="SOMEKEY"


# Mail Server Settings
MAIL_MAILER=smtp
MAIL_HOST=localhost
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=someone@someplace.org
MAIL_FROM_NAME="${APP_NAME}"
```
Once the database settings are setup correctly, run the migrations to setup your database
```
php artisan migrate
```
Compile the front end assets
```
npm install && npm run prod
```
This should be all that is required to successfully run the Print Requests app. If you want to enable debugging output and production behavior change modify the configuration options below found in `.env`
```
APP_DEBUG=true
APP_ENV=local
```
Enjoy!

## Considerations
This app is still in early development and as such some bugs and functionality may not work as expected. Please feel free to open up a pull request or issue if you see any problems.

## Todo
- [x] Authentication and Registration with Account Verification Emails
- [x] Database
- [x] Print Request Form
- [x] Administration Functions
- [x] Basic OctoPrint Status Requests
- [x] Dashboard and Welcome Page
- [ ] Authorization Guards on Print Request Administration Links
- [ ] Payment Gateway
- [ ] File Storage Management for Uploaded STLs
- [ ] User Administration
- [ ] Events and Handlers for Notifications and Broadcasting
- [ ] Notification Templates

## Contributing
Any contributions to the project are welcome. If you wish to pick away at some pieces of the todo list or have any suggestions, again, please feel free to open a pull request or issue. Thanks!
