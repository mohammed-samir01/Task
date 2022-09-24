
## About This Task

Installation

Clone the repository
```
git clone
```

Install dependencies
```
npm install
```
```
composer install
```

Create a .env file
```
cp .env.example .env
```

Generate an app encryption key
```
php artisan key:generate
```

Create an empty database for our application and update the .env file to connect to the database

Run the database migrations
```
php artisan migrate
```

Run the database seeders
```
php artisan migrate:fresh --seed
```

Start the local development server
```
php artisan serve
```

You can now access the server at http://localhost:8000

## Thanks Accura Team for this opportunity to work on this task.
