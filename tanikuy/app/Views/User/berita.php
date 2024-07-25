<?= $this->extend('User/layout') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?php echo base_url() ?>cuaca/scuaca.css">

<!-- Berita Dan Cuaca Start -->
<div class="container-fluid testimonial py-5">
    <div class="container py-5">
        <div class="testimonial-header text-center mt-5">
            <h1 class="display-5 mb-5 text-dark">Berita dan Cuaca</h1>
        </div>

        <!-- Forecast Table for Every 4 Hours -->
        <div class="forecast-table">
            <div class="container">
                <div class="forecast-container">
                    <?php if (isset($weatherData['list']) && !empty($weatherData['list'])) : ?>
                        <?php
                        // Mengelompokkan data cuaca berdasarkan interval waktu 4 jam
                        $forecastsByInterval = [];
                        foreach ($weatherData['list'] as $forecast) {
                            $dateTime = date('Y-m-d H:00', strtotime($forecast['dt_txt']));
                            $hour = date('H', strtotime($forecast['dt_txt']));

                            if ($hour % 4 === 0) {
                                if (!isset($forecastsByInterval[$dateTime])) {
                                    $forecastsByInterval[$dateTime] = $forecast;
                                }
                            }
                        }
                        ?>
                        <?php foreach ($forecastsByInterval as $dateTime => $forecast) : ?>
                            <div class="forecast">
                                <div class="forecast-header">
                                    <div class="day"><?= date('l', strtotime($forecast['dt_txt'])) ?></div>
                                    <div class="date"><?= date('d M', strtotime($forecast['dt_txt'])) ?></div>
                                </div>
                                <div class="forecast-content">
                                    <div class="location"><?= $weatherData['city']['name'] ?></div>
                                    <div class="degree">
                                        <div class="num"><?= round($forecast['main']['temp']) ?><sup>o</sup>C</div>
                                        <div class="forecast-icon">
                                            <img src="http://openweathermap.org/img/wn/<?= $forecast['weather'][0]['icon'] ?>.png" alt="" width=90>
                                        </div>
                                    </div>
                                    <span><img src="images/icon-umberella.png" alt=""><?= $forecast['main']['humidity'] ?>%</span>
                                    <span><img src="images/icon-wind.png" alt=""><?= $forecast['wind']['speed'] ?> km/h</span>
                                    <span><img src="images/icon-compass.png" alt=""><?= $forecast['wind']['deg'] ?>°</span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>Data cuaca tidak tersedia.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="hourly-scroll-container">
            <div class="hourly-scroll">
                <?php if (isset($weatherData['list']) && !empty($weatherData['list'])) : ?>
                    <?php foreach ($weatherData['list'] as $forecast) : ?>
                        <div class="hourly-card">
                            <div class="hourly-time"><?= date('H:i', strtotime($forecast['dt_txt'])) ?></div>
                            <div class="hourly-content">
                                <div class="degree-hourly">
                                    <div class="num-hourly"><?= round($forecast['main']['temp']) ?><sup>o</sup>C</div>
                                    <div class="forecast-icon">
                                        <img src="http://openweathermap.org/img/wn/<?= $forecast['weather'][0]['icon'] ?>.png" alt="" width=50>
                                    </div>
                                </div>
                                <span><img src="images/icon-umberella.png" alt=""><?= $forecast['main']['humidity'] ?>%</span>
                                <span><img src="images/icon-compass.png" alt=""><?= $forecast['wind']['deg'] ?>°</span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="hourly-card">
                        <p class="hourly-text">Data cuaca tidak tersedia.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Top News Start -->
        <div class="top-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 tn-left">
                        <div class="row tn-slider">
                            <?php if (isset($newsData['articles']) && !empty($newsData['articles'])) : ?>
                                <?php $firstFourArticles = array_slice($newsData['articles'], 0, 4); ?>
                                <?php foreach ($firstFourArticles as $article) : ?>
                                    <div class="col-md-6">
                                        <div class="tn-img">
                                            <img src="<?= $article['urlToImage'] ?>" alt="<?= $article['title'] ?>" />
                                            <div class="tn-title">
                                                <a href="<?= $article['url'] ?>"><?= $article['title'] ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>Berita tidak tersedia.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6 tn-right">
                        <div class="row">
                            <?php if (isset($newsData['articles']) && !empty($newsData['articles'])) : ?>
                                <?php $nextFourArticles = array_slice($newsData['articles'], 4, 4); ?>
                                <?php foreach ($nextFourArticles as $article) : ?>
                                    <div class="col-md-6">
                                        <div class="tn-img">
                                            <img src="<?= $article['urlToImage'] ?>" alt="<?= $article['title'] ?>" />
                                            <div class="tn-title">
                                                <a href="<?= $article['url'] ?>"><?= $article['title'] ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>Berita tidak tersedia.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top News End -->

        <!-- Main News Start -->
        <div class="main-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <?php if (isset($newsData['articles']) && !empty($newsData['articles'])) : ?>
                                <?php $remainingArticles = array_slice($newsData['articles'], 8); ?>
                                <?php foreach ($remainingArticles as $article) : ?>
                                    <div class="col-md-4">
                                        <div class="mn-img">
                                            <img src="<?= $article['urlToImage'] ?>" alt="<?= $article['title'] ?>" />
                                            <div class="mn-title">
                                                <a href="<?= $article['url'] ?>"><?= $article['title'] ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>Berita tidak tersedia.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mn-list">
                            <h2>Read More</h2>
                            <ul>
                                <?php if (isset($newsData['articles']) && !empty($newsData['articles'])) : ?>
                                    <?php foreach ($newsData['articles'] as $article) : ?>
                                        <li><a href="<?= $article['url'] ?>"><?= $article['title'] ?></a></li>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <p>Berita tidak tersedia.</p>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main News End -->
    </div>
</div>


<script src="<?php echo base_url() ?>cuaca/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url() ?>cuaca/js/plugins.js"></script>
<script src="<?php echo base_url() ?>cuaca/js/app.js"></script>
<!-- Tastimonial End -->
<?= $this->endSection() ?>