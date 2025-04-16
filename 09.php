<?php
  include "config.php";
  include "head.php";
  include "menu.php";
?>

    


    <div class="container">
        <div class="row">   
            <div class="col colLine">
              include 이해하기<br>
              <?php 
                
                if(isset($_POST["id"]))
                {
                  $id = $_POST["id"];
                  $pw = $_POST["pw"];

                  echo "id = $id , pw = $pw <br>";

                }


                $age = 3;

                echo "age = $age <br>";

                include "10.php";

              ?>

              <form method="post">
                <input type="text" name="id" placeholder="아이디">
                <input type="password" name="pw" placeholder="비번">
                <button type="submit" class="btn btn-primary">로그인</button>
              </form>


            </div>
        </div>
    </div>
</body>
</html>
