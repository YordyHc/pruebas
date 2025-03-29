<?php
$apiKey = 'AIzaSyBoW8tsNBBj2nngMlHhThyLjmLkqGr4D9w'; // Reemplázalo con tu clave de API de YouTube
$channelId = 'UCsMzBY3X_RS6GhGBiHXW19A'; // Reemplázalo con el ID del canal
$maxResults = 3;
$pageToken = isset($_GET['pageToken']) ? $_GET['pageToken'] : '';

// URL de la API de YouTube
$url = "https://www.googleapis.com/youtube/v3/search?key=$apiKey&channelId=$channelId&part=snippet,id&order=date&maxResults=$maxResults&pageToken=$pageToken";

// Obtener datos desde YouTube
$response = file_get_contents($url);
$data = json_decode($response, true);

// Extraer videos y tokens de paginación
$videos = $data['items'];
$nextPageToken = isset($data['nextPageToken']) ? $data['nextPageToken'] : '';
$prevPageToken = isset($data['prevPageToken']) ? $data['prevPageToken'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Videos</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .gallery { display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; }
        .video { width: 30%; }
        iframe { width: 100%; height: 200px; }
        .controls { margin-top: 20px; }
    </style>
</head>
<body>
    <h2>Videos del Canal</h2>
    <div class="gallery">
        <?php foreach ($videos as $video): 
            if (isset($video['id']['videoId'])): ?>
                <div class="video">
                    <iframe src="https://www.youtube.com/embed/<?= $video['id']['videoId'] ?>" frameborder="0" allowfullscreen></iframe>
                    <p><?= $video['snippet']['title'] ?></p>
                </div>
        <?php endif; endforeach; ?>
    </div>
    
    <div class="controls">
        <?php if ($prevPageToken): ?>
            <a href="?pageToken=<?= $prevPageToken ?>">⬅ Anterior</a>
        <?php endif; ?>
        <?php if ($nextPageToken): ?>
            <a href="?pageToken=<?= $nextPageToken ?>">Siguiente ➡</a>
        <?php endif; ?>
    </div>
</body>
</html>
