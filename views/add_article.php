<?php require $_SERVER["DOCUMENT_ROOT"]."/views/blocks/header.php" ?>
<div class="submit-ad main-grid-border">
    <div class="container">
        <h2 class="head">Post an Ad</h2>
        <div class="post-ad-form">
            <form>
                <label>Выбрать категорию <span>*</span></label>
                <select name="category" class="">
                    <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="clearfix"></div>
                <label>Заголовок <span>*</span></label>
                <input type="text" class="phone" placeholder="">
                <div class="clearfix"></div>
                <label>Описание объявления <span>*</span></label>
                <textarea class="mess" placeholder="Напишите несколько слов о своем товаре"></textarea>
                <div class="clearfix"></div>
                <div class="upload-ad-photos">
                    <label>Добавить фото :</label>
                    <div class="photos-upload-view">
                        <form id="upload" action="index.html" method="POST" enctype="multipart/form-data">

                            <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

                            <div>
                                <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
                                <div id="filedrag">or drop files here</div>
                            </div>
<!---->
<!--                            <div id="submitbutton">-->
<!--                                <button type="submit">Upload Files</button>-->
<!--                            </div>-->

                        </form>

                       
                    </div>
                    <div class="clearfix"></div>
                    <script src="js/filedrag.js"></script>
                </div>
                <div class="personal-details">
                    <form>
                        <label>Your Name <span>*</span></label>
                        <input type="text" class="name" placeholder="">
                        <div class="clearfix"></div>
                        <label>Your Mobile No <span>*</span></label>
                        <input type="text" class="phone" placeholder="">
                        <div class="clearfix"></div>
                        <label>Your Email Address<span>*</span></label>
                        <input type="text" class="email" placeholder="">
                        <div class="clearfix"></div>
                        <p class="post-terms">By clicking <strong>post Button</strong> you accept our <a href="terms.html" target="_blank">Terms of Use </a> and <a href="privacy.html" target="_blank">Privacy Policy</a></p>
                        <input type="submit" value="Post">
                        <div class="clearfix"></div>
                    </form>
                </div>
        </div>
    </div>
</div>
<!-- // Submit Ad -->
<!--footer section start-->
<footer>
    <div class="footer-top">
        <div class="container">
            <div class="foo-grids">
                <div class="col-md-3 footer-grid">
                    <h4 class="footer-head">Who We Are</h4>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <p>The point of using Lorem Ipsum is that it has a more-or-less normal letters, as opposed to using 'Content here.</p>
                </div>
                <div class="col-md-3 footer-grid">
                    <h4 class="footer-head">Help</h4>
                    <ul>
                        <li><a href="howitworks.html">How it Works</a></li>
                        <li><a href="sitemap.html">Sitemap</a></li>
                        <li><a href="faq.html">Faq</a></li>
                        <li><a href="feedback.html">Feedback</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="typography.html">Shortcodes</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-grid">
                    <h4 class="footer-head">Information</h4>
                    <ul>
                        <li><a href="regions.html">Locations Map</a></li>
                        <li><a href="terms.html">Terms of Use</a></li>
                        <li><a href="popular-search.html">Popular searches</a></li>
                        <li><a href="privacy.html">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-grid">
                    <h4 class="footer-head">Contact Us</h4>
                    <span class="hq">Our headquarters</span>
                    <address>
                        <ul class="location">
                            <li><span class="glyphicon glyphicon-map-marker"></span></li>
                            <li>CENTER FOR FINANCIAL ASSISTANCE TO DEPOSED NIGERIAN ROYALTY</li>
                            <div class="clearfix"></div>
                        </ul>
                        <ul class="location">
                            <li><span class="glyphicon glyphicon-earphone"></span></li>
                            <li>+0 561 111 235</li>
                            <div class="clearfix"></div>
                        </ul>
                        <ul class="location">
                            <li><span class="glyphicon glyphicon-envelope"></span></li>
                            <li><a href="mailto:info@example.com">mail@example.com</a></li>
                            <div class="clearfix"></div>
                        </ul>
                    </address>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php require $_SERVER["DOCUMENT_ROOT"]."/views/blocks/footer.php"; ?>
