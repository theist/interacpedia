<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Ingreso</th>
        <th>Email</th>
        <th>Perfil</th>
        <th>Equipos</th>
        <th>Clases</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->agree?'Si':'No' }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->perfil() }}</td>
            <td>
                {{ $user->teams->implode('id',', ') }}
            </td>
            <td>
                {{ $user->courses->implode('name',', ') }}
                {{ $user->classes->implode('name',', ') }}
            </td>
        </tr>
    @endforeach

    </tbody>
</table>