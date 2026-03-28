Here’s a clean, professional README.md you can use for your project 👇


---

💧 MajiAlert – Water & Sanitation USSD System

MajiAlert is a simple USSD-based platform that allows users to report water and sanitation issues and find safe water points using basic mobile phones.

Built with PHP + MySQL, it is designed for accessibility, especially in underserved communities.


---

🚀 Features

📲 Report water-related issues via USSD

💧 Find nearest safe water points

🧼 Access basic hygiene and safety tips

🗄️ Store reports in a MySQL database

⚡ Lightweight and works on any phone (no internet required)



---

📂 Project Structure

MajiAlert/
│── index.php          # Main USSD logic
│── config.php         # Database configuration
│── dbconnector.php    # Database connection
│── README.md          # Project documentation


---

🗄️ Database Setup

1. Create database:



CREATE DATABASE majialert;

2. Create tables:



CREATE TABLE reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    phone_number VARCHAR(20),
    issue_type VARCHAR(50),
    location TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE water_points (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    area_code VARCHAR(20),
    location TEXT,
    status VARCHAR(20) DEFAULT 'safe',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


---

⚙️ Configuration

Edit config.php:

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "majialert");


---

🔌 How It Works

1. User dials USSD code (e.g. *123#)


2. Menu is displayed:

Report Issue

Find Safe Water Point

Hygiene Tips



3. Input is processed via PHP


4. Data is stored/retrieved from MySQL


5. Response is sent back to user




---

📡 USSD Flow Example

*123#
→ 1 (Report Issue)
→ 2 (Dirty Water)
→ Enter location
→ ✅ Report saved


---

🛠️ Requirements

PHP 7+

MySQL

Web server (Apache / Nginx)

USSD Gateway (e.g. Africa's Talking)



---

🌍 Use Cases

Community water monitoring

Disaster/emergency reporting

Rural sanitation tracking

NGO and government service delivery



---

🔐 Security Notes

Move config.php outside public directory in production

Use prepared statements (already implemented ✅)

Validate user inputs for extra safety



---

🚀 Future Improvements

📍 GPS-based water point detection

📊 Admin dashboard for reports

📩 SMS notifications

🌐 API integration



---

🤝 Contributing

Pull requests are welcome. For major changes, open an issue first to discuss.


---

📜 License

This project is open-source and available under the MIT License.


---

💡 Support

Support the project or request features via:

📱 M-Pesa: 0713934257
