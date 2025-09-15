# Assignment 4 - Basic Data Fetched Application

## 📌 Overview
This project is a **Basic CRUD (Create, Read, Update, Delete) Web Application** built using:
- **PHP** (for backend logic)
- **MySQL** (for database operations)
- **HTML, CSS, JavaScript** (for frontend UI and interactivity)

The application allows users to:
- Insert student records (Name & Marks)
- Update existing records
- Delete records
- Display all records in a table

---

## 🗂️ Project Structure
Assignment-4/

│── getdata2.php # PHP backend file for DB operations

│── index.html # Frontend HTML + JS file

│── style.css # Styling file

---


---

## ⚙️ Features
- ✅ Insert Data (Name & Marks)
- ✅ Delete Data (by Name)
- ✅ Update Data (Name & Marks)
- ✅ Display All Records (in table format)
- ✅ Success & Error Messages with UI feedback

---

## 🛠️ Technologies Used
- **Frontend:** HTML5, CSS3, JavaScript (Fetch API)
- **Backend:** PHP (MySQLi with prepared statements)
- **Database:** MySQL

---

## 🗄️ Database Setup
Run the following SQL commands in **MySQL**:

```sql
CREATE DATABASE info;

USE info;

CREATE TABLE userinfo (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50) NOT NULL,
    Mark INT NOT NULL
);



```

---
Option 2: phpMyAdmin (Manual)

Open phpMyAdmin at http://localhost/phpmyadmin.

Create a new database named info.

Inside the info database, create a table named userinfo with the following structure:

Column	Type	Extra
ID	INT	AUTO_INCREMENT, PRIMARY KEY
Name	VARCHAR(50)	NOT NULL
Mark	INT	NOT NULL



