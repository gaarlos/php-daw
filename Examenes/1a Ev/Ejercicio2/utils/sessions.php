<?php  
  function login() {
    $users = file_get_contents('static/users.json');
    $users = json_decode($users, true);
    $isUser = false;

    if(!isset($_SESSION['username'])) {
      if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
        for($i = 0; $i < sizeof($users); $i++) {
          if($_REQUEST['username'] == $users[$i][1] && $_REQUEST['password'] == $users[$i][2]) {
            $_SESSION['username'] = $_REQUEST['username'];
            $isUser = true;
            header('Location: conversor.php');
          }
        }
      }
    }
    
    return $isUser;
  }

  function logout() {
    $_SESSION = array();
    setcookie('PHPSESSID', '', time()-3600);
    session_destroy();
    header('Location: index.php');
  }
?>