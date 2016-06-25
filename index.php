  <style>
    
    .projectContainer{
      width: 250px; /*Easily change the size here*/
      height: 250px;
      border: solid 3px #00A3C6;
      border-radius: 3px;
      box-shadow: 0 0 3px 0px #000000;
      background-color: #00A3C6;
      position: relative;
      margin: 15px; /*Change this for spacing*/
      display: inline-block;
    }
    .projectContainer:hover{
      box-shadow: 0 0 6px 0px #000000;
      background-color: #00B0D0;
      border: solid 3px #00B0D0;
    }
    .projectThumb{
      width: 100%;
    }
    .projectTitle{
      color: #FFFFFF;/*Would be cool if the user could also pick to use an alternate color like #00A3C6*/
      position: absolute;
      bottom: 65px;
      font-size: 30px;
      text-align: right;
      width: 100%;
      font-weight: 600;
      right: 5px;
    }
    .projectDescription{
      width: 100%;
      height: 100%;
      text-align: left;
      margin: 5px;
      color: #FFFFFF;
      font-size:20px;
    }
    body{
      background-color: #F7F7F7; 
    }
  </style>
  

<?php
//PHP to get project details from DB.
$servername = "*";
$username = "*";
$password = "*";
$dbname = "*";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$query = mysqli_query($conn,"SELECT * FROM Newawe_Project_Test");
$projects = [];
while ($row = mysqli_fetch_assoc($query)) {
    $projects[] = $row;
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<?php
foreach($projects as $project){

echo <<< _END
<a href="./player.php?id={$project['ID']}">
<div class="projectContainer">
  <img class="projectThumb" src="http://materializecss.com/images/sample-1.jpg">
<div class="projectTitle">
_END;
echo substr($project['Name'],0,20);
if(strlen($project['Name'])>19)echo "...";    //If the string is longer than 20 chars, cut it off and add a ...       
echo <<< _END
</div>
 <div class="projectDescription">           
_END;
echo substr($project['Description'],0,20);
if(strlen($project['Description'])>19)echo "...";    //If the string is longer than 20 chars, cut it off and add a ...       
echo <<< _END
              </div>
              </div>
              </a>

_END;
}
?>
