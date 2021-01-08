<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="styles.css" />
	<title>Admin - Liste des Cours</title>
</head>

<body>
	<header>		
		<figure>
			<a href="../admin_profil/admin_profil.html" class="UserName" >
				<img class="UserImage" src="" alt="" height="80px;" width="80px;"/>
			</a>
		</figure>
		<nav class="navPrnicipale">
			<ul class="navigation">
				<li>
					<a href="../admin_liste_cours/admin_liste_cours.html">
						Cours
					</a>
				</li>
				<li>
					<a href="../admin_faq/admin_faq.html">
						FAQ
					</a>
				</li>
				<li>
					<a href="../Login/login.html"> 
						Logout
					</a>
				</li>
			</ul>
		</nav>
	</header>

	<section>
		<h1>Liste des cours</h1>
		<table class="listecours">
			<thead>
				<tr>
					<th>Nom du cours</th>
					<th>Date de début</th>
					<th>Date de fin</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

			@foreach ($cours_list as $cours)
				<tr>
					<form action='/admin/cours/{{ $cours }}' method='get'>
					@csrf
                	@method('put')
					<td>
                    	<input class="input-{{$cours->id}}" style="background:none;border:none;color:black;text-align:center;" disabled value="{{$cours->titre}}" type="text" name="name">
                	</td>

					<td></td>
					<td></td>
					<td>
                    	<button type="button" data-target="{{$cours->id}}" class="modify">Modifer</button>
                    	<input style="display:none;" id="save-{{$cours->id}}" type="submit" value="Sauvegarder">
                	

					
                    	<form action='/admin/cours/{{ $cours->id }}' method="post">
                    		@csrf
                    		@method('delete')
                    		<input type='submit' value='Supprimer'>
                    	</form>
                	</td>
					</form>
				</tr>
				@endforeach

				</tr>
			</tbody>
		</table>
		<form class="addcours">
			<input type="text" placeholder="Nom du cours" required/>
			<input type="date" placeholder="Date de debut" required/>
			<input type="date" placeholder="Date de fin" required/>
			<button id="ajouter" class="btn btn-primary" type="submit">Ajouter</button>
		</form>
	</section>
</body>

<script>
    const modifyBtnList = document.querySelectorAll('.modify');
    modifyBtnList.forEach(btn => {
        btn.addEventListener('click', () => {
            const idTarget = btn.dataset.target;
            const inputs = document.querySelectorAll(`.input-${idTarget}`);
            const saveBtn = document.querySelector(`#save-${idTarget}`)
            inputs.forEach(input => {
                input.style.border = "1px solid black";
                input.style.backgroundColor = "#f3f3f3";
                input.disabled = false;
            });
            btn.style.display = "none";
            saveBtn.style.display = "inherit";
        })
    })

    // Ajouter un utilisateur
    const btnAddUser = document.querySelector('.addUser');
    const addUser = document.querySelector('#addUser');

    btnAddUser.addEventListener('click', () => {
        addUser.classList.toggle('is-visible');
    })

</script>

<style>
* {
	box-sizing: border-box;
}
body {
	min-height: 100vh;
	background: #ffdcbe;
	margin: 1em;
}

header {
	border-radius: 6px;
	background:#ffc491 ;
	width: 100%;
}

  header nav ul {
	display: flex;
	justify-content: flex-end; 
	flex-flow: row wrap;
}

header nav li {
	padding: 1em;
	text-align: center;
	list-style-type: none;
}


li {
	list-style-type: none;
}

li a{
	color: rgb(0, 0, 0);
}

/* 

CONTENT 

*/

section {
	background-color: #dddd88;
	border-radius: 6px;
	padding: 1em;
	margin: 1em 0;
}

table{
	width: 100%;
	text-align: center;
}

</style>

</html>



