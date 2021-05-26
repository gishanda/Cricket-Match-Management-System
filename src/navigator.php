<?php include_once('sessionCheck.php');
include_once('dbConnection.php');
 ?>
<?php 
$var_user = "SELECT * FROM `superxi_user` WHERE `superxi_id` =".$_SESSION["userid"];
$sqlUser = mysql_query($var_user);

while($userRow = mysql_fetch_array($sqlUser)){
	if($userRow["superxi_type"] == "Administrator"){
?>
				<nav>
					<ul id="nav" class="sf-menu">
						<li><a href="home.php">HOME</a></li>
                        <li><a  href="addPlayer.php">PLAYER</a>
                        	<ul>
								<li><a href="addPlayer.php">ADD PLAYER</a></li>
								<li><a href="viewPlayer.php">VIEW PLAYER</a></li>	
							</ul>
                        </li>
                        <li><a  href="addMatches.php">MATCHES</a>
                        	<ul>
								<li><a href="addMatches.php">ADD MATCHES</a></li>
								<li><a href="viewMatches.php">VIEW MATCHES</a></li>	
							</ul>
                        </li>
                        </li>
                        <li><a  href="addRuns.php">RUNS</a>
                        	<ul>
								<li><a href="addRuns.php">ADD RUNS</a></li>
								<li><a href="viewRuns.php">VIEW RUNS</a></li>	
							</ul>
                        </li>
                        <li><a  href="addWickets.php">WICKETS</a>
                        	<ul>
								<li><a href="addWickets.php">ADD WICKETS</a></li>
								<li><a href="viewWickets.php">VIEW WICKETS</a></li>	
							</ul>
                        </li>
                        <li><a  href="#">REPORTS</a>
                        	<ul>
								<li><a href="reportRunsByPlayer.php">RUNS BY PLAYER</a></li>
								<li><a href="reportRunsByMatch.php">RUNS BY MATCH</a></li>	
                                <li><a href="reportWicketsByPlayer.php">WICKETS BY PLAYER</a></li>
								<li><a href="reportWicketsByMatch.php">WICKETS BY MATCH</a></li>
                                <li><a href="reportBestPlayer.php">BEST PLAYERS</a></li>
							</ul>
                        </li>
                        <li><a  href="#">OPTION</a>
                        	<ul>
								<li><a href="addUser.php">ADD USER</a></li>
								<li><a href="viewUser.php">VIEW USER</a></li>	
							</ul>
                        </li>	
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
					<div id="combo-holder"></div>
				</nav>
<?php
 	}elseif($userRow["superxi_type"] == "DataEntry"){
?>
	 <nav>
					<ul id="nav" class="sf-menu">
						<li><a href="home.php">HOME</a></li>
                        <li><a  href="addPlayer.php">PLAYER</a>
                        	<ul>
								<li><a href="addPlayer.php">ADD PLAYER</a></li>
								<li><a href="viewPlayer.php">VIEW PLAYER</a></li>	
							</ul>
                        </li>
                        <li><a  href="addMatches.php">MATCHES</a>
                        	<ul>
								<li><a href="addMatches.php">ADD MATCHES</a></li>
								<li><a href="viewMatches.php">VIEW MATCHES</a></li>	
							</ul>
                        </li>
                        </li>
                        <li><a  href="addRuns.php">RUNS</a>
                        	<ul>
								<li><a href="addRuns.php">ADD RUNS</a></li>
								<li><a href="viewRuns.php">VIEW RUNS</a></li>	
							</ul>
                        </li>
                        <li><a  href="addWickets.php">WICKETS</a>
                        	<ul>
								<li><a href="addWickets.php">ADD WICKETS</a></li>
								<li><a href="#">VIEW WICKETS</a></li>	
							</ul>
                        </li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
					<div id="combo-holder"></div>
				</nav>
<?php
 	}elseif($userRow["superxi_type"] == "Manager"){
?>
	 <nav>
					<ul id="nav" class="sf-menu">
						<li><a href="home.php">HOME</a></li>
                        <li><a  href="#">REPORTS</a>
                        	<ul>
								<li><a href="#">RUNS BY PLAYER</a></li>
								<li><a href="#">RUNS BY MATCH</a></li>	
                                <li><a href="#">WICKETS BY PLAYER</a></li>
								<li><a href="#">WICKETS BY MATCH</a></li>
                                <li><a href="#">BEST PLAYERS</a></li>
							</ul>
                        </li>	
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
					<div id="combo-holder"></div>
				</nav>               
<?php
	 }
}
 ?>