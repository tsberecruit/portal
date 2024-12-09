# Welcome to TSB-Erecruit Portal
Starting with mult-Authentication system

## Proposed Title: Multi-Authentication System Design and Implementation

## System Overview
To accommodate distinct user roles (Admin, Company, and Candidate), a multi-authentication system was implemented. This system ensures that each user, upon successful authentication, is directed to their respective dashboard.

# FRONTEND USERS: Company & Candidate

## Authentication Flow - BASIC PLANNING BEFORE MULTI-AUTHENTICATION SYSTEM:

               AUTHENTICATOR
| COMPANY |   ===============>  | COMPANY DASHBOARD |
| CANDIDATE | ===============>  | CANDIDATE DASHBOAED

### Shared Login Form: 
A unified login form is presented to both Company and Candidate users.

### Authentication and Redirection - Successful Authentication: 
Upon successful authentication, the system determines the user's role.

### Role-Based Redirection - The system redirects the user to their corresponding dashboard:

- Company: Company Dashboard
- Candidate: Candidate Dashboard

## Technical Implementation

### Authentication Logic and Routing:

- Authentication Controller: The Auth/AuthenticatedSessionController.php handles the authentication logic, verifying user credentials and determining the user's role.
- Route Service Provider: The Providers/RouteServiceProvider.php defines the routes for each user role, ensuring proper redirection.

### Access Control:

- User Role Middleware: The HTTP/Middleware/UserRoleMiddleware.php enforces access control by verifying the user's role and granting access to authorized routes.
- Middleware Registration: Also from the MiddleWare/RedirectAuthenticated.php, we protected the logged in users from being redirected to the login page when trying to access the login route via the url. This means that login or register page wont be accessible while a user is logged in.

The middleware is registered in kernel.php to be applied to specific routes. Also by protecting the logged in user from being redirected to the login page while trying to access the login route via the url. This means that login or register page wont be accessible while a user is logged in.

By implementing this multi-authentication system, we have successfully provided a secure and efficient user experience, which will tailor to the specific needs of each user role.

### GROUPING MIDDLEWARE ACCORDING TO USER ROLES
We created middleware group to protect all incoming and outgoing route for Candidate user roles in the web.php 

# FOCUSING ON THE ADMIN USER TYPE:

| ADMIN |  ===============>  | ADMIN DASHBOARD |

Basically, Company and Candidate user are the frontend users while the Admin is the backend user who wil be responsible for managing both the backend and the frontend. To ensure securty, we have created a seperate guard for it. Meaning, the super admin will have the capability to grant users roles and permission and no external user can have access to admin privileges without authorization. We will cover more of it in the Role Base Access Controll (RBAC).

## Implemented User Provider & Authenticated Guards for the Admin
Because we have two users table, we decided to implement user provider and authenticated guard specifically for the admin.
In the confi/auth.php, we created an authenticated guard and user provider for the Admin which verifies a user's identity during a request, and defines how user admin is retrieved from storage and authenticated.

- 
Multi-Authentication: Created and user AdminSeeder for testing the SupperAdmin type
- Integrated forgot password functionality


## Setting Up the Admin Panel/Dashboard 
- Architecture:
Consists of the sidebar, navigational bar and the main content (Body).
