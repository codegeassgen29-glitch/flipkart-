# Flipkart Clone

## Overview
Flipkart Clone is a fully functional e-commerce web application built using React for the frontend and PHP with MySQL for the backend. This project aims to replicate the core features of an online shopping platform, allowing users to browse products, manage their shopping cart, and handle user authentication.

## Features
- User authentication (login and signup)
- Product listing and detailed view
- Shopping cart management
- Responsive design using React Bootstrap

## Project Structure
The project is organized into three main directories: `frontend`, `backend`, and `database`.

### Frontend
- **public/index.html**: Main HTML file for the React application.
- **src/components**: Contains reusable React components such as Navbar, ProductList, ProductDetail, Cart, Login, and Signup.
- **src/pages**: Contains page components like Home, CartPage, and Profile.
- **src/App.js**: Main application component that sets up routing.
- **src/index.js**: Entry point for the React application.
- **src/styles/main.css**: Main stylesheet for the application.
- **package.json**: Configuration file for npm dependencies.

### Backend
- **api/**: Contains PHP scripts for handling API requests related to cart, user authentication, and product data.
- **config/db.php**: Database connection configuration.
- **.env**: Environment variables for sensitive information.
- **composer.json**: Configuration file for PHP dependencies.

### Database
- **schema.sql**: SQL schema for setting up the database structure.

## Getting Started

### Prerequisites
- Node.js and npm for the frontend
- PHP and MySQL for the backend
- Composer for managing PHP dependencies

### Installation

1. **Frontend**
   - Navigate to the `frontend` directory.
   - Run `npm install` to install the required dependencies.
   - Start the development server with `npm start`.

2. **Backend**
   - Navigate to the `backend` directory.
   - Run `composer install` to install the required PHP dependencies.
   - Set up the database using the `schema.sql` file.
   - Configure the database connection in `config/db.php`.
   - Start the PHP server.

### Usage
- Access the application in your web browser at `http://localhost:3000` for the frontend.
- The backend API can be accessed at `http://localhost:8000/api/`.

## Contributing
Contributions are welcome! Please open an issue or submit a pull request for any enhancements or bug fixes.

## License
This project is licensed under the MIT License.