<?php
class admin_Home extends Controller
{
  public function __construct()
  {
    parent::__construct();
    adminRequired();
  }
  public function index()
  {
    //1. View
    $this->view(
      [
        'title' => 'Admin - Home',
        'layout' => 'admin',
        'page' => 'admin/overview',
      ]
    );
  }
}
