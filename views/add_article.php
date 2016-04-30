<?php require $_SERVER["DOCUMENT_ROOT"]."/views/blocks/header.php" ?>
<div class="submit-ad main-grid-border">
    <div class="container">
        <h2 class="head">Добавить ваше объявление</h2>
        <div class="post-ad-form">
            <ul>
                <?php if(isset($errors) && $errors != false) foreach($errors as $error): ?>
                    <li><?=$error ?></li>
                <?php endforeach; ?>
            </ul>
            <form  action="" method="POST" enctype="multipart/form-data">
                <label>Выбрать категорию <span>*</span></label>
                <select name="category" class="">
                    <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="clearfix"></div>
                <label>Выбрать город</label>
                <select name="city" class="">
                    <option value="0">Все</option>
                    <?php foreach($cities as $city): ?>
                        <option value="<?php echo $city['id']; ?>"><?php echo $city['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="clearfix"></div>
                <label>Заголовок <span>*</span></label>
                <input type="text" class="phone" name="title" placeholder="" required>
                <div class="clearfix"></div>
                <label>Цена <span>*</span></label>
                <input type="text" class="phone" name="price" placeholder="">
                <div class="clearfix"></div>
                <label>Колличество</label>
                <input type="text" class="phone" name="count" placeholder="" required>
                <div class="clearfix"></div>
                <label>Описание <span>*</span></label>
                <textarea class="mess" name="text" placeholder="Напишите несколько слов о своем товаре"></textarea>
                <div class="clearfix"></div>
                <label>Тэг описывающий ваш товар<span>*</span></label>
                <input type="text" class="phone" name="tag" placeholder="продам квартиру" required>
                <div class="clearfix"></div>
                <div class="upload-ad-photos">
                    <label>Добавить фото :</label>
                    <div class="photos-upload-view">
                        <div id="upload">

                            <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

                            <div>
                                <input type="file" id="fileselect" name="image" multiple="multiple" />
                                <div id="filedrag">или перетащите файл сюда</div>
                            </div>

                            <div id="submitbutton">
                                <button type="submit">Upload Files</button>
                            </div>

                        </div>


                    </div>
                    <div class="clearfix"></div>
                    <script src="/static/js/filedrag.js"></script>

                </div>
                <div class="personal-details">
                    <input type="submit" name="action" value="Добавить объявление">
                </div>
                <div class="clearfix"></div>
                </form>
        </div>
    </div>
</div>
<?php require $_SERVER["DOCUMENT_ROOT"]."/views/blocks/footer.php"; ?>
