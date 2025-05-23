# Laravel To-Do List Application

A simple and modern To-Do List web application built with Laravel, PHP, MySQL, Blade templating, Bootstrap, Tailwind CSS, and Laravel Breeze for authentication.

---

## Features

- User registration and login using Laravel Breeze
- Add, edit, delete, and view tasks
- Tasks categorized by status: Pending, In Progress, Completed
- Responsive UI with Bootstrap and Tailwind CSS
- Group tasks by date
- Task priority highlighting (e.g., High Priority tasks)
- Clean and intuitive Blade views
- Pagination for tasks listing

---

## Technologies Used

- **Backend:** Laravel PHP Framework
- **Database:** MySQL
- **Frontend:** Blade Templates, Bootstrap 5, Tailwind CSS
- **Authentication:** Laravel Breeze (simple, minimal auth scaffolding)
- **Version Control:** Git & GitHub

---

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/your-username/your-repo.git
   cd your-repo


composer install
npm install
npm run dev


cp .env.example .env


DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password


php artisan key:generate


php artisan migrate

php artisan serve

Open your browser at http://localhost:8000


Usage
Register a new user or login with existing credentials.

Use the dashboard to add new tasks.

View tasks filtered by status or date.

Edit or delete tasks as needed.

High priority tasks will be highlighted in the interface.


Folder Structure
app/Http/Controllers - Application logic for handling requests

resources/views - Blade templates for frontend UI

routes/web.php - Web routes

public/ - Public assets (CSS, JS, images)

database/migrations - Database table schemas


Contributions
Contributions are welcome! Feel free to message me for better things.

License
This project is open-source and available under the Dnyaneshwar Shinde(dnyanu45) License.
