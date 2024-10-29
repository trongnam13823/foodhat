<?php
class client_Profile extends Controller
{
  public function __construct()
  {
    parent::__construct();
    loginRequired();
  }
  public function index()
  {
    //1. View
    $this->view(
      [
        'title' => 'My Profile',
        'layout' => 'client',
        'component' => ['breadcrumb', 'dashboard'],
        'page' => 'client/profile',
      ]
    );
  }

  public function update()
  {
    if (isset($_GET['update'])) {
      //1. Model
      $usersModel = $this->model('Users');

      //2. Update Profile
      $res = $usersModel->update(
        $_SESSION['user']['id'],
        [
          'name' => $_GET['name'],
          'phone' => $_GET['phone'],
        ]
      );

      //3. Toast
      $_SESSION['toast'] = $res['message'];

      //4. Redirect
      redirect('/profile');
    }
  }

  public function updateAvatar()
  {
    //1. Validate image
    if (!isValidImage('avatar')) {
      redirect($_SERVER['HTTP_REFERER']);
    }

    $file = $_FILES['avatar'];
    $user_id = $_SESSION['user']['id'];
    $fileName = $user_id . '.' . pathinfo($file['name'])['extension'];

    //2. Model
    $usersModel = $this->model('Users');

    //3. Update avatar to database
    $res = $usersModel->update(
      $user_id,
      ['avatar' => $fileName]
    );

    //4. Delete old avatar from Server
    @unlink(glob(getcwd() . '/public/img/avatar/' . $user_id . '.*')[0]);

    //5. Upload avatar to Server
    move_uploaded_file($file['tmp_name'], getcwd() . "/public/img/avatar/$fileName");

    //6. Update avatar to session
    $_SESSION['user']['avatar'] = $fileName;

    //7. Toast
    $_SESSION['toast'] = $res['message'];

    //8. Redirect
    redirect($_SERVER['HTTP_REFERER']);
  }
}
