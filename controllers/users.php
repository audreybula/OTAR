<?php
    class Users extends Controller{
        
        // Function to invoke index function in UserModel and return index view
        protected function Index(){
            $viewmodel = new UserModel();
            $this->returnView($viewmodel->Index(), true);
        }
        
        // Function to invoke logout function in UserModel and return logout view
        protected function logout(){
            unset($_SESSION['is_logged_in']);
            unset($_SESSION['user_data']);
            session_destroy();
            // Redirect
            header ('Location: '.ROOT_URL);
        }
        
        // Function to invoke profile function in UserModel and return profile view
        protected function profile(){
            $viewmodel = new UserModel();
            $this->returnView($viewmodel->profile(), true);
        }
        
        // Function to invoke messaging function in UserModel and return messaging view
        protected function messaging(){
            $viewmodel = new UserModel();
            $this->returnView($viewmodel->messaging(), true);
        }
        
        // Function to invoke posts function in UserModel and return posts view
        protected function posts(){
            $viewmodel = new UserModel();
            $this->returnView($viewmodel->posts(), true);
        }
        
        // Function to invoke admin function in UserModel and return admin view
        protected function admin(){
            $viewmodel = new UserModel();
            $this->returnView($viewmodel->admin(), true);
        }
    }
