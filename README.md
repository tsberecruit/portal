## Welcome to TSB-Erecruit Portal
Starting with mult-Authentication system

# Proposed Title: 
## Multi-Authentication System Design and Implementation

## System Overview
To accommodate distinct user roles (Admin, Company, and Candidate), a multi-authentication system was implemented. This system ensures that each user, upon successful authentication, is directed to their respective dashboard.

# Authentication Flow
## Shared Login Form: A unified login form is presented to both Company and Candidate users.
Authentication and Redirection:
Successful Authentication: Upon successful authentication, the system determines the user's role.
Role-Based Redirection: The system redirects the user to their corresponding dashboard:
Admin: Admin Dashboard
## Company: 
Company Dashboard
## Candidate: 
Candidate Dashboard

# Technical Implementation
# Authentication Logic and Routing:

## Authentication Controller: 
The Auth/AuthenticatedSessionController.php handles the authentication logic, verifying user credentials and determining the user's role.
Route Service Provider: The Providers/RouteServiceProvider.php defines the routes for each user role, ensuring proper redirection.
Access Control:

## User Role Middleware: 
The HTTP/Middleware/UserRoleMiddleware.php enforces access control by verifying the user's role and granting access to authorized routes.
Middleware Registration: The middleware is registered in kernel.php to be applied to specific routes.
By implementing this multi-authentication system, we have successfully provided a secure and efficient user experience, tailored to the specific needs of each user role.
