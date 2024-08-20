# 🏥 Hospital Management System 🩺

**Web Project built with PHP, JavaScript, HTML, CSS, Bootstrap, FPDF, and MySQL**

---

### 🚀 Project Overview

This project is a dynamic website that manages a hospital system. It demonstrates how to integrate PHP with JavaScript, HTML, CSS, and Bootstrap, while also utilizing the **FPDF** library for generating PDF documents. The project connects to a database using **PHPMyAdmin** and runs SQL queries. It is built using **Object-Oriented Programming (OOP)** principles, with a dedicated class `conexionbdd.php` handling all database interactions and methods throughout the program.

The project features a user-friendly interface and a role-based system that restricts and allows access to specific features based on user roles.

---

### 🎯 Roles and Modules Implemented

The system is structured around specific roles and modules that define the functionalities available to users.

#### **Role 1: Nurse**
#### **Role 2: Doctor**
#### **Role 3: Administrator**

---

### 📋 System Modules

1. **Module 1 - User Management:**
   - User registration and login for patients, nurses, doctors, and administrators.

2. **Module 2 - Patient Module:**
   - Appointment booking form.
   - Profile update features for patients.

3. **Module 3 - Nurse Module:**
   - List of Active Emergencies.
   - View pending appointments.
   - Patient registration form.
   - Update patient data using their identification number.
   - Emergency (accident) registration.
   - Issuance of certificates for patients by entering their ID number.

4. **Module 4 - Doctor Module:**
   - View pending appointments.
   - Register treatments for patients.
   - View patients' medical histories by entering their ID number.
   - Issue medical certificates by entering the patient's ID number.

5. **Module 5 - Administrator Module:**
   - Employee registration form.
   - Update employee data using their identification number (this feature is still in progress).
   - Backup the current hospital database.

> **Note:** The feature for updating employee data is still under development, and contributions to complete it are welcomed! 😄

---

### 🛠️ Technologies Used

- **PHP:** Server-side logic and database interaction.
- **MySQL / PHPMyAdmin:** Database management using SQL queries.
- **JavaScript:** Client-side validations and enhanced user experience.
- **HTML5 and CSS3:** Structure and styling of the website.
- **Bootstrap:** CSS framework to create responsive and user-friendly interfaces.
- **FPDF:** PDF document generation, such as medical certificates.
- **Object-Oriented Programming (OOP):** Managing database interactions through classes and methods.

---

### 💡 Key Features

- **User Management:** Registration and authentication for different user roles (Patients, Nurses, Doctors, and Administrators).
- **Appointment and Emergency Management:** Nurses and doctors can manage appointments and emergencies in real time.
- **PDF Certificate Generation:** Doctors and nurses can generate certificates in PDF format.
- **Database Backup:** Administrators can back up the current hospital database with just a click.
- **Role-Based System:** Access to features is determined by the user's role.

---

### 🛠️ Installation Instructions

1. **Clone the repository**:
   ```bash
   git clone https://github.com/AnDev2804/phpwebsite2.git
   ```

2. **Configure the database**:
   - Import the included SQL file into your MySQL server via PHPMyAdmin.
   - Update the `conexionbdd.php` file with your database credentials.

3. **Setup the server**:
   - Run the project on a local server (XAMPP, MAMP, WAMP, etc.).
   - Ensure that the necessary PHP extensions, such as `mysqli` and `FPDF`, are enabled.

4. **Using the system**:
   - Access the system at `http://localhost/`.
   - Register users and test the system's functionalities based on the role you assign.

---

### 📚 Conclusion

This project represents my second major step in university towards more advanced web development. It allowed me to experiment with **Object-Oriented Programming**, deepen my understanding of **JavaScript**, and explore **SQL** and database management in more depth.

**I hope this project serves as an inspiration or learning resource for you!**

😄 **Feel free to contribute, leave comments, or share suggestions.**

---

Thank you for visiting this repository! ⭐ If you liked it, don't forget to give it a star.

---

### ⚠ Warning
There is a file that does not have the “conexion” class included, instead it has the “mysqli” class, make sure you rename your database there.
The file is “registropaciente.php”.

---