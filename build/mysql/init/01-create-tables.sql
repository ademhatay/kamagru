-- Kamagru Database Setup
-- This script runs automatically when the MySQL container starts for the first time

USE kamagru;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    _id INT AUTO_INCREMENT PRIMARY KEY,
    _email VARCHAR(255) NOT NULL UNIQUE,
    _password VARCHAR(255) NOT NULL,
    _verification_token VARCHAR(255),
    _verified BOOLEAN NOT NULL DEFAULT FALSE,
    _notification_permission BOOLEAN NOT NULL DEFAULT TRUE,
    _created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


SELECT 'Database setup completed successfully!' AS Message;
