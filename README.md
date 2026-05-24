# Laravel Blog CRUD Application

A full-featured blog application built with Laravel 12 and Laravel Breeze authentication.

## Features

- **Authentication** — Register, login, logout via Laravel Breeze
- **Posts CRUD** — Create, read, update, delete blog posts with image upload
- **Categories** — Posts organized by categories
- **Ownership** — Only post authors can edit or delete their own posts
- **Image Upload** — Upload and manage post images using Laravel Storage
- **Dashboard** — Logged-in users see only their own posts
- **Admin Panel** — Admin can manage all users and posts
- **Validation** — Server-side form validation with error messages

## Tech Stack

- **Backend:** Laravel 12, PHP
- **Auth:** Laravel Breeze
- **Database:** MySQL
- **ORM:** Eloquent
- **Frontend:** Blade Templates, Tailwind CSS
- **Storage:** Laravel Storage Facade

## Installation

```bash
git clone https://github.com/jenous11/Crud_Laravel.git
cd Crud_Laravel

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Configure your database in `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Then run:

```bash
php artisan migrate
php artisan storage:link
npm run build
php artisan serve
```

## Usage

- Visit `http://127.0.0.1:8000`
- Register an account
- Create, edit, delete your posts
- To access admin panel — set `role` to `admin` in users table, then visit `/admin`

## Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── PostController.php
│   │   ├── AdminController.php
│   │   └── HomeController.php
│   └── Middleware/
│       └── AdminMiddleware.php
├── Models/
│   ├── Post.php
│   ├── User.php
│   └── Category.php
resources/views/
├── posts/
├── admin/
├── layouts/
└── dashboard.blade.php
```

## Author

**Jenous Dangol**  
[GitHub](https://github.com/jenous11) · [Email](mailto:jenousdongol11@gmail.com)
