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
            <a href ='http://localhost/video_upload/uploadpage.php'class="button is-danger is-inverted"">
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
   
		<hr>
<?php
include 'connect.php';
?>	
<table class="table">
    <tr>
      <th>video name</th>
      <th>description</th>
      <th></th>
      <th></th>
    </tr>

<?php
$sql ="SELECT*from videos";
$exec = mysql_query($sql ,$con);

while($row = mysql_fetch_assoc($exec ))
			{
$video_id = $row['id'];
$video_name = $row['name'];
$video_url = $row['url'];
?>
<tr>
      <td><?php echo $video_url; ?></td>
      <td><a href ='view.php?video=<?php echo $video_url; ?>'>
<?php echo $video_name; ?>	
</a></td>
      <td class="is-icon">
       
      </td>
      <td class="is-icon">
       
      </td>
	  <?php
			}
?>
    </tr>
</table>

  </body>
</html>


		
