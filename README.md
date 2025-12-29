# 🌍 Travel Distance & Time Comparison Tool

![PHP](https://img.shields.io/badge/PHP-8.x-blue?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.x-orange?logo=mysql)
![HTML](https://img.shields.io/badge/HTML-5-E34F26?logo=html5&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?logo=tailwind-css)
![Geocoding](https://img.shields.io/badge/City_Geocoding-OpenStreetMap%20(Nominatim)-7EBC6F?logo=openstreetmap&logoColor=white)
![Space Missions](https://img.shields.io/badge/Space_Missions-SpaceX_Public_API-000000?logo=spacex&logoColor=white)
![Distance Math](https://img.shields.io/badge/Distance_Math-Local_Astronomical_Constants-blueviolet)
![Travel Time](https://img.shields.io/badge/Travel_Time-Custom_PHP_API-777BB4?logo=php&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green)


A full-stack Travel Distance & Time Comparison Tool built with **PHP**, **JavaScript**, **APIs** and **Tailwind CSS**, allowing users to compare Earth cities, planets, and space missions with real-world travel time calculations using cars, planes, rockets, and spacecraft.

This project focuses on education, visualization, and human-friendly explanations of distance, light-years, and space travel.

---

## 🚀 Key Features

### 🌆 Earth Distance

- Compare distance between any two cities
- Real-world distance calculation using OpenStreetMap
- Distance shown in:
 - Kilometers
 - Miles

### Travel time comparison:
- 🚗 Car
- ✈️ Commercial Plane
---

### 🪐 Planetary Distance

- Compare distances between planets and moons
- Astronomical distance calculation using AU & Light-Years
- Human-friendly explanation of:
 - Astronomical Units (AU)
 - Light-years
- Travel time comparison:
 - 🚗 Car
 - ✈️ Plane
 - 🚀 Rocket
 - 🛰 Spacecraft
---

### 🛰 Space Missions (SpaceX)

- Browse real SpaceX missions
- Select a mission from dropdown
- View:
 - Orbit type (LEO / ISS)
 - Approximate mission distance
- Compare travel time using the same vehicle system

---

## ⚙️ System Features

- Centralized vehicle speed system
- Reusable travel-time calculation API
- Loading spinner for better UX
- Responsive, modern UI
- Clean separation of frontend & backend logic

---
## 🌐 APIs Used

| Purpose        | API                          |
| -------------- | ---------------------------- |
| City Geocoding | OpenStreetMap (Nominatim)    |
| Space Missions | SpaceX Public API            |
| Distance Math  | Local Astronomical Constants |
| Travel Time    | Custom PHP API               |

---

## 🧑‍💻 Tech Stack

| Layer    | Technology                     |
| -------- | ------------------------------ |
| Frontend | HTML, Tailwind CSS, JavaScript |
| Backend  | PHP                            |
| Database | MySQL (optional caching)       |
| APIs     | OpenStreetMap, SpaceX          |
| Server   | Apache (XAMPP)                 |


---

## 📁 Project Structure

```text
travel-distance-tool/
├── api/
│   ├── earth-distance.php
│   ├── space-distance.php
│   ├── travel-time.php
│   └── spacex-missions.php
│
├── data/
│   ├── planets.json
│   └── vehicles.json
│
├── includes/
│   └── db.php
│
├── assets/
│   ├── css/
│   └── js/
│
├── index.php
├── database.sql
└── README.md

```

---
## ⚙️ Installation & Setup

### 1️⃣ Clone Repository
```text
git clone https://github.com/badhonacharia/travel-distance-tool.git
```
### 2️⃣  Move to Server Root
```text
xampp/htdocs/travel-distance-tool
```

### 3️⃣ (Optional) Database Setup

- Create a MySQL database
- Import database.sql (only required for caching / sharing features)


### 4️⃣ Start Local Server

- Start Apache from XAMPP
- Open browser:

### 5️⃣ Run the Project
```text
http://localhost/travel-distance-tool
```
---
## 🔐 Security Notes
- No API keys are stored in frontend
- External APIs accessed via PHP to avoid CORS issues
- User inputs sanitized before processing
- Prepared for MySQL caching & rate-limiting
---
## 🌱 Future Enhancements
- Autocomplete for city & planet search
- Rocket-specific speeds (Falcon 9, Starship)
- Moon & Mars mission presets
- MySQL-based caching for faster responses
- Shareable result URLs
- Data visualization charts
- Live deployment (VPS / shared hosting)
---

## ⚠️ Disclaimer

This project is intended for educational and demonstration purposes only.
Distances and travel times are approximate and should not be used for real navigation or mission planning.

---

## 📄 License
This project is licensed under the **MIT License**.
You are free to:
- Use the project for personal or commercial purposes
- Modify and distribute the code
- Use it in your own projects with proper attribution
See the [LICENSE](LICENSE) file for full details.
---

## 👨‍💻 Author

**[Badhon Acharia](https://octteen.com/badhonacharia/)**

Web Developer | PHP | WordPress | Backend System

**[GitHub](https://github.com/badhonacharia/)**   **[Portfolio](https://octteen.com/badhonacharia/)**

---


