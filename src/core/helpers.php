<?php
function parseUrl()
{
  if (isset($_GET['url'])) {
    return explode('/', trim($_GET['url'], '/'));
  }
}
function redirect($url)
{
  header("location: $url");
  exit;
}

function loggedRedirect()
{
  if (isset($_SESSION['user'])) {
    $_SESSION['toast'] = 'You are already logged in';
    redirect('/profile');
  }
}
function loginRequired()
{
  if (!isset($_SESSION['user'])) {
    $_SESSION['toast'] = 'Please login first';
    redirect('/login');
  }
}

function adminRequired()
{
  loginRequired();
  if ($_SESSION['user']['is_admin'] != 1) {
    $_SESSION['toast'] = 'You are not admin';
    redirect('/profile');
  }
}

function tabActive($tab)
{
  return str_ends_with($_SERVER['REQUEST_URI'], $tab) ? 'active' : '';
}

function getToast()
{
  if (isset($_SESSION['toast'])) {
    echo $_SESSION['toast'];
    unset($_SESSION['toast']);
  }
}

function isValidImage($name)
{
  if (empty($_FILES) || !isset($_FILES[$name])) {
    $_SESSION['toast'] = 'Please upload an image';
    return false;
  }

  if ($_FILES[$name]['error'] !== 0) {
    $_SESSION['toast'] = 'Upload failed';
    return false;
  }

  if (!str_contains($_FILES[$name]['type'], 'image')) {
    $_SESSION['toast'] = 'Please upload an image';
    return false;
  }

  if ($_FILES[$name]['size'] > 5000000) {
    $_SESSION['toast'] = 'File too large';
    return false;
  }

  return true;
}

function requireView($file, $data = [])
{
  $cwd = getcwd();

  $css = "$cwd/src/views/$file/style.css";
  $js = "$cwd/src/views/$file/script.js";
  $php = "$cwd/src/views/$file/index.php";

  if (file_exists($css)) echo '<style>' . file_get_contents($css) . '</style>';

  require $php;

  if (file_exists($js)) echo "<script defer src='/src/views/$file/script.js'></script>";
}
