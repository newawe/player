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
?>


<style>
  
  .playerTopBar{
    height: 60px;
    background-color: #00A3C6;
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
  }
  #projectTitle{
    height: 100%;
    font-size: 35px;
    padding: 0;
    margin: 0;
    margin-top: 8px;
    margin-left: 12.5px;
    color: #FFFFFF;
    display: inline-block;
  }
  #projectLanguage{
    display: inline-block;
    float: right;
    font-size: 20px;
    margin: 0;
    margin-right: 12.5px;
    margin-top: 18px;
    color: #FFFFFF;
  }
  .demo{
    margin: -3;
    margin-top: 55px;
    padding: 0;
    width: 100%;
    height: 70%;
    border: 0;
    border-bottom: 2px solid #00A3C6;
    margin-bottom: 5px;
  }
  #playerButton{
    display: inline-block;
    float: right;
    width: 100px;
    height: 30px;
    border: 0;
    background-color: #00A3C6;
    border-radius: 5px;
    box-shadow: 0 0 3px #000000;
    color: #FFFFFF;
  }
  #playerButton:hover{
    box-shadow: 0 0 6px #000000;
    background-color: 00B8D8;
  }
  #projectDescription{
    display: inline-block;
    float: left;
    overflow-y: auto;
    width: 70%;
    max-height: 40px;
    margin-top: 0;
  }
  #show{
    width: 90%;
    background-color: #00A3C6;
    float: left;
    margin: 5px;
    color: #FFFFFF;
    padding: 5px;
    overflow-y: auto;
    border: 2px solid #00A3C6;
    border-radius: 20px;
    max-height: 60px;
  }
  .noBottom{
    margin-bottom: 0;
    padding-bottom: 0;
  }
</style>
<div class="playerTopBar">
  <h2 id="projectTitle">
<?php echo $name;?>
  </h2>
  <p id="projectLanguage">
  <?php echo $lang;?>
  </p>
</div>
<iframe class="demo" id="demo"src="http://newawe.github.io/Sandbox/html.html?code=<i>Press the button to run the code...</i>"></iframe>
<div class="noBottom">
<p id="projectDescription" class="noBottom">
  <i>Description: </i><?php echo htmlentities($desc);?>
</p>

</div>
<p id="show"><?php echo htmlentities($code);?></p><button id="playerButton" onclick="updateLive();">
  Run Code
</button>
  
  
  
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
          document.getElementById('demo').src = "http://toolserver.newawe.com/sandbox/ruby.php?code="+code;
          break;
        case "php":
          document.getElementById('demo').src = "http://toolserver.newawe.com/sandbox/php.php?code="+code;
          break;
        case "mysql":
          document.getElementById('demo').src = "http://toolserver.newawe.com/sandbox/mysql.php?code="+code;
          break;
        case "perl":
          document.getElementById('demo').src = "http://toolserver.newawe.com/sandbox/perl.php?code="+code;
          break;
        case "javascript":
          document.getElementById('demo').src = "http://newawe.github.io/Sandbox/javascript.html?code="+code;
          break;
        case "java":
          document.getElementById('demo').src = "http://toolserver.newawe.com/sandbox/java.php?code="+code;
          break;
        case "python":
          code = code.replace("/\n/g", "<br />");
          document.getElementById('demo').src = "http://toolserver.newawe.com/sandbox/python.php?code="+code;
          break;
        default:
          document.getElementById('demo').src = "http://newawe.github.io/Sandbox/html.html?code=<pre>This language is currently not supported for <br>live testing.";
          break;
      }
    }
  </script>
