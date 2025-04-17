<?php
// cmd 파라미터 처리
$cmd = isset($_GET['cmd']) ? $_GET['cmd'] : 'init';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>홈페이지</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
    }
    body {
      display: flex;
      flex-direction: column;
    }
    main {
      flex: 1; /* 남은 공간을 모두 main이 차지하게 함 */
    }
  </style>
</head>
<body>

  <!-- 네비게이션 바 -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">홈페이지</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">홈</a>
          </li>

          <!-- 메뉴1 -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="menu1" role="button" data-bs-toggle="dropdown">
              메뉴1
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?cmd=menu1-1">메뉴1-1</a></li>
              <li><a class="dropdown-item" href="index.php?cmd=menu1-2">메뉴1-2</a></li>
            </ul>
          </li>

          <!-- 메뉴2 -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="menu2" role="button" data-bs-toggle="dropdown">
              메뉴2
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?cmd=menu2-1">메뉴2-1</a></li>
              <li><a class="dropdown-item" href="index.php?cmd=menu2-2">메뉴2-2</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- 메인 콘텐츠 -->
  <main class="container my-4">
    <?php
      $file = "$cmd.php";
      if (file_exists($file)) {
        include $file;
      } else {
        echo "<p>요청하신 페이지를 찾을 수 없습니다.</p>";
      }
    ?>
  </main>

  <!-- 푸터 -->
  <footer class="bg-light text-center text-muted py-3">
    충남대학교 인문대학 한문학과
  </footer>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
