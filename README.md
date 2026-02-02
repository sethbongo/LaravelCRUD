# Laravel To-Do List Application with Native Authentication

## Project Overview
This project is a Laravel-based web application developed as a course requirement.  
It implements a **native authentication system**, **user profile management**, and a **user-specific To-Do List CRUD application**, all built from scratch without relying on Laravel’s default authentication scaffolding.

The system follows the **MVC architecture** and uses **session-based authentication** to ensure secure access to protected resources.

---

## Student Information
- **Name:** Seth Laurence B. Bongo
- **College:** Central Mindanao University
- **Program:** BS in Information Technology

---

## Features

### A. Native Authentication System
- User registration
- User login
- User logout
- Password hashing using Laravel’s `Hash` facade
- Session-based authentication
- Route protection using custom middleware

### B. User Management and Profile Editing
- View authenticated user profile
- Edit user name and email
- Optional password update
- Profile page accessible only to logged-in users

### C. To-Do List CRUD Application
- Create tasks
- View tasks belonging only to the logged-in user
- Edit existing tasks
- Delete tasks
- User-task relationship enforced using Eloquent ORM

### D. User Interface Design (Original)
- Custom layout structure
- Unique spacing, colors, and typography
- No default Laravel UI or authentication templates used
- Designed to be visually distinct from other projects

---

## Technologies Used
- **Laravel (PHP Framework)**
- **Blade Templating Engine**
- **PostgreSQL**
- **Git & GitHub**


## Project Structure (High-Level)
- `app/Models` – User and Task models
- `app/Http/Controllers` – Authentication, Profile, and Task controllers
- `app/Http/Middleware` – Custom authentication middleware
- `routes/web.php` – Web routes and protected routes
- `resources/views` – Blade templates (custom UI)
- `database/migrations` – Database schema definitions

## Authentication Flow
1. User registers with name, email, and password
2. Password is hashed before storing in the database
3. On login, credentials are validated and stored in the session
4. Middleware checks session data to protect routes
5. User can log out, which clears the session

---
## Learning Objectives Achieved

### Technical Objectives
- Created a Laravel project from scratch
- Configured database connections
- Implemented authentication manually
- Used password hashing and session handling
- Built user profile management
- Implemented CRUD operations using Eloquent ORM
- Protected routes with custom middleware
- Used Blade templates effectively
- Designed an original user interface
- Used Git and GitHub for version control

### Conceptual Objectives
- Understanding of MVC architecture
- Understanding Laravel request lifecycle
- Knowledge of session-based authentication flow
- Understanding relationships between users and tasks

---