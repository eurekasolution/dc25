<?php
function connectDB() {
    $host = 'localhost';      // 보통 로컬 서버는 localhost 사용
    $user = 'cnu';            // 사용자명
    $password = '1111';       // 비밀번호
    $dbname = 'cnu';          // 데이터베이스명

    // mysqli 객체 생성
    $conn = new mysqli($host, $user, $password, $dbname);

    // 연결 확인
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // 연결 성공 시 커넥션 반환
    return $conn;
}
?>
