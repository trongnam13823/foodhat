<?php
class client_Logout
{
  public function __construct()
  {
    loginRequired();
  }
  function index()
  {
    //1. Remove session
    unset($_SESSION['user']);

    //2. Toast 
    $_SESSION['toast'] = 'Logout successfully';

    //3. Redirect
    redirect('/');
  }
}
