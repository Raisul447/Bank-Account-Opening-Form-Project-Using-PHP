CREATE DATABASE bank_accounts;

USE bank_accounts;

CREATE TABLE customers (
    customer_id INT PRIMARY KEY,
    date DATE NOT NULL,
    account_number VARCHAR(20) NOT NULL UNIQUE,
    branch_name VARCHAR(100) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    account_type VARCHAR(50) NOT NULL,
    initial_deposit DECIMAL(15, 2),
    mobile_number VARCHAR(15),
    email_id VARCHAR(100),
    dob DATE,
    father_name VARCHAR(100),
    mother_name VARCHAR(100),
    nationality VARCHAR(50),
    present_address TEXT,
    permanent_address TEXT,
    national_id VARCHAR(20) UNIQUE,
    monthly_income DECIMAL(15, 2),
    interest_percentage DECIMAL(5, 2),
    photo BLOB,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE nominees (
    nominee_id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT,
    nominee_name VARCHAR(100) NOT NULL,
    nominee_photo BLOB,
    nominee_address TEXT,
    nominee_percentage DECIMAL(5, 2),
    nominee_relationship VARCHAR(50),
    nominee_dob DATE,
    nominee_national_id VARCHAR(20) UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);
