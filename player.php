<?php
//PHP to get project details from DB.
$code;
$lang;
$id = htmlentities($_GET['id']);
$servername = "*";
$username = "*";
$password = "*";
$dbname = "*";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$project = mysqli_query($conn,"SELECT * FROM Newawe_Project_Test WHERE id = $id");
$row = mysqli_fetch_assoc($project);
$lang = $row["Lang"];
$code = addslashes($row["Code"]);
$code = str_replace(array("\n", "\r"), '', $code);
$desc = $row["Description"];
$name = $row["Name"];
$user = $row["User"];

echo "<h2><b>".htmlentities($name)."</b></h2>"."<br>By <i>".$user."</i><br>Language: ".$lang."<br>";
?>






<style>
.demo {
  height: 300px;
  width: 300px;
  border-color: #00A3C6;
}

</style>

<iframe class="demo" id="demo"src="#"></iframe>
<?php echo "<br><i>Description:</i> ".htmlentities($desc);?>
<script type="text/javascript">









//All Info Defined Here
var code = "<?php echo $code; ?>";
var lang = "<?php echo $lang; ?>";
function updateLive() {
        //Switch to interpret language. By defualt HTML. To add a language add a case. Default case is a message.
        switch(lang){
          case "html":
            document.getElementById('demo').src = "http://newawe.github.io/Sandbox/html.html?code="+code;
            break;
          case "ruby":
            document.getElementById('demo').src = "http://ronskons.tk/ruby.php?code="+code;
            break;
          case "php":
            document.getElementById('demo').src = "http://ronskons.tk/php.php?code="+code;
            break;
          case "mysql":
            document.getElementById('demo').src = "http://ronskons.tk/mysql.php?code="+code;
            break;
          case "perl":
            document.getElementById('demo').src = "http://ronskons.tk/perl.php?code="+code;
            break;
          case "javascript":
            document.getElementById('demo').src = "http://newawe.github.io/Sandbox/javascript.html?code="+code;
            break;
          case "java":
            document.getElementById('demo').src = "http://ronskons.tk/java.php?code="+code;
            break;
          case "python":
            code = code.replace("/\n/g", "<br />");
            document.getElementById('demo').src = "http://ronskons.tk/python.php?code="+code;
            break;
          default:
            document.getElementById('demo').src = "http://newawe.github.io/Sandbox/html.html?code=<pre>This language is currently not supported for <br>live testing.";
            break;
        }
      }
updateLive();
</script>
