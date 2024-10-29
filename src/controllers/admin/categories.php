<?php
class admin_Categories extends Controller
{
  public function __construct()
  {
    parent::__construct();
    adminRequired();
  }

  public function index()
  {
    //1. Model
    $categoriesModel = $this->model('Categories');

    //2. Select Categories
    $res = $categoriesModel->selectAll();
    $categories = $res['status'] ? $res['data'] : [];

    //3. View
    $this->view(
      [
        'title' => 'Admin - Categories',
        'layout' => 'admin',
        'page' => 'admin/categories',
      ],
      [
        'categories' => $categories,
      ]
    );
  }

  public function insert()
  {
    if (isset($_GET['insert'])) {
      //1. Model
      $categoriesModel = $this->model('Categories');

      //2. Insert Category
      $res = $categoriesModel->insert(
        [
          'name' => $_GET['name'],
        ]
      );

      //3. Toast
      $_SESSION['toast'] = $res['message'];

      //4. Redirect
      redirect($_SERVER['HTTP_REFERER']);
    }

    redirect('/');
  }

  public function update($id)
  {
    if (isset($_GET['update'])) {
      //1. Model
      $categoriesModel = $this->model('Categories');

      //2. Update Category
      $res = $categoriesModel->update(
        $id,
        [
          'name' => $_GET['name'],
        ]
      );

      //3. Toast
      $_SESSION['toast'] = $res['message'];

      //4. Redirect
      redirect($_SERVER['HTTP_REFERER']);
    }

    redirect('/');
  }

  public function delete($id)
  {
    //1. Model
    $categoriesModel = $this->model('Categories');

    //2. Delete Category
    $res = $categoriesModel->delete($id);

    //3. Toast
    $_SESSION['toast'] = $res['message'];

    //4. Redirect
    redirect($_SERVER['HTTP_REFERER']);
  }
}
