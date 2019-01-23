<?php
/**
 * MPRs controller
 *
 * @author tturnquist
 */
  class MPRs extends Controller{
    public function __construct(){
        // Load Model
        $this->modelInstance = $this->model('MPR');

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
        'mprs' => $modelData,
        // 'user' => $this->userData
      ];
      $this->view('mprs/index', $data);
    }

    // Show Single Record
    public function detail($id){
      $modelData = $this->modelInstance->fetchOneByAttr('mpr.id', $id);

      $data = [
        'mprs' => $modelData,
        // 'user' => $this->userData
      ];

      $this->view("mprs/detail", $data);
    }

    // Add a Record
    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'movie_id' => $_POST['movie_id'],
                'person_id' => $_POST['person_id'],
                'responsibility_id' => $_POST['responsibility_id'],
                'created_by' => $_SESSION['user_id'],
                'updated_by' => $_SESSION['user_id'],
                'updated_date' => date('Y-m-d'),
                'movie_id_err' => '',
                'person_id_err' => '',
                'responsibility_id_err' => '',
            ];

            // Validate form
            if(empty($data['movie_id'])){
                $data['movie_id_err'] = 'Please select a movie';
            }
            // Validate form
            if(empty($data['person_id'])){
                $data['person_id_err'] = 'Please select a person';
            }
            // Validate form
            if(empty($data['responsibility_id'])){
                $data['responsibility_id_err'] = 'Please select a role';
            }

            // Make sure there are no errors
            if(empty($data['movie_id_err']) && 
                    empty($data['person_id_err']) && 
                    empty($data['responsibility_id_err'])){
                // Validation passed
                $msg = 'Validation passed with data: ' . implode(', ', $data);
                logThis($msg, 'app', __FILE__. ' line: ' . __LINE__, __FUNCTION__, 'ADD');
                //Execute
                if($this->modelInstance->add($data)){
                    // Redirect to login
                    flash('record_added', 'NEW Record Added');
                    redirect('mprs');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('mprs/add', $data);
            }
        } else {
            $data = [
                'movie_id' => '',
                'person_id' => '',
                'responsibility_id' => '',
                'created_by' => $_SESSION['user_id'],
                'updated_by' => $_SESSION['user_id'],
                'updated_date' => date('Y-m-d'),
            ];
            $this->view('mprs/add', $data);
        }
    }

    // Edit a Record
    public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $_POST['id'],
                'movie_id' => $_POST['movie_id'],
                'person_id' => $_POST['person_id'],
                'responsibility_id' => $_POST['responsibility_id'],
                'created_by' => $_POST['created_by'],
                'updated_by' => $_SESSION['user_id'],
                'updated_date' => date('Y-m-d'),
                'movie_id_err' => '',
                'person_id_err' => '',
                'responsibility_id_err' => '',
            ];

            // Validate form
            if(empty($data['movie_id'])){
                $data['movie_id_err'] = 'Please select a movie';
            }
            // Validate form
            if(empty($data['person_id'])){
                $data['person_id_err'] = 'Please select a person';
            }
            // Validate form
            if(empty($data['responsibility_id'])){
                $data['responsibility_id_err'] = 'Please select a role';
            }

            // Make sure there are no errors
            if(empty($data['movie_id_err']) && 
                    empty($data['person_id_err']) && 
                    empty($data['responsibility_id_err'])){
                // Validation passed
                //Execute
                if($this->modelInstance->update($data, '', 'id', '=', $id)){
                    // Redirect to login
                    flash('record_message', 'Movie/Person/Role Updated');
                    redirect('mprs');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view("mprs/edit", $data);
            }

        } else {
          // Get record from model
          $record = $this->modelInstance->fetchOneByAttr('mpr.id', $id);
          // Check for owner
          if($record->{'mpr.created_by'} != $_SESSION['user_id']){
            redirect('mprs');
          }

          $data = [
                'id' => $id,
                'movie_id' => $record->{'mpr.movie_id'},
                'person_id' => $record->{'mpr.person_id'},
                'responsibility_id' => $record->{'mpr.responsibility_id'},
                'created_by' => $record->{'mpr.created_by'},
                'updated_by' => $_SESSION['user_id'],
                'updated_date' => date('Y-m-d'),
          ];

          $this->view("mprs/edit", $data);
        }
    }

    // Delete a Record
    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Get record from model
          $record = $this->modelInstance->fetchById($id);
          // Check for owner
          if($record->created_by != $_SESSION['user_id']){
              redirect('mprs');
          }
          //Execute
          if($this->modelInstance->delete($id)){
              // Redirect to login
              flash('record_message', 'Record Removed');
              redirect('mprs');
          } else {
              die('Something went wrong');
          }
        } else {
              redirect('mprs');
        }
      }
  }