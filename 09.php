<?php
  include "config.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$windowTitle"; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        table { border-collapse: collapse;}  
        .colLine {
            line-height:200%;
            min-height:30px;
            border-bottom:1px dotted #333333;
            padding-top:5px;
            padding-bottom:5px;
        } 
    </style>
</head>
<body>
     <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <span class="material-icons">home</span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">PHP</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">논어</a></li>
                  <li><a class="dropdown-item" href="#">맹자</a></li>
                  <li><a class="dropdown-item" href="#">주역</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">국어국문학과</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">소설론</a></li>
                  <li><a class="dropdown-item" href="#">문법론</a></li>
                  <li><a class="dropdown-item" href="#">테스트</a></li>
                </ul>
              </li>

            </ul>
          </div>
        </div>
    </nav>

    


    <div class="container">
        <div class="row">   
            <div class="col colLine">
              include 이해하기<br>
              <?php 
                
                $age = 3;

                echo "age = $age <br>";

                include "10.php";

              ?>
            </div>
        </div>
    </div>
</body>
</html>
