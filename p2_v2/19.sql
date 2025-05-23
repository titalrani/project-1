-- 1. Alter table "book_records" to add column "no_of_pages"
ALTER TABLE book_records
ADD COLUMN no_of_pages INT;

-- 2. Add primary key to any unique column in the "book_records"
ALTER TABLE book_records
ADD CONSTRAINT pk_book_library_no PRIMARY KEY (Book_Library_No);

-- 3. Insert data into "book_records" table
INSERT INTO book_records (Book_Library_No, Book_Name, Author_Name, Book_Edition, Price, no_of_pages)
VALUES (1, 'The Great Gatsby', 'F. Scott Fitzgerald', '1st', 10.99, 180);