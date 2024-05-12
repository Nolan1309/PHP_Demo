<?php
$ad = new admin();
$doanhThu = $ad->DoanhThu();
$formatted_sum = number_format($doanhThu, 0, ',', '.');

$soluongtonkho = $ad->SoLuongTonKho();
$soluongdonhang_chuaduyet = $ad->TongDonHangChuaXacNhan();
$doanhthu_ngay = $ad->DoanhThuNgay();
$formatted_doanhthu_ngay = number_format($doanhthu_ngay, 0, ',', '.');


$orderList_ordernew = $ad->GetKhachHangOrder();



?>
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Dashboard</span></h3>
            </div>
        </div><!-- Page Heading End -->
        <!-- Page Button Group Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-date-range">
                <input type="text" class="form-control input-date-predefined">
            </div>
        </div><!-- Page Button Group End -->
    </div>
    <!-- Page Headings End -->

    <!-- Top Report Wrap Start -->
    <div class="row">
        <!-- Top Report Start -->
        <div class="col-xlg-3 col-md-6 col-12 mb-30">
            <div class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Tổng Doanh thu</h4>
                    <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                </div>

                <!-- Content -->
                <div class="content">
                    <!-- <h5>Todays</h5> -->
                    <h2><?php echo $formatted_sum; ?> đ</h2>
                </div>

                <!-- Footer -->
                <!-- <div class="footer">
                            <div class="progess">
                                <div class="progess-bar" style="width: 92%;"></div>
                            </div>
                            <p>92% of unique visitor</p>
                        </div> -->

            </div>
        </div><!-- Top Report End -->
        <!-- Top Report Start -->
        <div class="col-xlg-3 col-md-6 col-12 mb-30">
            <div class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Số lượng tồn</h4>
                    <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                </div>

                <!-- Content -->
                <div class="content">
                    <!-- <h5>Todays</h5> -->
                    <h2><?php echo $soluongtonkho; ?></h2>
                </div>

                <!-- Footer -->
                <!-- <div class="footer">
                            <div class="progess">
                                <div class="progess-bar" style="width: 98%;"></div>
                            </div>
                            <p>98% of unique visitor</p>
                        </div> -->

            </div>
        </div><!-- Top Report End -->
        <!-- Top Report Start -->
        <div class="col-xlg-3 col-md-6 col-12 mb-30">
            <div class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Đơn hàng chưa duyệt</h4>
                    <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                </div>

                <!-- Content -->
                <div class="content">
                    <!-- <h5>Todays</h5> -->
                    <h2><?php echo $soluongdonhang_chuaduyet; ?></h2>
                </div>

                <!-- Footer -->
                <!-- <div class="footer">
                            <div class="progess">
                                <div class="progess-bar" style="width: 88%;"></div>
                            </div>
                            <p>88% of unique visitor</p>
                        </div> -->

            </div>
        </div><!-- Top Report End -->
        <!-- Top Report Start -->
        <div class="col-xlg-3 col-md-6 col-12 mb-30">
            <div class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Doanh thu hôm nay</h4>
                    <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                </div>

                <!-- Content -->
                <div class="content">
                    <!-- <h5>Todays</h5> -->
                    <h2><?php echo $formatted_doanhthu_ngay; ?> đ</h2>
                </div>

                <!-- Footer -->
                <!-- <div class="footer">
                            <div class="progess">
                                <div class="progess-bar" style="width: 76%;"></div>
                            </div>
                            <p>76% of unique visitor</p>
                        </div> -->

            </div>
        </div><!-- Top Report End -->
    </div>
    <!-- Top Report Wrap End -->

    <div class="row mbn-30">
        <!-- Revenue Statistics Chart Start -->
        <!-- <div class="col-md-8 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Revenue Statistics</h4>
                        </div>
                        <div class="box-body">
                            <div class="chart-legends-1 row">
                                <div class="chart-legend-1 col-12 col-sm-4">
                                    <h5 class="title">Total Sale</h5>
                                    <h3 class="value text-secondary">$5000,000</h3>
                                </div>
                                <div class="chart-legend-1 col-12 col-sm-4">
                                    <h5 class="title">Total View</h5>
                                    <h3 class="value text-primary">10000,000</h3>
                                </div>
                                <div class="chart-legend-1 col-12 col-sm-4">
                                    <h5 class="title">Total Support</h5>
                                    <h3 class="value text-warning">100,000</h3>
                                </div>
                            </div>
                            <div class="chartjs-revenue-statistics-chart">
                                <canvas id="chartjs-revenue-statistics-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>Revenue Statistics Chart End -->
        <!-- Market Trends Chart Start -->
        <!-- <div class="col-md-4 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Market Trends</h4>
                        </div>
                        <div class="box-body">
                            <div class="chartjs-market-trends-chart">
                                <canvas id="chartjs-market-trends-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>Market Trends Chart End -->
        <!-- Recent Transaction Start -->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title">Đơn hàng gần đây</h4>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-vertical-middle table-selectable">

                            <!-- Table Head Start -->
                            <thead>
                                <tr>
                                    <!-- <th class="selector"><label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label></th> -->
                                    <!--<th class="selector h5"><button class="button-check"></button></th>-->
                                    <th><span>ID</span></th>
                                    <th><span>Tên khách hàng</span></th>
                                  
                                    <th><span>Số lượng</span></th>
                                    <th><span>Giá</span></th>
                                    <th><span>Trạng thái</span></th>
                                    <th></th>
                                </tr>
                            </thead><!-- Table Head End -->

                            <!-- Table Body Start -->
                            <tbody>
                                <?php
                                foreach ($orderList_ordernew as $item) {
                                    $formatted_TongTien = number_format($item["TongTienDonHang"], 0, ',', '.');
                                ?>
                                    <tr>
                                        <!-- <td class="selector"><label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label></td> -->
                                        <td>#<?php echo $item["idDonHang"]; ?></td>
                                        <td><a href="#"><?php echo $item["TenKH"]; ?></a></td>
                                        <td><?php echo $item["SoLuongSanPham"]; ?></td>
                                        <td><?php echo $formatted_TongTien;  ?> đ</td>
                                     
                                        <td><span class="badge badge-danger"><?php echo $item["TrangThai"]; ?></span></td>
                                        <td><a class="h3" href="#"><i class="zmdi zmdi-more"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody><!-- Table Body End -->

                        </table>
                    </div>
                </div>
            </div>
        </div><!-- Recent Transaction End -->
        <!-- Daily Sale Report Start -->
        <!-- <div class="col-xlg-4 col-lg-6 col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Daily Sale Report</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table daily-sale-report">

                                    Table Head Start -->
        <!-- <thead>
                                        <tr>
                                            <th>Client</th>
                                            <th>Detail</th>
                                            <th>Payment</th>
                                        </tr>
                                    </thead>Table Head End -->

        <!-- Table Body Start -->
        <!-- <tbody>
                                        <tr>
                                            <td class="fw-600">Alexander</td>
                                            <td>
                                                <p>Sed do eiusmod tempor <br>incididunt ut labore.</p>
                                            </td>
                                            <td><span class="text-success d-flex justify-content-between fw-600">$500.00<span class="tippy" data-tippy-content="Sed do eiusmod tempor <br/> incididunt ut labore."><i class="zmdi zmdi-info-outline"></i></span></span></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-600">Linda</td>
                                            <td>
                                                <p>Sed do eiusmod tempor <br>incididunt ut labore.</p>
                                            </td>
                                            <td><span class="text-success d-flex justify-content-between fw-600">$20.00<span class="tippy" data-tippy-content="Sed do eiusmod tempor <br/> incididunt ut labore."><i class="zmdi zmdi-info-outline"></i></span></span></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-600">Patrick</td>
                                            <td>
                                                <p>Sed do eiusmod tempor <br>incididunt ut labore.</p>
                                            </td>
                                            <td><span class="text-danger d-flex justify-content-between fw-600">$120.00<span class="tippy" data-tippy-content="Sed do eiusmod tempor <br/> incididunt ut labore."><i class="zmdi zmdi-info-outline"></i></span></span></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-600">Jose</td>
                                            <td>
                                                <p>Sed do eiusmod tempor <br>incididunt ut labore.</p>
                                            </td>
                                            <td><span class="text-success d-flex justify-content-between fw-600">$1750.00<span class="tippy" data-tippy-content="Sed do eiusmod tempor <br/> incididunt ut labore."><i class="zmdi zmdi-info-outline"></i></span></span></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-600">Amber</td>
                                            <td>
                                                <p>Sed do eiusmod tempor <br>incididunt ut labore.</p>
                                            </td>
                                            <td><span class="text-warning d-flex justify-content-between fw-600">$165.00<span class="tippy" data-tippy-content="Sed do eiusmod tempor <br/> incididunt ut labore."><i class="zmdi zmdi-info-outline"></i></span></span></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-600">Linda</td>
                                            <td>
                                                <p>Sed do eiusmod tempor <br>incididunt ut labore.</p>
                                            </td>
                                            <td><span class="text-success d-flex justify-content-between fw-600">$20.00<span class="tippy" data-tippy-content="Sed do eiusmod tempor <br/> incididunt ut labore."><i class="zmdi zmdi-info-outline"></i></span></span></td>
                                        </tr>
                                    </tbody>Table Body End -->

        <!-- </table>
                            </div>
                        </div>
                    </div>
                </div>Daily Sale Report End -->
        <!-- Chat Start -->
        <!-- <div class="col-xlg-4 col-lg-6 col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Recent Chats</h4>
                        </div>
                        <div class="box-body">

                            <div class="widget-chat-wrap custom-scroll">
                                <ul class="widget-chat-list">
                                    <li>
                                        <div class="widget-chat">
                                            <div class="head">
                                                <h5>Rebecca Mitchell</h5>
                                                <span>Yesterday 05.30 am</span>
                                                <a href="#"><i class="zmdi zmdi-replay"></i></a>
                                            </div>
                                            <div class="body">
                                                <div class="image"><img src="assets/images/comment/comment-1.jpg" alt=""></div>
                                                <div class="content">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="widget-chat">
                                            <div class="head">
                                                <h5>Jennifer White</h5>
                                                <span>Today 06.30 am</span>
                                                <a href="#"><i class="zmdi zmdi-replay"></i></a>
                                            </div>
                                            <div class="body">
                                                <div class="image"><img src="assets/images/comment/comment-2.jpg" alt=""></div>
                                                <div class="content">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="widget-chat">
                                            <div class="head">
                                                <h5>Roger Welch</h5>
                                                <span>Today 06.31 am</span>
                                                <a href="#"><i class="zmdi zmdi-replay"></i></a>
                                            </div>
                                            <div class="body">
                                                <div class="image"><img src="assets/images/comment/comment-3.jpg" alt=""></div>
                                                <div class="content">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="widget-chat">
                                            <div class="head">
                                                <h5>Rebecca Mitchell</h5>
                                                <span>Yesterday 05.30 am</span>
                                                <a href="#"><i class="zmdi zmdi-replay"></i></a>
                                            </div>
                                            <div class="body">
                                                <div class="image"><img src="assets/images/comment/comment-1.jpg" alt=""></div>
                                                <div class="content">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="widget-chat">
                                            <div class="head">
                                                <h5>Jennifer White</h5>
                                                <span>Today 06.30 am</span>
                                                <a href="#"><i class="zmdi zmdi-replay"></i></a>
                                            </div>
                                            <div class="body">
                                                <div class="image"><img src="assets/images/comment/comment-2.jpg" alt=""></div>
                                                <div class="content">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="widget-chat">
                                            <div class="head">
                                                <h5>Roger Welch</h5>
                                                <span>Today 06.31 am</span>
                                                <a href="#"><i class="zmdi zmdi-replay"></i></a>
                                            </div>
                                            <div class="body">
                                                <div class="image"><img src="assets/images/comment/comment-3.jpg" alt=""></div>
                                                <div class="content">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="widget-chat-submission">
                                <form action="#">
                                    <input type="text" placeholder="Type something">
                                    <div class="buttons">
                                        <label class="file-upload button button-sm button-box button-round button-primary" for="chat-file-upload">
                                            <input type="file" id="chat-file-upload" multiple>
                                            <i class="zmdi zmdi-attachment-alt"></i>
                                        </label>
                                        <button class="submit button button-sm button-box button-round button-primary"><i class="zmdi zmdi-mail-send"></i></button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>       
            </div>  -->

    </div>
    <!-- Content Body End -->