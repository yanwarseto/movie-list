<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
</head>

<body>
    <nav>
        <a class="logo" href="/"><span class="mark">War </span>Movies</a>
        <form method="GET" action="<?= site_url('home/search') ?>" id="searchForm">
            <input type="text" name="search" placeholder="Search" class="search_input" />
            <div class="search_icon">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>
        </form>
    </nav>

    <!-- MOVIES LIST -->
    <ul class="movie_list_ul" id="movieUl">
        <?php if (!empty($movies)): ?>
        <?php foreach ($movies as $movie): ?>
        <li class="movie_list_item">
            <img src="<?= !empty($movie['poster_path']) ? 'https://image.tmdb.org/t/p/w1280' . $movie['poster_path'] : 'https://via.placeholder.com/1280x720?text=No+Image+Available' ?>"
                alt="<?= $movie['title'] ?>" />
            <div class="movie_info">
                <h3><?= $movie['title'] ?></h3>
                <span
                    class="<?= getClassByRate($movie['vote_average']) ?>"><?= number_format($movie['vote_average'], 1) ?></span>
            </div>
            <div class="overview">
                <h3>Overview</h3>
                <p> <?php
                            if (isset($getOverviewDb[$movie['id']]) && $getOverviewDb[$movie['id']] != null): ?>
                    <?= $getOverviewDb[$movie['id']] ?>
                    <?php else: ?>
                    <?= $movie['overview'] ?>
                    <?php endif; ?>
                </p>

                <a class="details-button" href="/details/<?= $movie['id'] ?>">Details</a>
            </div>
        </li>
        <?php endforeach; ?>
        <?php endif; ?>
    </ul>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
