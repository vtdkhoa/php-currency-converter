<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Tỷ giá các ngoại tệ">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Tỷ giá ngoại tệ</title>
</head>
<body>
    <div class="container-fluid bg-grey">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th colspan="5" style="text-align: center">
                                <h2>TỶ GIÁ NGOẠI TỆ</h2>
                            </th>
                        </tr>
                        <tr>
                            <th style='text-align: center'>Mã ngoại tệ</th>
                            <th style='text-align: center'>Tên ngoại tệ</th>
                            <th style='text-align: center'>Mua tiền mặt</th>
                            <th style='text-align: center'>Mua chuyển khoản</th>
                            <th style='text-align: center'>Bán</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include_once('view/getData.php'); ?>
                    </tbody>
                    <tfoot>
                        <?php
                            if($update_timer != '')
                            {
                                $update_timer = date_format(
                                    date_create($update_timer), 'H:i:s d-m-Y'
                                );
                                $update_timer = explode(' ', $update_timer);
                                $gio = $update_timer[0];
                                $ngay = $update_timer[1];
                        ?>
                        <tr>
                            <th colspan="5" style='text-align: center'>Tỷ giá được cập nhật lúc <?php echo $gio; ?> 
                            ngày <?php echo $ngay; ?>
                            </th>
                        </tr>
                        <?php
                            }
                        ?>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script src="js/app.js" type="text/javascript"></script>
</body>
</html>