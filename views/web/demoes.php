<?php
$demo_sub_category = $data["demo_sub_category"];
$projects = $data["projects"];


?>

<!-------------------------------web site ----------------------------------------->
<style>
    h1 {
        text-align: center;
        margin: 50px 0;
        position: relative;
    }

    h1:after {
        background: #45CAD6;
        bottom: -10px;
        content: "";
        height: 1px;
        left: 0;
        position: absolute;
        width: 100px;
        display: flex;
        justify-content: center;
        margin: 0 auto;
        right: 0;
        top:50px;
    }
    h1:before {
        background: #45CAD6;
        bottom: -10px;
        content: "";
        height: 1px;
        left: 0;
        position: absolute;
        width: 100px;
        display: flex;
        justify-content: center;
        margin: 0 auto;
        right: 0;
        top:47px;
    }
</style>

<div class="step-breadcump">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcump-text">
                    <ul>
                        <li><a>صفحه اصلی<span>/</span> </a></li>
                        <li class="active"><a>نمونه کارها</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!-- end breadcump -->
<div class="main-portfolio section-pading">
    <div class="container">
        <h1>نمونه کارهای بامبو وب</h1>
        <div class="row">
            <?php
            foreach ($demo_sub_category as $category) { ?>
                <div class="col-xs-12 col-sm-6 col-md-3 prt">
                    <div class="main-item">
                        <a href="<?= SITE_URL ?>web_demo/single/<?= $category['id'] ?>">
                            <div class="img-bg">
                                <img src="<?= SITE_URL . 'public/images/demo/' . $category['img_name'] ?>"
                                     alt="بامبو وب">
                                <div class="title">
                                    <span><?= $category["cat_title"] ?></span>
                                </div>
                            </div>
                            <div class="text-cover disno">
                                <p><a><?= $category["title"] ?></a></p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>

        </div> <!-- end row -->
    </div>
</div><!-- end main-portfolio -->


<script>
    $('div.main-item').hover(function () {
        $(this).find('div.img-bg').animate({height: '170px'}, 300);
        $(this).find('div.text-cover').fadeIn(350);
        $(this).find('div.text-cover p').animate({right: '0px', display: 'block'});

    }, function () {
        $(this).find('div.img-bg').animate({height: '200px'}, 200);
        $(this).find('div.text-cover').fadeOut(200);
        $(this).find('div.text-cover p').animate({right: '100%', display: 'none'});
    })
</script>

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
