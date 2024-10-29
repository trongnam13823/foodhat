<?php
class Router
{
  protected $folder = 'client';
  protected $controller = 'home';
  protected $method = 'index';
  protected $params = [];
  public function __construct()
  {
    $cwd = getcwd();
    $url = parseUrl();
    $i = 0;

    //1. Folder
    if (isset($url[$i]) && is_dir("$cwd/src/controllers/{$url[$i]}")) {
      $this->folder = $url[$i];
      unset($url[$i++]);
    }

    //2. Controller
    if (isset($url[$i]) && file_exists("$cwd/src/controllers/$this->folder/{$url[$i]}.php")) {
      $this->controller = $url[$i];
      unset($url[$i++]);
    }
    require_once "$cwd/src/controllers/$this->folder/$this->controller.php";
    $controller = "{$this->folder}_{$this->controller}";
    $this->controller = new $controller();

    //2. Method
    if (isset($url[$i]) && method_exists($this->controller, $url[$i])) {
      $this->method = $url[$i];
      unset($url[$i++]);
    }

    //3. Params
    if (!empty($url)) {
      $this->params = array_values($url);
    }

    //4. Call method from controller with params
    try {
      call_user_func_array([$this->controller, $this->method], $this->params);
    } catch (ArgumentCountError $e) {
      redirect('/');
    }
  }
}
