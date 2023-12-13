# Blingyplus Employee Management System

A simple Employee Management System built with Laravel, including CRUD operations, data visualization using Chart.js, and Excel export/import functionality.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Sample](#sample)
- [Technologies Used](#technologies-used)
- [License](#license)

## Features

- Create, Read, Update, and Delete (CRUD) operations for employee records.
- Visualize the number of registered employees using Chart.js on the dashboard.
- Export employee data to Excel and import data from Excel for bulk insertion or update.
- PDF export functionality to generate a downloadable report of employees.

## Installation

### Prerequisites

- PHP (>= 8.1)
- Composer
- Node.js (with npm)
- MySQL
- [wkhtmltopdf](https://wkhtmltopdf.org/) (for PDF export)

### Steps

1. Clone the repository:

    ```bash
    git clone https://github.com/blingyplus/employeems.git
    ```

2. Navigate to the project directory:

    ```bash
    cd employeems
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Install JavaScript dependencies:

    ```bash
    npm install
    ```

5. Copy the `.env.example` file to `.env` and configure your database connection:

    ```bash
    cp .env.example .env
    ```

6. Generate the application key:

    ```bash
    php artisan key:generate
    ```

7. Run database migrations and seeders:

    ```bash
    php artisan migrate --seed
    ```

8. Start the development server(backend):

    ```bash
    php artisan serve
    ```

9. Start the development server in another terminal tab(frontend):

    ```bash
    npm run dev
    ```

10. Open your browser and visit [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Usage

- Access the Employee Management System at [http://127.0.0.1:8000](http://127.0.0.1:8000).
- Use the dashboard to view the number of registered employees.
- Perform CRUD operations on employee records.
- Export and import employee data in Excel format.
- Generate a downloadable PDF report of employees.

## Sample

[Click to view how it looks like](https://employeems.outstanden.com/)

## Technologies Used

- Laravel
- Laravel Jetstream 
- Chart.js
- Excel (Maatwebsite/Laravel-Excel)
- PDF (barryvdh/laravel-snappy)

## License

This project is licensed under the [MIT License](LICENSE).

---
