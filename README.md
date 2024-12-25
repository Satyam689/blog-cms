# Blog CMS Web App

## Overview
The **Blog CMS Web App** is a lightweight content management system designed to streamline the process of creating, managing, and publishing blog posts. Built using **HTML**, **Bootstrap**, **jQuery**, and **PHP**, this application provides an intuitive user interface and essential functionalities for bloggers and administrators.

---

## Features
- **User Authentication:** Secure login system with role-based access for administrators and users.
- **Dynamic Post Management:**
  - Create, edit, and delete blog posts.
  - Upload and manage featured images for posts.
  - Categorize posts with tags and categories.
- **Responsive Design:** Fully optimized for desktop, tablet, and mobile devices using Bootstrap.
- **SEO Friendly:**
  - Customizable meta titles and descriptions.
  - SEO-friendly URLs for all blog posts.
- **Search & Filter:** Quickly search and filter posts by category, tags, or keywords.

---

## Technologies Used
- **Frontend:**
  - HTML5
  - Bootstrap 5
  - jQuery
- **Backend:**
  - PHP
  - MySQL (Database)

---

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/Satyam689/blog-cms.git
   ```
2. Navigate to the project directory:
   ```bash
   cd blog-cms
   ```
3. Import the database:
   - Locate the `blog_cms.sql` file in the `database` folder.
   - Import the SQL file into your MySQL database using a tool like phpMyAdmin or the MySQL command line.

4. Configure the database connection:
   - Open the `config.php` file in the `config` folder.
   - Update the database credentials:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_USER', 'your_database_user');
     define('DB_PASS', 'your_database_password');
     define('DB_NAME', 'your_database_name');
     ```

5. Start a local server:
   - Use XAMPP, WAMP, or any local server setup to host the application.
   - Place the project folder in the `htdocs` directory (if using XAMPP).

6. Access the application:
   - Open a web browser and navigate to `http://localhost/blog-cms`.

---

## Usage
### Administrator Features:
- Manage blog posts: add, update, and delete entries.
- Moderate user comments.
- Update site settings and metadata.

### User Features:
- Browse blog posts with pagination.
- Search for posts by keywords or tags.
- Leave comments on posts (if enabled).


