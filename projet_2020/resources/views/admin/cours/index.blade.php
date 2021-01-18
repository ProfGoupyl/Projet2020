<style>
    #addCours {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: lightgrey;
        padding: 25px;
        border-radius: 5px;

    }

    #addCours.is-visible {
        display: block;
    }
</style>


<h1>Liste des cours</h1>
<button class='addCours'>Add</button>

<table>
    <thead>
        <tr>

            <th>Titre</th>
            <th>Debut du cours</th>
            <th>Fin du cours</th>
            <th>Modifier</th>
            <th>Delete</th>
            <th>Détails du cours</th>
            <th>liste des users pour le cours</th>
            <th>Ajouter des utilisateurs par csv</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cours_list as $cours)

        <tr>


            <form action='/admin/cours/{{ $cours->id }}' method='post'>
                @csrf
                @method('put')
                <td>
                    <input class="input-{{$cours->id}}" style="background:none;border:none;color:black;" disabled value="{{$cours->titre}}" type="text" name="titre">
                </td>
                <td>

                    <input class="input-{{$cours->id}}" style="background:none;border:none;color:black;" disabled value="{{$cours->debut_du_cours }}" type="date" name="debut_du_cours">
                </td>

                <td>
                    <input class="input-{{$cours->id}}" style="background:none;border:none;color:black;" disabled value="{{$cours->fin_du_cours}}" type="date" name="fin_du_cours">
                </td>

                <td>
                    <button type="button" data-target="{{$cours->id}}" class="modify">Modifer</button>
                    <input style="display:none;" id="save-{{$cours->id}}" type="submit" value="Sauvegarder">
                </td>

            </form>
            <td>
                <form action='/admin/cours/{{ $cours->id }}' method="post">
                    @csrf
                    @method('delete')
                    <input type='submit' value='Supprimer'>
                </form>
            </td>
            <td>
                <a href='/admin/cours/{{$cours->id}}'>show</a>
            </td>
            <td>
                @dump($cours->user)
            </td>
            <td>
                <form enctype="multipart/form-data" action="/admin/csv/cours" method="post">
                    @csrf
                    <input type="hidden" name="cours" value="{{$cours->id}}">
                    <input required type="file" name="file" value="Choisir un fichier .csv" accept=".csv">
                    <input type="submit" name="submit" value="Transférer" title="Submit">
                </form>
            </td>


        </tr>

        @endforeach
    </tbody>
</table>

<div id='addCours'>
    <form action='/admin/cours' method='POST'>
        @csrf
        <div>
            <label for="name">Entrer le titre </label>
            <input type="text" name="titre" id="name" required>
        </div>
        <div>
            <label>debut du cours: </label>
            <input type="date" name='debut_du_cours' required>
        </div>
        <div>
            <label>fin du cours: </label>
            <input type="date" name='fin_du_cours' required>
        </div>
        <div>
            <input type="submit" value="Ajouter!">
        </div>
    </form>

</div>

<script>
    const btnAddUser = document.querySelector('.addCours');
    const addUser = document.querySelector('#addCours');
    btnAddUser.addEventListener('click', () => {
        addUser.classList.toggle('is-visible');
    })
</script>

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
</script>