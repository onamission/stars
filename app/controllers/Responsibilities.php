<?php
/**
 * Responsibilities controller
 *
 * @author tturnquist
 */
  class Responsibilities extends Controller{
    public function __construct(){
        // Load Model
        $this->modelInstance = $this->model('Responsibility');

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
        'responsibilities' => $modelData,
        // 'user' => $this->userData
      ];
      $this->view('responsibilities/index', $data);
    }

    // Show Single Record
    public function detail($id){
      $modelData = $this->modelInstance->fetchById($id);

      $data = [
        'responsibilities' => $modelData,
        // 'user' => $this->userData
      ];

      $this->view("responsibilities/detail", $data);
    }

    // Add a Record
    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => 0,
                'name' => trim($_POST['name']),
                'created_by' => $_SESSION['user_id'],
                'updated_by' => $_SESSION['user_id'],
                'updated_date' => date('Y-m-d'),
                'name_err' => '',
            ];

            // Validate form
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }

            // Make sure there are no errors
            if(empty($data['name_err'])){
                // Validation passed
                $msg = 'Validation passed with data: ' . implode(', ', $data);
                logThis($msg, 'app', __FILE__. ' line: ' . __LINE__, __FUNCTION__, 'ADD');
                //Execute
                if($this->modelInstance->add($data)){
                    // Redirect to login
                    flash('record_added', 'Star Added');
                    redirect('responsibilities');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('responsibilities/add', $data);
            }
        } else {
            $data = [
                'id' => 0,
                'name' => '',
                'created_by' => $_SESSION['user_id'],
                'updated_by' => $_SESSION['user_id'],
                'updated_date' => date('Y-m-d'),
            ];
            $this->view('responsibilities/add', $data);
        }
    }

    // Edit a Record
    public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'created_by' => $_POST['created_by'],
                'updated_by' => $_SESSION['user_id'],
                'updated_date' => date('Y-m-d'),
                'name_err' => '',
            ];

            // Validate form (customize and repeats as needed)
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }

            // Make sure there are no errors
            if(empty($data['name_err'])){
                // Validation passed
                $msg = 'Validation passed with data: ' . implode(', ', $data);
                logThis($msg, 'app', __FILE__. ' line: ' . __LINE__, __FUNCTION__, 'EDIT');
                //Execute
                if($this->modelInstance->update($data, '', 'id', '=', $id)){
                    // Redirect to login
                    flash('record_message', 'Star Updated');
                    redirect('responsibilities');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view("responsibilities/edit", $data);
            }

        } else {
            // Get record from model
            $record = $this->modelInstance->fetchById($id);
            // Check for owner
            if($record->created_by != $_SESSION['user_id']){
                $msg = 'Non-owner tried to edit record: ' . __CLASS__ . ":$id";
                logThis($msg, 'app', __FILE__. ' line: ' . __LINE__, __FUNCTION__, 'EDIT');
                redirect('responsibilities');
            }

            $data = [
                'id' => $id,
                'name' => $record->name,
                'created_by' => $_SESSION['user_id'],
                'updated_by' => $_SESSION['user_id'],
                'updated_date' => date('Y-m-d'),
            ];
            $this->view("responsibilities/edit", $data);
        }
    }

    // Delete a Record
    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Get record from model
            $record = $this->modelInstance->fetchById($id);
            // Check for owner
            if($record->created_by != $_SESSION['user_id']){
                $msg = 'Non-owner tried to delete record: ' . __CLASS__ . ":$id";
                logThis($msg, 'app', __FILE__. ' line: ' . __LINE__, __FUNCTION__, 'DEL');
                redirect('responsibilities');
            }
            //Execute
            if($err=$this->modelInstance->delete($id)){
                // Redirect to login
                flash('record_message', 'Record Removed');
                redirect('responsibilities');
            } else {
                $msg = 'Something went wrong: ' . __CLASS__ . ":$id | $err";
                logThis($msg, 'app', __FILE__. ' line: ' . __LINE__, __FUNCTION__, 'DEL');
                die('Something went wrong');
            }
        } else {
                redirect('responsibilities');
        }
      }
  }