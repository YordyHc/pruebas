<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Canal</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;
        }
        .divimg{
            width: 100vw; /* Ocupar todo el ancho de la ventana */
            height: 254px; /* Ajusta según necesidad */
            overflow: hidden;
            position: absolute; /* Se pega arriba */
            top: 0;
            left: 0;
        }
        .img-portada {
            width: 100%;
            position: absolute;
            top: -86%; /* Ajusta para recortar las franjas negras */
            transform: translateY(-10%);
        }

        /* Estilos del contenedor principal */
        .container {
            max-width: 1000px;
            margin: auto;
            text-align: center;
            padding: 20px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: -50px; /* Para superponer la imagen de perfil */
        }

        .profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 4px solid white;
        }

        .profile h2 {
            font-size: 24px;
            margin: 0;
        }

        /* Estilos para los videos */
        .videos {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .video {
            width: 300px;
        }

        .video img {
            width: 100%;
            border-radius: 10px;
        }

        .video p {
            font-size: 14px;
            margin-top: 5px;
        }
        .stats {
            font-size: 14px;
            color: gray;
            margin-top: 5px;
        }
        .subscribe-btn {
            display: flex;
            align-items: center;
            gap: 5px;
            background-color: #ff0000;
            color: white;
            border: none;
            padding: 8px 15px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .subscribe-btn img {
            width: 16px;
            height: 16px;
        }

        .subscribe-btn:hover {
            background-color: #cc0000;
        }

    </style>
</head>
<body>
    <?php
        $apiKey = 'AIzaSyBoW8tsNBBj2nngMlHhThyLjmLkqGr4D9w';
        $channelId = 'UCCfPkh8osJPC2pPq283kKXg';
        $url = "https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics,brandingSettings&id={$channelId}&key={$apiKey}";
        
        $response = file_get_contents($url);
        // Decodificar la respuesta JSON
        $data = json_decode($response, true);
        if (!empty($data['items'][0])) {
            $channel = $data['items'][0];

            $nombre_canal = $channel['snippet']['title'];
            $imagen_perfil = $channel['snippet']['thumbnails']['high']['url'];
            $suscriptores = $channel['statistics']['subscriberCount'];
            if($suscriptores >=  10000000){
                $sus = round($suscriptores / 1000000, 1) . 'M';
            }elseif($suscriptores < 10000000 && $suscriptores >= 1000000){
                $sus = number_format($suscriptores / 1000000, 2) . 'M';
            }elseif($suscriptores < 1000000 && $suscriptores >= 1000){
                $sus = round($suscriptores / 1000, 1) . 'K';
            }else{
                $sus = $suscriptores;
            }
            $cantidad_videos = $channel['statistics']['videoCount'];
            $cantidad_vistas = $channel['statistics']['viewCount'];
            $imagen_portada = $channel['brandingSettings']['image']['bannerExternalUrl'] ?? "No disponible";
            $imgcalidad = $imagen_portada . "=w2560-fcrop64=1,00000000ffffffff-nd-c0xffffffff-rj-k-no";
            // Mostrar información
            /*echo "<h2>Nombre del canal: $nombre_canal</h2>";
            echo "<img src='$imagen_perfil' alt='Imagen de perfil' width='100'><br>";
            echo "Suscriptores: $suscriptores<br>";
            echo "Cantidad de videos: $cantidad_videos<br>";
            echo "Cantidad de vistas: $cantidad_vistas<br>";*/
        } else {
            echo "No se encontraron datos para este canal.";
        }
    ?>
    <!-- Imagen de cabecera -->
    <div class="divimg">
        <img src="<?= htmlspecialchars($imgcalidad) ?>" class="img-portada" alt="Portada del Canal">
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- Contenedor principal -->
    <div class="container">
        <div class="profile">
            <img src="<?= htmlspecialchars($imagen_perfil) ?>"  alt="Perfil">
            <h2><?= htmlspecialchars($nombre_canal) ?></h2><br><br>
            <p class="stats"><?= htmlspecialchars($sus) ?> Subscribers • 11K Videos • 188 Views</p>
            <button class="subscribe-btn">
                <img src="youtube-icon.png" alt="YouTube"> Subscribe 32M
            </button>

        </div>
        
        <div class="videos">
            <div class="video">
                <img src="video1.jpg" alt="Video 1">
                <p>It’s your favorite artist’s favorite artist’s birthday...</p>
            </div>
            <div class="video">
                <img src="video2.jpg" alt="Video 2">
                <p>Winnie understood the assignment. #FallonTonight</p>
            </div>
            <div class="video">
                <img src="video3.jpg" alt="Video 3">
                <p>#ReeseWitherspoon thought the lyrics to...</p>
            </div>
        </div>
    </div>
    
</body>
</html>


