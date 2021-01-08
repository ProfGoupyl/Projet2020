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
            <form action="/admin/cours/{{$cours->id}}" method="POST">@csrf
                @method('put')
                <td>
                    <input type="text" value="{{$cours->titre}}" name="titre">
                </td>
                <td>
                    <input type="date" value="2020-01-31" name="" id="">
                    <input type="date" value="{{$date}}" name="" id="">
                </td>
                <td><input type="submit" value="Go"></td>
        </tr>
        </form>
        @endforeach
    </tbody>
</table>