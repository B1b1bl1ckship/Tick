# Ticktesting Project


This project contains automated browser tests for the Tick application using Laravel Dusk. The tests cover various functionalities, including creating questionnaires, managing groups, and verifying application workflows.

## Table of Contents
Project Overview
Requirements
Installation
Configuration
Running Tests
Test Structure
Troubleshooting
Project Overview
The Ticktesting project is designed to automate browser-based testing for the Tick application. It uses Laravel Dusk, a browser automation tool, to simulate user interactions and verify application behavior.

## Key Features:
Automated login tests.
Form submission tests (e.g., creating questionnaires, groups).
Validation of UI elements and workflows.
Rich text editor handling .
Dropdown and checkbox interactions.
Requirements
To run this project, ensure you have the following installed:

PHP 8.0 or higher
Composer
Laravel Framework
Google Chrome (or a compatible browser)
ChromeDriver (compatible with your Chrome version)

## Installation
1. Clone the repository:
git clone https://github.com/your-repo/ticktesting.git
cd ticktesting

2. Install dependencies:
composer install

3. Set up the .env file:
cp .env.example .env

4. Copy the .env.example file to .env:

Update the .env file with your application and database credentials.

5. Generate the application key:
php artisan key:generate

## Configuration

Laravel Dusk Setup
1. Install Laravel Dusk:
php artisan dusk:install

2. Update the dusk_urls configuration in your dusk_urls.php file:
<?php
return [
    'login' => 'https://app-staging.tick.com.au/login',
    'admin_questionnaires' => 'https://app-staging.tick.com.au/admin/questionnaires',
    'Create_questionnaires' => 'https://app-staging.tick.com.au/admin/questionnaires/create',
];

3. Ensure the .env file contains the following:

ADMIN_EMAIL=your-admin-email@example.com
ADMIN_PASSWORD=your-admin-password

## Running Tests



To run the tests, use the following commands:

1. Run all tests:
php artisan dusk

2. Run a specific test:
php artisan dusk tests/Browser/QuestionairesTest.php