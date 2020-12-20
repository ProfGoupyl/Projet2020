<h1>Liste des cours</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cours_list as $cours)
            <tr>
                <td>{{$cours->id}}</td>
                <td>{{$cours->titre}}</td>
                <td>
                    <a href="#">Modifier</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>