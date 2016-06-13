<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Shortcut - Upload</title>
<link rel="stylesheet" href="css/bulma.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<style>
.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}
</style>
<script>

function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	var file = _("file1").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "file_upload_parser.php");
	ajax.send(formdata);
	
}
function progressHandler(event){
	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}

</script>
</head>
<body >
  <section class="hero is-danger is-medium">
  <!-- Hero header: will stick at the top -->
  <div class="hero-head">
    <header class="nav">
      <div class="container">
        <div class="nav-left">
          <a class="nav-item">
            <img src="images/shortcut-logo.png" alt="Logo">
          </a>
        </div>
        <span id="nav-toggle" class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <div id="nav-menu" class="nav-right nav-menu">
          <a class="nav-item is-active" href="index.html">
            Home
          </a>
          <a class="nav-item" href="https://github.com/Tech-Geeks/Shortcut">
            Github
          </a>
          <span class="nav-item">
            <a class="button is-danger is-inverted"">
              <span class="icon">
                <i class="fa fa-upload"></i>
              </span>
              <span>Upload</span>
            </a>
          </span>
        </div>
      </div>
    </header>
  </div>

  <!-- Hero content: will be in the middle -->
  <div class="hero-body is-danger">
<div class="container">
      <div class="control is-grouped">
  <p class="control has-icon">
  <input class="input" type="text" placeholder="Search Videos...">
  <i class="fa fa-search"></i>
</p>
  <p class="control">
    <a class="button is-primary">
      Search
    </a>
  </p>
</div>
    </div>
  </div>
  
  <section class="section">
    <div class="container">
      <div class="heading">
        <h1 class="title" style="color:black;">Upload Video</h1> </div>
		<hr>
 <form method='post'  enctype='multipart/form-data'>
<?php
include 'connect.php';
?> 
		   <progress id="progressBar" value="0" max="100" class="progress is-danger" ></progress>
		  <label class="label">Name(Optional)</label>
<p class="control">
  <input class="input" type="text" placeholder="Enter name">
</p>
<label class="label">Video Title</label>
<p class="control">
  <input class="input" type="text" placeholder="Title for the Video">
</p>
<label class="label">Description</label>
<p class="control">
  <textarea class="textarea" placeholder="Write something about the video..."></textarea>
</p>
<p class="control">
<!--  <input type='file' name='video'/> -->
  <input type="file" name="file1" id="file1" class="inputfile"/><br>
  <label for="file1" class="button is-primary">Browse</label>
  <input type="submit" id="submit1"  value="Upload File"  class="button is-disabled" onclick="uploadFile()"/>
    <h3 id="status"></h3>
  <p id="loaded_n_total"></p>

 </p>
</form>
<script>
document.getElementById("file1").onchange = function() {myFunction()};

function myFunction() {
document.getElementById("submit1").className = "button is-danger";
}
</script>
  </body>
</html>


		
