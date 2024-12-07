<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario Registrado</title>
</head>
<body>
    <h3>Usuario Registrado</h3>
    <p>Se ha registrado un nuevo usuario en la APP de Beer Lover. A continuación, los detalles:</p>
    <ul>
        <li><strong>Nombre:</strong> {{ $user->name }} {{ $user->apellidos }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
    </ul>
</body>
</html>
