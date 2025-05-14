<?php
// 로그인 처리
if ($cmd === 'login') {
    $id = $_POST['id'] ?? '';
    $pw = $_POST['pw'] ?? '';
  
    // 단순 로그인 검증 예시 (아이디: admin, 비번: 1234)
    /*
    if ($id === 'admin' && $pw === '1234') {
      $_SESSION['user'] = '홍길동';
      $_SESSION['cnuid'] = $id;
    }
    */

    $sql = "select * from users where id='$id' and pass='$pw' ";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    if($data) // 이런 데이터가 있어?
    {
      $_SESSION['user'] = $data["name"];
      $_SESSION['cnuid'] = $data["id"];

      $msg = "로그인 성공";
    }else
      $msg = "아이디와 비밀번호를 확인하세요";

    
    echo "
    <script>
      alert('$msg');
      location.href='index.php';
    </script>
    ";

  
    //header('Location: index.php');
    //exit;
  }
?>