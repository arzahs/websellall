<?php require $_SERVER["DOCUMENT_ROOT"]."/views/blocks/header.php" ?>
<div class="total-ads main-grid-border">
    <div class="container">
        <div class="all-categories" style="margin-top: 20px;">
            <h3>Выбери свою категория и найди лучшее объявление</h3>
            <ul class="all-cat-list">
                <li><a <?php if ($is_category == 0){ echo 'class="active"'; } ?> href="<?php echo '/article/category-0'?>">Все<span class="num-of-ads"></span></a></li>

                <?php foreach ($categories as $category): ?>
                <li><a <?php if ($is_category == $category['id']){ echo 'class="active"'; } ?> href="<?php echo '/article/category-'.$category['id'] ?>"><?php echo $category['name'] ?><span class="num-of-ads"></span></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <ol class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href="index.html">Home</a></li>
            <li class="active">All Ads</li>
        </ol>
        <div class="ads-grid">
            <div class="ads-display col-md-12">
                <div class="wrapper">
                    <div class="bs-example bs-example-tabs">
                        <div id="myTabContent" class="tab-content">
                            <div>
                                <div>
                                    <div id="container">
<!--                                        Сортировка-->
<!--                                        <div class="sort">-->
<!--                                            <div class="sort-by">-->
<!--                                                <label>Сортировать по: </label>-->
<!--                                                <select>-->
<!--                                                    <option value="">Most recent</option>-->
<!--                                                    <option value="">Price: Rs Low to High</option>-->
<!--                                                    <option value="">Price: Rs High to Low</option>-->
<!--                                                </select>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <div class="clearfix"></div>
                                        <ul class="list">
                                            <?php foreach ($articles as $article): ?>
                                            <a href="<?php echo "/article/detail-".$article['id']; ?>">
                                                <li>
                                                    <img src="<?php echo $article['image']; ?>" title="" alt="" />
                                                    <section class="list-left">
                                                        <h5 class="title"><?php echo $article['title']; ?></h5>
                                                        <span class="adprice">$<?php echo $article['price']; ?></span>
                                                        <p class="catpath"><?php echo $article['author_name']; ?></p>
                                                    </section>
                                                    <section class="list-right">
                                                        <span class="date"><?php echo $article['date']; ?></span>
                                                    </section>
                                                    <div class="clearfix"></div>
                                                </li>
                                            </a>
                                            <?php endforeach ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <ul class="pagination pagination-sm">
                                <li><a href="#">Prev</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                                <li><a href="#">7</a></li>
                                <li><a href="#">8</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>


<?php require $_SERVER["DOCUMENT_ROOT"]."/views/blocks/footer.php" ?>
