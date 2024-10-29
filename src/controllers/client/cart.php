<?php
class client_Cart extends Controller
{
  public function index()
  {
    // 1. View
    $this->view(
      [
        'title' => 'Shopping Cart',
        'layout' => 'client',
        'component' => ['breadcrumb'],
        'page' => 'client/cart',
      ],
      []
    );
  }
}
