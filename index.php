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
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
  <div class="row">
<?php
foreach($projects as $project){

echo <<< _END



        <div class="col s3 m3">
          <div class="card small">
            <div class="card-image">
              <img src="http://materializecss.com/images/sample-1.jpg">
              <span class="card-title">
_END;
echo substr($project['Name'],0,20);
if(strlen($project['Name'])>19)echo "...";    //If the string is longer than 20 chars, cut it off and add a ...       
echo <<< _END
</span>
            </div>
            <div class="card-content">
              <p>
_END;
echo substr($project['Description'],0,20);
if(strlen($project['Description'])>19)echo "...";    //If the string is longer than 20 chars, cut it off and add a ...       
echo <<< _END
              </p>
            </div>
            <div class="card-action">
              <a href="./player.php?id={$project['ID']}">Go To</a>
            </div>
          </div>
        </div>
_END;
}
?>
      </div>
