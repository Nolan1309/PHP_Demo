<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Adomx - Responsive Bootstrap 4 Admin Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/vendor/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/themify-icons.css">
    <link rel="stylesheet" href="assets/css/vendor/cryptocurrency-icons.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins/plugins.css">

    <!-- Helper CSS -->
    <link rel="stylesheet" href="assets/css/helper.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Custom Style CSS Only For Demo Purpose -->
    <link id="cus-style" rel="stylesheet" href="assets/css/style-primary.css">

</head>

<body>

    <div class="main-wrapper">


    <?php
        include 'interface-layout/header.php';
        include 'interface-layout/menu.php';
        ?>

        <!-- Content Body Start -->
        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>App <span>/ Mail</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <!--Mail Wrapper Start-->
            <div class="mail-wrapper">

                <!--Mail Menu Start-->
                <div class="mail-menu">
                    <button class="button-compose-mail button button-danger button-round" data-bs-toggle="modal" data-bs-target="#modal-compose-mail">Compose Mail</button>
                    <ul>
                        <li><a href="#"><i class="zmdi zmdi-email-open"></i> Inbox</a></li>
                        <li><a href="#"><i class="zmdi zmdi-mail-send"></i> Send</a></li>
                        <li><a href="#"><i class="zmdi zmdi-file"></i> Draft</a></li>
                        <li><a href="#"><i class="zmdi zmdi-cloud-done"></i> Outbox</a></li>
                        <li><a href="#"><i class="zmdi zmdi-star"></i> Stared</a></li>
                        <li><a href="#"><i class="zmdi zmdi-comments"></i> Chats</a></li>
                        <li><a href="#"><i class="zmdi zmdi-block"></i> Spam</a></li>
                        <li><a href="#"><i class="zmdi zmdi-delete"></i> Trash</a></li>
                        <li><a href="#"><i class="zmdi zmdi-plus-circle"></i> Creat New</a></li>
                    </ul>
                </div>
                <!--Mail Menu End-->

                <!--Mail List Container Start-->
                <div class="mail-container">

                    <!--Mail Options Start-->
                    <div class="mail-options">

                        <div class="mail-options-group">
                            <div class="adomx-dropdown">
                                <button class="mail-button-filter toggle"><i class="zmdi zmdi-filter-list"></i></button>
                                <ul class="adomx-dropdown-menu">
                                    <li><a href="#">All</a></li>
                                    <li><a href="#">None</a></li>
                                    <li><a href="#">Read</a></li>
                                    <li><a href="#">Unread</a></li>
                                    <li><a href="#">Starred</a></li>
                                    <li><a href="#">Unstarred</a></li>
                                </ul>
                            </div>
                            <button class="mail-button-reply"><i class="zmdi zmdi-mail-reply"></i></button>
                            <button class="mail-button-refresh"><i class="zmdi zmdi-replay"></i></button>
                        </div>

                        <div class="mail-options-group">
                            <button class="mail-button-starred"><i class="zmdi zmdi-star-outline"></i></button>
                            <button class="mail-button-archive"><i class="zmdi zmdi-archive"></i></button>
                            <div class="adomx-dropdown">
                                <button class="mail-button-category toggle"><i class="zmdi zmdi-folder"></i></button>
                                <ul class="adomx-dropdown-menu">
                                    <li><span>Move to:</span></li>
                                    <li>
                                        <hr>
                                    </li>
                                    <li class="checked"><a href="#"><i class="check"></i> Forwarded</a></li>
                                    <li><a href="#"><i class="check"></i> Replied</a></li>
                                    <li><a href="#"><i class="check"></i> Social</a></li>
                                    <li><a href="#"><i class="check"></i> Forums</a></li>
                                    <li><a href="#"><i class="check"></i> Promotions</a></li>
                                    <li>
                                        <hr>
                                    </li>
                                    <li><a href="#">Spam</a></li>
                                    <li><a href="#">Trash</a></li>
                                    <li>
                                        <hr>
                                    </li>
                                    <li><a href="#">Create New</a></li>
                                    <li><a href="#">Manage Folder</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="mail-options-group">
                            <button class="mail-button-delete"><i class="zmdi zmdi-delete"></i></button>
                            <div class="adomx-dropdown">
                                <button class="mail-button-snooze toggle"><i class="zmdi zmdi-alarm-snooze"></i></button>
                                <ul class="adomx-dropdown-menu">
                                    <li><span>Snooze ultil..</span></li>
                                    <li class="checked"><a href="#">Later today <span class="ml-auto">6:00 PM</span></a></li>
                                    <li class="checked"><a href="#">Tomorrow <span class="ml-auto">8:00 AM</span></a></li>
                                    <li class="checked"><a href="#">Next week <span class="ml-auto">8:00 AM</span></a></li>
                                    <li class="checked"><a href="#">Next weekend <span class="ml-auto">8:00 AM</span></a></li>
                                    <li>
                                        <hr>
                                    </li>
                                    <li><a href="#"><i class="zmdi zmdi-calendar"></i> Pick date & time</a></li>
                                </ul>
                            </div>
                            <div class="adomx-dropdown">
                                <button class="mail-button-label toggle"><i class="zmdi zmdi-label"></i></button>
                                <ul class="adomx-dropdown-menu">
                                    <li><span>Label as:</span></li>
                                    <li>
                                        <hr>
                                    </li>
                                    <li class="checked"><a href="#"><i class="check"></i> Forwarded</a></li>
                                    <li><a href="#"><i class="check"></i> Replied</a></li>
                                    <li><a href="#"><i class="check"></i> Social</a></li>
                                    <li><a href="#"><i class="check"></i> Forums</a></li>
                                    <li><a href="#"><i class="check"></i> Promotions</a></li>
                                    <li>
                                        <hr>
                                    </li>
                                    <li><a href="#">Create New</a></li>
                                    <li><a href="#">Manage Labels</a></li>
                                </ul>
                            </div>
                            <div class="adomx-dropdown">
                                <button class="mail-button-more toggle"><i class="zmdi zmdi-more-vert"></i></button>
                                <ul class="adomx-dropdown-menu adomx-dropdown-menu-right">
                                    <li><a href="#">Mark all as read</a></li>
                                    <li><a href="#">Mark as read</a></li>
                                    <li><a href="#">Mark as unread</a></li>
                                    <li><a href="#">Mark as inportant</a></li>
                                    <li><a href="#">Mark as not inportant</a></li>
                                    <li><a href="#">Add to Tasks</a></li>
                                    <li><a href="#">Add Star</a></li>
                                    <li><a href="#">Filter messages like these</a></li>
                                    <li><a href="#">Mute</a></li>
                                </ul>
                            </div>
                        </div>


                    </div>
                    <!--Mail Options End-->

                    <!--Mail List Start-->
                    <div class="mail-list">

                        <!--Mail Start-->
                        <div class="mail">

                            <div class="left">
                                <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                <button class="mail-button-starred"><i class="zmdi zmdi-star-outline"></i></button>
                            </div>

                            <div class="middle">

                                <div class="top">
                                    <h4 class="name"><a href="single-mail.php">Adrien Morel</a></h4>
                                    <span class="date">/  13 May 2022</span>
                                </div>

                                <div class="body">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                </div>

                                <div class="bottom">
                                    <span class="badge badge-outline badge-primary">Design</span>
                                    <span class="badge badge-outline badge-primary">Element</span>
                                </div>

                            </div>

                            <div class="right">
                                <button class="mail-button-delete"><i class="zmdi zmdi-delete"></i></button>
                                <div class="adomx-dropdown">
                                    <button class="mail-button-option toggle"><i class="zmdi zmdi-more-vert"></i></button>
                                    <ul class="adomx-dropdown-menu adomx-dropdown-menu-right">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another Action</a></li>
                                        <li><a href="#">Something else</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!--Mail End-->

                        <!--Mail Start-->
                        <div class="mail">

                            <div class="left">
                                <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                <button class="mail-button-starred"><i class="zmdi zmdi-star-outline"></i></button>
                            </div>

                            <div class="middle">

                                <div class="top">
                                    <h4 class="name"><a href="single-mail.php">Inger Strøm</a></h4>
                                    <span class="date">/  13 May 2022</span>
                                </div>

                                <div class="body">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                </div>

                                <div class="bottom">
                                    <span class="badge badge-outline badge-primary">Design</span>
                                    <span class="badge badge-outline badge-primary">Element</span>
                                </div>

                            </div>

                            <div class="right">
                                <button class="mail-button-delete"><i class="zmdi zmdi-delete"></i></button>
                                <div class="adomx-dropdown">
                                    <button class="mail-button-option toggle"><i class="zmdi zmdi-more-vert"></i></button>
                                    <ul class="adomx-dropdown-menu adomx-dropdown-menu-right">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another Action</a></li>
                                        <li><a href="#">Something else</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!--Mail End-->

                        <!--Mail Start-->
                        <div class="mail">

                            <div class="left">
                                <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                <button class="mail-button-starred"><i class="zmdi zmdi-star-outline"></i></button>
                            </div>

                            <div class="middle">

                                <div class="top">
                                    <h4 class="name"><a href="single-mail.php">Stefan Koller</a></h4>
                                    <span class="date">/  13 May 2022</span>
                                </div>

                                <div class="body">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                </div>

                                <div class="bottom">
                                    <span class="badge badge-outline badge-primary">Design</span>
                                    <span class="badge badge-outline badge-primary">Element</span>
                                </div>

                            </div>

                            <div class="right">
                                <button class="mail-button-delete"><i class="zmdi zmdi-delete"></i></button>
                                <div class="adomx-dropdown">
                                    <button class="mail-button-option toggle"><i class="zmdi zmdi-more-vert"></i></button>
                                    <ul class="adomx-dropdown-menu adomx-dropdown-menu-right">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another Action</a></li>
                                        <li><a href="#">Something else</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!--Mail End-->

                        <!--Mail Start-->
                        <div class="mail">

                            <div class="left">
                                <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                <button class="mail-button-starred"><i class="zmdi zmdi-star-outline"></i></button>
                            </div>

                            <div class="middle">

                                <div class="top">
                                    <h4 class="name"><a href="single-mail.php">Tor Aune</a></h4>
                                    <span class="date">/  13 May 2022</span>
                                </div>

                                <div class="body">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                </div>

                                <div class="bottom">
                                    <span class="badge badge-outline badge-primary">Design</span>
                                    <span class="badge badge-outline badge-primary">Element</span>
                                </div>

                            </div>

                            <div class="right">
                                <button class="mail-button-delete"><i class="zmdi zmdi-delete"></i></button>
                                <div class="adomx-dropdown">
                                    <button class="mail-button-option toggle"><i class="zmdi zmdi-more-vert"></i></button>
                                    <ul class="adomx-dropdown-menu adomx-dropdown-menu-right">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another Action</a></li>
                                        <li><a href="#">Something else</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!--Mail End-->

                        <!--Mail Start-->
                        <div class="mail">

                            <div class="left">
                                <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                <button class="mail-button-starred"><i class="zmdi zmdi-star-outline"></i></button>
                            </div>

                            <div class="middle">

                                <div class="top">
                                    <h4 class="name"><a href="single-mail.php">Lucia Fedor</a></h4>
                                    <span class="date">/  13 May 2022</span>
                                </div>

                                <div class="body">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                </div>

                                <div class="bottom">
                                    <span class="badge badge-outline badge-primary">Design</span>
                                    <span class="badge badge-outline badge-primary">Element</span>
                                </div>

                            </div>

                            <div class="right">
                                <button class="mail-button-delete"><i class="zmdi zmdi-delete"></i></button>
                                <div class="adomx-dropdown">
                                    <button class="mail-button-option toggle"><i class="zmdi zmdi-more-vert"></i></button>
                                    <ul class="adomx-dropdown-menu adomx-dropdown-menu-right">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another Action</a></li>
                                        <li><a href="#">Something else</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!--Mail End-->

                    </div>
                    <!--Mail List End-->

                </div>
                <!--Mail List Container End-->

            </div>
            <!--Mail Wrapper Start-->

            <!-- Modal -->
            <div class="compose-mail-modal modal fade" id="modal-compose-mail">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">New Message</h5>
                            <button type="button" class="close" data-dismiss="modal"><i class="zmdi zmdi-close"></i></button>
                        </div>

                        <div class="form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-12 mb-30">
                                        <input class="form-control" type="email" placeholder="To">
                                    </div>
                                    <div class="col-12 mb-30">
                                        <input class="form-control" type="email" placeholder="Bcc">
                                    </div>
                                    <div class="col-12 mb-30">
                                        <textarea class="summernote"></textarea>
                                    </div>
                                    <div class="buttons-group col-12">
                                        <button type="button" class="button button-outline button-round button-warning"><i class="zmdi zmdi-attachment-alt"></i> Attach File</button>
                                        <button type="button" class="button button-outline button-round button-info">Save to Draft</button>
                                        <button type="button" class="button button-round button-primary">Send Mail</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div><!-- Content Body End -->

        <?php            
            include 'interface-layout/footer.php';
        ?>

    </div>

    <!-- JS
============================================ -->

    <!-- Global Vendor, plugins & Activation JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <!--Plugins JS-->
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/tippy4.min.js.js"></script>
    <!--Main JS-->
    <script src="assets/js/main.js"></script>

    <!-- Plugins & Activation JS For Only This Page -->
    <script src="assets/js/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="assets/js/plugins/summernote/summernote.active.js"></script>

</body>

</html>