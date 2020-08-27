	<?php
		// Create connection
		$conn = mysqli_connect("localhost", "root", "", "moviesgallery");
		// Check connection
		if ($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
        }
        
		//define total number of results you want per page  
		$results_per_page = 5;
		
		//Query to get data		
        $sql = "SELECT * FROM movies WHERE 1=1 ";

        //if filter is applyed
		if(isset($_GET['apply']) && !isset($_GET['page']))
        {
            if(isset($_GET['genre']) && $_GET['genre']!="")
			{
                $sql.=" AND genre = '".$_GET['genre']."' ";
            }
            if(isset($_GET['language']) && $_GET['language']!="")
			{
                $sql.="AND language = '".$_GET['language']."' ";
            }
            if(isset($_GET['sort']))
			{
				$sql.="ORDER BY ".$_GET['sort']." DESC";
            }
        }
		//if next page of result obtained from old query 
        else if(isset($_GET['page']))
		{
            $sql=$_GET['oldSQL'];
        }
        //sql without LIMIT to pass for next page
        $tempSQL=$sql;

		$result1 = $conn->query($sql);

		//Get total Nummber of pages
		$number_of_result = mysqli_num_rows($result1);
		$number_of_page = ceil ($number_of_result / $results_per_page);
				
		//determine which page number visitor is currently on  
		if (!isset ($_GET['page']) )
		{  
			$page = 1;  
		}
		else
		{  
			$page = $_GET['page'];  
		}
				
		//determine the sql LIMIT
		$page_first_result = ($page-1) * $results_per_page;
        $sql.=  " LIMIT " . $page_first_result .','. $results_per_page."";
        // echo $sql;
        $result = $conn->query($sql);				
	?>
	
<!DOCTYPE html>
<html>
    <link href="exploreStyle.css" rel="stylesheet" type="text/css">
    <title>Explore-MoviesGallery</title>
    <body>
        <div class="nav">
            <h1>Movies Gallery</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="explore.php">Explore</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="headExplore">
                <h1>EXPLORE</h1>        
            </div>
            <div class="filter">
                <div class="two-col">
                    <h2><u>FILTER BY</u></h2>
                    <h5>Genre</h5>
                    <form action="" method="GET">
                    <select name="genre" >
                        <option value="">All</option>
                        <option value="horror">Horror</option>
                        <option value="comedy">Comedy</option>
                        <option value="scifi">Sci-Fi</option>
						<option value="adventure">Andventure</option>
						<option value="animation">Animation</option>
                    </select>
                    <h5>Language</h5>
                    <select name="language" >
                        <option value="">All</option>
                        <option value="english">English</option>
                        <option value="hindi">Hindi</option>
                        <option value="french">French</option>
                    </select>
                </div>
                <div class="two-col">
                    <h2><u>SORT BY</u></h2>
                    <select name="sort" >
                        <option value="date">New</option>
                        <option value="likes">Popularity</option>
                        <option value="duration">Duration</option>
                    </select><br><br><br><br><br><br><br>
                    <input type="submit" name="apply" value="Apply Chages"/>
                </div>
                </form>
            </div>
            <div id="listContainer">
            <?php 
				//Display
				if ($result->num_rows > 0)
				{					
					// output data of each row
					while($row = $result->fetch_assoc())
					{
							echo '<div class="listContent">
							<div class="two-col"><img src="'.$row["image"].'"/></div>
								<div class="two-col">
									<p>
										<h1>'.$row["title"].'</h1>
										Director: '.$row["director"].'<br>
										Language: '.$row["language"].'<br>
										Genre: '.$row["genre"].'<br>
										Duration: '.$row["duration"].'<br>
										Likes: '.$row["likes"].'
									</p>
								</div>
							</div>';
					}
				} 
				else
				{
					echo "0 results";
				}
					
				//display the link of the pages in URL
				echo "<div class='pageNo'>Page";				
				for($page = 1; $page<= $number_of_page; $page++)
				{  
					echo '<a href = "explore.php?page='.$page.'&oldSQL='.$tempSQL.'">'.$page.' </a>';  
				}
				echo "</div>";
					
				$conn->close();
            ?>
            
            </div>
            <div class="footer">
                <h2>This site is created by Siddesh Kalangutkar</h2>
            </div>
        </div>      
    </body>
</html>