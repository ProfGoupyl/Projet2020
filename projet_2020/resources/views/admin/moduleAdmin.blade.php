<!-- Gestion des module + Suppression des étudiants/cours à la fin de l'année scolaire  -->

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<title>Admin Page - Cours</title>
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
							<a href="../Admin Page - Liste des cours/Admin Page - Liste des cours.html">
								Liste des Cours
							</a>
						</li>
						<li>
							<a href="../Admin Page - Modules/Admin Page - Modules.html">
								Liste des Modules
							</a>
						</li>
						<li>
							<a href="../Admin Page - FAQ/Admin Page - FAQ.html"> Editer - FAQ </a>
						</li>
						<li><a href="../Login Page/login.html"> LogOut </a></li>
					</ul>
				</nav>
			</figure>
		</header>
		<h1>Intitulé / Descriptif - Cour</h1>
		<div class="GlobalWrapper">
			<!-- Un gros div de mise en page pour l'aside, les etapes et les commentaires-->
			<aside>
				<dl>
					<dt>
						Etape 1
						<input
							id="AsideDeleteCour1Etape1"
							type="image"
							alt="Trash"
							src="/???.png"
							style="background-color: blueviolet"
						/>
					</dt>
					<dt>
						<input id="AsideLinkCour1Etape1Composant2" type="image" alt="Lien vidéo" src="/???.png" />
						<!-- Si un lien vers une vidéo (ou autre..) est inséré dans l' étape (sous forme de module), un "lien" est autom. généré dans l'aside, sous l'étape concernée (Il apparait donc dans le cour ET dans l'aside). Inserer du texte se fait aussi sous forme de module, mais ne génere pas de liens (vu qu'il apparait bêtement dans l'étape). C'est CLAIR NON! ^^ -->
					</dt>
				</dl>
				<dl>
					<dt>
						Etape 2
						<input
							id="AsideDeleteCour1Etape2"
							type="image"
							alt="Trash"
							src="/???.png"
							style="background-color: blueviolet"
						/>
					</dt>
					<dt>
						<!-- Place pour un eventuel "lien" (exemple plus haut) -->
					</dt>
				</dl>
				<dl>
					<dt>
						Etape 3
						<input
							id="AsideDeleteCour1Etape3"
							type="image"
							alt="Trash"
							src="/???.png"
							style="background-color: blueviolet"
						/>
					</dt>
					<dt>
						<!-- Place pour un eventuel "lien" (exemple plus haut) -->
					</dt>
				</dl>
			</aside>
			<div class="GeneralEtapesWrapper">
				<!-- Un gros div secondaire de mise en page pour regrouper etapes et commentaires (l'aside fait sa vie dans le Wrapper global)-->
				<!--------------------------------------------------------------------------------------------------------------->
				<article class="GeneralEtape1">
					<!-- article pour regrouper l'etape 1 et sa mise ne page-->
					<form>
						<dl>
							<a>
								<input
									class="Cour1Etape1"
									type="text"
									id="CourId1Etape1"
									placeholder="Etape 1"
								/>
							</a>
							<!-- Input etape 1 -->
							<input
								id="ModifyCour1Etape1"
								type="image"
								alt="Modify"
								src="/???.png"
								style="background-color: rgb(226, 43, 61)"
							/>
							<!-- Bouton "modify" pour l'input  : etape 1 -->
						</dl>
					</form>
					<!-- Composant 1 de l'etape 1 -->
					<form>
						<dl>
							<dt class="Cour1Etape1Composant1">
								Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus quas
								dicta odit sapiente impedit, aliquid ducimus accusamus accusantium
								repellendus distinctio sint voluptatem minus sequi. Nemo suscipit nulla
								mollitia aliquam laborum? Lorem ipsum, dolor sit amet consectetur
								adipisicing elit. Vero quod, culpa provident architecto cum, quo eos
								itaque vel praesentium aspernatur distinctio, blanditiis voluptate debitis
								ipsa suscipit nostrum aliquam earum delectus!
								<input
									id="ModifyCour1Etape1Composant1"
									type="image"
									alt="Modify"
									src="/???.png"
									style="background-color: rgb(226, 43, 61)"
								/>
							</dt>
						</dl>
					</form>
					<!-- Composant 2 de l'etape 1 -->
					<form>
						<dl>
							<dt class="Cour1Etape1Composant2">
								<img class="" src="" alt="" />
								<!-- Ici l'image verte degueu : Composant video Youtube par exemple (l'image c'est pour l'exemple ) -->
								<input
									id="ModifyCour1Etape1Composant2"
									type="image"
									alt="Modify"
									src="/???.png"
									style="background-color: rgb(226, 43, 61)"
								/>
							</dt>
						</dl>
					</form>
				</article>
				<!--------------------------------------------------------------------------------------------------------------->
				<article class="GeneralEtape2">
					<!-- article pour regrouper l'etape 2 et sa mise ne page-->
					<form>
						<dl>
							<a>
								<input
									class="Cour1Etape2"
									type="text"
									id="CourId1Etape2"
									placeholder="Etape 2"
								/>
								<!-- Input etape 2 -->
							</a>
							<input
								id="ModifyCour1Etape2"
								type="image"
								alt="Modify"
								src="/???.png"
								style="background-color: rgb(226, 43, 61)"
							/>
							<!-- Bouton "modify" pour l'input : etape 2 -->
						</dl>
					</form>
					<!-- Composant 1 de l'etape 2 -->
					<form>
						<dl class="Cour1Etape2Composant1">
							<dt>
								Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus quas
								dicta odit sapiente impedit, aliquid ducimus accusamus accusantium
								repellendus distinctio sint voluptatem minus sequi. Nemo suscipit nulla
								mollitia aliquam laborum? Lorem ipsum, dolor sit amet consectetur
								adipisicing elit. Vero quod, culpa provident architecto cum, quo eos
								itaque vel praesentium aspernatur distinctio, blanditiis voluptate debitis
								ipsa suscipit nostrum aliquam earum delectus!
								<input
									id="ModifyCour1Etape2Composant1"
									type="image"
									alt="Modify"
									src="/???.png"
									style="background-color: rgb(226, 43, 61)"
								/>
							</dt>
						</dl>
					</form>
				</article>
				<!--------------------------------------------------------------------------------------------------------------->
				<article class="GeneralEtape3">
					<!-- article pour regrouper l'etape 3 et sa mise ne page-->
					<form>
						<dl>
							<a class="Cour1Etape3">
								<input
									class="Cour1Etape3"
									type="text"
									id="CourId1Etape3"
									placeholder="Etape 3"
								/>
								<!-- Input etape 3 -->
							</a>
							<input
								id="ModifyCour1Etape3"
								type="image"
								alt="Modify"
								src="/???.png"
								style="background-color: rgb(226, 43, 61)"
							/>
							<!-- Bouton "modify" pour l'input : etape 3 -->
						</dl>
					</form>
					<!-- Composant 1 de l'etape 3 -->
					<form>
						<dl class="Cour1Etape3Composant1">
							<dt>
								Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus quas
								dicta odit sapiente impedit, aliquid ducimus accusamus accusantium
								repellendus distinctio sint voluptatem minus sequi. Nemo suscipit nulla
								mollitia aliquam laborum?
								<input
									id="ModifyCour1Etape3Composant1"
									type="image"
									alt="Modify"
									src="/???.png"
									style="background-color: rgb(226, 43, 61)"
								/>
							</dt>
						</dl>
					</form>
					<!-- Composant 2 de l'etape 3 -->
					<form>
						<dl class="Cour1Etape3Composant2">
							<dt>
								Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero quod, culpa
								provident architecto cum, quo eos itaque vel praesentium aspernatur
								distinctio, blanditiis voluptate debitis ipsa suscipit nostrum aliquam
								earum delectus!
								<input
									id="ModifyCour1Etape3Composant2"
									type="image"
									alt="Modify"
									src="/???.png"
									style="background-color: rgb(226, 43, 61)"
								/>
							</dt>
						</dl>
					</form>
				</article>

				<!--------------------------------------------------------------------------------------------------------------->

				<h1>Commentaires</h1>
				<article class="GeneralCommentaires">
					<form>
						<h2>OuinOuin!!! (sujet)</h2>
						<p>------------------------------------------------------------------------------------------</p>
						<ul>
							<li class="UserElements" id="CommentaireId1">
								<a class="UserName" href="../User Page - Profil/User Page - Profil.html">
									<img class="UserImage" src="" alt="" width="100px" height="100px" />
									User Name
								</a>
								<p>
									C'est scandaleux, on m'a encore volé mes crayons de couleurs et mes
									sandwichs à la cantine. Et à la compta, André m'a mis la main aux fesses
									et blablabla pas content! g,eug,eugneu etc.. et dans quel monde on vis!
									Et le bio c'ests bien, et la peine de mort c'est mal et la faim dans le
									monde c'est la faute aux illuminatis gouvernés par les reptiliens et
									rbqebedbmescouilles. Tenez le vous pour dit!
									<input
										id="AdminDeleteCommentaireId1"
										type="image"
										alt="Trash"
										src="/???.png"
										style="background-color: blueviolet"
									/>
								</p>
							</li>
							&nbsp;
							<h2>
								------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
							</h2>
							&nbsp;
							<!-- Element de séparation des commentaires (pas d'idées sur comment faire ça, donc c'est fait à la zeub) -->
							<li class="UserElements" id="CommentaireId2">
								<a class="UserName" href="../User Page - Profil/User Page - Profil.html">
									<img class="UserImage" src="" alt="" width="100px" height="100px" />
									User Name
								</a>
								<p>
									Oui oui, tout à fait joliane, j'en prends bonnes notes et te fait milles
									bisoux
									<input
										id="AdminDeleteCommentaireId2"
										type="image"
										alt="Trash"
										src="/???.png"
										style="background-color: blueviolet"
									/>
								</p>
							</li>
							&nbsp;
							<h2>
								------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
							</h2>
							&nbsp;
							<!-- Element de séparation des commentaires (pas d'idées sur comment faire ça, donc c'est fait à la zeub) -->
						</ul>
					</form>
					<form>
						<fieldset>
							<p>
								<label for="Sujet" class="obligatoire"> Sujet : &nbsp;&nbsp;</label
								><input
									type="text"
									name="Sujet"
									id="SujetId"
									placeholder="Champ obligatoire"
									required
									autofocus
									tabindex="1"
								/>
							</p>
						</fieldset>
						</br>
						<fieldset>
							<legend>Commentaire</legend>
							<textarea name="Commentaire" id="CommentaireId?????"> </textarea>
						</fieldset>
						<br />
						<input type="submit" name="valid" id="valid" value="Envoyer" />
					</form>
				</article>
			</div>
		</div>
	</body>
</html>
<style>
* {
	box-sizing: border-box; /* pour maîtriser width et flex-basis */
}

header {
	margin: 0.4em;
	padding: 1em;
	border-radius: 6px;
	background: #ffeebb;
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
	display: flex;
	flex-direction: column;
	min-height: 100vh;
	padding: 1em;
	margin: 0;
	background: #999;
}

.GlobalWrapper {
	display: flex;
	flex: 1;
}

aside {
	width: 30em;
	margin: 0.3em;
	padding: 0.6em;
	border-radius: 6px;
	background: #ccccff;
}

article {
	flex: 1;
	margin: 0.4em;
	padding: 1em;
	border-radius: 6px;
	background: #dddd88;
}

.Cour1Etape1Composant2 {
	margin-top: 2em;
	width: 640px;
	height: 480px;
	display: block;
	align-content: center;
	background: #04e917;
}
</style>


