<?php
/**
 * Movies controller
 *
 * @author tturnquist
 */
  class Movies extends Controller{
    public function __construct(){
        // Load Model
        $this->modelInstance = $this->model('Movie');

        if(!isset($_SESSION['user_id'])){
          redirect('users/login');
        }
        $this->userModel = $this->model('User');
        $this->userData = $this->userModel->fetchById($_SESSION['user_id']);
    }

    // Load list of Records
    public function index(){
      $modelData = $this->modelInstance->fetchAll();
      $data = [
        'movie' => $modelData,
        // 'user' => $this->userData
      ];
      $this->view('movies/index', $data);
    }

    // Show Single Record
    public function detail($id){
      $modelData = $this->modelInstance->fetchById($id);

      $data = [
        'movie' => $modelData,
        // 'user' => $this->userData
      ];

      $this->view("movies/detail", $data);
    }

    // Add a Record
    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => trim($_POST['title']),
                'year_released' => trim($_POST['year_released']),
                'synopsis' => trim($_POST['synopsis']),
                'created_by' => $_SESSION['user_id'],
                'updated_by' => $_SESSION['user_id'],
                'updated_date' => date('Y-m-d'),
                'title_err' => '',
                'year_released_err' => '',
                'synopsis_err' => '',
            ];

            // Validate form
            if(empty($data['title'])){
                $data['title_err'] = 'Please enter title';
            }

            // Make sure there are no errors
            if(empty($data['title_err'])){
                // Validation passed
                $msg = 'Validation passed with data: ' . implode(', ', $data);
                logThis($msg, 'app', __FILE__. ' line: ' . __LINE__, __FUNCTION__, 'ADD');
                //Execute
                if($this->modelInstance->add($data)){
                    // Redirect to login
                    flash('record_added', 'Movie Added');
                    redirect('movies');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('movies/add', $data);
            }
        } else {
            $data = [
                'title' => '',
                'year_released' => '',
                'synopsis' => '',
                'created_by' => $_SESSION['user_id'],
                'updated_by' => $_SESSION['user_id'],
                'updated_date' => date('Y-m-d'),
            ];
            $this->view('movies/add', $data);
        }
    }

    // Edit a Record
    public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'year_released' => trim($_POST['year_released']),
                'synopsis' => trim($_POST['synopsis']),
                'created_by' => $_POST['created_by'],
                'updated_by' => $_SESSION['user_id'],
                'updated_date' => date('Y-m-d'),
                'title_err' => '',
                'year_released_err' => '',
                'synopsis_err' => '',
            ];

            // Validate form (customize and repeats as needed)
            if(empty($data['title'])){
                $data['title_err'] = 'Please enter title';
            }

            // Make sure there are no errors
            if(empty($data['title_err'])){
                // Validation passed
                //Execute
                if($this->modelInstance->update($data, '', 'id', '=', $id)){
                    // Redirect to login
                    flash('record_message', 'Movie Updated');
                    redirect('movies');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view("movies/edit", $data);
            }

        } else {
          // Get record from model
          $record = $this->modelInstance->fetchById($id);
          // Check for owner
          if($record->created_by != $_SESSION['user_id']){
            redirect('movies');
          }

          $data = [
              'id' => $id,
              'title' => $record->title,
              'year_released' => $record->year_released,
              'synopsis' => $record->synopsis,
              'created_by' => $_SESSION['user_id'],
              'updated_by' => $_SESSION['user_id'],
              'updated_date' => date('Y-m-d'),
          ];

          $this->view("movies/edit", $data);
        }
    }

    // Delete a Record
    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Get record from model
          $record = $this->modelInstance->fetchById($id);
          // Check for owner
          if($record->created_by != $_SESSION['user_id']){
              redirect('movies');
          }
          //Execute
          if($this->modelInstance->delete($id)){
              // Redirect to login
              flash('record_message', 'Record Removed');
              redirect('movies');
          } else {
              die('Something went wrong');
          }
        } else {
              redirect('movies');
        }
      }
  }