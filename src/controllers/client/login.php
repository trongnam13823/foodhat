<?php
class client_Login extends Controller
{

  public function __construct()
  {
    parent::__construct();
    loggedRedirect();
  }

  public function index()
  {
    if (isset($_POST['login'])) {
      //1. Model
      $usersModel = $this->model('Users');

      //2. Validate
      $res = $usersModel->login(
        $_POST['phone'],
        $_POST['password']
      );

      //3. Toast
      $_SESSION['toast'] = $res['message'];

      //4. Redirect
      redirect($_SERVER['HTTP_REFERER']);
    }

    //5. View
    $this->view(
      [
        'title' => 'Login',
        'layout' => 'client',
        'component' => ['breadcrumb'],
        'page' => 'client/login',
      ]
    );
  }
}
