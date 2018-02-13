        <?php
        require_once("../php/connections.php");

            $db =  new Db();
         $obj = $db->getConnection();
         session_start();

         if (isset($_POST['cu_login'])) {
           $name = $_POST['Shoper_name'];
           $pass = $_POST['Shoper_pass'];
           $sql = "SELECT * FROM `customer` WHERE `name`='$name' AND `pass`='$pass'";
           $qry = $obj->prepare($sql);
           $qry->execute();
           $row = $qry->fetch(PDO::FETCH_ASSOC);
           if ($row['name']==$name && $row['pass']==$pass) {
             
              $_SESSION['customername'] = $row['name'];
             header("location:index.php");
           }
           else {
            ?>

              <script>
                alert("wrong");
              </script>
            <?php
           }
         }

         ?>
