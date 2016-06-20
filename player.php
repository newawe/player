<style>
.demo {
	height: 300px;
	width: 300px;
	border-color: #00A3C6;
}

</style>

<iframe class="demo" id="demo"src="#"></iframe>

<script type="text/javascript">
var $_GET = {};
if(document.location.toString().indexOf('?') !== -1) {
    var query = document.location
                   .toString()
                   // get the query string
                   .replace(/^.*?\?/, '')
                   // and remove any existing hash string (thanks, @vrijdenker)
                   .replace(/#.*$/, '')
                   .split('&');

    for(var i=0, l=query.length; i<l; i++) {
       var aux = decodeURIComponent(query[i]).split('=');
       $_GET[aux[0]] = aux[1];
    }
}




var scriptslang = ["html","php"];
var scriptscode = ["<h1>Hello - HTML</h1>","echo 'Hello - PHP';"];




var code=scriptscode[$_GET['id']];
var lang = scriptslang[$_GET['id']];
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
