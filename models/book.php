<?php

    class BookModel extends Model{
        // Index function - dsiplays all available books
        public function Index() {
            $this->query('SELECT * FROM Books WHERE bookAvailability = 1');
            $rows = $this->resultset();
            return $rows;
        }
        
        // Function to  add a book for sale to the DB
        public function sell(){           
            // Check if sell button is clicked
            if(isset($_REQUEST['sellBookBtn'])){
                $bookStatus = 1;
                $bookAvailability = 1;
                $sellerID = $_SESSION['user_data']['studID'];
                $bookPic = $_FILES['bookpic'];
                $actualFileName = $bookPic['name'];
                $tmpName = $bookPic['tmp_name'];
                $targetLocation = "assets/bookpics/$actualFileName";
                move_uploaded_file($tmpName, $targetLocation);
                // Query to insert book into DB
                $this->query("INSERT INTO `Books` (`bookTitle`, `bookAuthor`, `bookCourse`, `bookEdition`, `bookPrice`, `bookPublisher`, `bookStatus`, `bookPic`, `bookAvailability`, `sellerID`) VALUES (:booktitle, :bookauthor, :bookcourse, :bookedition, :bookprice, :bookpublisher, $bookStatus, :bookpic, $bookAvailability, '$sellerID')");
                // Bind parameters
                $this->bind(':booktitle', $_REQUEST['booktitle']);
                $this->bind(':bookauthor', $_REQUEST['bookauthor']);
                $this->bind(':bookcourse', $_REQUEST['bookcourse']);
                $this->bind(':bookpic', $actualFileName);
                $this->bind(':bookedition', $_REQUEST['bookedition']);
                $this->bind(':bookprice', $_REQUEST['bookprice']);
                $this->bind(':bookpublisher', $_REQUEST['bookpublisher']);
                // Execute query
                $this->execute();
                // Notify user of successful book post
                Messages::setMsg('Book Posted Successfully', 'success');
                // Verify
                if($this->lastInsertId()){
                    // Redirect
                    header('Location: '.ROOT_URL.'books/sell');                    
                }          
            }
            return;
        }
        
        // Function to  add a book for auction to the DB
        public function auction(){
            // Check if auction button is clicked
            if (isset($_REQUEST['auctionBookBtn'])) {
                $bookStatus = 0;
                $bookAvailability = 1;
                $sellerID = $_SESSION['user_data']['studID'];
                $bidStartDate = date('Y-m-d H:i:s');
                $bookPic = $_FILES['bookpic'];
                $actualFileName = $bookPic['name'];
                $tmpName = $bookPic['tmp_name'];
                $targetLocation = "assets/bookpics/$actualFileName";
                move_uploaded_file($tmpName, $targetLocation);
                // Insert book into DB
                $this->query("INSERT INTO `Books` (`bookTitle`, `bookAuthor`, `bookCourse`, `bookEdition`, `bookPrice`, `bookPublisher`, `bookStatus`, `bookPic`, `bookAvailability`, `sellerID`) VALUES (:booktitle, :bookauthor, :bookcourse, :bookedition, :bookprice, :bookpublisher, $bookStatus, :bookpic, $bookAvailability, '$sellerID')");
                // Bind parameters
                $this->bind(':booktitle', $_REQUEST['booktitle']);
                $this->bind(':bookauthor', $_REQUEST['bookauthor']);
                $this->bind(':bookcourse', $_REQUEST['bookcourse']);
                $this->bind(':bookpic', $actualFileName);
                $this->bind(':bookedition', $_REQUEST['bookedition']);
                $this->bind(':bookprice', $_REQUEST['bidstartprice']);
                $this->bind(':bookpublisher', $_REQUEST['bookpublisher']);
                $this->execute();
                $this->query('SELECT MAX(bookID) FROM Books');
                $row = $this->single();
                $bookID = $row['MAX(bookID)'];
                $this->query("INSERT INTO `BidDetails` (`bidStartDate`, `bidEndDate`, `bidStartPrice`, `bidCurrent`, `bookID`) VALUES (:bidstart, :bidend, :bidstartprice, :bidcurrent, $bookID)");
                $this->bind(':bidstart', $bidStartDate);
                $this->bind(':bidend', $_REQUEST['bidend']);
                $this->bind(':bidstartprice', $_REQUEST['bidstartprice']);
                $this->bind(':bidcurrent', $_REQUEST['bidstartprice']);
                $this->execute();
                Messages::setMsg('Book Posted Successfully', 'success');
                // Verify
                if($this->lastInsertId()){
                    // Redirect
                    header('Location: '.ROOT_URL.'books/auction');                    
                }  
            }
            return;
        }
        
        // Function to  add a book request to the DB
        public function request(){
            // Check if request button is clicked
            if (isset($_REQUEST['requestBookBtn'])) { 
                $buyerID = $_SESSION['user_data']['studID'];
                $requestDate = date('Y-m-d H:i:s'); 
                // Query to insert into request table
                $this->query("INSERT INTO `RequestBooks` (`bookTitle`, `bookAuthor`, `requestDate`, `buyerID`) VALUES (:booktitle, :bookauthor, :requestdate, '$buyerID')");
                // Bind parameters
                $this->bind(':booktitle', $_REQUEST['booktitle']);
                $this->bind(':bookauthor', $_REQUEST['bookauthor']);
                $this->bind(':requestdate', $requestDate);
                // Execute query
                $this->execute();
                Messages::setMsg('Request Submitted Successfully', 'success');
                // Verify
                if($this->lastInsertId()){
                    // Redirect
                    header('Location: '.ROOT_URL.'books/request');                    
                }  
            }           
            return;
        }
        
        // Function to return DB records that match search field
        public function search(){
            // Check if search button is clicked
            if(isset($_POST['searchBtn'])){
                $searchField = $_POST['searchfield'];
                // Query to compare DB fields with search field
                $this->query("SELECT * FROM Books WHERE bookCourse LIKE '%".$searchField."%' OR bookTitle LIKE '%".$searchField."%' OR bookAuthor LIKE '%".$searchField."%' OR bookPublisher LIKE '%".$searchField."%'");
                $rows = $this->resultset();
                return $rows;
            }
            return;
        }
        
        // Function to extract details for a particular book
        public function details(){
            if(isset($_REQUEST['bookid'])){
                $bookID = preg_replace('/[^-a-zA-Z0-9_]/', '', $_REQUEST['bookid']);
                $this->query("SELECT * FROM Books WHERE bookID = $bookID");
                $rows = $this->resultset();
                $t = $rows[0];
                if($t['bookStatus'] == 1){
                    return $rows;
                }                
                elseif($t['bookStatus'] == 0){
                    $this->query("SELECT * FROM Books JOIN BidDetails WHERE Books.bookid = BidDetails.bookID AND BidDetails.bookID = $bookID");
                    $rows1 = $this->resultset();                    
                    return $rows1;
                }
            }
        }
        
        // Function to mark a book as sold
        public function sold(){
            // Check if sold button is clicked
            if(isset($_POST['soldBtn'])){
                $soldID = preg_replace('/[^-a-zA-Z0-9_]/', '', $_REQUEST['soldBtn']);
                // Make the book availability 0
                $this->query("UPDATE Books SET bookAvailability = 0 WHERE bookID = $soldID");
                $this->execute();
            }
            header('Location: '.ROOT_URL.'users/posts');
        }
        
        // Function to mark a book as unsold
        public function unsold(){
            // Check if unsold button is clicked
            if(isset($_POST['unsoldBtn'])){
                $soldID = preg_replace('/[^-a-zA-Z0-9_]/', '', $_REQUEST['unsoldBtn']);
                // Make the book availability 0
                $this->query("UPDATE Books SET bookAvailability = 1 WHERE bookID = $soldID");
                $this->execute();
            }
            header('Location: '.ROOT_URL.'users/posts');
        }
        
        // Function to delete a book
        public function delete(){
            // Check if delete button is clicked
            if(isset($_POST['delete'])){
                $deleteID = preg_replace('/[^-a-zA-Z0-9_]/', '', $_REQUEST['delete']);
                // Set book availability to 0
                $this->query("UPDATE Books SET bookAvailability = 0 WHERE bookID = $deleteID");
                $this->execute();
            }
            header('Location: '.ROOT_URL.'users/admin');
        }
        
        // Function to place a bid
        public function bid(){
            // Check if bid button is clicked
            if(isset($_POST['bidBtn'])){
                $bookID = preg_replace('/[^-a-zA-Z0-9_]/', '', $_REQUEST['bidBtn']);
                $this->query("SELECT * FROM BidDetails JOIN Books WHERE Books.bookID = BidDetails.bookID AND Books.bookID = $bookID");
                $rows = $this->resultset();
                $t = $rows[0];
                $bid = $_REQUEST['bidAmt']; 
                // Check if bid entered is less than current bid
                if($bid <= $t['bidCurrent']){
                    // Alert user to enter a higher amount
                    Messages::setMsg('Bid Entered Must Be Higher Than Current Bid', 'error');
                    return $rows;
                }
                else{
                    // Update the current bid
                    $this->query("UPDATE BidDetails SET bidCurrent = $bid WHERE bookID = $bookID");
                    $this->execute();
                    $buyerID = $_SESSION['user_data']['studID'];
                    $this->query("INSERT INTO BookBids (buyerID, bookID) VALUES ('$buyerID', $bookID)");
                    $this->execute();
                    // Notify user of successful bid entry
                    Messages::setMsg('Bid Successfully Made', 'success');
                    $this->query("SELECT * FROM BidDetails JOIN Books WHERE Books.bookID = BidDetails.bookID AND Books.bookID = $bookID");
                    $rows1 = $this->resultset();
                    return $rows1;
                }
            }
            return $rows;
        }
    }