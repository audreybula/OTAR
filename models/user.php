<?php

    class UserModel extends Model{
        // Index function - dsiplays OTAR Login Page
        public function index(){
            // Sanitize POST
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            // Hash Paswword
            $password = md5($post['password']); 
            // Check if submit button is clicked
            if(isset($post['submit'])){
                // Check if any inputs are empty
                if($post['id'] == '' || $post['password'] == ''){
                    // Display error message to user
                    Messages::setMsg('Please Fill in All Fields', 'error');  
                    return;
                }
                // Compare Login details with Student table data
                $this->query('SELECT * FROM Student WHERE studID = :id AND studPwd = :password');
                $this->bind(':id', $post['id']);
                $this->bind(':password', $password);
                $row = $this->single();
                // Check if Student credentials successfully located
                if($row){
                    // Session variable to store login status
                    $_SESSION['is_logged_in'] = true;
                    // Session variable to store user type status
                    $_SESSION['is_student'] = true;
                    // Session array to store student details
                    $_SESSION['user_data'] = array(
                        "studID"     => $row['studID'],
                        "studFname"  => $row['studFName'],
                        "studLname"  => $row['studLName'],
                        "studEmail"  => $row['studEmail']
                    );
                    // Redirect to books controller
                    header('Location: '.ROOT_URL.'books');
                }
                else{
                    // Look for login details in admin
                    $this->query('SELECT * FROM Admin WHERE adUsername = :id AND adPwd = :password');
                    $this->bind(':id', $post['id']);
                    $this->bind(':password', $password);
                    $row1 = $this->single();
                    // Check if matching record returned successfully
                    if($row1){
                        // Session variable to store login status
                        $_SESSION['is_logged_in'] = true;
                        // Session variable to store user type status
                        $_SESSION['is_admin'] = true;
                        // Session array to store admin details
                        $_SESSION['user_data1'] = array(
                            "adUsername"     => $row1['adUsername'],
                            "adFname"  => $row1['adFName'],
                            "adLname"  => $row1['adLName'],
                            "adEmail"  => $row1['adEmail']
                        );
                        // Redirect to admin view
                        header('Location: '.ROOT_URL.'users/admin');
                    }else{
                        // Notify user of incorrect login
                        Messages::setMsg('Incorrect Login', 'error');
                    }
                }
            }
            return;
        }
        
        // Function to locate and return user details
        public function profile(){
            // Set id to id of student currently logged in
            $id = $_SESSION['user_data']['studID'];
            // Select student's details from the database
            $this->query("SELECT * FROM Student WHERE studID = '$id'");
            $rows = $this->resultset();
            return $rows;
        }
        
        // Function to insert sent messages and display received mesaages
        public function messaging(){
            // Check if user clicks send message button
            if(isset($_POST['msgBtn'])){
                // Set sender to currently logged in user
                $sender = $_SESSION['user_data']['studID'];
                $date = date("Y-m-d h-i-sa");
                $this->query("INSERT INTO Message (messageText, messageDate, senderID, receiverID) VALUES (:msgTxt,'$date','$sender','s11147441')");
                $this->bind(':msgTxt', $_POST['messagetext']);
                $this->execute();
            }
            $this->query("SELECT * FROM Student INNER JOIN Message ON Student.studID = Message.senderID ORDER BY Student.studID DESC LIMIT 50");
            $rows = $this->resultset();
            if($rows){
                $_SESSION['msgExists'] = true;
                return $rows;
            }            
            return;
        }
        
        // Function that returns all posts made by the currenntly loggeind in student
        public function posts(){
            // Set id to id of student currently logged in
            $id = $_SESSION['user_data']['studID'];
            // Retrieve all books that match user's id
            $this->query("SELECT * FROM Books WHERE sellerID = '$id'");
            $rows = $this->resultset();
            return $rows;
        }
        
        // Function to return all available books
        public function admin(){
            // Query DB for all available books
            $this->query("SELECT * FROM Books WHERE bookAvailability = 1");
            $rows = $this->resultset();
            return $rows;
        }
    }

