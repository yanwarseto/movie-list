<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie List</title>
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
    <style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        /* Horizontally center */
        align-items: center;
        /* Vertically center */
        height: 100vh;
        /* Ensure the body takes full height of the screen */
        margin: 0;
        /* Remove any default margins */
        background-color: #f8f8f8;
    }

    .edit-button {
        margin-left: 10px;
    }

    .synopsis h3 {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 1.1rem;
        color: #222;
        margin-top: 15px;
    }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <!-- <nav>
        <a class="logo" href="/"><span class="mark">War </span>Movies</a>
    </nav> -->

    <a class="logo" href="/" style="text-align: center;"><span class="mark">War </span>Movies
    </a><br>
    <div class="movie-container">
        <!-- Movie Poster -->
        <div class="poster">
            <img src="<?= !empty($getDetails['poster_path']) ? 'https://image.tmdb.org/t/p/w1280' . $getDetails['poster_path'] : 'https://via.placeholder.com/1280x720?text=No+Image+Available' ?>"
                alt="<?= $getDetails['title'] ?>" />
        </div>

        <!-- Movie Information -->
        <div class="details">
            <h1 class="title"><?= $getDetails['title'] ?></h1>
            <p class="tagline"><?= $getDetails['tagline'] ?></p>
            <p class="meta"><?= $getDetails['release_date'] ?> / <?= $getDetails['runtime'] ?> MIN</p>
            <p class="rating">⭐ <?= $getDetails['vote_average'] ?></p>

            <!-- Genres -->
            <div class="genres">
                <h3>THE GENRES</h3>
                <p>
                    <?php foreach ($getDetails['genres'] as $genre) : ?>
                    <?= $genre['name'] ?><?php if (next($getDetails['genres'])) echo ', '; ?>
                    <?php endforeach; ?>
                </p>
            </div>

            <!-- Synopsis -->
            <div class="synopsis">
                <h3>THE SYNOPSIS
                    <a href="javascript:void(0);" class="edit-button" id="editButton">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                </h3>
                <p>
                    <?php if ($getOverviewDb != null) : ?>
                    <?= $getOverviewDb ?>
                    <?php else: ?>
                    <?= $getDetails['overview'] ?>
                    <?php endif; ?>
                </p>
            </div>

            <!-- Actors -->
            <div class="actors">
                <h3>THE ACTORS</h3>
                <p>BRAD PITT, ORLANDO BLOOM, ERIC BANA, BRIAN COX</p>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Synopsis -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Edit Synopsis</h2>
            <form action="/updateOverview" method="POST">
                <input type="hidden" name="movie_id" value="<?= $getDetails['id'] ?>" />
                <textarea name="overview" rows="6" cols="50" style="text-align:left">
                <?php if ($getOverviewDb != null) : ?>
                    <?= $getOverviewDb ?>
                    <?php else: ?>
                    <?= $getDetails['overview'] ?>
                    <?php endif; ?>
                </textarea>
                <br><br>
                <button type="submit"
                    style="align-self: center; background-color: #4CAF50; color: white; padding: 12px 24px; border: none; border-radius: 25px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease;">
                    Save Changes
                </button>
            </form>
        </div>
    </div>

</body>
<script>
var modal = document.getElementById("editModal");
var editButton = document.getElementById("editButton");
var closeModal = document.getElementById("closeModal");

editButton.onclick = function() {
    modal.style.display = "block";
}

closeModal.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</html>