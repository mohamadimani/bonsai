<?php
$get_single_demo = $data["get_single_demo"];
$similar_demo = $data["similar_demo"];
?>

<style>

    .demo_img_frame {
        box-shadow: 1px 1px 5px 1px #919191;
        border-radius: 5px;
        overflow: hidden;
    }

</style>

<div class="blog-main section-pading">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="item-image-sample demo_img_frame">
                    <img src="<?= SITE_URL ?>public/images/demo/<?= $get_single_demo['img_name'] ?>"
                         class="img-responsive demo_img" alt="بامبو وب">
                </div>
            </div><!-- end detail-single-->
            <div class="col-xs-12 col-md-6">
                <div class="box_style6">
                    <div class="title_style5">
                        <p class="title">
                            <span class="mark1">مشخصات وب سایت</span>
                        </p>
                    </div>
                    <div class="object_static">
                        <ul class="step1">
                            <li class="item"><p class="name">نام وب سایت : </p>
                                <p class="val"><?= $get_single_demo['title'] ?></p>
                            </li>
                            <li class="item"><p class="name"> آدرس وب سایت : </p>
                                <p class="val"><?= $get_single_demo['link'] ?></p>
                            </li>
                            <li class="item"><p class="name"> نوع وب سایت : </p>
                                <p class="val"><?= $get_single_demo['cat_title'] ?></p>
                            </li>
                            <li class="item"><p class="name"> تعداد بازدید : </p>
                                <p class="val"><?= $get_single_demo['view_count'] ?></p>
                            </li>
                        </ul>
                    </div>
                    <a href="<?= $get_single_demo['link'] ?>" target="_blank" title="مشاهده سایت"
                       class="btn_style1 type1">مشاهده
                        سایت </a>
                </div>
            </div><!-- end image single-->
        </div><!-- end row -->
        <br>
        <br>

        <div class="row pro_style1">
            <h2>نمونه کارهای مرتبط</h2>
            <p class="text">نمونه کارهای دیگر ما را هم در این گروه مشاهده کنید .</p>
            <div class="col-xs-12 col-md-12">
                <?php
                foreach ($similar_demo as $single_demo) {
                    ?>
                    <div class="item">
                        <a href="<?= SITE_URL ?>web_demo/single/<?= $single_demo['id'] ?>"
                           title=" سیستم مدیریت هوشمند آموزشگاه های زبان آیتاک" class="cover">
                                <span class="pic"
                                      style="background-image:url('<?= SITE_URL ?>public/images/demo/<?= $single_demo['img_name'] ?>')"
                                      title="سیستم مدیریت هوشمند آموزشگاه های زبان آیتاک"></span>

                            <div class="bg"></div>
                            <p class="name"><span class="inner_name"><?= $single_demo['title'] ?></span>
                            </p>
                            <span class="foot_name"><?= $single_demo['title'] ?></span>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <!--        end sample-->
        </div>

    </div>
</div><!-- end main-contact -->

<script>

    seen_post(<?= $get_single_demo["id"] ?>);
    function seen_post(demo_id) {
        var url = "<?= SITE_URL ?>web_demo/seen_demo";
        var data = {'demo_id': demo_id};
        $.post(url, data, function (msg) {
        })
    }

</script>