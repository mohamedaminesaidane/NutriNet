# NutriNet 🥗

NutriNet is a PHP/MySQL web platform for a nutrition-focused business. It combines an
e-commerce storefront (proteins, creatine, vitamins), a private coaching-session booking
system with video rooms, a recipe hub with ratings/reviews, and a customer-complaint
(reclamation) support desk — plus a full back-office admin dashboard.

> Legacy academic/student project, refactored for GitHub. PRs and issues welcome.

## ✨ Features

**Front office**
- Product catalog with categories, search, sorting and pagination
- Shopping cart (panier) with add / update / delete
- Coaching sessions: coach sign-up/login, session creation, private/public access with
  join codes, and a live video room (Agora-style `APP_ID` / `TOKEN` / `CHANNEL`)
- Recipes: browse, comment, star-rating, and an aggregated reviews page
- Complaints ("réclamations") form with image CAPTCHA, category selection and email
  notifications (PHPMailer)
- User authentication: sign up, sign in, "forgot password" email, profile editing,
  profile photo upload

**Back office (admin)**
- Dashboard with charts (Chart.js) for stock levels and profit by product
- CRUD for products, categories, coaches, coaching sessions, recipes and ratings
- Complaint management with sortable/searchable tables and email replies
- CSV export of the product list
- User/table management

## 🧱 Tech stack

| Layer      | Technology                                               |
|------------|-----------------------------------------------------------|
| Language   | PHP (procedural + lightweight MVC-style Controller/Model) |
| Database   | MySQL / MariaDB (PDO)                                     |
| Front-end  | Bootstrap 4/5, Material Dashboard, vanilla JS/jQuery       |
| Mail       | PHPMailer (SMTP)                                          |
| Video      | Agora-style room tokens                                   |
| Other      | Chart.js, DataTables, Google reCAPTCHA, Google Translate  |

## 📁 Project structure

```
.
├── Controller/          # DB-facing "controller" classes (ProduitC, CoachC, UserC, ...)
├── Model/                # Simple PHP model/entity classes
├── View/
│   ├── frontoffice/      # Public-facing pages
│   └── backoffice/       # Admin dashboard pages
├── vendor/               # Composer dependencies (PHPMailer, etc.)
├── config.php            # PDO database connection
└── projet.sql            # Database schema + seed data
```

> Note: several files exist in more than one place with the same name (Controller/Model
> vs. root) — this reflects the project's original, pre-refactor layout. Consolidating
> these into a single PSR-4 namespace is a good first improvement if you continue the
> project.

## 🚀 Getting started

### Prerequisites
- PHP >= 7.4 (8.x recommended) with `pdo_mysql` extension
- MySQL or MariaDB
- Composer (for PHPMailer / other vendor packages)
- A local web server (Apache/XAMPP/WAMP/MAMP or `php -S`)

### Installation

1. **Clone the repo**
   ```bash
   git clone https://github.com/<your-username>/nutrinet.git
   cd nutrinet
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Create the database**
   ```bash
   mysql -u root -p -e "CREATE DATABASE projet CHARACTER SET utf8mb4"
   mysql -u root -p projet < projet.sql
   ```

4. **Configure the DB connection**

   Edit `config.php` (and `conx.php` if still present) with your credentials:
   ```php
   new PDO('mysql:host=localhost;dbname=projet', 'root', '', [...]);
   ```

5. **Set mail credentials** (used for password reset & complaint replies)

   Update the SMTP settings in `send.php` and `Reponce.php` — **do not commit real
   credentials**; use environment variables or a `.env` file instead (see
   [Security notes](#-security-notes)).

6. **Serve the app**
   ```bash
   php -S localhost:8000
   ```
   or point your Apache/XAMPP `htdocs` at the project root.

7. Visit `http://localhost:8000/View/frontoffice/index.html` for the storefront, and
   `http://localhost:8000/View/backoffice/pages/dashboard.php` for the admin panel.

## ⚠️ Security notes

This project was originally built as a learning exercise, and the current code has a
few issues that **must** be fixed before any real deployment:

- SQL queries built with string concatenation in some places (e.g. `showProduit`,
  `showCoach`) — should use prepared statements everywhere.
- Passwords stored in plain text — use `password_hash()` / `password_verify()`.
- SMTP credentials and API keys hard-coded in source files — move to environment
  variables / a secrets manager and rotate any exposed keys immediately.
- `projet.sql` contains sample data with plaintext passwords — do not import
  production data into this schema as-is.

## 🧪 CI / Pipeline

A GitHub Actions workflow (`.github/workflows/ci.yml`) is included and runs on every
push / pull request. It currently:

1. Sets up PHP and Composer dependencies
2. Lints every `.php` file with `php -l` (syntax check)
3. Boots a MySQL service and imports `projet.sql` to confirm the schema is valid
4. (Optional, commented in the workflow) runs PHP_CodeSniffer / PHPStan if you add them

Extend the pipeline with PHPUnit tests as you add test coverage.

## 🗺️ Roadmap ideas

- [ ] Move credentials to `.env` + `vlucas/phpdotenv`
- [ ] Namespace and autoload with Composer (PSR-4) instead of manual `include`
- [ ] Hash passwords, add CSRF tokens to forms
- [ ] Add PHPUnit tests for the `Controller` classes
- [ ] Deduplicate Controller/Model files that are copy-pasted in multiple folders

## 📄 License

Add a license of your choice (MIT is a common default for student/portfolio projects).

## 🙋 Team / Credits

Originally built by a student team (see `AboutUs.php` for the roster) as part of an
academic project.
