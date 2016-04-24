<?php require $_SERVER["DOCUMENT_ROOT"]."/views/blocks/header.php" ?>
<section>
    <div id="page-wrapper" class="sign-in-wrapper">
        <div class="graphs">
            <div class="sign-in-form">
                <div class="sign-in-form-top">
                    <h1>Log in</h1>
                </div>
                <div class="signin">
                    <ul>
                        <?php if(isset($errors) && $errors != false) foreach($errors as $error): ?>
                            <li><?=$error ?></li>
                        <?php endforeach; ?>
                    </ul>
<!--                    <div class="signin-rit">-->
<!--								<span class="checkbox1">-->
<!--									 <label class="checkbox"><input type="checkbox" name="checkbox" checked="">Forgot Password ?</label>-->
<!--								</span>-->
<!--                        <p><a href="#">Click Here</a> </p>-->
<!--                        <div class="clearfix"> </div>-->
<!--                    </div>-->
                    <form action="" method="post">
                        <div class="log-input">
                            <div class="log-input-left">
                                <input type="text" class="user" name="email" value="Ваш Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Ваш Email';}"/>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="log-input">
                            <div class="log-input-left">
                                <input type="password" class="lock" name="password" value="Пароль" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email адресс:';}"/>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <input type="submit" name="action" value="Войти">
                    </form>
                </div>
                <div class="new_people">
                    <h2>Для новых пользователей</h2>
                    <p>Если вы хотите создать бесплатное объявление, но у вас нет аккаунта</p>
                    <a href="/user/register/">Зарегестрируйтесь сейчас!</a>
                </div>
            </div>
        </div>
    </div>
    </section>
<?php require $_SERVER["DOCUMENT_ROOT"]."/views/blocks/footer.php" ?>