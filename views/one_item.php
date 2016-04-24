<?php require $_SERVER["DOCUMENT_ROOT"]."/views/blocks/header.php" ?>
    <div class="single-page main-grid-border">
        <div class="container">
            <ol class="breadcrumb" style="margin-bottom: 5px;">
                <li><a href="index.html">Home</a></li>
                <li><a href="all-classifieds.html">All Ads</a></li>
                <li class="active"><a href="mobiles.html">Mobiles</a></li>
                <li class="active">Mobile Phone</li>
            </ol>
            <div class="product-desc">
                <div class="col-md-7 product-view">
                    <h2><?php echo $article['title'] ?></h2>
                    <p>Добавлено <?php echo $article['date'] ?>, ID объявления: <?php echo $article['id'] ?></p>
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="<?php echo $article['image'] ?>">
                                <img src="<?php echo $article['image'] ?>" />
                            </li>
                        </ul>
                    </div>
                    <!-- FlexSlider -->
                    <script defer src="/static/js/jquery.flexslider.js"></script>
                    <link rel="stylesheet" href="/static/css/flexslider.css" type="text/css" media="screen" />

                    <script>
                        // Can also be used with $(document).ready()
                        $(window).load(function() {
                            $('.flexslider').flexslider({
                                animation: "slide",
                                controlNav: "thumbnails"
                            });
                        });
                    </script>
                    <!-- //FlexSlider -->
                    <div class="product-details">
                        <?php echo $article['text'] ?>

                    </div>
                </div>
                <div class="col-md-5 product-details-grid">
                    <div class="item-price">
                        <div class="product-price">
                            <p class="p-price">Цена</p>
                            <h3 class="rate">$ <?php echo $article['price'] ?></h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="condition">
                            <p class="p-price">Продавец</p>
                            <h4><?php echo $author['name']; ?></h4>
                            <div class="clearfix"></div>
                        </div>
                        <div class="itemtype">
                            <p class="p-price">Item Type</p>
                            <h4>Phones</h4>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="interested text-center">
                        <h4>Заинтересовало предложение?<small> Свяжись с продавцом!</small></h4>
                        <p><i class="glyphicon glyphicon-earphone"></i><?php echo $author['phone']; ?></p>
                        <p><i class="glyphicon glyphicon-envelope"></i><?php echo $author['email']; ?></p>
                    </div>
                    <div class="tips">
                        <h4>Тэги связанные с объявлением</h4>
                        <ol>
                            <?php foreach ($tags as $tag): ?>
                            <li><a href=""><?php echo $tag['name']; ?></a></li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

<?php require $_SERVER["DOCUMENT_ROOT"]."/views/blocks/footer.php" ?>