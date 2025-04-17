<?php

    // 로그아웃 처리
    if ($cmd === 'logout') {
        session_destroy();
        header('Location: index.php');
        exit;
    }
?>