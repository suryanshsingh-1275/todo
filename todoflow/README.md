# TodoFlow

A full-stack **Task Management / Todo application** built with **Laravel 13**, **PHP 8.4**, **MySQL**, **Blade**, and **Vite**.

TodoFlow allows users to create accounts, log in, manage tasks, and perform complete CRUD operations through a Laravel MVC architecture.

---

## Features

* User Signup
* User Login & Logout
* Session-based Authentication
* Dashboard
* Create Tasks
* View Tasks
* Update Tasks
* Delete Tasks
* Task Status Management
* MySQL Database Integration
* Laravel Eloquent ORM
* Database Migrations
* MVC Architecture
* RESTful-style Routing
* Blade Templates
* Vite Asset Management
* CSRF Protection
* Server-side Validation

---

## Tech Stack

### Backend

* **PHP 8.4.24**
* **Laravel 13.25.0**
* **Laravel Eloquent ORM**
* **Laravel Blade**
* **Laravel Routing**
* **Laravel Sessions**

### Frontend

* HTML5
* CSS3
* Blade Templates
* JavaScript
* Vite

### Database

* **MySQL**

### Development Tools

* Composer
* Artisan CLI
* Node.js / npm
* Vite
* Git & GitHub
* VS Code

---

# Project Architecture

TodoFlow follows Laravel's **MVC (Model-View-Controller)** architecture.

```text
User
 │
 ▼
Route
 │
 ▼
Controller
 │
 ├── Validation
 │
 ├── Authentication
 │
 └── Eloquent Model
          │
          ▼
       MySQL
          │
          ▼
       Response
          │
          ▼
        Blade
          │
          ▼
        Browser
```

---

# Project Structure

```text
todoflow/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AuthController.php
│   │       ├── DashboardController.php
│   │       └── TaskController.php
│   │
│   ├── Models/
│   │   ├── User.php
│   │   └── Task.php
│   │
│   └── Providers/
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── migrations/
│   │   ├── *_create_users_table.php
│   │   ├── *_create_tasks_table.php
│   │   ├── *_create_sessions_table.php
│   │   └── ...
│   │
│   ├── seeders/
│   └── factories/
│
├── public/
│   ├── build/
│   └── ...
│
├── resources/
│   ├── css/
│   │   └── app.css
│   │
│   ├── js/
│   │   └── app.js
│   │
│   └── views/
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── signup.blade.php
│       │
│       ├── dashboard/
│       │   └── index.blade.php
│       │
│       └── tasks/
│           ├── index.blade.php
│           ├── create.blade.php
│           └── ...
│
├── routes/
│   ├── web.php
│   └── console.php
│
├── storage/
│
├── tests/
│
├── .env
├── artisan
├── composer.json
├── package.json
└── vite.config.js
```

---

# MVC Architecture

## Model

Models represent the application's database entities.

TodoFlow primarily uses:

```text
User
Task
```

The models are located inside:

```text
app/Models/
```

### User Model

```text
app/Models/User.php
```

The `User` model represents users stored inside the `users` database table.

It is responsible for interacting with user records using Eloquent.

---

### Task Model

```text
app/Models/Task.php
```

The `Task` model represents tasks stored inside the `tasks` table.

It allows the application to perform operations such as:

```php
Task::all();

Task::find($id);

Task::create([...]);

Task::where(...)->get();

$task->update([...]);

$task->delete();
```

---

# Eloquent ORM

TodoFlow uses **Laravel Eloquent ORM** to communicate with MySQL.

Instead of writing raw SQL such as:

```sql
SELECT * FROM tasks;
```

Laravel allows us to write:

```php
Task::all();
```

Similarly:

```sql
SELECT * FROM tasks WHERE id = 1;
```

becomes:

```php
Task::find(1);
```

Creating a record:

```php
Task::create([
    'title' => $request->title,
    'description' => $request->description
]);
```

Updating:

```php
$task->update([
    'title' => $request->title
]);
```

Deleting:

```php
$task->delete();
```

This keeps database logic inside the application's model layer rather than manually writing SQL queries throughout the controllers.

---

# Database Migrations

Laravel migrations are used to define and manage the database schema.

They are located in:

```text
database/migrations/
```

The migration system allows the database structure to be version-controlled along with the application.

---

## Users Migration

The users migration creates the structure required for authentication.

Conceptually:

```text
users
│
├── id
├── name
├── email
├── password
├── created_at
└── updated_at
```

Laravel's migration system handles creating this table in MySQL.

---

## Tasks Migration

The tasks migration creates the application's task table.

Conceptually:

```text
tasks
│
├── id
├── title
├── description
├── status
├── created_at
└── updated_at
```

This table stores the tasks created by users.

---

## Running Migrations

To run migrations:

```bash
php artisan migrate
```

To check migration status:

```bash
php artisan migrate:status
```

To rollback migrations:

```bash
php artisan migrate:rollback
```

To completely reset and run migrations again:

```bash
php artisan migrate:fresh
```

---

# Routing

Laravel routes are defined inside:

```text
routes/web.php
```

TodoFlow uses web routes for authentication, dashboard navigation, and task CRUD operations.

---

## Main Routes

### Home

```text
GET /
```

Displays the application's initial page.

---

### Login

```text
GET /login
```

Displays the login page.

```text
POST /login
```

Processes login credentials.

---

### Signup

```text
GET /signup
```

Displays the signup page.

```text
POST /signup
```

Creates a new user account.

---

### Logout

```text
POST /logout
```

Logs the current user out and destroys the authenticated session.

---

### Dashboard

```text
GET /dashboard
```

Displays the user's dashboard.

Handled by:

```text
DashboardController@index
```

---

# Task Routes

TodoFlow implements CRUD operations for tasks.

### View Tasks

```text
GET /tasks
```

Displays tasks.

Handled by:

```text
TaskController@index
```

---

### Create Task Page

```text
GET /tasks/create
```

Displays the task creation form.

Handled by:

```text
TaskController@create
```

---

### Store Task

```text
POST /tasks
```

Creates a new task.

Handled by:

```text
TaskController@store
```

---

### Show Task

```text
GET /tasks/{task}
```

Displays a specific task.

Handled by:

```text
TaskController@show
```

---

### Update Task

```text
PUT/PATCH /tasks/{task}
```

Updates an existing task.

Handled by:

```text
TaskController@update
```

---

### Delete Task

```text
DELETE /tasks/{task}
```

Deletes an existing task.

Handled by:

```text
TaskController@destroy
```

---

# Route → Controller → Model → Database

One of the most important concepts demonstrated by TodoFlow is how Laravel connects different layers.

For example, when a user creates a task:

```text
Browser
   │
   ▼
POST /tasks
   │
   ▼
TaskController@store()
   │
   ▼
Request Validation
   │
   ▼
Task::create()
   │
   ▼
Eloquent ORM
   │
   ▼
MySQL
   │
   ▼
Task saved
   │
   ▼
Redirect / Response
```

This is the core flow of the application.

---

# Controllers

Controllers are located in:

```text
app/Http/Controllers/
```

They contain the application's request-handling logic.

---

## AuthController

```text
app/Http/Controllers/AuthController.php
```

Responsible for authentication-related operations.

Main responsibilities include:

* Displaying login page
* Processing login
* Displaying signup page
* Creating users
* Logging users out
* Managing authentication sessions

---

## DashboardController

```text
app/Http/Controllers/DashboardController.php
```

Responsible for rendering the dashboard.

The route:

```text
/dashboard
```

calls:

```php
DashboardController@index
```

The controller retrieves the necessary information and passes it to the dashboard Blade view.

---

## TaskController

```text
app/Http/Controllers/TaskController.php
```

Responsible for task CRUD operations.

Main methods:

```text
index()
create()
store()
show()
update()
destroy()
```

These methods correspond to the different stages of task management.

---

# CRUD Implementation

TodoFlow demonstrates complete CRUD functionality.

CRUD stands for:

```text
C → Create
R → Read
U → Update
D → Delete
```

---

## Create

A task is created through the task form.

```text
POST /tasks
```

The request reaches:

```text
TaskController@store
```

The controller validates the request and uses Eloquent to create the record.

---

## Read

Tasks can be retrieved through Eloquent.

Example:

```php
Task::all();
```

or:

```php
Task::find($id);
```

The retrieved data is passed to a Blade view.

---

## Update

An existing task can be updated using:

```php
$task->update([
    'title' => $request->title,
    'description' => $request->description
]);
```

---

## Delete

A task can be removed using:

```php
$task->delete();
```

---

# Blade Templates

TodoFlow uses Laravel Blade for the frontend.

Blade files are stored inside:

```text
resources/views/
```

Examples:

```text
resources/views/auth/login.blade.php
resources/views/auth/signup.blade.php
resources/views/dashboard/index.blade.php
resources/views/tasks/index.blade.php
```

Blade allows PHP logic and Laravel functionality to be used inside HTML templates.

For example:

```blade
{{ $task->title }}
```

displays a task's title.

Loops can be written using:

```blade
@foreach($tasks as $task)
    ...
@endforeach
```

Conditional rendering can be done using:

```blade
@if(...)
    ...
@endif
```

---

# Authentication Flow

The authentication system follows this general flow:

```text
Signup
  │
  ▼
User submits form
  │
  ▼
POST /signup
  │
  ▼
AuthController
  │
  ▼
Validate input
  │
  ▼
Create User
  │
  ▼
Store user in MySQL
  │
  ▼
Login
  │
  ▼
Dashboard
```

Login follows:

```text
Login Form
    │
    ▼
POST /login
    │
    ▼
AuthController
    │
    ▼
Validate credentials
    │
    ▼
Authenticate User
    │
    ▼
Create Session
    │
    ▼
Redirect to Dashboard
```

---

# Sessions

Laravel sessions are used to maintain authentication state between requests.

After successful authentication, Laravel can identify the currently logged-in user across different pages.

This allows protected areas such as:

```text
/dashboard
/tasks
/profile
```

to remain associated with the authenticated user.

---

# CSRF Protection

Forms in Laravel use CSRF protection to prevent Cross-Site Request Forgery attacks.

Blade forms include:

```blade
@csrf
```

This generates a CSRF token that Laravel validates when the form is submitted.

For example:

```blade
<form method="POST" action="/login">
    @csrf

    ...
</form>
```

---

# Validation

Laravel provides server-side request validation.

For example, task data can be validated before inserting it into the database.

Conceptually:

```php
$request->validate([
    'title' => 'required',
    'description' => 'nullable'
]);
```

This prevents invalid data from being stored.

---

# Vite

TodoFlow uses **Vite** for frontend asset management.

The main frontend files are:

```text
resources/css/app.css
resources/js/app.js
```

Vite handles compiling and serving frontend assets during development.

Development command:

```bash
npm run dev
```

Production build:

```bash
npm run build
```

Laravel then loads the generated assets through Blade's Vite integration.

---

# Artisan

Laravel's Artisan CLI is used extensively during development.

Useful commands:

```bash
php artisan serve
```

Starts the Laravel development server.

```bash
php artisan route:list
```

Displays all registered routes.

```bash
php artisan migrate
```

Runs database migrations.

```bash
php artisan migrate:fresh
```

Drops all tables and recreates the database schema.

```bash
php artisan make:model Task
```

Creates a model.

```bash
php artisan make:controller TaskController
```

Creates a controller.

```bash
php artisan make:migration create_tasks_table
```

Creates a migration.

```bash
php artisan key:generate
```

Generates the Laravel application encryption key.

---

# Environment Configuration

Environment-specific configuration is stored inside:

```text
.env
```

Important database variables include:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todoflow
DB_USERNAME=root
DB_PASSWORD=
```

The `.env` file should **not** be committed to GitHub.

Instead, the repository should contain:

```text
.env.example
```

with placeholder configuration.

---

# Installation

## 1. Clone the repository

```bash
git clone <your-repository-url>
```

Move into the project:

```bash
cd todoflow
```

---

## 2. Install PHP dependencies

```bash
composer install
```

---

## 3. Install frontend dependencies

```bash
npm install
```

---

## 4. Create environment file

```bash
copy .env.example .env
```

On Linux/macOS:

```bash
cp .env.example .env
```

---

## 5. Generate application key

```bash
php artisan key:generate
```

---

## 6. Configure MySQL

Create a database:

```text
todoflow
```

Then update `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todoflow
DB_USERNAME=root
DB_PASSWORD=
```

---

## 7. Run migrations

```bash
php artisan migrate
```

---

## 8. Start Vite

```bash
npm run dev
```

---

## 9. Start Laravel

Open another terminal:

```bash
php artisan serve
```

The application will be available at:

```text
http://127.0.0.1:8000
```

---

# Development Workflow

A typical development workflow for TodoFlow looks like:

```text
1. User interacts with UI
          ↓
2. Blade form sends HTTP request
          ↓
3. Laravel Route receives request
          ↓
4. Controller handles request
          ↓
5. Request is validated
          ↓
6. Eloquent Model interacts with database
          ↓
7. MySQL stores/retrieves data
          ↓
8. Controller receives result
          ↓
9. Blade View renders response
          ↓
10. Browser displays updated UI
```

---

# Key Laravel Concepts Demonstrated

This project was built to practice and demonstrate several important Laravel concepts:

### MVC

Separates:

```text
Models
Views
Controllers
```

### Routing

Maps URLs and HTTP methods to controller actions.

### Controllers

Handle application/request logic.

### Models

Represent database entities.

### Eloquent ORM

Provides an object-oriented way to interact with MySQL.

### Migrations

Define and version-control database schemas.

### Blade

Laravel's server-side templating engine.

### Authentication

Handles user login, signup, logout, and sessions.

### Sessions

Maintain user state between HTTP requests.

### Validation

Ensures incoming data meets application requirements.

### CSRF Protection

Protects forms from Cross-Site Request Forgery.

### Vite

Handles frontend asset compilation and development.

### Artisan

Provides Laravel's command-line development tools.

---

# Database Layer

The database interaction can be visualized as:

```text
Laravel Application
        │
        ▼
     Eloquent
        │
        ▼
      Model
        │
        ▼
      MySQL
```

For example:

```php
$tasks = Task::all();
```

Eloquent converts the model operation into the appropriate database query and returns the results as Laravel model objects.

---

# Why Eloquent?

Without an ORM, database interaction would require writing raw SQL throughout the application.

With Eloquent:

```php
$task = Task::find($id);
```

The returned object can then be manipulated directly:

```php
$task->title;
$task->description;
$task->update([...]);
$task->delete();
```

This makes database operations cleaner and integrates naturally with Laravel's MVC architecture.

---

# Learning Outcomes

Building TodoFlow provided practical experience with:

* Laravel project structure
* MVC architecture
* PHP
* Laravel routing
* Controllers
* Models
* Eloquent ORM
* MySQL
* Database migrations
* CRUD operations
* Authentication
* Sessions
* Blade templating
* Form handling
* CSRF protection
* Validation
* Vite
* Artisan CLI
* Environment variables
* Git/GitHub workflow

---

# Future Improvements

Possible future improvements include:

* User-specific task ownership
* Task categories
* Task priorities
* Due dates
* Search and filtering
* Task completion tracking
* Pagination
* Notifications
* REST API
* Laravel Sanctum authentication
* AJAX/Fetch-based task updates
* Better validation and error handling
* Responsive UI
* Automated tests
* Database seeders and factories

---

# Project Purpose

TodoFlow was built as a practical Laravel project to understand how a modern PHP framework handles:

```text
Routing
   +
Controllers
   +
Models
   +
Eloquent
   +
Migrations
   +
MySQL
   +
Blade
   +
Authentication
   +
Frontend Assets
```

Rather than simply creating a static Todo application, the project demonstrates how these Laravel components work together to build a complete CRUD-based web application.

---

## Author

**Suryansh Singh**

GitHub: `suryanshsingh-1275`
