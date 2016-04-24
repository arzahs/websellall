<?php require $_SERVER["DOCUMENT_ROOT"]."/views/blocks/header.php" ?>

<section>

    <div id="page-wrapper" class="sign-in-wrapper">
        <div class="graphs">

            <div class="sign-up">
                <ul>
                <?php if(isset($errors) && $errors != false) foreach($errors as $error): ?>
                    <li><?=$error ?></li>
                <?php endforeach; ?>
                </ul>

                <h1>Создание аккаунта</h1>
<!--                <p class="creating">Having hands on experience in creating innovative designs,I do offer design-->
<!--                    solutions which harness.</p>-->
                <h2>Информация</h2>
                <form action="" method="post">
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Имя* :</h4>
                        </div>
                        <div class="sign-up2">

                                <input type="text" placeholder="Bill" name="first_name" value="" required/>

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Фамилия* :</h4>
                        </div>
                        <div class="sign-up2">

                                <input type="text" placeholder="Gates" name="last_name" value="" required/>

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Телефон* :</h4>
                        </div>
                        <div class="sign-up2">

                                <input type="text" placeholder="+380664290126" name="phone" required/>

                        </div>
                        <div class="clearfix"> </div>
                    </div>

                    <div class="sign-u">
                    <div class="sign-up1">
                        <h4>Email адрес* :</h4>
                    </div>
                    <div class="sign-up2">

                            <input type="text" placeholder="admin@admin.com" name="email" required/>

                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="sign-u">
                    <div class="sign-up1">
                        <h4>Пароль* :</h4>
                    </div>
                    <div class="sign-up2">

                            <input type="password" placeholder="минимум 6 знаков" name="password" required/>

                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="sign-u">
                    <div class="sign-up1">
                        <h4>Повт.пароль* :</h4>
                    </div>
                    <div class="sign-up2">

                            <input type="password" placeholder="минимум 6 знаков" name="password2" required/>

                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="sub_home">
                    <div class="sub_home_left">
                        <input type="submit" name="action" value="Создать">
                    </div>
                    <div class="sub_home_right">
                        <p>Вернуться обратно <a href="/">домой</a></p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                </form>
            </div>

        </div>
    </div>

    </section>

<?php require $_SERVER["DOCUMENT_ROOT"]."/views/blocks/footer.php" ?>
