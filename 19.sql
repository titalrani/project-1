-- Alter table to add a new column
ALTER TABLE employees
ADD COLUMN department VARCHAR(50);

-- Insert data into the table
INSERT INTO employees (id, name, department)
VALUES (1, 'John Doe', 'Engineering'),
    (2, 'Jane Smith', 'Marketing'),
    (3, 'Alice Johnson', 'Finance');