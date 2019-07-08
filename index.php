<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
 
  <title>UPLOAD LARGE FILES</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="site.ico">
 
 <link rel="stylesheet" href="styles.css">
<style type="text/css">
    body {
		/*background-image: url("images/bg.jpg"); */
		background-color:rgba(245,151,152,1.00);       
    }
    .page-container {
        width: 50%;
        margin: 5% auto 0 auto;
		color: white;
	
    }
    .form-container {
        padding: 30px;
        border: 1px solid #cccc;
        background: #FEFEFE;
    }
    .error,.success  {
        font-size: 18px;
    }
    .error {
        color: #b30000;
    }
    .success {
        color: #155724;
    }
    .download-zip {
        color: #000000;
    }
</style>
<script type="text/javascript" src="js/plupload.full.min.js"></script>

 <script type="text/javascript">
//this displays the link to copy to download file
  $(document).ready(function () {
            var simpleText = "hello_world";
            $("#target").text(simpleText);
        });
</script>
 <br>
 <br>
<ul id="filelist"></ul>
<br />
 <div class="row">
    	<div class="page-container row-12">
    		<h4 class="col-12 text-center mb-5"><strong>FILE UPLOADS</strong> </h4>
    		<div class="row-8 form-container  w3-grey">
            <button id="browse" href="javascript:;" >Browse</button>
            <button id="start-upload" href="javascript:;" >Upload</button>
        </div>
  
<br />
<pre id="console"></pre>
  
<script type="text/javascript">

var fileName;
var uploader = new plupload.Uploader({
  browse_button: 'browse', // this can be an id of a DOM element or the DOM element itself
  url: 'upload.php',
  multi_selection: false,
  chunk_size: '2mb'
});
 
uploader.init();
 
uploader.bind('FilesAdded', function(up, files) {
  var html = '';
  plupload.each(files, function(file) {
	 
    html += '<li id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></li>';
	
	var str = file.name;
	var firstPart = str.split('.')[0]; 
	firstPart = firstPart.replace(/[^a-zA-Z0-9]/g, '');
	str = str.replace(/[^a-zA-Z0-9]/g, '');
	var lastThree = str.substr(str.length - 3); // => "Tabs1"
    
  document.getElementById('para').innerHTML = 'http://www.yourwebsite/' + firstPart + "." + lastThree;
  document.getElementsByName("btnValidateWork")[0].style.visibility = "visible";
   
  });
 
 // document.getElementById('filelist').innerHTML += html;
   
  var html = html.fontcolor("white");
  document.getElementById("filelist").innerHTML = html;
  
  
});
 
uploader.bind('UploadProgress', function(up, file) {
  document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
});
 
uploader.bind('Error', function(up, err) {
  document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
});
 
document.getElementById('start-upload').onclick = function() {
  uploader.start();
  
};
  
</script>

<script type="text/javascript">


 
 function CopyToClipboard(containerid) {
if (document.selection) { 
    window.clipboardData.clearData ("Text");
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerid));
    range.select().createTextRange();
    document.execCommand("copy"); 

} else if (window.getSelection) {
    var range = document.createRange();
     range.selectNode(document.getElementById(containerid));
     window.getSelection().addRange(range);
     document.execCommand("copy");
     alert("Link was copied now paste inside of an email!") 
	  document.getElementsByName("btnValidateWork").style.visibility = "hidden"
}}
</script>
  
 
</head>
<body>  
 <button name="btnValidateWork" input style="visibility:hidden; id="button1" onclick="CopyToClipboard('div1')">Click to copy</button>
<div id="div1" >
<p id="para"></p>
</div>
<?php      
   session_start();
  // echo $_SESSION['errorMessage'] ;
  // echo "FILE ALREADY EXSIST PLEASE RENAME FILE AND TRY AGAIN!";
 ?>
<?php
 
?>
 
 
</body>
</html>

