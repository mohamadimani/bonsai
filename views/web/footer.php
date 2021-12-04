<?php
/**
 * Created by PhpStorm.
 * User: mani
 * Date: 01/15/2019
 * Time: 04:07 PM
 */
?>


<!-- Page Footer-->
<!-- Footer Default-->
<footer class="section page-footer page-footer-default text-right bg-gray-darker">
    <div class="container-wide">
        <div class="row row-50 justify-content-sm-center">
            <div class="col-md-6 col-lg-4">
                <div class="inset-xxl">
                    <h3>درباره ما</h3>
                    <p class="text-spacing-sm"><?= $bout_us['contect'] ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-2">
                <h3>لینک های میانبر</h3>
                <ul class="list-marked list-marked-primary">
                    <?php foreach ($ecomm_menu as $menu) { ?>
                        <li>
                            <a href="<?= SITE_URL ?><?= $menu["link"] ?>">
                                <?= $menu["name"] ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3">
                <h3> آمار سایت </h3>
                <ul class="list-marked list-marked-primary">
                    <li><a href="javascript:void(0)"> <span>بازدید کننده امروز : </span>
                            <?= $site_views["today_views"]["all_seener"] ?></a></li>

                    <li><a href="javascript:void(0)"> <span>بازدید امروز : </span>
                            <span><?= $site_views["today_views"]["all_seen"] ?></span></a></li>
                    <li><a href="javascript:void(0)"><span>بازدید کننده کل : </span>
                            <span><?= $site_views["all_views"]["all_seener"] ?></span></a></li>

                    <li><a href="javascript:void(0)"> <span>بازدید کل : </span>
                            <span><?= $site_views["all_views"]["all_seen"] ?></span></a></li>

                </ul>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="footer1">
                    <h3> ما اینجاییم </h3>
                    <ul class="list-marked list-marked-primary">
                        <li><a href="javascript:void(0)">  <?= $site_options["address"] ?></a></li>
                        <li><a href="javascript:void(0)"> <?= $site_options["phone"] ?></a></li>
                        <li><a href="javascript:void(0)"> <?= $site_options["mobile"] ?></a></li>
                        <li><a href="javascript:void(0)"> <?= $site_options["email"] ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
 
    </div>
</footer>
</div>

<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"></div>
<!-- Javascript-->
</body>
</html>

<script src="<?= SITE_URL ?>public/web/js/core.min.js"></script>
<script src="<?= SITE_URL ?>public/web/js/script.js"></script>

<!-- Google Tag Manager -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P9FT69" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>
<script>
    (function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
        var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src = '../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-P9FT69');
</script><!-- End Google Tag Manager -->
<script>
    seen_page();
    function seen_page() {
        var url = "<?= SITE_URL ?>index/seen_page";
        var data = {'page_name': 'index'};
        $.post(url, data, function (msg) {
        })
    }
</script>

