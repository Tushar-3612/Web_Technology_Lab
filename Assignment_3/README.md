# XAMAPP SERVER STEP BY STEP INSTALLATION 

---

# 1) Download & Install XAMPP

1. Go to Google → Search **XAMPP download** → open official **apachefriends.org**.
2. Download the **Windows installer**.
3. Run installer → keep **Apache, MySQL, PHP, phpMyAdmin** checked.
4. Install in **C:\xampp** (default).
5. Open **XAMPP Control Panel** → click **Start** for **Apache** and **MySQL**.

   * If it doesn’t start → change ports:

     * Apache → 80 → 8080 and 443 → 4433
     * MySQL → 3306 → 3307

---

# 2) Test the Server

* Open browser:

  * Apache test: **[http://localhost/](http://localhost/)** (or **[http://localhost:8080/](http://localhost:8080/)** if you changed port).
  * phpMyAdmin: **[http://localhost/phpmyadmin/](http://localhost/phpmyadmin/)**.
* Create test file:

  1. Inside `C:\xampp\htdocs\myapp\index.php`
  2. Add code:

     ```php
     <?php phpinfo();
     ```
  3. Open **[http://localhost/myapp](http://localhost/myapp)** → PHP should work.

---

# 3) Database (if needed)

* Open **phpMyAdmin** → create a new database.
* Import your `.sql` file if you have one.
* When you push to GitHub → export your DB and keep it inside your project (e.g. `/db/yourdb.sql`).

---

# 4) Correct Folder for GitHub

* Only push your **project folder** (like `C:\xampp\htdocs\myapp`).
* ❌ Do **NOT** push the whole `C:\xampp` folder.

Example structure:

```
myapp/
  ├─ index.php
  ├─ src/
  ├─ assets/
  ├─ db/yourdb.sql
  ├─ README.md
  └─ .gitignore
```

---

# 5) .gitignore file

Create `.gitignore` inside project:

```
# System files
.DS_Store
Thumbs.db

# IDE
.idea/
.vscode/

# PHP
vendor/
composer.phar

# Environment files
.env
*.log

# Node (if frontend tools used)
node_modules/
dist/
```

---

# 6) Push Project to GitHub

1. Create a **new empty repo** on GitHub (example: `myapp`).
2. Open VS Code/Terminal in your project folder:

   ```bash
   cd C:\xampp\htdocs\myapp
   git init
   git add .
   git commit -m "Initial commit"
   git branch -M main
   git remote add origin https://github.com/<your-username>/<your-repo>.git
   git push -u origin main
   ```

---

# 7) README.md example

Write a **README.md** so others know how to run:

```
# MyApp

## Local Setup with XAMPP
1. Install XAMPP (Apache + MySQL).
2. Copy project into `htdocs/myapp`.
3. If database is needed, create it in phpMyAdmin and import `db/yourdb.sql`.
4. Run: http://localhost/myapp (or :8080/myapp if port changed).
```

---

# 8) Run on Another PC

1. Install XAMPP.
2. Clone project inside `htdocs`:

   ```bash
   git clone https://github.com/<your-username>/<your-repo>.git myapp
   ```
3. Import DB using phpMyAdmin.
4. Open in browser → **[http://localhost/myapp](http://localhost/myapp)**.

---

# 9) Common Problems

* Apache not starting → change port 80 → 8080.
* MySQL not starting → change port 3306 → 3307.
* Blank page → enable errors in `php.ini` (set `display_errors=On`).

---


