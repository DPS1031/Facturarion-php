# PHP Billing System (MVC)

This is a simple **Billing System** developed in **PHP** following the **Model-View-Controller (MVC)** pattern. It allows users to perform basic **CRUD operations** (Create, Read, Update, Delete) on products and customers. The system is designed for educational purposes, with a focus on core PHP and database interaction using **MariaDB**.

##  Features

- CRUD for **Products**
- CRUD for **Customers**
- Organized using the **MVC architecture**
- Built with **core PHP** (no frameworks)
- Uses **PDO** for secure database access
- Simple HTML-based user interface
- Runs locally with **XAMPP**


## Requirements

- PHP 7.x or higher  
- MariaDB or MySQL  
- XAMPP or similar local server  

## How to Run

1. Clone or download the repository.
2. Place the project folder inside `htdocs` (if using XAMPP).
3. Start **Apache** and **MySQL** from XAMPP.
4. Import the SQL file into your database (e.g., `facturacion_db`).
5. Update `Config/conexion.php` with your DB credentials.
6. Access the system via http://localhost(WebServerPort)/ProyectoFacturacion/Vista

## Notes

- The database must include the `personas` and `productos` tables.
- Tables without foreign key constraints are ideal for individual CRUD interfaces.

## License

This project is for educational purposes only.


