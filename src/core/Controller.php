<?php
class Controller
{
  public function __construct()
  {
  }
  protected function model($model)
  {
    //1. require file model
    require getcwd() . "/src/models/$model.php";

    //2. return instantiate model
    $model = "models_$model";
    return new $model();
  }

  protected function view($display, $data = [])
  {
    //1. require file layout
    require getcwd() . "/src/views/layouts/{$display['layout']}.php";
  }
}
