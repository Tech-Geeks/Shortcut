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
</head>
<body>
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
		  <progress class="progress is-danger" value="0" max="100">Progress Bar</progress>
		  
		  <label class="label">Name(Optional)</label>
<p class="control">
  <input class="input" type="text" placeholder="Enter name">
</p>
<label class="label">Description</label>
<p class="control">
  <textarea class="textarea" placeholder="Write something about the video..."></textarea>
</p>
		  
		  
<p class="control">
<!--  <input type='file' name='video'/> -->

<input type="file" name="video" id="file" class="inputfile" />
<label for="file" class="button is-primary">Browse</label>
<input type='submit' value='Upload' class="button is-danger"/><strong style="color:green"></strong>
</p>
</form>
    </div>
  </section>
  </body>
</html>
<?php
if(isset($_FILES['video']))
{
			    $name = $_FILES['video']['name'];
				$type = explode('.', $name);
				$type = end($type);
				$size = $_FILES['video']['size'];
//to create a random file name
				$random_name = rand();
				$tmp_name = $_FILES["video"]["tmp_name"];
//check format for the uploaded video
			     if($type != 'mp4' && $type != 'MP4'  && $type != 'flv'){
					$message = "Video Format Not Supported";
					}
				else {
//move the uploaded video with random name to your folder
					 move_uploaded_file($tmp_name,'upload/'.$random_name.'.'.$type);
					$message = "Successfully Uploaded!!";
				}
				echo "$message <br/><br/>";
}
?>

		
