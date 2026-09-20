# NutriNet 🥗

NutriNet is a PHP / MySQL web platform dedicated to a healthy and balanced lifestyle. It offers nutrition products (proteins, creatine, vitamins), recipes with ratings and reviews, private coaching sessions with a video room, and a customer-complaint (réclamation) service. A back office lets administrators manage everything.

---

## 📌 Table of contents

- [Front office features](#-front-office-features)
- [Back office features](#-back-office-features)
- [Database](#-database)
- [Tech stack](#-tech-stack)
- [Project structure](#-project-structure)
- [Prerequisites](#-prerequisites)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Required folders and media](#-required-folders-and-media)
- [Usage](#-usage)
- [Known limitations](#-known-limitations)

---

## 🛍️ Front office features

### Presentation
- **About Us** page: presentation of the NutriNet team (photo, name, role, social links) and of the project objectives.
- **Home page** with a banner slider and product carousels (Creatine, Vitamines, Whey Protein).
- Header menu: Accueil, Products, Reclamation, Séance de coaching, Recette, plus a side navigation menu.
- Cart and Account shortcuts in the header.
- Google Translate widget on the pages.

### User accounts
- **Sign up**: photo upload, name, phone, email, address, role (User / Admin), password and password confirmation, Google reCAPTCHA.
  - Validation: name longer than 3 characters, password longer than 8 characters, phone number of exactly 8 digits.
- **Sign in** with email and password (session + 30-day cookie).
  - Admin accounts are redirected to the back office dashboard, other users to the home page.
- **Forgot password**: the user enters an email address and receives an email (PHPMailer / SMTP) with their password.

### Products
- Product catalog displayed as cards (image, name, description, quantity, price in TND).
- **Search by category** (category drop-down).
- **Sorting** by quantity or by price, ascending or descending.
- **Pagination** (6 products per page).
- **Product details page**: image, name, price, description, add-to-cart form, product ID / flavors / format information, and a "Related" section.
- Google Maps map showing the NutriNet location.
- Full-screen button.

### Shopping cart (Panier)
- Cart table showing user, product, price, quantity and total.
- Sortable columns (click on a column header).
- **Add** a product to the cart (product, price, quantity, idItems, idUser).
- **Update** (Modifier) and **delete** (Supprimer) a cart line.
- **Commander** button leading to the order form.

### Order / contact form
- Form with name, description, price and stock, with client-side validation.
- The order is saved in the `items` table (listed in the back office under "Commandes").
- A confirmation email ("Commande Effectuer") is sent through PHPMailer.

### Recipes
- **Recipes page** with a slideshow of recipes (image + description) and previous / next controls.
- **Search a recipe** by description.
- **Rate a recipe** with 1 to 5 stars and leave a comment (saved as a rating linked to the recipe).
- **Reviews page** ("Voir Plus"):
  - average rating and number of reviews,
  - distribution bars for 5, 4, 3, 2 and 1 stars,
  - list of ingredients (with icons),
  - recipe video,
  - user comments displayed as speech bubbles.
- **Recipe list** page showing image, description, ingredients and video.
- **PDF export** of the recipe list (image + description) with a "Save as PDF" button (html2canvas + jsPDF).

### Coaching sessions
- Coaching home page with two choices: access a coaching session, or create one.
- **Coach registration**: last name, first name, sex, speciality, diploma, password.
  - Client-side validation: names with letters only, password of at least 6 characters containing at least one digit, image CAPTCHA.
- **Coach login** with last name, first name and password.
- **Create a coaching session**: duration, access (private / public), subject, and a code for private sessions.
- **List of coaching sessions**: session details (ID, duration, access, subject, code) together with the coach's information (name, sex, speciality, diploma).
- **Join session** link opening the video room, built from the room's `APP_ID`, `TOKEN` and `CHANNEL`.

### Complaints (Réclamations)
- Complaint form: name, title, category (Séances de coaching / Les recette / Produits / Other), description, email.
- **Image CAPTCHA** picked randomly from the `captcha` table.
- On submission the complaint is saved with today's date and the status **New**.
- Random background music with a play / mute button, and a full-screen button.
- **User complaints page**: select a complaint by its (encrypted) ID to see its details and the responses it received; the responses table is sortable.
- Complaint and response IDs are encrypted in the URLs.

---

## 🛠️ Back office features

Admin sidebar: Dashboard, Ajout produit, Produit, Categories, Ajouter Categories, Reclamation, Tables, Commandes, Coach, Séance de coaching, Profile.

### Dashboard
- Session check (redirects to sign-in when not logged in).
- **Bar chart** of product quantity per category.
- **Line chart** of profit per product (selling price − purchase price) — Chart.js.

### Products
- List of products: ID, name, selling price, purchase price, description, quantity, category, image.
- **Add** a product (with image upload and category selection).
  - Validation: name between 3 and 40 characters, numeric prices, description between 10 and 500 characters, quantity between 1 and 200.
- **Update** and **delete** a product.
- **Download the product list** as a CSV file (`productlist.csv`, with the category name).

### Categories
- List, **add** (with validation), **update** and **delete** categories.

### Complaints and responses
- Table of complaints with sortable columns (Id, Nom, Title, Description, Email, Category, Date, Status) and a search box.
- **Respond** to a complaint by email directly from its row (title, message, name); an HTML email with a reference number is sent to the client and the response is saved.
- Table of responses (Id, Title, Message, Date, Mail, Nom, Id Reclam) with sortable columns and a search box.
- **Add a response** for any complaint through a "Message" form (select the complaint ID).
- **Update** a complaint (category and status: New / Running / Complete) and **update** a response.
- **Delete** a complaint or a response (encrypted IDs; auto-increment values are reset after deletion).
- Link to add a complaint from the front office.

### Users
- **Users table**: photo, name, email, role, phone, address, and an "Edit" link.
- **Edit a user**: photo, name, phone, email, address, role, password (same validation rules as sign up), or **delete the account**.
- **Profile page** of the logged-in user: photo, name, email, phone, role, **log out** and **delete account**.

### Orders (Commandes)
- Table of orders (name, description, price, stock).
- **Search** by name, **sortable columns**, DataTables.
- **Edit** and **delete** an order.

### Coaches
- List of coaches (ID, name, first name, sex, speciality, diploma, password).
- **Update** and **delete** a coach; link to add a coach.

### Coaching sessions
- List of coaching sessions (ID, duration, access, subject, code).
- **Update** (a private session requires a code of at least 6 characters) and **delete** a session; link to add one.

### Recipes and ratings
- **Recipes CRUD**: description, image URL, video, ingredients (list, add, update, delete).
- **Ratings CRUD**: ratings grouped by recipe with note, comment and recipe ID (list, add, update, delete).

---

## 🗄️ Database

Database name: `projet` (see `projet.sql`).

Tables: `captcha`, `categorie`, `coach`, `coaching_session`, `items`, `panier`, `produit`, `rating`, `recette`, `reclam`, `response`, `room`, `user`.

---

## 🧱 Tech stack

| Layer     | Technology                                               |
|-----------|----------------------------------------------------------|
| Language  | PHP (Controller / Model classes + views)                 |
| Database  | MySQL / MariaDB (PDO)                                    |
| Front-end | HTML, CSS, JavaScript, jQuery, Bootstrap                 |
| Templates | Material Dashboard and Soft UI Dashboard (back office)   |
| Mail      | PHPMailer (SMTP) and PHP `mail()`                        |
| Charts    | Chart.js                                                 |
| Tables    | DataTables                                               |
| PDF       | html2canvas + jsPDF                                      |
| Video     | Room with `APP_ID`, `TOKEN` and `CHANNEL`               |
| Other     | Google reCAPTCHA, Google Maps, Google Translate          |

---

## 📁 Project structure

```
.
├── Controller/          # Classes that talk to the database (ProduitC, CategorieC, CoachC, SCC, roomC,
│                        # recetteC, ratingConx, ReclamController, UserC, PanierC, ItemsC, ...)
├── Model/               # Entity classes (Produit, Categorie, Coach, SC, room, recette, rating,
│                        # Reclam, Response, Captcha, User, Panier, Items)
├── View/
│   ├── frontoffice/     # Public pages
│   └── backoffice/
│       └── pages/       # Admin pages
├── config.php           # PDO connection
└── projet.sql           # Database structure and data
```

---

## 📋 Prerequisites

- **PHP 7.4 or higher** with the `pdo_mysql` extension (the models use typed properties).
- **MySQL or MariaDB** (the provided dump was generated with MariaDB 10.4).
- A **web server that runs PHP**, such as Apache through XAMPP / WAMP.
- **PHPMailer**, used for the "forgot password" email and the order confirmation email.
- **Composer** (optional, to install PHPMailer).

---

## 🚀 Installation

1. **Get the project** and put it in your web server folder (`htdocs` with XAMPP):
   ```bash
   git clone https://github.com/mohamedaminesaidane/NutriNet.git
   cd NutriNet
   ```

2. **Create the database and import the dump** (or import `projet.sql` with phpMyAdmin):
   ```bash
   mysql -u root -p -e "CREATE DATABASE projet CHARACTER SET utf8mb4"
   mysql -u root -p projet < projet.sql
   ```
   > Check the [known limitations](#-known-limitations): the dump does not fully match the columns used by the code for `recette` and `user`.

3. **Install PHPMailer**
   - `send.php` (forgot password) loads it from `vendor/phpmailer/phpmailer/src/` at the project root:
     ```bash
     composer require phpmailer/phpmailer
     ```
   - `formulaire.php` (order form) loads it from a `PHPMailer/src/` folder inside `View/frontoffice/` (files `Exception.php`, `PHPMailer.php`, `SMTP.php`).

4. **Configure the project**: database connection, SMTP settings and API keys (see [Configuration](#-configuration)).

5. **Create the folders and media files** the pages expect (see [Required folders and media](#-required-folders-and-media)).

6. **Start the server**
   - With XAMPP / WAMP: start Apache and MySQL, then open `http://localhost/NutriNet/View/frontoffice/index.html`.
   - Or with PHP's built-in server, from the project root:
     ```bash
     php -S localhost:8000
     ```
     then open `http://localhost:8000/View/frontoffice/index.html`.

---

## 🔧 Configuration

| What | File | Setting |
|------|------|---------|
| Database connection | `config.php` and `conx.php` | Host, database name, user, password. Default: `localhost`, `projet`, `root`, empty password. Both files must be updated (`conx.php` is used by the ratings controller). |
| Forgot-password email | `View/frontoffice/send.php` | SMTP host (`smtp.gmail.com`), port `587`, TLS, username, password, sender. |
| Order confirmation email | `View/frontoffice/formulaire.php` | Same SMTP settings, sender and recipient. |
| Complaint replies | `View/backoffice/pages/Reponce.php` | Sender address (`$from`) and the email addresses offered in the "Email" drop-down. Emails are sent with PHP's `mail()`, so your server must be set up to send mail. |
| Google reCAPTCHA | `View/frontoffice/sign-up.php` | `data-sitekey` of the reCAPTCHA widget. |
| Google Maps | `View/frontoffice/products.php` | API key in the Google Maps script URL and the store coordinates in `initMap()`. |
| Video rooms | `room` table | One row per room: `APP_ID`, `TOKEN`, `CHANNEL`, `availability`. |

> Use your own credentials and keys, and do not commit real ones to the repository.

---

## 📂 Required folders and media

| Location | Used for |
|----------|----------|
| `View/backoffice/pages/image/` | Product images uploaded from the back office (must be writable). Displayed by the front office. |
| `View/frontoffice/images/captcha/` | CAPTCHA images referenced in the `captcha` table. |
| `View/frontoffice/images/recette/` | Recipe images and videos. |
| `View/frontoffice/images/Members/` | Team photos shown on the About Us page. |
| `View/frontoffice/music/` | `.mp3` files played randomly on the complaint page. |
| `uploads/` | Profile photos (`../uploads/` relative to the page handling the upload; must be writable). Accepted: JPG, JPEG, PNG, GIF, 500 KB maximum. |

---

## 🧭 Usage

### First admin account
1. Open `View/frontoffice/sign-up.php` and create an account with the role **Admin**.
2. Sign in from `View/frontoffice/sign-in.php`: admins are redirected to the back office, other users to the home page.

### Main entry points

**Front office** (`View/frontoffice/`)

| Page | Purpose |
|------|---------|
| `index.html` / `indexx.php` | Home page |
| `sign-up.php`, `sign-in.php`, `send.php` | Registration, login, forgot password |
| `AboutUs.php` | Team and objectives |
| `products.php`, `product_details.php` | Products |
| `panier.php`, `formulaire.php` | Cart and order form |
| `acceuil.php`, `recette.php`, `avis.php`, `chercher.php`, `pdf.php` | Recipes, reviews, search, PDF export |
| `reclam.php`, `UserReclam.php` | Complaint form and complaint follow-up |
| `seance de coaching accuille.html`, `creation.html`, `addCoach.php`, `login.php`, `addSC.php`, `listSCU.php` | Coaching sessions |

**Back office** (`View/backoffice/pages/`)

| Page | Purpose |
|------|---------|
| `dashboard.php`, `chart_data.php` | Dashboard and charts |
| `produit.php`, `ajoutprod.php`, `categories.php`, `ajoutcat.php` | Products and categories |
| `Reponce.php` | Complaints and responses |
| `tables.php`, `profile.php`, `profile_edit.php` | Users and profile |
| `billing.php` | Orders (Commandes) |
| `listCoach.php`, `listSC.php` | Coaches and coaching sessions |
| `listrecettes.php`, `listRatings.php` | Recipes and ratings (not in the sidebar menu, open them directly) |

---

## 🚧 Known limitations

- **Passwords are stored in plain text** (users and coaches), and the "forgot password" email sends the password itself.
- **Some SQL queries are built by concatenating values** instead of using prepared statements: `showProduit`, `showCategorie`, `showCoach`, `showItems`, `showPanier`, `showReclam`, `showResponse` and `recupererUtilisateurEmail`.
- **SMTP credentials and Google keys are written directly in source files** (`send.php`, `formulaire.php`, `sign-up.php`, `products.php`). Replace them with your own.
- **The role (including Admin) is chosen freely at sign-up.**
- **Most back office pages do not check that the visitor is logged in.**
- **`projet.sql` does not fully match the code**:
  - the `recette` table has no `video_id` and `ingredients` columns, which the recipe code uses;
  - the `user` table uses `idUser` / `nom`, while the user code uses `id` / `name`.
- **Some classes are defined in several Controller files** (`SCC`, `roomC`, `CategorieC`, `ResponseController`): include only one of those files per page to avoid "cannot redeclare class" errors.
- **Folder and file names are written with different cases in the code** (`Controller` / `controller`, `Model` / `model`, `CoachC.php` / `coachC.php`). It works on Windows, but on Linux / macOS (case-sensitive) the paths must be made consistent.

---


