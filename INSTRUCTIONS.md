# Instalation instructions

#####composer install

####Database
Set database server info on .env file.

######DB_DATABASE=voucher_task
######DB_USERNAME=username
######DB_PASSWORD=password

Then run the command below:

#####php artisan migrate

## Running application

To serve the application, run the following command:

#####php -S localhost:8000 -t public

Access to web interface:

[Localhost on port 8000](http://localhost/8000)

Access to API:

Make a POST requsition at
[API URL](http://localhost:8000/api/recipients/vouchers/)

with a param:[email]

##Running tests

Just run the command:

./vendor/bin/phpunit
