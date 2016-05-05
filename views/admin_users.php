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
                <br>
                <p><a class="btn btn-danger" href="/article/my/">На свою страницу</a></p>

            </div>



            <div class="ads-display col-md-9">
                <div class="wrapper">
                    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                        <div id="myTabContent" class="tab-content">
                            <div>
                                <div>
                                    <div id="container">
                                        <div class="clearfix"></div>
                                        <?php if(isset($users)): ?>
                                            <ul class="list">
                                                <?php foreach ($users as $user): ?>
                                                    <a href="">
                                                        <li>
                                                            <img src="<?php if(isset($user['image'])){ echo $user['image'];}else
                                                            {echo '/media/avt/anon.jpg';}
                                                            ?>" title="" alt="" />
                                                            <section class="list-left">
                                                                <h5 class="title"><?php echo $user['name']; ?></h5>
                                                                <span class="adprice"><?php echo $user['id']; ?></span>
                                                                <?php if ($user['is_admin']==0): ?>
                                                                                                                                        <span class="label label-danger">Пользователь</span>
                                                                    <span data-page="<?php echo $page ?>"
                                                                          data-id="<?php echo $user['id'] ?>" data-status='1' class="label label-success" onclick="return Status.adminControl(event, this);">Сделать администратором</span>
                                                                <?php endif ?>
                                                                <?php if ($user['is_admin']!=0): ?>
                                                                                                                                        <span class="label label-success">Администратор</span>
                                                                    <span data-page="<?php echo $page ?>"
                                                                          data-id="<?php echo $user['id'] ?>" data-status='0' class="label label-danger" onclick="return Status.adminControl(event, this);">Сделать пользователем</span>

                                                                <?php endif ?>
                                                            </section>
                                                            <section class="list-right">

                                                            </section>
                                                            <div class="clearfix"></div>
                                                        </li>
                                                    </a>
                                                <?php endforeach ?>
                                            </ul>
                                        <?php else: ?>

                                            <h1>Пока нет пользователей</h1>
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
