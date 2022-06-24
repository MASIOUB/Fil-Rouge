<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="styles.css" />
        <title>Admin Dashboard</title>

        <style>
                :root {
                        --main-text-color: #009d63;
                        --second-text-color: #bbbec5;
                        --second-bg-color: #c1efde;
                }

                .second-text {
                        color: var(--second-text-color);
                }

                .secondary-bg {
                        background-color: var(--second-bg-color);
                }

                .rounded-full {
                        border-radius: 100%;
                }

                #wrapper {
                        overflow-x: hidden;
                        background-color: #f1f1f1;
                }

                #sidebar-wrapper {
                        min-height: 100vh;
                        margin-left: -15rem;
                        transition: margin 0.25s ease-out;
                }

                #sidebar-wrapper .list-group {
                        width: 15rem;
                }

                .page-content {
                        min-width: 100vw;
                }

                #menu-toggle {
                        cursor: pointer;
                }

                .list-group-item {
                        border: none;
                        padding: 20px 30px;
                }

                .list-group-item.active {
                        font-weight: bold;
                }

                .btn {
                        padding: 14px 22px;
                        transition: all 0.3s ease;
                }

                .btn-main {
                        background: #081f3e;
                        border-radius: 100px;
                        border: none;
                        font-weight: 600;
                        color: #fff;
                }

                @media (min-width: 768px) {
                        #sidebar-wrapper {
                                margin-left: 0;
                        }

                        .page-content {
                                min-width: 0;
                                width: 100%;
                        }

                        #wrapper.toggled #sidebar-wrapper {
                                margin-left: -15rem;
                        }
                }
        </style>

</head>

<body>
        <div class="d-flex" id="wrapper">
                <!-- Sidebar -->
                <div class="" id="sidebar-wrapper" style="background-color: #081f3e;">
                        <div class="sidebar-heading text-center py-4 text-white fs-4 fw-bold border-bottom"><span style="color: #077bd4;">Enjoy</span>Travel</div>
                        <div class="list-group list-group-flush my-3">
                                <a href="<?= createLink('admin') ?>" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                                <a href="<?= createLink('admin/user') ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user me-2"></i>Customers</a>
                                <a href="<?= createLink('admin/agency') ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-building me-2"></i>Agencies</a>
                                <a href="<?= createLink('admin/trip') ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-route me-2"></i>Packages</a>
                                <a href="<?= createLink('admin/booking') ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-check me-2"></i>Bookings</a>
                        </div>
                </div>
                <!-- /#sidebar-wrapper -->
                <!-- Page Content -->
                <div class="page-content">
                        <?php
                        require_once dirname(__DIR__) . "/admin/navbar.php";
                        ?>