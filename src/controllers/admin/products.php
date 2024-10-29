<?php
class admin_Products extends Controller
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
    $productsModel = $this->model('Products');

    //2. Select Categories
    $res = $categoriesModel->selectAll();
    $categories = $res['status'] ? $res['data'] : [];

    //3. Select Products
    $res = $productsModel->selectAll();
    $products = $res['status'] ? $res['data'] : [];

    //4. View
    $this->view(
      [
        'title' => 'Admin - Products',
        'layout' => 'admin',
        'page' => 'admin/products',
      ],
      [
        'categories' => $categories,
        'products' => $products
      ]
    );
  }

  public function delete($id)
  {
    if (isset($_GET['thumbnail']) && $id) {
      //1. Model
      $productsModel = $this->model('Products');

      //2. Delete product
      $res = $productsModel->delete($id);

      //3. Delete thumbnail from server
      if ($res['status']) {
        @unlink(getcwd() . '/public/img/products/' . $_GET['thumbnail']);
      }

      //4. Toast
      $_SESSION['toast'] = $res['message'];

      //5. Redirect
      redirect($_SERVER['HTTP_REFERER']);
    }
    redirect($_SERVER['/']);
  }

  public function insert()
  {
    if (isset($_POST['insert'])) {

      //1. Validate thumbnail
      if (!isValidImage('thumbnail')) {
        redirect($_SERVER['HTTP_REFERER']);
      }

      $file = $_FILES['thumbnail'];
      $fileName =  uniqid() . '.' . pathinfo($file['name'])['extension'];

      //2. Model
      $productsModel = $this->model('Products');

      //3. Insert product
      $res = $productsModel->insert(
        [
          'thumbnail' => $fileName,
          'name' => $_POST['name'],
          'price' => $_POST['price'],
          'offer' => $_POST['offer'],
          'category_id' => $_POST['category_id'],
        ]
      );

      //4. Upload thumbnail to server
      if ($res['status']) {
        move_uploaded_file($file['tmp_name'], getcwd() . "/public/img/products/$fileName");
      }

      //5. Toast
      $_SESSION['toast'] = $res['message'];

      //6. Redirect
      redirect($_SERVER['HTTP_REFERER']);
    }

    redirect('/');
  }

  public function update($id)
  {
    // Update product status (Active or Inactive)
    if (isset($_GET['active']) && $id) {
      //1. Model
      $productsModel = $this->model('Products');

      //2. Update status
      $res = $productsModel->update($id, [
        'active' => $_GET['active']
      ]);

      //3. Toast
      $_SESSION['toast'] = $res['message'];

      //4. Redirect
      redirect($_SERVER['HTTP_REFERER']);
    }

    // Update product
    if (isset($_POST['update']) && $id) {
      $thumb_old = $_POST['thumbnail-old'];
      $thumb_new = null;

      //If thumbnail is uploaded
      if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0) {
        //1. Validate thumbnail
        if (!isValidImage('thumbnail')) {
          redirect($_SERVER['HTTP_REFERER']);
        }

        //2. Set new thumbnail
        $ext = pathinfo($_FILES['thumbnail']['name'])['extension'];
        $thumb_new = uniqid() . ".$ext";
      }

      //3. Model
      $productsModel = $this->model('Products');

      //4. Update product
      $res = $productsModel->update(
        $id,
        [
          'name' => $_POST['name'],
          'price' => $_POST['price'],
          'offer' => $_POST['offer'],
          'category_id' => $_POST['category_id'],
          'thumbnail' => $thumb_new ?? $thumb_old,
        ]
      );

      //5. Upload new thumbnail and delete old thumbnail to server
      if ($res['status'] && $thumb_new) {
        @unlink(getcwd() . '/public/img/products/' . $thumb_old);
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], getcwd() . "/public/img/products/$thumb_new");
      }

      //6. Toast
      $_SESSION['toast'] = $res['message'];

      //7. Redirect
      redirect($_SERVER['HTTP_REFERER']);
    }
    redirect('/');
  }
}
