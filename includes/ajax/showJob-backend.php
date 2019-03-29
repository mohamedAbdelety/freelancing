<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!isset($_SESSION['loggedIn']))
	$_SESSION['loggedIn'] = false;
require_once('../config.inc.php');

$classes= ['Core','Mail', 'User', 'Client', 'Contract',  'Feedback', 'Freelancer', 'Job', 'Proposal', 'Misc'];

foreach($classes as $class){
	include_once("../../classes/$class.php");
}

$core = new Core($Config["Host"], $Config["User"], "", $Config["dbName"]);
$Misc = Misc::Singleton(); // the only instance we need! YES. THIS IS OUR SINGLETON!
if(!$core)exit;
if (isset($_GET['typeshow'])) {
				
				if($_GET['typeshow'] == 'specialShowall'){


					$job = new Job;
					$jobs = $job->searchJobs($Misc->escape_string($_GET['handle']),$_GET['sort'],$_GET['list']);
					foreach ($jobs as $j) {
						?>
					<div>
					<h3 class= "text"><?php echo "Title Job : "  ."<span class = 'size_font'>". $j['title']."</span>";  ?></h3>
					<hr>
					<h3 class = "text">Description : </h3>
					<p class = "size_font"><?php echo $j['description']; ?></p>
					<hr>
					<h3 class= "text"><?php echo "Price : "."<span class = 'size_font'>".$j['price']."  $"."</span>" ; ?></h3>
					<h3 class="text"><?php echo "Hour Amount : "."<span class = 'size_font'>".$j['hour_amount']."  $"."</span>" ; ?></h3>
					<hr>
					<h3 class = "text"><?php echo "Skills Needed :" ?></h3>
					<?php 
					$arr = explode(",", $j['skills_needed']);
					foreach ($arr as $a) {
						
					?>
					<p class = "size_font"><?php echo $a."        "; ?></p>
					<?php }?>
					<hr>
					<h3 class = "text"><?php echo "Creation Date : "."<span class = 'size_font'>".$j['creation_date']."</span>" ; ?></h3>
					<h3 class = "text"><?php echo "Due Date : "."<span class = 'size_font'>".$j['duedate']."</span>" ; ?></h3>
					<hr>
			
					<?php
					/** Mostafa edited here **/
					
					$str2 = $j['milestones'];
					$str2 = json_decode($str2, false);
					// var_dump($str2);
					$projectName = $str2[0];
					$DueDate = $str2[1];
					$priceMile = $str2[2];
					/** End - Mostafa edited here **/
					for($i = 0;$i < count($projectName) ; $i++){
					?>
					<center><h3 class = "text" style = "text-align :center ">Milestones <?php echo ($i+1) ;?></h3></center>
					<h3 class = "text"><?php echo "Project Title : "."<span class = 'size_font'>".$projectName[$i]."</span>"; ?></h3>
					<h3 class = "text"><?php echo "Due Date : "."<span class = 'size_font'>".$DueDate[$i]."</span>"; ?></h3>
					<h3 class = "text"><?php echo "Price : "."<span class = 'size_font'>".$priceMile[$i]." $"."</span>"; ?></h3>
					<hr>
					<?php } ?>
					<a class="linkjob" href="job.php?jobid=<?=$j['job_id'] ?>" style="color:Blue; font-size:20px;">Select Job</a>
				</div>
					<?php }?>

					
					<?php

					}
	
	}
	
	

