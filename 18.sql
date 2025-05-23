-- 1. Create a database named "library"
CREATE DATABASE library;

-- 2. Delete the database "library"
DROP DATABASE library;

-- 3. Create a table named "book_records" with specified columns
CREATE TABLE book_records (
    Book_Library_No INT PRIMARY KEY,
    Book_Name VARCHAR(255) NOT NULL,
    Author_Name VARCHAR(255) NOT NULL,
    Book_Edition VARCHAR(50),
    Price DECIMAL(10, 2)
);

-- 4. Delete the table "book_records"
DROP TABLE book_records;