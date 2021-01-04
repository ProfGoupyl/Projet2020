<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<title>Admin Page - FAQ</title>
	</head>

	<body>
		<header>
			<figure>
				<nav>
					<ul class="UserElements">
						<li>
							<a class="UserName" href="../User Page - Profil/User Page - Profil.html">
								<img class="UserImage" src="" alt="" />
								User Name
							</a>
						</li>
					</ul>
					<ul class="ButtonElements">
						<li>
							<a href="../Admin Page - Cours/Admin Page - Cour.html"> Retour </a>
						</li>
						<li>
							<a
								href="../Admin Page - Liste des cours/Admin Page - Liste des cours.html">
								Liste des cours
							</a>
						</li>
						<li>
							<a
								href="../Admin Page - Modules/Admin Page - Modules.html">
								Liste des Modules
							</a>
						</li>
						<li>
							<a href="../Login Page/login.html"> LogOut </a>
						</li>
					</ul>
				</nav>
			</figure>
		</header>
		<section class="GeneralSectionAdminPageFAQ">
			<h1>FAQ</h1>
			<form class="FormAdminPageFAQ">
				<dl>
					<dt>
					<a class="UnHideHiddenFAQId1"> <!--  Possibilité d'un bouton dans cette balise <a>, afin de pouvoir pour afficher la réponse à la question1 ("HiddenFAQId1,2,3") en mode déroulant. DONC possible changement dans cette partie. (ou pas) -->
						<input
							class="FAQInputClass"
							type="text"
							id="FAQId1"
							placeholder="Question 1"
							name="FAQId1"/>
						</a>
						<input
							id="ModifyFAQId1"
							type="image"
							alt="Modify Button"
							src="/???.png"
							style="background-color: rgb(43, 122, 226)"/>
						<input
							id="DeleeteFAQId1"
							type="image"
							alt="Trash"
							src="/???.png"
							style="background-color: blueviolet"/>
					</dt>
					<dd class="HiddenFAQId1">
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus,
						quae consectetur ab saepe maiores voluptates nobis ipsum magni quo
						aliquid autem a, veritatis soluta sit voluptatum? Sunt, at
						consequuntur? Corrupti!
					</dd>
				</dl>
			</form>
			<form class= "FormAdminPageFAQ">
				<dl>
					<dt>
						<a class="UnHideHiddenFAQId2">
						<input
							class="FAQInputClass"
							type="text"
							id="FAQId2"
							placeholder="Question 2"
							name="FAQId2"/>
						</a>
						<input
							id="ModifyFAQId2"
							type="image"
							alt="Modify Button"
							src="/???.png"
							style="background-color: rgb(43, 122, 226)"/>
						<input
							id="DeleeteFAQId2"
							type="image"
							alt="Trash"
							src="/???.png"
							style="background-color: blueviolet"/>
						<dd class="HiddenFAQId2">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus,
							quae consectetur ab saepe maiores voluptates nobis ipsum magni quo
							aliquid autem a, veritatis soluta sit voluptatum? Sunt, at
							consequuntur? Corrupti!
						</dd>
					</dt>
				</dl>
			</form>
			<form class= "FormAdminPageFAQ">
				<dl>
					<dt>
						<a class="UnHideHiddenFAQId3">
						<input
							class="FAQInputClass"
							type="text"
							id="FAQId3"
							placeholder="Question 3"
							name="FAQId3"/>
						</a>
						<input
							id="ModifyFAQId3"
							type="image"
							alt="Modify Button"
							src="/???.png"
							style="background-color: rgb(43, 122, 226)"/>
						<input
							id="DeleeteFAQId3"
							type="image"
							alt="Trash"
							src="/???.png"
							style="background-color: blueviolet"/>
						<dd class="HiddenFAQId3">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus,
							quae consectetur ab saepe maiores voluptates nobis ipsum magni quo
							aliquid autem a, veritatis soluta sit voluptatum? Sunt, at
							consequuntur? Corrupti!
						</dd>
					</dt>
				</dl>
			</form>
			<form class="FormAdminPageFAQAddFAQ">
				<dl>
					<dt>
						<input
							type="text"
							id="AddFAQ"
							placeholder="Ajouter Question"
							name="AddFAQ"/>

						<dd class="HiddenFAQAddFAQ">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus,
							quae consectetur ab saepe maiores voluptates nobis ipsum magni quo
							aliquid autem a, veritatis soluta sit voluptatum? Sunt, at
							consequuntur? Corrupti!

							<input
							id="AddFAQButtonId"
							type="image"
							alt=" Ajouter "
							src="/???.png"
							style="background-color: blueviolet"
							/>
						</dd>
					</dt>
				</dl>
			</form>
		</section>
	</body>
</html>

<style>
    header {
	position: relative;
	padding: 0;
	margin: 0;
	max-width: 100%;
	background-color: lawngreen;
}

header figure img {
	width: 80px;
	height: 80px;
}

header a.UserName {
	font-family: fantasy;
	text-decoration: none;
	font-size: 2.2em;
	color: #000000;
}

header .UserElements {
	text-align: left;
}

header .ButtonElements {
	text-align: right;
}

body {
	background-color: #00386b;
	padding: 0;
	margin: 0;
}

.GeneralSectionAdminPageFAQ {
	height: 47rem;
	margin-left: 15%;
	margin-right: 15%;
	background-color: rgb(0, 206, 252);
}
.FormAdminPageFAQ {
	background-color: rgb(197, 252, 0);
}

.FAQInputClass {
	width: 11rem;
	cursor: pointer;
}

.HiddenFAQId1,
.HiddenFAQId2,
.HiddenFAQId3,
.HiddenFAQAddFAQ {
	padding-left: 2rem;
	word-break: break-all;
}

.FormAdminPageFAQAddFAQ {
	margin-top: 60%;
}

</style>
