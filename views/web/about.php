<?php
$site_about = $data["site_about"];
$team_gallery = $data["team_gallery"];

?>


<!-- hi, we are brave-->
<section class="section section-lg bg-default">
    <!-- section wave-->
    <div class="section-wave">
        <svg x="0px" y="0px" width="1920px" height="46px" viewbox="0 0 1920 46" preserveAspectRatio="none">
            <path d="M1920,0.5c-82.8,0-109.1,44-192.3,44c-78.8,0-116.2-44-191.7-44c-77.1,0-115.9,44-192,44c-78.2,0-114.6-44-192-44c-78.4,0-115.3,44-192,44c-76.9-0.1-119-44-192-44c-77,0-115.2,44-192,44c-73.6,0-114-44-190.9-44c-78.5,0-117.2,44-194.1,44c-75.9,0-113-44-191-44V46h1920V0.5z"></path>
        </svg>
    </div>
    <div class="container container-bigger">
        <div class="row row-ten row-50 justify-content-md-center align-items-lg-center justify-content-xl-between flex-lg-row-reverse">
            <div class="col-md-9 col-lg-6  ">
                <h3><?php print_r($site_about["title"]) ?></h3>
                <div class="divider divider-default"></div>
                <?php print_r($site_about["contect"]) ?>

            </div>
            <div class="col-md-9 col-lg-4"><img
                        src="<?= SITE_URL ?>public/posts/<?= $site_about["id"] ?>/<?= $site_about["img_name"] ?>" alt=""
                        width="720"
                        height="459"/>
            </div>
        </div>
    </div>
</section>


