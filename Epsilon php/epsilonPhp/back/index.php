<?php

include('header.php');

$isConnected = (isset($_COOKIE['mail']) || isset($_SESSION['mail'])) ? true : false;

if($isConnected) {
	include('bcaAccessCodeSystem.php');

	$accessCode = getAccessCodeFromDB();
	$accessCodeArrayed = stringToArrayAccessCode($accessCode);

	if(isset($_POST['course'])){
		setToOneNewJoinedCourse($_POST['course'], $accessCodeArrayed);
	}
}

// La fonction isJoinable vérifie si l'utilisateur est autorisé à rejoindre le parcours
function isJoinable($NumberOfTheCourse, $accessCodeArrayed){
	if ($NumberOfTheCourse == 1 && $accessCodeArrayed[0] >= 1) {
		return true;
	} elseif ($NumberOfTheCourse == 2 && $accessCodeArrayed[1] >= 1) {
		return true;
	} elseif ($NumberOfTheCourse == 3 && $accessCodeArrayed[2] >= 1) {
		return true;
	} else {
		return false;
	}
}

// La fonction isJoined vérifie si l'utilisateur a déjà rejoint le parcours
function isJoined($NumberOfTheCourse, $accessCodeArrayed){
	if ($accessCodeArrayed[$NumberOfTheCourse] > 0) {
		return true;
	} else {
		return false;
	}
}

?>
		<section>
			<h2 id="community">Mes parcours & badges</h2>
			<?php
			if($isConnected) {
				displayCoursesList($accessCodeArrayed);
			}
				
			?>
		</section>

		<section>
			<h2 id="courses">Badges disponibles</h2>
			<ul id="badges-list">
				<li><i class="fa fa-graduation-cap"></i> Apprenti</li>
				<li><i class="fa fa-handshake"></i> Développeur</li>
				<li><i class="fa fa-hand-holding"></i> Passeur</li>
				<li><i class="fa fa-star"></i> Guide</li>
			</ul>
		</section>
	</div>


</body>
</html>

