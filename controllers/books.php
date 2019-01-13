<?php
    class Books extends Controller{
        
        // Function to invoke index function in BooKModel and return index view
        protected function Index(){
            $viewmodel = new BookModel();
            $this->returnView($viewmodel->Index(), true);
        }
        
        // Function to invoke sell function in BookModel and return sell view
        protected function sell(){
            $viewmodel = new BookModel();
            $this->returnView($viewmodel->sell(), true);
        }
        
        // Function to invoke auction function in BookModel and return auction view
        protected function auction(){
            $viewmodel = new BookModel();
            $this->returnView($viewmodel->auction(), true);
        }
        
        // Function to invoke request function in BookModel and return request view
        protected function request(){
            $viewmodel = new BookModel();
            $this->returnView($viewmodel->request(), true);
        }
        
        // Function to invoke search function in BookModel and return search view
        protected function search(){
            $viewmodel = new BookModel();
            $this->returnView($viewmodel->search(), true);
        }
        
        // Function to invoke details function in BookModel and return details view
        protected function details(){
            $viewmodel = new BookModel();
            $this->returnView($viewmodel->details(), true);
        }
        
        // Function to invoke sold function in BookModel and return sold view
        protected function sold(){
            $viewmodel = new BookModel();
            $this->returnView($viewmodel->sold(), true);
        }
        
        // Function to invoke unsold function in BookModel and return unsold view
        protected function unsold(){
            $viewmodel = new BookModel();
            $this->returnView($viewmodel->unsold(), true);
        }
        
        // Function to invoke delete function in BookModel and return delete view
        protected function delete(){
            $viewmodel = new BookModel();
            $this->returnView($viewmodel->delete(), true);
        }
        
        // Function to invoke bid function in BookModel and return bid view
        protected function bid(){
            $viewmodel = new BookModel();
            $this->returnView($viewmodel->bid(), true);
        }
    }
