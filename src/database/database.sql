-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2025-01-29 10:36:56.604

-- tables
-- Table: User
CREATE DATABASE upn;
CREATE TABLE User (
    U_ID INT NOT NULL AUTO_INCREMENT, 
    U_Email VARCHAR(100) NOT NULL,
    U_Password VARCHAR(100) NOT NULL,
    U_Role BOOLEAN NOT NULL,
    U_BEM INT,
    U_BLM INT,
    U_Status BOOLEAN,
    CONSTRAINT User_pk PRIMARY KEY (U_ID)
);

-- End of file.

