<?php
class client_Home extends Controller
{
  public function index()
  {
    //1. Models
    $categoriesModel = $this->model('Categories');
    $productsModel = $this->model('Products');

    //2. Get Categories 
    $res = $categoriesModel->selectAll();
    $categories = $res['status'] ? $res['data'] : [];

    //3. Get Products
    if (isset($_GET['menu-filter'])) {
      $res = $productsModel->selectActiveByCategory($_GET['menu-filter']);
    } else {
      $res = $productsModel->selectActive();
    }
    $products = $res['status'] ? $res['data'] : [];

    //4. View
    $this->view(
      [
        'title' => 'FoodHat',
        'layout' => 'client',
        'page' => 'client/home',
      ],
      [
        'categories' => $categories,
        'products' => $products
      ]
    );
  }
}
