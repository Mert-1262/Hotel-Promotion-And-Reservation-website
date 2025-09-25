# 🏨 Hotel Promotion & Reservation Website (PHP + MySQL)

This project is a hotel promotion and reservation website developed with **PHP** and **MySQL**.  
It allows users to view hotel information, browse rooms, and make reservations online.

---

## ✨ Features
- Hotel introduction and gallery pages
- News / Announcements (`haberler.php`)
- Room listing and details
- Quick reservation form (`hizli_rezervasyon.php`)
- Full booking system with database (`rezervasyon.sql`)
- User login, logout and profile pages
- Payment simulation (`odeme_isle.php`)
- PDF export of reservations (`pdf_olustur.php`)

---

## ⚙️ Tech Stack
- **Backend:** PHP (AppServ/XAMPP compatible)
- **Frontend:** HTML5, CSS3, JavaScript
- **Database:** MySQL (`rezervasyon.sql` included)

---

## 🚀 Run Locally
1. Install [XAMPP](https://www.apachefriends.org/) or AppServ.
2. Copy project files into `htdocs/otel/`.
3. Create a MySQL database (e.g., `otel`) and import `rezervasyon.sql`.
4. Start Apache and MySQL.
5. Visit:  http://localhost/otel/
---

## 🧪 Test Data
- Example rooms and reservations are in `rezervasyon.sql`.
- Default admin/user accounts can be added manually in the DB.

---

## 📸 Screenshots
(Add screenshots here, e.g. `img/` folder)

---

## 📝 License
MIT

📄 .gitignore (PHP için)
# IDE
.idea/
.vscode/

# OS
.DS_Store
Thumbs.db

# Sensitive
.env
