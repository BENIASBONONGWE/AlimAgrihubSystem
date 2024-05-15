
CREATE TABLE IF NOT EXISTS cassava_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT,
    video_path VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS maize_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT,
    video_path VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS tea_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT,
    video_path VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS tobacco_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT,
    video_path VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS rice_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT,
    video_path VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS groundnuts_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT,
    video_path VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS soya_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT,
    video_path VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS irish_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT,
    video_path VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    author VARCHAR(255) NOT NULL,
    content TEXT,
    files TEXT,
    images TEXT,
    videos TEXT
);
CREATE TABLE IF NOT EXISTS farmbudget (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    video_id VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    video_id VARCHAR(255) NOT NULL
);
CREATE TABLE payemproyee (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    video_id VARCHAR(20) NOT NULL,
    time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE pesticides (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    video_id VARCHAR(20) NOT NULL,
    time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE caring (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    video_id VARCHAR(20) NOT NULL,
    time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE prevation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    video_id VARCHAR(20) NOT NULL,
    time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE cattle_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    video_path VARCHAR(255)
);
CREATE TABLE pig_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    video_path VARCHAR(255)
);
CREATE TABLE ducks_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    video_path VARCHAR(255)
);
CREATE TABLE fish_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    video_path VARCHAR(255)
);
CREATE TABLE sheep_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    video_path VARCHAR(255)
);

CREATE TABLE guinel_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    video_path VARCHAR(255)
);
CREATE TABLE goat_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    video_path VARCHAR(255)
);
CREATE TABLE chicken_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    video_path VARCHAR(255)
);
CREATE TABLE rabbit_db (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    video_path VARCHAR(255)
);

CREATE TABLE farmers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    farmer_type ENUM('all', 'crop', 'animal') NOT NULL,
    dob DATE,
    gender ENUM('male', 'female', 'other') NOT NULL
);
CREATE TABLE extension_workers (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    employee_number VARCHAR(50),
    password VARCHAR(255) NOT NULL
);

CREATE TABLE messages (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE weather_data (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    city_name VARCHAR(255) NOT NULL,
    country_code VARCHAR(255) NOT NULL,
    date DATE,
    time TIME,
    weather_description VARCHAR(255),
    temperature FLOAT,
    humidity INT(11),
    rainfall FLOAT,
    wind_speed FLOAT,
    wind_direction INT(11),
    farming_advice TEXT
);
