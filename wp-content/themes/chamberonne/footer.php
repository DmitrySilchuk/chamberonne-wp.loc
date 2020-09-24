<footer class="footer">
    <div class="wrap">
        <?php
        $footer = get_field('footer', 'option');
        if (!empty($footer)) {?>
            <div class="flex">
                <a href="<?= home_url() ?>" class="logo">
                    <img src="<?= $footer['logo']['url'] ?>" alt="" class="white">
                </a>
                <div class="footer-info">
                    <strong><?= $footer['title'] ?></strong>
                    <span><?= $footer['postcode'] ?></span>
                    <span><?= $footer['city'] ?></span>
                </div>
                <div class="copyright">
                    <p><?= $footer['copyright'] ?></p>
                </div>
            </div>
            <?php
        } ?>
    </div>
</footer>

<div class="modal modal-contacts" id="modal-contacts" style="display: none;">
    <div class="content-modal  modal-contacts-content" id="modal-contacts-wrap" style="display: none;">
        <span class="close"><img src="img/icons/close.svg" alt=""></span>
        <form action="">
            <div class="title">
                <h4>Contacts</h4>
            </div>
            <div class="row">
                <div class="input">
                    <input type="text" placeholder="Your name">
                </div>
                <div class="input">
                    <input type="text" placeholder="Your message">
                </div>
            </div>
            <div class="row">
                <div class="input">
                    <input type="text" placeholder="Your mail">
                </div>
                <div class="block-btn">
                    <button type="" class="fom-button">Send message</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div> <!--.wrapper-->

<?php wp_footer(); ?>

</body>
</html>