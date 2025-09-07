# Home Services Platform

## Overview

Welcome to the Home Services platform! This project is a comprehensive solution developed using the **Laravel** framework with a powerful admin dashboard built with **Filament**. The main goal of the project is to bridge the gap between users who need various home services and professional service providers.

---

## Project Goals

* **Connect Users and Providers:** Provide an easy-to-use platform that allows users to search for services and contact providers directly.
* **Provider Dashboard:** Empower service providers to manage their services easily and effectively.
* **Future Scalability:** The project is designed with a structure that allows for the easy addition of future features like subscription and booking systems.

---

## Core Features

### For Providers

* **Login and Management:** Service providers can log in to manage their profile and services through the Filament dashboard.
* **Add and Edit Services:** Providers can easily add new services or modify existing ones.
* **Content Control:** Providers have full authority over the services they offer.

### For Users

* **Browse Services:** Users can browse a full list of available service providers and the services they offer.
* **Direct Communication:** The system allows users to communicate directly with their chosen provider.

---

## Database Schema

The database is designed with a simple yet robust structure that connects users and services:

![Database Schema](https://i.imgur.com/your-image-url.png)

* **`users` table:** Contains data for all users on the platform, with a `role` column to define the account type (Admin, Provider, User).
* **`providers` table:** Stores additional information specific to providers.
* **`services` table:** Holds data for the services added by providers.

---

## Technical Stack

* **Backend:** PHP 8.2+, Laravel Framework
* **Frontend & Dashboard:** Filament PHP
* **Database:** MySQL
* **API Development:** Laravel API Resources
* **Package Management:** Composer, NPM
* **Styling:** Tailwind CSS

---

## How to Run the Project Locally

To run the project on your local machine, follow these steps:

1.  **Clone the Repository:**
    ```bash
    git clone 
    cd 
    ```

2.  **Install Dependencies:**
    ```bash
    composer install
    npm install
    npm run dev
    ```

3.  **Configure Environment:**
    * Duplicate the `.env.example` file and rename it to `.env`.
    * Adjust your database settings in the `.env` file.
    * Run the following command to generate the application key:
    ```bash
    php artisan key:generate
    ```

4.  **Run Migrations:**
    ```bash
    php artisan migrate --seed
    ```

5.  **Serve the Application:**
    ```bash
    php artisan serve
    ```

---

## Future Roadmap

* **Premium Subscription Module:** Adding a paid subscription system for providers to increase their revenue.
* **Booking System:** Developing a complete booking system for services.
* **Reviews & Ratings:** Adding a system for ratings and comments for providers.

---

## Contribution

Contributions are always welcome! If you have any suggestions or feedback, feel free to get in touch.

---

**Developed with ❤️ by Mostafa**
