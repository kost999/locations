# Locations

### Get started

- git clone
- composer install
- copy .env.example to .env and fill it
- make sure the `STUB_URI` environment parameter is set

### Stub
There is a stub on `/api/stub` uri that returns 2 preset variants randomly.
And there is a test console command `php artisan locations:get` that uses http stub and dumps it to console.
If stub return error - console will paste the message.

### Tests
There is only one test :( Just for service class