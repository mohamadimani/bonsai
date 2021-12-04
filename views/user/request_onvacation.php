<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title"> درخواست مرخصی </h4>
                    <p class="text-muted page-title-alt"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-9">
                    <div class="card-box">
                        <?php
                        if (isset($_SESSION["add_request_onvacation"])) {
                            ?>
                            <div class="alert alert-<?= $_SESSION["add_request_onvacation"][0] ?> alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <a class="alert-link"> <?= $_SESSION["add_request_onvacation"][1] ?></a>
                            </div>
                        <?php }
                        unset($_SESSION["add_request_onvacation"]);
                        ?>

                        <form action="<?= SITE_URL ?>user_class/save_request_onvacation" method="post"
                              enctype="multipart/form-data">
                            <div class="m-t-20">
                                <h5><b>نام کلاس</b></h5>
                                <select required name="class_id" class="form-control" id="thresholdconfig"
                                        onchange="get_class_time(this)">
                                    <option value="">انتخاب کلاس</option>
                                    <?php foreach ($data['class_list'] as $class_list) { ?>
                                        <option value="<?= $class_list['class_id'] ?>"><?= $class_list['lang_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="m-t-20">
                                <h5><b> روز مرخصی</b></h5>
                                <select required name="vacation_day" class="form-control" id="vacation_day">

                                </select>
                            </div>
                            <div class="m-t-20">
                                <h5><b> علت درخواست</b></h5>
                                <textarea required name="reason" class="form-control"></textarea>
                            </div>
                            <div class="m-t-20">
                                <input type="submit" class="form-control btn btn-success" value="ثبت"/>
                            </div>
                        </form>

                        <table class="table table-hover mails m-0 table table-actions-bar m-t-20">
                            <thead>
                            <tr>
                                <th>نام زبان</th>
                                <th> روز مرخصی</th>
                                <th> ساعت مرخصی</th>
                                <th> وضعیت</th>
                                <th>علت درخواست</th>
                                <th>تاریخ درخواست</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($data['request_onvacation'] as $on_v) {
                                ?>
                                <tr class="active">
                                    <td>
                                        <span><?= $on_v["lang_name"] ?></span>
                                    </td>
                                    <td>
                                        <span><?= $on_v["persion_name"] ?></span>
                                    </td>
                                    <td>
                                        <span><?= $on_v["v_hour"] ?></span>
                                    </td>
                                    <td class="act_title"><?php if ($on_v['status'] == 'ACTIVE') {
                                            echo '<span style="color: #00c300"> تایید شده</span>';
                                        } elseif ($on_v['status'] == 'INACTIVE') {
                                            echo '<span style="color: #ff0e0e">  رد شده</span>';
                                        } elseif ($on_v['status'] == 'REQUEST') {
                                            echo '<span style="color: #45cad6">  درخواست شده</span>';
                                        } ?>
                                    </td>
                                    <td>
                                        <span><?= $on_v["reason"] ?></span>
                                    </td>
                                    <td>
                                        <span><?= $on_v["request_date"] ?></span>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div> <!-- content -->
    </div>

    <script>
        function get_class_time(item) {
            var class_id = $(item).val();
            $('select#vacation_day').html(' ');
            var url = '<?= SITE_URL ?>user_class/AJAX_class_time/' + class_id;
            var data = {};
            $.post(url, data, function (msg) {
                $.each(msg, function (index, value) {
                        var row = '<option   value="  ' + value['day'] + '/ ' + value['persion_name'] + ' /' + value['time'] + '">' + value['persion_name'] + '  ساعت  (' + value['time'] + ')</option>';
                        $('select#vacation_day').append(row);
                    }
                );
            }, 'json');
        }


    </script>