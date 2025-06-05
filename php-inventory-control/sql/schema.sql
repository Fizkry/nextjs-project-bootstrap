-- Database schema for Inventory Control System

CREATE DATABASE IF NOT EXISTS inventory_db;
USE inventory_db;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL,
    language_preference VARCHAR(10) DEFAULT 'en',
    access_rights TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Materials table
CREATE TABLE materials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    stock_actual INT DEFAULT 0,
    stock_min INT DEFAULT 0,
    stock_max INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Semi-finished goods table
CREATE TABLE semi_finished_goods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    stock_actual INT DEFAULT 0,
    stock_min INT DEFAULT 0,
    stock_max INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Finished goods table
CREATE TABLE finished_goods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    stock_actual INT DEFAULT 0,
    stock_min INT DEFAULT 0,
    stock_max INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bill of Materials table
CREATE TABLE bill_of_materials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    finished_good_id INT NOT NULL,
    component_id INT NOT NULL,
    component_type ENUM('material', 'semi_finished_good') NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (finished_good_id) REFERENCES finished_goods(id)
);

-- Production Plans table
CREATE TABLE production_plans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    plan_name VARCHAR(100) NOT NULL,
    parent_plan_id INT DEFAULT NULL,
    description TEXT,
    FOREIGN KEY (parent_plan_id) REFERENCES production_plans(id)
);

-- Settings table
CREATE TABLE settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    system_title VARCHAR(100) DEFAULT 'Inventory Control System',
    system_logo_path VARCHAR(255) DEFAULT NULL,
    default_language VARCHAR(10) DEFAULT 'en'
);
