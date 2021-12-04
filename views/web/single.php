<?php
$single = $data["single"];
$last_blog = $data["last_blog"];
?>

<style>
    h4 * {
        text-align: justify;
        line-height: 30px;

    }

    .center {
        text-align: center;
    }

    .about_us_img {
        /*width:700px;*/
    }

    @media (min-width: 1200px) {
        h2, .heading-2 {
            font-size: 28px !important;
        }

        h3, .heading-3 {
            font-size: 28px !important;
        }
    }

    .post_text p{
        font-size: 16px!important;
    }
</style>

<div class="blog-main-single section-pading">
    <div class="container">
        <div class="row  mtb-30" style="margin: 5px 10px!important;">
            <div class="col-xs-12 col-md-9">
                <div class="step-single-blog">

                    <a><h1 class="main-section-heading text-center post_title"
                           style="color: #333333;font-size: 32px">
                            <?= $single["title"] ?></h1></a>
                    <div class=" center">
                        <img src="<?= SITE_URL ?>public/posts/<?= $single["id"] ?>/<?= $single["img_name"] ?>"
                             alt="بامبو وب" class="about_us_img  img-thumbnail">
                    </div>
                    <!-- end post image -->
                    <h4 class="post_text" style="font-size: 20px">
                        <?php print_r($single["contect"]) ?>
                    </h4>
                </div>

                <div class="eny_profile heading_space " style="padding: 0!important;">
                </div>
                <div class="eny_profile heading_space" style="padding: 0!important;">
                    <div class="profile_text">
                        <p class="darkcolor" style="float: right;margin-left: 20px;"><span>تاریخ انتشار :</span>
                            <span><?= $single["creat_date"] ?></span></p>
                        <p class="darkcolor"><span>تعداد بازدید  :</span> <span></span><?= $single["view_count"] ?>
                            <span style="margin:0 100px;">
                                <span>اشتراک گذاری در   : </span>
                                <a onclick="share_post(this)" style="margin: 0 10px;cursor: pointer;color: #58c1ff" target="_blank"
                                   class="fa fa-paper-plane"></a>
                            </span>
                        </p>
                    </div>
                </div>
                <br>
                <br>
            </div>
            <div class="col-xs-12 col-md-3">
                <h4>اخرین پست ها</h4>
                <ul class="list-marked list-marked-primary">
                    <?php
                    foreach ($last_blog as $news) { ?>
                        <li>
                            <h4 style="font-size: 20px!important;"><a
                                        href="<?= SITE_URL ?>single/index/<?= $news['id'] ?>"><?= $news["title"] ?></a>
                            </h4>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div><!-- end row -->
    </div>
</div><!-- end main-contact -->
</div><!-- end webideh -->

<script>
    seen_post(<?= $single["id"] ?>);
    function seen_post(post_id) {
        var url = "<?= SITE_URL ?>single/seen_post";
        var data = {'post_id': post_id};
        $.post(url, data, function (msg) {
        })
    }
    function share_post() {
        var post_title = $("h1.post_title").text();
        var post = $("h4.post_text").text();
        window.open('https://telegram.me/share/url?text=' + post_title + '&url=' + window.location.href)
    }

</script>
<!--href="https://telegram.me/share/url?url=--><? //= SITE_URL ?><!--single/index/--><? //= $single["id"] ?><!--&text=--><? //= $single["title"] ?><!--"-->
