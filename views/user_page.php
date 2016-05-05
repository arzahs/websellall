<?php require $_SERVER["DOCUMENT_ROOT"]."/views/blocks/header.php" ?>

<div class="single-page main-grid-border">
    <div class="container">
<div class="ads-grid">


    <div class="side-bar col-md-3">
        <div class="avatar">
            <?php if (isset($user['image'])): ?>
            <img src="<?php echo $user['image'] ?>" width="156" height="156">
            <?php else: ?>
                <img src="/media/avt/anon.jpg" width="156" height="156">
            <?php endif ?>
        </div>

        <div class="user-name user-inf">
            <h1><?php echo $user['name'] ?></h1></p>
        </div>
<!---->
<!--        <div class="user-city user-inf">-->
<!--            <p class="user-inf-title">Город:</p>-->
<!--            <p>Moscow</p>-->
<!--        </div>-->

        <div class="user-phone user-inf">
            <p class="user-inf-title"><b>Телефон:</b></p>
            <p><i class="glyphicon glyphicon-earphone"></i> <?php echo $user['phone'] ?></p>
        </div>

        <div class="user-phone user-inf">
            <p class="user-inf-title"><b>E-mail:</b></p>
            <p><i class="glyphicon glyphicon-envelope"></i> <?php echo $user['email'] ?></p>
        </div>
        <?php if(isset($isAdmin)): ?>
        <br>
        <p><a class="btn btn-danger" href="/admin/ads/">Контроль объявлний</a></p>
        <br>
         <p><a class="btn btn-danger" href="/admin/users/">Контроль пользователей</a></p>
        <?php endif; ?>
    </div>



    <div class="ads-display col-md-9">
        <div class="wrapper">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <div id="myTabContent" class="tab-content">
                    <div>
                        <div>
                            <div id="container">
                                <div class="clearfix"></div>
                                <?php if(isset($articles)): ?>
                                <ul class="list">
                                    <?php foreach ($articles as $article): ?>
                                        <a href="<?php echo "/article/detail-".$article['id']; ?>">
                                            <li>
                                                <img src="<?php echo $article['image']; ?>" title="" alt="" />
                                                <section class="list-left">
                                                    <h5 class="title"><?php echo $article['title']; ?></h5>
                                                    <span class="adprice">$<?php echo $article['price']; ?></span>
                                                    <p class="catpath"><?php echo $user['name']; ?></p>
                                                </section>
                                                <section class="list-right">
                                                    <span class="date"><?php echo $article['date']; ?></span>
                                                    <?php if ($article['status']==1): ?>
                                                        <span class="label label-success">Опубликован</span>
                                                        <span data-page="<?php echo $page ?>"
                                                            data-id="<?php echo $article['id'] ?>" data-status='3' class="label label-danger" onclick="return Status.changeIt(event,this);">Окончить продажу</span>
                                                    <?php endif ?>
                                                    <?php if ($article['status']==2): ?>
                                                        <span class="label label-warning">Не опубликовано</span>
                                                    <?php endif ?>
                                                    <?php if ($article['status']==3): ?>
                                                        <span class="label label-danger">Продано</span>
                                                    <?php endif ?>
                                                </section>
                                                <div class="clearfix"></div>
                                            </li>
                                        </a>
                                    <?php endforeach ?>
                                </ul>
                                <?php else: ?>

                                        <h1>Пока у вас нет ни одного объявления</h1>
                                        <br>
                                        <a href="/article/add/" class="btn btn-danger">Создать бесплатное объявление</a>

                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($countPages > 1): ?>
            <ul class="pagination pagination-sm">

                <li <?php if($page ==1):?>
                    class="disabled"
                <?php endif ?> >
                    <a href="<?php if($page !=1) {echo '/article/my/page-'.($page-1);} else{ echo '#'; } ?>">Назад</a>
                </li>
                <?php $countPages ?>
                <?php for($i = 1; $i<=$countPages; $i++): ?>
                    <li <?php if($page==$i): ?>class="active"<?php endif ?>>
                        <a  href="<?php echo '/article/my/page-'.$i ?>"><?php echo $i ?></a>
                    </li>
                <?php endfor?>
                <li <?php if($page==$countPages): ?>class="disabled"<?php endif ?> >
                    <a href="<?php if($page !=$countPages) { echo '/article/my/page-'.($page+1); }else{ echo '#';  } ?>">Вперед</a>
                </li>
            </ul>
        <?php endif ?>
    </div>
    <div class="clearfix"></div>

</div>

    </div>
</div>


<?php require $_SERVER["DOCUMENT_ROOT"]."/views/blocks/footer.php" ?>
