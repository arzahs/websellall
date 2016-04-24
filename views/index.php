<?php require $_SERVER["DOCUMENT_ROOT"]."/views/blocks/header.php" ?>
    <!-- content-starts-here -->
    <div class="content">
        <div class="categories">
            <div class="container">
                <?php foreach ($categories as $category):?>
                <div class="col-md-2 focus-grid">
                    <a href="<?php echo '/article/category-'.$category['id']; ?>">
                        <div class="focus-border">
                            <div class="focus-layout">
                                <div class="focus-image"><i class="fa <?php echo $category['image']; ?>"></i></div>
                                <h4 class="clrchg"><?php echo $category['name']; ?></h4>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="trending-ads">
            <div class="container">
                <!-- slider -->
                <div class="trend-ads">
                    <h2>Последние объявления</h2>
                    <ul id="flexiselDemo3">
                        <li>
                        <?php foreach ($articles as $article): ?>

                            <div class="col-md-3 biseller-column">
                                <a href="single.html">
                                    <img src="<?php echo $article['image']; ?>"/>
                                    <span class="price">&#36;<?php echo $article['price']; ?></span>
                                </a>
                                <div class="ad-info">
                                    <h5><?php echo $article['title']; ?></h5>
                                    <span>3 hour ago</span>
                                </div>
                            </div>


                        <?php endforeach; ?>
                        </li>
                    </ul>
                    <script type="text/javascript">
                        $(window).load(function() {
                            $("#flexiselDemo3").flexisel({
                                visibleItems:1,
                                animationSpeed: 1000,
                                autoPlay: true,
                                autoPlaySpeed: 5000,
                                pauseOnHover: true,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint:480,
                                        visibleItems:1
                                    },
                                    landscape: {
                                        changePoint:640,
                                        visibleItems:1
                                    },
                                    tablet: {
                                        changePoint:768,
                                        visibleItems:1
                                    }
                                }
                            });

                        });
                    </script>
                    <script type="text/javascript" src="/static/js/jquery.flexisel.js"></script>
                </div>
            </div>
            <!-- //slider -->
        </div>
    </div>
<?php require $_SERVER["DOCUMENT_ROOT"]."/views/blocks/footer.php" ?>