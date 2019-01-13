-- Database name `otardb`

--
-- Table structure for table `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `adUsername` varchar(20) NOT NULL,
  `adPwd` varchar(50) NOT NULL,
  `adFName` varchar(20) NOT NULL,
  `adLName` varchar(20) NOT NULL,
  `adEmail` varchar(50) NOT NULL,
  CONSTRAINT Admin_pk_usrname PRIMARY KEY (`adUsername`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE IF NOT EXISTS `Student` (
  `studID` char(9) NOT NULL,
  `studPwd` varchar(50) NOT NULL,
  `studPic` varchar(255) NOT NULL,
  `studFName` varchar(20) NOT NULL,
  `studLName` varchar(20) NOT NULL,
  `studEmail` char(27) NOT NULL,
  `studMobile` int(7) NOT NULL,
  `studProgramme` varchar(50) NOT NULL,
  `studDOB` varchar(11) NOT NULL,
  `studAddress` varchar(50) NOT NULL,
  CONSTRAINT Student_pk_studID PRIMARY KEY (`studID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE IF NOT EXISTS `Books` (
  `bookID` int(4) NOT NULL UNIQUE AUTO_INCREMENT, 
  `bookTitle` text NOT NULL,
  `bookAuthor` varchar(50) NOT NULL,
  `bookCourse` char(5) NOT NULL,
  `bookEdition` varchar(5) NOT NULL,
  `bookPrice` decimal(5,2) NOT NULL,
  `bookPublisher` varchar(50) NOT NULL,
  `bookStatus` tinyint(4) NOT NULL,
  `bookPic` varchar(255) NOT NULL,
  `bookAvailability` tinyint(4) NOT NULL,
  `sellerID` char(9) NOT NULL,  
  CONSTRAINT Books_pk_bookID PRIMARY KEY (`bookID`),
  CONSTRAINT Books_fk_sellerID FOREIGN KEY (`sellerID`) REFERENCES Student (`studID`),
  INDEX Books_idx_bkTitle (`bookTitle`(20))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE IF NOT EXISTS `Message` (
  `messageID` int(4) NOT NULL UNIQUE AUTO_INCREMENT,
  `messageText` varchar(1000) NOT NULL,
  `messageDate` datetime(4) NOT NULL,
  `senderID` char(9) NOT NULL, 
  `receiverID` char(9) NOT NULL,
  CONSTRAINT Message_pk_msgID PRIMARY KEY (`messageID`),
  CONSTRAINT Message_fk_senderID FOREIGN KEY (`senderID`) REFERENCES Student (`studID`),
  CONSTRAINT Message_fk_receiverID FOREIGN KEY (`receiverID`) REFERENCES Student (`studID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1001;

-- --------------------------------------------------------

--
-- Table structure for table `BidDetails`
--

CREATE TABLE IF NOT EXISTS `BidDetails` (
  `bidID` int(5) NOT NULL AUTO_INCREMENT,
  `bidStartDate` datetime NOT NULL,
  `bidEndDate` datetime NOT NULL,
  `bidStartPrice` decimal(5,2) NOT NULL,
--   `bidIncrement` decimal(5,2) NOT NULL,
  `bidCurrent` decimal(5,2) NOT NULL,
  `bookID` int(4) NOT NULL, 
  CONSTRAINT BidDetails_pk_bidID PRIMARY KEY (`bidID`),
  CONSTRAINT BidDetails_fk_bookID FOREIGN KEY (`bookID`) REFERENCES Books (`bookID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=11001;

-- --------------------------------------------------------

--
-- Table structure for table `RequestBooks`
--

CREATE TABLE IF NOT EXISTS `RequestBooks` (
  `requestID` int(3) NOT NULL AUTO_INCREMENT,
  `bookTitle` text NOT NULL,
  `bookAuthor` varchar(50) NOT NULL,
  `requestDate` datetime NOT NULL,
  `buyerID` char(9) NOT NULL,
  CONSTRAINT RequestBooks_pk_reqID_buyID PRIMARY KEY (`requestID`,`buyerID`),
  CONSTRAINT RequestBooks_fk_buyID FOREIGN KEY (`buyerID`) REFERENCES Student (`studID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=111;

-- --------------------------------------------------------

--
-- Table structure for table `Ratings`
--

CREATE TABLE IF NOT EXISTS `Ratings` (
  `ratingID` int(3) NOT NULL AUTO_INCREMENT,
  `ratingValue` varchar(2) NOT NULL,
  `studID` char(9) NOT NULL,
  CONSTRAINT Ratings_pk_ratID_studID PRIMARY KEY (`ratingID`,`studID`),
  CONSTRAINT Ratings_fk_studID FOREIGN KEY (`studID`) REFERENCES Student (`studID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=101;

-- --------------------------------------------------------

--
-- Table structure for table `BookBids`
--

CREATE TABLE IF NOT EXISTS `BookBids` (
  `bookbidID` int(4) NOT NULL AUTO_INCREMENT,
  `buyerID` char(9) NOT NULL,
  `bookID` int(4) NOT NULL,
  CONSTRAINT BookBids_pk_bkbidID_bkID PRIMARY KEY (`bookbidID`),
  CONSTRAINT BookBids_fk_buyID FOREIGN KEY (`buyerID`) REFERENCES Student (`studID`),
  CONSTRAINT BookBids_fk_bookID FOREIGN KEY (`bookID`) REFERENCES Books (`bookID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1101;