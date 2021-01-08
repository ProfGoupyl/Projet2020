<!-- layout temporaire -->
<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8" />
		<!-- a changer -->
		<link rel="stylesheet" type="text/css" href="css/reset.css" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
		<title>FAQ</title>
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
        
  
<div class="container">
    @yield('content')<!-- a rajouter a la fin du layout -->
</div>
   
</body>
</html>
