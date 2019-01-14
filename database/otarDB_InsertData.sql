--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`adUsername`, `adPwd`, `adFName`, `adLName`, `adEmail`) VALUES
('gacala_r', 'e9d94e56ec7fbe623b965afd301e50f6', 'Ruveni', 'Gacala', 'gacala_r@usp.ac.fj');

-- ----------------------------------------------------------

--
-- Dumping data for table `Student`
--

INSERT INTO `student` (`studID`, `studPwd`, `studPic`, `studFName`, `studLName`, `studEmail`, `studMobile`, `studProgramme`, `studDOB`, `studAddress`) VALUES
('s11109083', 'e397b9ff199c1af7168083bbd0a93b75', 'nav.jpg', 'Navneel', 'Kumar', 's11109083@student.usp.ac.fj', 9631876, 'Bachelor of Software Engineering', '29/07/1994', 'Lot 141/4,Nailuva Rd, Suva'),
('s11131927', '9573534ee6a886f4831ac5bcdfe85565', 'alvin.jpg', 'Alvin', 'Prasad', 's11131927@student.usp.ac.fj', 8430175, 'Bachelor of Software Engineering', '07/05/97', 'Fletcher Road, Vatuwaqa'),
('s11134676', '47bc17dc1a2f164967f55325d866c75c', 'oli.jpg', 'Audrey', 'Bula', 's11134676@student.usp.ac.fj', 7105126, 'Bachelor of Software Engineering', '15/08/98', 'Vatuwaqa'),
('s11146207', '8e6e509fba12de7be9ff1cb5333a69d2', 'edwin.jpg', 'Edwin', 'Raj', 's11146207@student.usp.ac.fj', 9324744, 'Bachelor of Software Engineering', '02/10/97', 'Porva Place, Makoi'),
('s11147441', '49bbb91dd5d5494be3c98107699614c3', 'sav.jpg', 'Savneel', 'Prasad', 's111447441@student.usp.ac.f', 9183336, 'Bachelor of Software Engineering', '08/07/97', 'Vishnu Deo Rd, Nakasi'),
('s11147691', '0f55f6c6906df432f06bbe292151bf2b', 'eliesa.jpg', 'Eliesa', 'Raiwalui', 's11147691@student.usp.ac.fj', 9631876, 'Bachelor of Software Engineering', '20/01/98', 'Samabula');

-- ----------------------------------------------------------

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`bookID`, `bookTitle`, `bookAuthor`, `bookCourse`, `bookEdition`, `bookPrice`, `bookPublisher`, `bookStatus`, `bookPic`, `bookAvailability`, `sellerID`) VALUES
(1, 'Software Engineering II', 'Stephen R. Schach', 'CS241', '8th', 200.00, 'McGraw-Hill', 1, 'oo_classical_se.jpg', 1, 's11146207'),
(2, 'Software Engineering', 'Ian Sommerville', 'CS240', '9th', 100.00, 'Addison-Wesley', 1, 'software_engineering.jpg', 1, 's11131927'),
(3, 'Linear Algebra', 'Ron Larson', 'MA111', '8th', 180.50, 'Cengage Learning', 1, 'linear_algebra.jpg', 1, 's11134676'),
(4, 'Foundations of Algorithms', 'Richard Neapolitan', 'CS214', '5th', 250.00, 'Jones & Bartlett', 1, 'algorithms.jpg', 1, 's11147441'),
(5, 'Calculus', 'Howard Anton', 'MA112', '11th', 380.50, 'Wiley', 1, 'calculus.jpg', 1, 's11134676'),
(6, 'Data Communications', 'William Stalling', 'CS215', '10th', 110.00, 'Pearson', 0, 'data_comm.jpg', 1, 's11147691'),
(7, 'Database Systems', 'Carlos Coronel', 'IS222', '11th', 280.50, 'Cengage Learning', 0, 'db.jpg', 1, 's11131927'),
(8, 'Principles of Web Design', 'Joel Sklar', 'IS221', '6th', 190.00, 'Cengage Learning', 0, 'web_design.jpg', 1, 's11146207'),
(9, 'C++ For Everyone', 'Cay Horstmann', 'CS111', '2nd', 80.00, 'Wiley', 0, 'c++.jpg', 1, 's11146207'),
(10, 'Mobile Middleware', 'Sasu Tarkoma', 'CS218', '6th', 90.00, 'Cengage Learning', 0, 'mob_midd.jpg', 1, 's11134676');

-- ----------------------------------------------------------

--
-- Dumping data for table `Message`
--


-- ----------------------------------------------------------

--
-- Dumping data for table `BidDetails`
--
INSERT INTO `BidDetails` (`bidID`, `bidStartDate`, `bidEndDate`, `bidStartPrice`, `bidCurrent`, `bookID`) VALUES
(11001, '2018-10-17 3:00:00', '2018-12-20 15:00:00', 30, 30, 6),
(11002, '2018-10-17 3:00:00', '2018-12-17 15:00:00', 40, 40, 7),
(11003, '2018-10-17 3:00:00', '2018-12-22 15:00:00', 35, 35, 8),
(11004, '2018-10-17 3:00:00', '2018-12-24 15:00:00', 25, 25, 9),
(11005, '2018-10-17 3:00:00', '2018-12-25 15:00:00', 35, 35, 10);

-- ----------------------------------------------------------

--
-- Dumping data for table `RequestBooks`
--


-- ----------------------------------------------------------

--
-- Dumping data for table `Ratings`
--


-- ----------------------------------------------------------

--
-- Dumping data for table `BookBids`
--


-- ----------------------------------------------------------
