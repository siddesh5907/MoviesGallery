<?php
	// Create connection
	$conn = mysqli_connect("localhost", "root", "", "moviesgallery");
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html>
    <link href="indexStyle.css" rel="stylesheet" type="text/css">
    <title>MoviesGallery</title>
    <body>
        <div class="nav">
            <h1>Movies Gallery</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="explore.php">Explore</a></li>
            </ul>
        </div>
        <div class="poster">
            <h>MOVIES GALLERY</h>
        </div>
        <div class="latestMovieContainer">
            <h1>Latest Releases</h1>
            <!-- Slideshow container -->
			<div class="slideshow-container">
				<!-- Full-width images with number and caption text -->
				<?php
				$sql = "SELECT * FROM movies ORDER BY date DESC LIMIT 5 ";
				$result = $conn->query($sql);
				//Display
				if ($result->num_rows > 0)
				{					
					// output data of each row
					while($row = $result->fetch_assoc())
					{
						echo '<div class="mySlides fade">
								<img src="'.$row["image"].'" style="width:100%; height:500px;">
								<div class="text"><h2>'.$row["title"].'</h2>
									Director: '.$row["director"].'<br>
									Language: '.$row["language"].'<br>
									Genre: '.$row["genre"].'<br>
									Duration: '.$row["duration"].'<br>
									Likes: '.$row["likes"].'
								</div>
							  </div>';
					}
				  } 
				  else
				  {
					echo "0 results";
				  }
				  $conn->close();
				?>

			  
				<!-- Next and previous buttons -->
				<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next" onclick="plusSlides(1)">&#10095;</a>
			</div>
		  <br>
		</div>
        <div class="footer">
            <h2>This site is created by Siddesh Kalangutkar</h2>
        </div>

        <script>
			var slideIndex = 1;
			showSlides(slideIndex);

			// Next/previous controls
			function plusSlides(n) {
			  showSlides(slideIndex += n);
			}

			// Thumbnail image controls
			function currentSlide(n) {
			  showSlides(slideIndex = n);
			}

			function showSlides(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("dot");
			  if (n > slides.length) {slideIndex = 1}
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
				  slides[i].style.display = "none";
			  }
			  for (i = 0; i < dots.length; i++) {
				  dots[i].className = dots[i].className.replace(" active", "");
			  }
			  slides[slideIndex-1].style.display = "block";
			  dots[slideIndex-1].className += " active";
			}
        </script>
    </body>
</html>