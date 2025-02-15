<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario Registrado</title>
</head>
<body>
   <!-- <img src="https://espaciousados.cl/images/logo/logo_eu.png" alt="Imagen"> -->
    <h3>Usuario Registrado</h3>
    <p>Se ha registrado un nuevo usuario en la APP de Beer Lover. A continuación, los detalles:</p>
    <ul>
        <li><strong>Rut:</strong> <span id="rut">{{ $user->rut }}</span></li>
        <li><strong>Nombre:</strong> {{ $user->name }} {{ $user->apellidos }}</li>
        <p>Tu plan actual es: {{ $user->plan->nombre ?? 'Sin plan asignado' }}</p>
        <li><strong>Email:</strong> {{ $user->email }}</li>
        <li><strong>Telefono:</strong> {{ $user->phone }}</li>
        <li><strong>Codigo Cupon:</strong> {{ $user->codigo_cupon }}</li>
        <li><strong>Fecha de Registro:</strong> {{ $user->created_at->format('d/m/Y') }}</li>
        <li><strong>Hora de Registro:</strong> {{ $user->created_at->format('H:i') }}</li>

    </ul>

</body>
</html>
