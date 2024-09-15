-- Create the database
CREATE DATABASE student_ms;

-- Select the database for use
USE student_ms;

-- Create Courses table
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL
);

-- Create Grades table
CREATE TABLE grades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    grade CHAR(2) NOT NULL,
    description VARCHAR(100) NULL
);

-- Create Students table with foreign keys
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    course_id INT,
    grade_id INT,
    contact VARCHAR(15) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id),
    FOREIGN KEY (grade_id) REFERENCES grades(id)
);

