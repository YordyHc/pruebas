<?php
$apiKey = 'AIzaSyBoW8tsNBBj2nngMlHhThyLjmLkqGr4D9w'; // Reemplázalo con tu clave de API de YouTube
$channelId = 'UCCfPkh8osJPC2pPq283kKXg'; // Reemplázalo con el ID del canal
$maxResults = 50; // Obtener más videos de una sola vez

$url = "https://www.googleapis.com/youtube/v3/search?key=$apiKey&channelId=$channelId&part=snippet,id&order=date&maxResults=$maxResults";
$response = file_get_contents($url);
$data = json_decode($response, true);
$videos = array_filter($data['items'], fn($video) => isset($video['id']['videoId']));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Videos</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .gallery-container {
    position: relative;
    width: 100%;
    max-width: 1490px;
    margin: auto;
}

.gallery {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    position: relative;
}

.gallery-nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.8);
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
}

.gallery-nav-btn:hover {
    background: rgba(255, 255, 255, 1);
}

.gallery-prev {
    left: 0px; /* Ajusta según sea necesario */
}

.gallery-next {
    right: 0px; /* Ajusta según sea necesario */
}

@media (max-width: 768px) {
    .gallery-prev {
        left: 5px;
    }
    .gallery-next {
        right: 5px;
    }
}

        .video { width: 30%; text-align: left; position: relative; }
        iframe { width: 100%; height: 254px; }
        .video-info { font-size: 14px; color: gray; }
        .controls { margin-top: 20px; display: flex; justify-content: center; align-items: center; gap: 10px; }
        .nav-btn { background: white; border: 1px solid #ddd; padding: 10px; border-radius: 50%; cursor: pointer; }
        .pagination { margin-top: 20px; }
        .pagination button { margin: 5px; padding: 8px 12px; border: 1px solid #ddd; background: white; cursor: pointer; }
        .pagination .active { background: black; color: white; }
        
    </style>
    <script>
        let videos = <?php echo json_encode(array_values($videos)); ?>;
        let currentIndex = 0;
        const videosPerPage = 3;

        function renderVideos() {
            const gallery = document.querySelector('.gallery');
            gallery.innerHTML = '';
            for (let i = currentIndex; i < currentIndex + videosPerPage && i < videos.length; i++) {
                let video = videos[i];
                let date = new Date(video.snippet.publishedAt).toLocaleDateString();
                let views = Math.floor(Math.random() * 100000) + ' Views';
                let likes = Math.floor(Math.random() * 5000) + ' Likes';
                let comments = Math.floor(Math.random() * 500) + ' Comments';
                
                gallery.innerHTML += `
                    <div class="video">
                        <iframe src="https://www.youtube.com/embed/${video.id.videoId}" frameborder="0" allowfullscreen></iframe>
                        <p><strong>${video.snippet.title}</strong></p>
                        <p class="video-info">${date} • ${views} • ${likes} • ${comments}</p>
                    </div>`;
            }
            updatePagination();
        }

        function updatePagination() {
            const pagination = document.querySelector('.pagination');
            pagination.innerHTML = '';
            let totalPages = Math.ceil(videos.length / videosPerPage);
            for (let i = 0; i < totalPages; i++) {
                pagination.innerHTML += `<button class="${i * videosPerPage === currentIndex ? 'active' : ''}" onclick="goToPage(${i})">${i + 1}</button>`;
            }
        }

        function goToPage(page) {
            currentIndex = page * videosPerPage;
            renderVideos();
        }

        function nextPage() {
            if (currentIndex + videosPerPage < videos.length) {
                currentIndex += videosPerPage;
                renderVideos();
            }
        }

        function prevPage() {
            if (currentIndex - videosPerPage >= 0) {
                currentIndex -= videosPerPage;
                renderVideos();
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            renderVideos();
        });
    </script>
</head>
<body>
    <h2>Videos del Canal</h2>
    <div class="gallery-container">
        <button class="gallery-nav-btn gallery-prev" onclick="prevPage()">⬅</button>
        <div class="gallery"></div>
        <button class="gallery-nav-btn gallery-next" onclick="nextPage()">➡</button>
    </div>

    <div class="controls">
        <div class="pagination"></div>
    </div>
</body>
</html>
