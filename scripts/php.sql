--
-- Database: php

-- --------------------------------------------------------

--
-- Table structure for table doctors--

CREATE TABLE doctors (
  name text NOT NULL,
  dob date NOT NULL,
  mail text NOT NULL,
  surname text NOT NULL,
  phno varchar(15) NOT NULL,
  qualification text NOT NULL,
  department text NOT NULL,
  uname varchar(32) NOT NULL,
  pass varchar(32) NOT NULL,
  PRIMARY KEY (uname)
); 

--
-- Dumping data for table doctors--
INSERT INTO doctors (name, dob, mail, surname, phno, qualification, department, uname, pass) VALUES
('Brain', '2019-04-02', 'brain@gmail.com',  'Mathew', '0636667733', 'mbbs', 'neurology', 'Dr.Brain', 'BrainM'),
('Bliss', '2019-04-10', 'bliss@gmail.com',  'Johnson', '0956784567', 'mbbs', 'heart', 'Dr.Bliss', 'BlissJ'),
('Helga', '2019-04-05', 'helga@gmail.com',  'Laimos', '0509934411', 'mbbs', 'ortho', 'Dr.Helga', 'helgaL'),
('John', '2019-05-10', 'john@gmail.com',  'Terry', '0978956432', 'mbbs', 'medical', 'Dr.John', 'JohnT'),
('Marvel', '2019-08-16', 'marvel@gmail.com',  'Rathew', '0634567821', 'mbbs', 'mind', 'Dr.Marvel', 'MarvelR');

--
-- Table structure for table working_calendar--
CREATE TABLE working_calendar(
  day varchar(10) NOT NULL,
  dname varchar(30) NOT NULL,
  working_hours varchar(30) NOT NULL
);

--
-- Dumping data for table working_calendar--
INSERT INTO working_calendar(day, dname, working_hours) VALUES
('Sunday','Dr.Brain','-'),
('Monday','Dr.Brain','10:00-18:00'),
('Tuesday','Dr.Brain','08:00-16:00'),
('Wednesday','Dr.Brain','12:00-20:00'),
('Thursday','Dr.Brain','10:00-20:00'),
('Friday','Dr.Brain','10:00-18:00'),
('Saturday','Dr.Brain','-'),

('Sunday','Dr.Bliss','11:00-20:00'),
('Monday','Dr.Bliss','-'),
('Tuesday','Dr.Bliss','22:00-07:00'),
('Wednesday','Dr.Bliss','-'),
('Thursday','Dr.Bliss','10:00-20:00'),
('Friday','Dr.Bliss','-'),
('Saturday','Dr.Bliss','22:00-07:00'),

('Sunday','Dr.Helga','10:00-18:00'),
('Monday','Dr.Helga','10:00-18:00'),
('Tuesday','Dr.Helga','15:00-22:00'),
('Wednesday','Dr.Helga','-'),
('Thursday','Dr.Helga','10:00-20:00'),
('Friday','Dr.Helga','10:00-14:00'),
('Saturday','Dr.Helga','22:00-06:00'),

('Sunday','Dr.John','-'),
('Monday','Dr.John','10:00-18:00'),
('Tuesday','Dr.John','-'),
('Wednesday','Dr.John','15:00-22:00'),
('Thursday','Dr.John','13:00-19:00'),
('Friday','Dr.John','10:00-14:00'),
('Saturday','Dr.John','07:00-17:00'),

('Sunday','Dr.Marvel','14:00-18:00'),
('Monday','Dr.Marvel','-'),
('Tuesday','Dr.Marvel','-'),
('Wednesday','Dr.Marvel','08:00-16:00'),
('Thursday','Dr.Marvel','10:00-17:00'),
('Friday','Dr.Marvel','18:00-23:00'),
('Saturday','Dr.Marvel','13:00-20:00'); 

--
-- Table structure for table patient--
CREATE TABLE patient (
  name text NOT NULL,
  dob date NOT NULL,
  mail text NOT NULL,
  uname varchar(32) NOT NULL,
  password varchar(32) NOT NULL,
  PRIMARY KEY (uname)
) ;

--
-- Dumping data for table patient--
INSERT INTO patient (name, dob, mail, uname, password) VALUES
('Mike', '2004-04-03', 'mike@gmail.com', 'mike2004', 'Mike1'),
('Mariia', '2011-04-17', 'mariia@gmail.com', 'mariia2011', 'Mariia1'),
('Olaf', '2000-05-22', 'olaf@gmail.com', 'olaf2000', 'Olaf1'),
('Peter', '1989-08-15', 'peter@gmail.com', 'peter1989', 'Peter1'),
('Matilda', '2019-11-18', 'm2019@gmail.com', 'matilda2019', 'Matilda1');

--
-- Table structure for table registration--
CREATE TABLE registration (
  p_uname varchar(32)  NOT NULL,
  d_uname varchar(32)  NOT NULL
); 

--
-- Dumping data for table registration--

INSERT INTO registration (p_uname, d_uname) VALUES
('Mike', 'Dr.Helga');
