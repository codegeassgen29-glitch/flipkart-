# Flipkart Clone Backend Documentation

## Overview
The Flipkart Clone backend is built using PHP and MySQL. It provides RESTful APIs for user authentication, product management, and shopping cart functionalities. This documentation outlines the structure and usage of the backend components.

## Directory Structure
- **api/**: Contains PHP scripts for handling API requests.
  - `cart.php`: Manages shopping cart operations.
  - `login.php`: Handles user login requests.
  - `signup.php`: Manages user registration.
  - `products.php`: Provides product data.
  - `user.php`: Handles user-related requests.

- **config/**: Contains configuration files.
  - `db.php`: Database connection settings.

- **.env**: Environment variables for sensitive information like database credentials.

- **composer.json**: Lists PHP dependencies for the backend.

## Setup Instructions
1. **Clone the Repository**
   ```
   git clone <repository-url>
   cd Flipkart-Clone/backend
   ```

2. **Install Dependencies**
   Ensure you have Composer installed, then run:
   ```
   composer install
   ```

3. **Database Configuration**
   - Create a MySQL database and import the schema from `../database/schema.sql`.
   - Update the `.env` file with your database credentials.

4. **Run the Server**
   Use a local server like XAMPP or MAMP to run the PHP files, or use the built-in PHP server:
   ```
   php -S localhost:8000
   ```

## API Endpoints
- **User Authentication**
  - `POST /api/signup.php`: Register a new user.
  - `POST /api/login.php`: Authenticate a user.

- **Product Management**
  - `GET /api/products.php`: Retrieve a list of products.

- **Shopping Cart**
  - `POST /api/cart.php`: Add an item to the cart.
  - `DELETE /api/cart.php`: Remove an item from the cart.

## Notes
- Ensure your server has the necessary PHP extensions enabled (e.g., PDO for database access).
- Use Postman or similar tools to test the API endpoints.

## License
This project is licensed under the MIT License. See the LICENSE file for more details.