# Truck Subunit Management System

This is a Laravel application that manages the assignment of subunits to main trucks within specified dates.

## Prerequisites

- PHP 8.2.4
- Composer
- Laravel 10.13.5
- XAMPP for hosting the database

## Running the Application

1. Start XAMPP and make sure MySQL is running.
2. Use `php artisan serve` to start the application.
3. Run the migrations with `php artisan migrate`.

## Functionality

The application allows users to assign a subunit to a main truck for a specific period. There are several rules:
- The main truck and subunit truck can't be the same.
- The dates of the subunit must not overlap with existing subunit dates of the main truck.
- If the main truck is a subunit of another truck, it can't have its own subunit during that period.

## Routes

- Display trucks: `GET /`
- Create a new truck: `GET /trucks/create`
- Store a new truck: `POST /trucks`
- Edit a truck: `GET /trucks/{truck}/edit`
- Update a truck: `PUT /trucks/{truck}`
- Delete a truck: `DELETE /trucks/{truck}`
- Create subunits: `GET /subunits/create`
- Store subunits: `POST /subunits`
