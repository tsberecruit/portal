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


## Setting Up the Admin Panel/Dashboard and Implementing all the login, registration, forgot and reset password.
- Architecture:
Consists of the sidebar, navigational bar and the main content (Body).

## Setting Up the Frontend with the most important Job sections/Components.

## Succesfully setup the registration, login, forgot password, reset password UIs/Authentications for candidates and recruiters
The idea is to get users to decide which type of user role they want to access from the registration page.


# Company Models
Setting Up Company Profile Dashboard with all the neccessary tables and attributes.
- Created a Migration Table for companies
- Created a route for the company dashboard 
- Created a route for the company profile 
- Created a controller to redirect user to the CompanyDashboardContorller
- Created a controller CompanyProfileContorller that redirect user to its profile.

# Company Dashboard Layout
Worked on the company Dashboard HTML, and CSS Layout with all the neccessary attributes that gives every information about company.
Used Botstrap 5 for the styling the attributes. Also incorporated Select2 template format for the layouts.

# Creating Route for submitting Cmpany Info

# Creating A Trait file for reusable file upload methods - import into any useable file

# Completed the form submission for Company Profile info. Submitting form into the companies table - companies info

# Editing companies info and getting the fields' data displayed in the form.

# Implemented Dynamic notification for submitted forms
https://github.com/mckenziearts/laravel-notify

# Implemented Dynamic Slug to avoid name matching
https://github.com/cviebrock/eloquent-sluggable


# Industry Types
- Creating Neccessary Files and Designs
- Working with Create Feature
- Created Helper file for Validating Users input
- Showing all created data in the industry types' page
- Working with Update Feature
- Working with Delete Feature
- Working with Search feature 

# Organization Types
- Creating Neccessary Files and Designs
- Working with Create Feature
- Working with Edit and Delete Feature

# Team Size
- Working with Teamsizes
- Creating Neccessary Files and Seeders

# Location
- Creating Database and Inserting Data(Countr, State, and City) from the Backend
- Working with Index Page
- Working with create, update and Delete Feature for Country
- Updating the index Page
- Setting up index page for State Location
- Working with create, update and Delete Feature for State

# Sidebar Activation
- Working with the Admin Activation

# Completed Company Profile
- Added Seeders for Tables
- Made some changes in migration
- Worked on some of the Company's profile attributes

# Candidate Profile Attributes
- Brainstormed on the Database Model Diragram
- Created Neccessary Files and Designs
- Worked with the Create, update, Delete feature
- Adding Seeders

# Candidate Profile Setup
- Creating Neccessary files and Designs
- Creating Migration and adding Columns
- Worked with Candidate Basic Info
- Worked with Candidate's Profile form and integrating CKEditor for BIO attribute
- Fixing Data Save issue

# Candidate Experience and Education
- Creating neccessary files and creating Candidate Experience Dynamically
- Working with Candidate Experience Module
- Working with Candidate Education Module
- Working with Candidate Account Settings


# Developing Frontend Profile Pages
- Showing Dynamic Data in Companies ProfilePage
- Showing Dynamic Data in Companies Details Page
- Showing Dynamic Data in Candidates Profile Page
- Showing Dynamic Data in Companies Details page

# Implementing Pricing System
- Creating Neccessary Files and Designs
- Working with Create Feature in the Backend
- Showing Content at admin index
- Working with update and Delete Feature
- Showing Plans in Frontend Pricing Page

# Payment Gateway Implementation
- Paypal Settings:  Creating necessary files and designs
- Working with update form
- Setting Data Globally
- Creating Payment Geeral Settings
- Setting Data Gobally
- Paypal Interation: Creating Sandbox account
- Working with Paypal integration
- Storing Order Information
- Storing User plan data
- Working with redirect pages
- Stripe Payment Implementation
- Razorpay Payment Implementation
- 

# Order and Invoices
- Showing Orders in Admin Panel
- Working with Payment Invoce
- Showing Orders in User Panel

# Job Attributes
- Working with Job Category Module
- Working with Education Module
- Working with Job Type Module - Salary Type
- Working with Job Type Module - Tags
- Working with Job Type Module - Job Roles
- Working with Job Experiences Module
- Adding Seeder data for job Attributes

# Job Posting Features
- Working with Databse migration for Job posting
- Woring with From Creation for job posting
- Working with Form Validation for Job Posting
- Storing/submitted data from the Job Posting Form to the DB 
- Showing submitted data on the index page
- Working with the edit, Update and delete feature for the Job Posting 

# Company Job Posting Feature
- Working with Index Page
- Working with Create Feature
- Updating Job Posting Feature
- Adding Job Form Validations for User Paln
- Working With Status Change Feature

# Finding A Job Page
- Mastering FrontEnd Job Page
- Showing Dynamic Content in Job Page
- Working with Job View Page
- Working with Search Feature for Job

# Recruiters - Companies Page
- Showing Dynamic Contents
- Working with search feature
- Applying some fixes

# Candidate Page
- Working With Candidate Page

# Job Apply and Bookmarking
- Working with Job Apply
- Showing Dynamic Data in Dashboard for Applied job
- Showing Job Application in Company Dashboard
- Working with Bookmark

# Blog System
- Working with Blog System 
- Applying Blog CRUD method in the Dashboard 
- Working on displaying blog data on the frontend

# Home Page - Hero Section
- Working with Update Form
- 