<?php
     include("connect.php");

     $Name=$_POST['Name'];
     $Mobile=$_POST['Mobile'];
     $Password=$_POST['Password'];
     $CPassword=$_POST['CPassword'];
     $Address=$_POST['Address'];
     $Photo=$_FILES['Photo']['name'];
     $tmp_name=$_FILES['Photo']['tmp_name'];
     $Role=$_POST['Role'];

     if($Password == $CPassword){
         move_uploaded_file($tmp_name,"Photo/$Photo");
         $insert = mysqli_query($connect, "INSERT INTO candidates (Name,Mobile,Password,Address,Photo,Role,Status,Votes) VALUES('$Name','$Mobile','$Password','$Address','$Photo','$Role',0,0)");
         if($insert){
             echo'
             <script>
                alert ("Registration is succcessful!");
                window.location="index.html";
                </script>
             ';
            }
         else{
              echo'
              <script>
                alert ("Some error accurs");
                window.location="register.html";
                </script>
              ';
            }
          }
     else{
         echo'
         <script>
         alert (" Password does not Match! ");
         window.location="register.html";
         </script>
        ';
     }

?>