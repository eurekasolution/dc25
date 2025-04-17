<?php
// 로그인 처리
if ($cmd === 'login') {
    $id = $_POST['id'] ?? '';
    $pw = $_POST['pw'] ?? '';
  
    // 단순 로그인 검증 예시 (아이디: admin, 비번: 1234)
    if ($id === 'admin' && $pw === '1234') {
      $_SESSION['user'] = '홍길동';
      $_SESSION['cnuid'] = $id;
    }
  
    header('Location: index.php');
    exit;
  }
?>