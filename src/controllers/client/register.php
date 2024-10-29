<?php
class client_Register extends Controller
{
  public function __construct()
  {
    parent::__construct();
    loggedRedirect();
  }

  public function index()
  {
    if (isset($_POST['register'])) {
      //1. Model
      $usersModel = $this->model('Users');

      //2. Register
      $res = $usersModel->register(
        [
          'name' => $_POST['name'],
          'phone' => $_POST['phone'],
          'password' => $_POST['password'],
        ]
      );

      //3. Toast
      $_SESSION['toast'] = $res['message'];

      //4. Redirect
      $res['status'] ? redirect('/login') : redirect('/register');
    }

    //1. View
    $this->view(
      [
        'title' => 'Register',
        'layout' => 'client',
        'component' => ['breadcrumb'],
        'page' => 'client/register',
      ]
    );
  }
}
