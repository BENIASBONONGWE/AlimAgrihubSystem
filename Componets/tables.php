CREATE TABLE IF NOT EXISTS caring (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    video_id VARCHAR(50) NOT NULL
);
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
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
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
CREATE TABLE farmbudget (
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
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
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