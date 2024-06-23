# Laravel 10 Project README

This README provides instructions for setting up and running the Laravel 10 project with user authentication and different roles (admin and user).

## Requirements

Before running the project, ensure your development environment meets the following requirements:

- PHP >= 7.4
- Composer
- Node.js >= 14.x
- npm or Yarn
- Apache or Nginx web server
- MySQL or PostgreSQL database

## Installation

Follow these steps to set up the Laravel project:

1. **Clone the Repository**

   ```bash
   git clone https://github.com/prasetiyo28/laravel-blog.git
   cd laravel-blog
   ```
2. **Install Composer Dependencies**
  ```bash
   git clone composer install
   ```
3. **Install npm Dependencies**
```bash
   npm install
   ```
4. **Create a Copy of the .env File**
```bash
  cp .env.example .env
   ```
5. **Generate Application Key**
```bash
   php artisan key:generate   
```
6. **Set Up Database**
- Create a new database for your project.
- Update .env file with database credentials:
```dotenv
   DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password   
```
- Run database migrations to create tables:

6. **Set Up Database**

- If you want to seed the database with dummy data (e.g., admin and user roles):

```bash
  php artisan db:seed 
```


## Usage
- Development Server
Start the Laravel development server:

```bash
php artisan serve
```

```bash
npm run dev
```

Access the application in your web browser at http://localhost:8000.



## Test
```bash
php artisan test
```

## Features
**Authentication and Authorization**

- Roles: There are two types of users: admin and user.
- Admin Privileges:
    - Create, read, update, and delete posts.
Manage users (optional).
- User Privileges:
     - Read posts.
     - Comment on posts.

**Routes**

- /login: Login page for users.
- /register: Registration page for new -users.
- /posts: List of posts visible to users.
- /posts/{id}: View a specific post.
- /posts/create (Admin): Create a new post.
- /posts/{id}/edit (Admin): Edit an existing post.
- /posts/{id}/delete (Admin): Delete a post.


**Additional Features**
- Comments: Users can comment on posts.
- Pagination: Paginate posts for better navigation.
- Middleware: Use middleware to manage access control based on user roles.

**API**
- postman collection [link]([doc:linking-to-pages#anchor-links](https://github.com/prasetiyo28/laravel-blog/blob/46d34a470348a66fee984eba2ccf5f3b548c5d14/Blog.postman_collection.json))
