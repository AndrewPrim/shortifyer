## Steps to install project
* Clone this project
* Rename `.env.example` to `.env`
* Change `env` database connection credential
* run `composer install`
* run `npm install`
* run `npm run dev`
* run migrations `php artisan migrate`, this need to store all of created short urls and there origins
  * Also, there is artisan command to delete all expired urls `invite_urls:delete_expired`, you can run it manualy but this command has been added to Kernel schedule and will be launched automatically every hour.
