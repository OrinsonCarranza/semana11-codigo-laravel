<!DOCTYPE html>
<html>
<head>
    <title>Lista de Personas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Lista de Personas</h1>
    <nav>
        <a href="/">Inicio</a> -
        <a href="{{ route('personas.index') }}">Personas</a> -
        @auth
        <a href="{{ route('personas.create') }}">Crear Persona</a> -
        @endauth
        <a href="{{ route('contacto') }}">Contacto</a>
    </nav>
    <table>
        <thead>
            <tr>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)
            <tr>
                <td>{{ $persona->cPerApellido }}</td>
                <td>{{ $persona->cPerNombre }}</td>
                <td>
                    <a href="{{ route('personas.edit', $persona->nPerCodigo) }}">Editar</a>
                    <form action="{{ route('personas.destroy', $persona->nPerCodigo) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta persona?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
