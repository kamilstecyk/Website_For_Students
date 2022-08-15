DROP DATABASE IF EXISTS website_for_students;

CREATE DATABASE IF NOT EXISTS website_for_students;

USE website_for_students;

CREATE TABLE IF NOT EXISTS Departments (
    departmentID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS Students (
    studentID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(258) NOT NULL
);

CREATE TABLE IF NOT EXISTS StudentDepartments (
    studentDepartmentID INT AUTO_INCREMENT PRIMARY KEY,
    studentID INT NOT NULL,
    departmentID INT NOT NULL
);

CREATE TABLE IF NOT EXISTS Books (
    bookID INT AUTO_INCREMENT PRIMARY KEY,
    departmentID INT NOT NULL,
    bookTitle VARCHAR(50) UNIQUE NOT NULL,
    author VARCHAR(100) NOT NULL,
    bookLink TEXT UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS Curiosities (
    curiosityID INT AUTO_INCREMENT PRIMARY KEY,
    departmentID INT NOT NULL,
    curiosityContent TEXT UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS Quizes (
    quizID INT AUTO_INCREMENT PRIMARY KEY,
    departmentID INT NOT NULL,
    quizTitle VARCHAR(50) NOT NULL,
    quizLink TEXT UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS Tests (
    testID INT  AUTO_INCREMENT PRIMARY KEY,
    departmentID INT NOT NULL,
    testTitle VARCHAR(100) NOT NULL,
    creationDate TIMESTAMP NOT NULL
);

CREATE TABLE IF NOT EXISTS TestsQuestions (
    questionID INT AUTO_INCREMENT PRIMARY KEY,
    testID INT NOT NULL,
    questionContent TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS TestsAnswers (
    testAnswerID INT AUTO_INCREMENT PRIMARY KEY,
    questionID INT NOT NULL,
    literal CHAR(1) NOT NULL,
    answerContent TEXT NOT NULL,
    isTrue BOOLEAN NOT NULL
);

CREATE TABLE IF NOT EXISTS TestsResults (
    testResultID INT AUTO_INCREMENT PRIMARY KEY,
    studentID INT NOT NULL,
    testID INT NOT NULL,
    receivedPoints INT NOT NULL
);

ALTER TABLE StudentDepartments ADD  FOREIGN KEY (studentID) REFERENCES Students(studentID);
ALTER TABLE StudentDepartments ADD  FOREIGN KEY (departmentID) REFERENCES Departments(departmentID);

ALTER TABLE Books ADD  FOREIGN KEY (departmentID) REFERENCES Departments(departmentID);

ALTER TABLE Curiosities ADD  FOREIGN KEY (departmentID) REFERENCES Departments(departmentID);

ALTER TABLE Quizes ADD  FOREIGN KEY (departmentID) REFERENCES Departments(departmentID);

ALTER TABLE Tests ADD  FOREIGN KEY (departmentID) REFERENCES Departments(departmentID);

ALTER TABLE TestsQuestions ADD  FOREIGN KEY (testID) REFERENCES Tests(testID);

ALTER TABLE TestsAnswers ADD  FOREIGN KEY (questionID) REFERENCES TestsQuestions(questionID);

ALTER TABLE TestsResults ADD  FOREIGN KEY (studentID) REFERENCES Students(studentID);
ALTER TABLE TestsResults ADD  FOREIGN KEY (testID) REFERENCES Tests(testID);


INSERT INTO Departments (name) VALUES ("Polish");
INSERT INTO Departments (name) VALUES ("English");

INSERT INTO Tests (departmentID,testTitle,creationDate) VALUES (1,"Vocabulary Test",NOW());
INSERT INTO Tests (departmentID,testTitle,creationDate) VALUES (1,"Grammar Test",NOW());
INSERT INTO Tests (departmentID,testTitle,creationDate) VALUES (2,"Grammar Test",NOW());

INSERT INTO TestsQuestions (testID,questionContent) VALUES (1,"When we go on holidays?");
INSERT INTO TestsQuestions (testID,questionContent) VALUES (2,"When academic year starts?");
INSERT INTO TestsQuestions (testID,questionContent) VALUES (3,"When we go on trip?");


INSERT INTO TestsAnswers (questionID,literal,answerContent,isTrue) VALUES (1,'A',"tommorow",TRUE);
INSERT INTO TestsAnswers (questionID,literal,answerContent,isTrue) VALUES (1,'B',"20.09",FALSE);

INSERT INTO TestsAnswers (questionID,literal,answerContent,isTrue) VALUES (2,'A',"1.09",FALSE);
INSERT INTO TestsAnswers (questionID,literal,answerContent,isTrue) VALUES (2,'B',"1.10",TRUE);


INSERT INTO TestsAnswers (questionID,literal,answerContent,isTrue) VALUES (3,'A',"1.01",FALSE);
INSERT INTO TestsAnswers (questionID,literal,answerContent,isTrue) VALUES (3,'B',"1.02",TRUE);

INSERT INTO Quizes (departmentID,quizTitle,quizLink) VALUES (1,"Vocabulary quiz","kahoot2.pl");
INSERT INTO Quizes (departmentID,quizTitle,quizLink) VALUES (1,"grammar quiz","kahoot3.pl");

INSERT INTO Curiosities (departmentID,curiosityContent) VALUES (1,"Did you know that earth has above 8 billion of people aroudn the world now!");
INSERT INTO Curiosities (departmentID,curiosityContent) VALUES (1,"Did you know that yesterday was yesterday?");

INSERT INTO Books (departmentID,bookTitle,author,bookLink) VALUES (1,"Siła","Arnold Schwarzeneger","http://wikipedia.pl");
INSERT INTO Books (departmentID,bookTitle,author,bookLink) VALUES (1,"Siła2","Arnold Hans","http://wikipedia2.pl");
