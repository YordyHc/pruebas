<?php
// Token de acceso de Instagram (reemplázalo con el tuyo)
$accessToken = "";

// ID de tu cuenta de Instagram Business o Creator (debes obtenerlo previamente)
$instagramAccountId = "9131622750297103";//17841406732827131 9131622750297103
// Configura tu ID de cuenta de Instagram y el token de acceso
$instagramAccountId = "9131622750297103";  // Reemplaza con el ID de la cuenta de Instagram
$accessToken = "IGAALwDnTI4ZApBZAE9MZA0t2WTBVX05lZAHY3anBUVExMbThUTDNJQjNQdG1ZAdG9LQW5GYnRLT19HakU1OUJPejVVZAW9vYTVkMmNHT3ZAmNkxucDdTYkhWamszdTd0LWY5MmxuTnF6TTJ5QmRTbFdDbTVnMFE4WDRfNnpIX3BtbXdHdwZDZD";  // Reemplaza con el token de acceso

// Endpoint para obtener información del usuario
$userEndpoint = "https://graph.instagram.com/$instagramAccountId?fields=id,username,name,profile_picture_url,media_count,followers_count,follows_count&access_token=$accessToken";

// Función para obtener datos desde la API de Instagram
function getInstagramData($url) {
    $response = file_get_contents($url);  // Hacer la solicitud a la API de Instagram
    return json_decode($response, true);  // Decodificar la respuesta JSON en un array asociativo
}

// Obtener los datos de Instagram
$instagramData = getInstagramData($userEndpoint);

// Verificar si hay datos y mostrar los resultados
if (isset($instagramData['id'])) {
    // Datos obtenidos exitosamente
    $id = $instagramData['id'];
    $username = $instagramData['username'];
    $name= $instagramData['name'];
    $profile_picture_url = $instagramData['profile_picture_url'];
    $media_count = $instagramData['media_count'];
    $followers_count = $instagramData['followers_count'];
    $follows_count = $instagramData['follows_count'];
} else {
    // Si no se obtienen datos
    echo "Error: No se pudo obtener los datos de Instagram.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de Instagram</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .profile-container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: auto;
            text-align: center;
        }
        .profile-container img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }
        .profile-container h2 {
            margin-top: 10px;
            font-size: 24px;
        }
        .profile-container p {
            font-size: 16px;
            color: #555;
        }
        .profile-container .stats {
            margin-top: 20px;
        }
        .profile-container .stats div {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <!-- Imagen de perfil -->
        <img src="<?php echo $profile_picture_url; ?>" alt="Imagen de perfil">
        
        <!-- Nombre de usuario -->
        <h2><?php echo $name; ?></h2>
        <h2>@<?php echo $username; ?></h2>

        <!-- Información adicional -->
        <p><strong>ID:</strong> <?php echo $id; ?></p>
        
        <!-- Estadísticas -->
        <div class="stats">
            <div><strong>Publicaciones:</strong> <?php echo $media_count; ?></div>
            <div><strong>Seguidores:</strong> <?php echo $followers_count; ?></div>
            <div><strong>Seguidos:</strong> <?php echo $follows_count; ?></div>
        </div>
    </div>
</body>
</html>
