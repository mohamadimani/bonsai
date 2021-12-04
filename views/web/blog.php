<?php
$blogs = $data["blog"];
?>


<!-- Blog-->
<section class="section section-xl bg-gray-lighter">
    <!-- section wave-->
    <div class="section-wave">
        <svg x="0px" y="0px" width="1920px" height="46px" viewbox="0 0 1920 46" preserveAspectRatio="none">
            <path d="M1920,0.5c-82.8,0-109.1,44-192.3,44c-78.8,0-116.2-44-191.7-44c-77.1,0-115.9,44-192,44c-78.2,0-114.6-44-192-44c-78.4,0-115.3,44-192,44c-76.9-0.1-119-44-192-44c-77,0-115.2,44-192,44c-73.6,0-114-44-190.9-44c-78.5,0-117.2,44-194.1,44c-75.9,0-113-44-191-44V46h1920V0.5z"></path>
        </svg>
    </div>
    <div class="container container-bigger">
        <div class="row row-ten row-50 row-md-90 justify-content-md-center justify-content-xl-between">
            <div class="col-md-12 col-lg-12 col-xl-12 text-center">
                <div class="row row-30">
                    <?php
                    foreach ($blogs as $blog) {
                        ?>
                        <div class="col-md-4">
                            <article class="post-blog"><a class="post-blog-image" href="<?= SITE_URL ?>single/index/<?= $blog["id"] ?>">
                                    <img src="<?= SITE_URL ?>public/posts/<?= $blog['id'] . '/' . $blog['img_name'] ?>"
                                         alt="<?= $blog["title"] ?>" style="height: 300px;"/></a>
                                <div class="post-blog-caption">
                                    <div class="post-blog-caption-header">
                                        <ul class="post-blog-tags">
                                            <li><a class="button-tags"
                                                   href="<?= SITE_URL ?>single/index/<?= $blog["id"] ?>"><?= $blog["cat_name"] ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="post-blog-caption-body">
                                        <h5><a class="post-blog-title"
                                               href="<?= SITE_URL ?>single/index/<?= $blog["id"] ?>"> <?= $blog["title"] ?></a>
                                        </h5>
                                    </div>
                                    <div class="post-blog-caption-footer">
                                        <time datetime="2019"><?= $blog["new_date"] ?></time>
                                        <a class="post-comment"
                                           href="<?= SITE_URL ?>single/index/<?= $blog["id"] ?>"><span
                                                    class="icon icon-md-middle icon-gray-1 mdi mdi-eye"></span><span><?= $blog["view_count"] ?></span></a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <?php
                    } ?>
                </div>

            </div>
        </div>
    </div>
</section>
