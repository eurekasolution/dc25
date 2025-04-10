<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>😍반응형 홈페이지😍</title>

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
              여기는 HTML입니다.<br>
              <?php 
                $age = 25;
                echo "당신의 나이는 $age 입니다.<br>";
                
                $age = $age + 3;
                echo "당신의 나이는 $age 입니다.<br>";

                $point = 85;

                if( $point >= 90) {
                  echo "당신은 A입니다.<br>";
                }else if( $point >= 80) {
                  echo "당신은 B입니다.<br>";
                } else {
                  echo "C입니다<br>";
                }

                $age = 3;

                $name = "홍길동";
                echo "안녕하세요 $name 나이 = $age <br>";

                for($i=1; $i<=31; $i=$i+1) 
                {
                  if($i < 10) {
                    echo "0$i ";
                  }else {
                    echo "$i ";
                  }
                  

                  if($i % 7 == 0) {
                    echo "<br>";
                  }
                }

                echo "<br><br>";

                // 반복문 for(시작값; 종료값; 증감)

                $total = 0;
                for($i=1; $i<=100; $i=$i+1) {
                  if( $i % 2 == 1) {
                    $total = $total + $i;
                    echo "$i ... $total<br>";
                  }
                }

                echo "100까지의 합은 $total<br>";

                $total = 0;
                for($i=1; $i<=100; $i=$i+2) {
                  $total = $total + $i;
                  echo "$i ... $total<br>";
                }

                echo "100까지의 합은 $total<br>";


              ?>
            </div>
        </div>
    </div>
</body>
</html>
