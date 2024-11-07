# Project Report

## Web Application for Library Book Management

**Date:** November 7, 2024  
**Authors:** Akerlie Lafleur & Pamela Ortiz  

---

### 1. Introduction

The project involves creating a web application for library book management. The main goal is to streamline book administration by allowing users to intuitively add, delete, display, and search books. Additionally, the application includes a "New Arrivals" section, which showcases the recently added books. The project was developed using the Laravel framework, with a MySQL database and responsive design provided by Tailwind CSS.

The need for this project arose in several libraries where manual book management becomes time-consuming and prone to errors. The goal was to simplify this management through a modern and accessible digital solution.

### 2. Project Architecture

The project follows the MVC (Model-View-Controller) architecture, which enables a clear separation between business logic, presentation, and data management. This structure ensures better code organization and makes the project scalable.

- **Model**: Represents the data and interacts directly with the database. In this project, the `Book` and `Message` models handle books and user contact messages, respectively.
- **View**: Responsible for displaying data. Views in this project are created using Laravel’s Blade template engine and styled with Tailwind CSS for a modern and responsive interface.
- **Controller**: Links the view and the model, managing data retrieval from the model and passing it to the view. For instance, the `BookController` manages book addition, display, and deletion.

This separation between model, view, and controller has helped maintain clean and organized code, which facilitates future updates.

### 3. Database Setup

A MySQL database was used to store book and message information. The setup process began by creating the `library_management` database via MySQL, followed by configuring Laravel's `.env` file to establish the connection. This allowed Laravel to interact seamlessly with the database.

Migrations were used to create tables in the database—a key feature in Laravel that allows for versioning database changes. Two main tables were created:

- `books` table to store book information (title, author, genre, etc.).
- `messages` table to manage messages sent by users via the contact form.

This approach ensured a consistent data structure and simplified data handling throughout the project.

### 4. Feature Development

The main functionalities were developed using Laravel’s core features, including controllers, views, and models.

#### Book Management (CRUD)

One of the project’s core features is book management. The `BookController` was created to manage the following operations:

- **Display Book List**: Lists all books in the database.
- **Add Book**: A form for adding new books. The controller handles saving the book in the database.
- **Delete Book**: Each book in the list has a button to delete it from the database.
- **Search Book**: A search field allows users to filter books by title, author, or genre.

The book management logic leverages Laravel's Eloquent ORM, which simplifies database interactions.

#### Displaying New Arrivals

A key aspect of the application is the "New Arrivals" section, highlighting books most recently added to the library. This feature is implemented in the controller using an Eloquent query that filters books added in the current year.

The `newArrivals` function uses `whereYear` to filter books based on their addition date, showing only those created within the current year. Then, `orderBy` sorts these books by creation date in descending order, so the most recently added books appear first.

```php
public function newArrivals() {
    $currentYear = date('Y');
    $recentBooks = Book::whereYear('created_at', '>=', $currentYear)
                        ->orderBy('created_at', 'desc')
                        ->get();
    return view('books.newArrivals', compact('recentBooks'));
}

This query enables sorting by addition date, and the results are sent to a dedicated `books.newArrivals` view for display, allowing users to quickly see the latest library additions.

### Message Management
The project also includes a contact form for users to send messages. The `MessageController` manages message submissions and stores them in the `messages` table. Messages are then displayed in a dedicated section, enabling administrators to monitor user feedback.

---

## 5. Steps to Start the Project
To run the application locally, follow these steps:

1. **Clone the repository**:

    ```bash
    git clone https://github.com/o-Bunny-o/library-management.git
    ```

2. **Install dependencies**:

    ```bash
    cd library-management
    composer install
    ```

3. **Set up the database**:
    - Create a MySQL database (e.g., `library_management`) on your local or remote server.
    - Edit the `.env` file at the root of the project to configure the database connection. Example configuration:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=library_management
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4. **Run migrations**:

    ```bash
    php artisan migrate
    ```

5. **Clear configuration and route caches**:

    ```bash
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    ```

6. **Install front-end dependencies and build CSS**:

    ```bash
    npm install
    npm run build
    ```

7. **Start the development server**:

    ```bash
    php artisan serve
    ```

    Access the application at `http://localhost:8000`.

---

## 6. Conclusion
The library book management project was successfully developed using Laravel, a robust framework that simplifies web application development. The MVC structure facilitated good application organization, and database migrations ensured data consistency. Tailwind CSS provided a modern, responsive UI for a smooth user experience.

The implemented features, such as adding, deleting, searching, and displaying new arrivals, meet the essential needs of a modern library. The project is scalable and can be improved by adding new features, such as updating book information or user authentication.

In summary, this project forms a solid base for a library management application with ample potential for further development.

---

### Sources

- [Search in Laravel](https://medium.com/@iqbal.ramadhani55/search-in-laravel-e0e20f329b01)
- [Laravel CRUD with Resource Controllers](https://medium.com/@santoshbusiness108/simple-laravel-crud-with-resource-controllers-95fb9f7ffab1)
- [Laravel CRUD Guide](https://kinsta.com/blog/laravel-crud/)
