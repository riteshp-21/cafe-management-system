# Cafe Management System

Cafe Management System is a PHP and MySQL web application for cafe billing and daily operations. It includes order taking, receipt printing, category and product management, user management, and monthly sales reporting.

## Features

- Admin and staff login
- Coffee-themed login page
- Product management
- Category management
- Order taking and billing
- Save unpaid orders
- Receipt and bill printing
- Order list view
- Monthly sales reports
- User management

## Project Structure

```text
Billing_Cafe_System/
|-- assets/
|-- billing/
|-- database/
|-- Documentation/
|-- admin_class.php
|-- ajax.php
|-- categories.php
|-- db_connect.php
|-- header.php
|-- home.php
|-- index.php
|-- login.php
|-- manage_user.php
|-- navbar.php
|-- orders.php
|-- products.php
|-- receipt.php
|-- sales_report.php
|-- site_settings.php
|-- topbar.php
|-- users.php
|-- view_order.php
|-- README.md
`-- .gitignore
```

## Requirements

- XAMPP
- Apache
- MySQL
- PHPMyAdmin
- Web browser

## Installation

1. Copy the project folder to `C:\xampp\htdocs\Billing_Cafe_System`.
2. Open XAMPP Control Panel.
3. Start `Apache` and `MySQL`.
4. Open `http://localhost/phpmyadmin`.
5. Create a database named `cafe_billing_db`.
6. Import `database/cafe_billing_db.sql`.
7. Open the project:

`http://localhost/Billing_Cafe_System`

Direct login page:

`http://localhost/Billing_Cafe_System/login.php`

## Default Accounts

Admin
- Username: `admin`
- Password: `admin123`

Staff
- Username: `staff`
- Password: `staff123`

If the accounts are missing or changed, import:

`database/reset_default_users.sql`

## Database Configuration

Default settings in `db_connect.php`:

- Host: `localhost`
- Username: `root`
- Password: empty
- Database: `cafe_billing_db`

If your MySQL username or password is different, update `db_connect.php`.

## Important Notes

- The project now runs directly from the root URL and does not require a `PHP files` path in the browser.
- Use PHPMyAdmin only for creating or importing the database.
- The application runs in the browser through localhost, not inside phpMyAdmin.
- If the browser still shows old content, use `Ctrl + F5` for a hard refresh.
