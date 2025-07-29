# Laravel To-Do List ✅

This is a very simple **To-Do List application** built using the **Laravel PHP Framework**. It allows users to:

- ✅ Add new tasks
- ❌ Delete completed tasks
- 📄 View the list of current tasks

---

## 📁 Features

- Laravel 12 (latest)
- MySQL database (via XAMPP)
- Blade templating
- Basic CRUD (Create, Read, Delete)
- Clean UI with HTML forms
- Fully functional backend

---

## 🚀 Requirements

- PHP 8.x+
- Composer
- Node.js & NPM
- Laravel CLI
- MySQL (running via XAMPP)
- VS Code (optional)

---

## ⚙️ How to Run Locally

### Step 1: Clone the Repository

```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
````

### Step 2: Install Dependencies

```bash
composer install
npm install
npm run dev
```

### Step 3: Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

Set your database info in `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=root
DB_PASSWORD=
```

### Step 4: Run Migrations

```bash
php artisan migrate
```

### Step 5: Serve the App

```bash
php artisan serve
```

Then visit `http://localhost:8000` in your browser.

---

## 💻 File Structure

* `/app/Models/Task.php` → Task model (with mass assignment)
* `/app/Http/Controllers/TaskController.php` → Controller for handling CRUD
* `/resources/views/tasks.blade.php` → Blade template (HTML UI)
* `/routes/web.php` → Routes for GET, POST, DELETE

---

## 🧠 Concepts Covered

* Laravel MVC pattern
* Blade templating
* Routing & Controllers
* Form validation
* Eloquent ORM
* CSRF protection

---

## 📜 License

This project is open-source and free to use for learning purposes. ⭐

---

## ✨ Author

**Obaidullah** — *Laravel Beginner learning through projects*
Feel free to contribute or ask questions!

````

---

### ✅ How to Upload to GitHub

1. Save the file as `README.md` in your project root directory.
2. Add, commit, and push to GitHub:
   ```bash
   git add README.md
   git commit -m "Add README"
   git push origin main
````

