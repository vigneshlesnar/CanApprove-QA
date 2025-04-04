<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Video Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .video-container {
            position: relative;
            max-width: 100%;
            margin: auto;
            padding: 0;
        }
        .video-arrow-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 20px;
            cursor: pointer;
        }
        .left-arrow { left: 0; }
        .right-arrow { right: 0; }
        .thumbnail-container {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .thumbnail {
            width: 120px;
            height: 70px;
            margin: 5px;
            cursor: pointer;
            border: 2px solid transparent;
        }
        .thumbnail:hover {
            border-color: red;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="video-container">
            <button class="video-arrow-btn left-arrow" onclick="prevVideo()">&#10094;</button>
            <iframe id="videoFrame" width="100%" height="315" src="https://www.youtube.com/embed/qmybh5ARQ64" frameborder="0" allowfullscreen></iframe>
            <button class="video-arrow-btn right-arrow" onclick="nextVideo()">&#10095;</button>
        </div>
    </div>
    <div class="row">
        <div class="thumbnail-container" id="thumbnailContainer">
            <!-- Thumbnails will be generated here dynamically -->
        </div>
    </div>
</div>

<script>
    var videos = [
        "qmybh5ARQ64",
        "m8SEwfABQFc",
        "FKRKXzumttI"
    ];
    var index = 0;
    var autoSlide = setInterval(changeVideo, 3000);

    function changeVideo() {
        index = (index + 1) % videos.length;
        updateVideo();
    }

    function prevVideo() {
        clearInterval(autoSlide);
        index = (index - 1 + videos.length) % videos.length;
        updateVideo();
        autoSlide = setInterval(changeVideo, 3000);
    }

    function nextVideo() {
        clearInterval(autoSlide);
        index = (index + 1) % videos.length;
        updateVideo();
        autoSlide = setInterval(changeVideo, 3000);
    }

    function updateVideo() {
        document.getElementById("videoFrame").src = "https://www.youtube.com/embed/" + videos[index];
    }

    function generateThumbnails() {
        var container = document.getElementById("thumbnailContainer");
        container.innerHTML = "";
        videos.forEach((videoId, i) => {
            var img = document.createElement("img");
            img.src = "https://img.youtube.com/vi/" + videoId + "/0.jpg";
            img.className = "thumbnail";
            img.onclick = function() {
                clearInterval(autoSlide);
                index = i;
                updateVideo();
                autoSlide = setInterval(changeVideo, 3000);
            };
            container.appendChild(img);
        });
    }

    generateThumbnails();
</script>

</body>
</html>
