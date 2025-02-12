<?php
session_start();
require "koneksi.php";

$sql = "SELECT * FROM profile_member";

// $rows = $koneksi->execute_query($sql, [])->fetch_all((MYSQLI_ASSOC));



// foreach ($rows as $row)
// {
//     echo "{$row['id']}: {$row['nama_barang']}\n";
// }  

// kode php lama
$rows = mysqli_query($koneksi, $sql);

//     $barang = [
//         [
//             "nama" => "Laptop",
//             "stok" => "6",
//             "status" => "Rusak"
//         ],
//         [
//             "nama" => "PC",
//             "stok" => "38",
//             "status" => "Baik"
//         ],
//         [
//             "nama" => "Printer",
//             "stok" => "1",
//             "status" => "Rusak"
//         ],
//     ];
// var_dump($barang);
// echo "<br>";
// echo "<br>";




?>













<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
       <style> 
             body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
            color: #333;
            }

            /* h1, h2 {
            text-align: center;
            color:rgb(0, 112, 239);
            }

            @keyframes fadeInSlide {
                0% {
                    opacity: 0;
                    transform: translateY(20px);
                }
                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
                }

                h3 {
                    text-align: center;
                font-size: 24px;
                color: #4a90e2;
                animation: fadeInSlide 1.5s ease-in-out;
                } */


            /* a {
            color: #4a90e2;
            text-decoration: none;
            font-size: 16px;
            transition: 0.5s;
            padding: 10px;
            margin-left:10% ;
            }

            a:hover {
                transition: 0.5s;
            background-color:  #4a90e2;
            width: 50px;
            color: whitesmoke;
            border-radius: 20%;
            } */

            /* table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            }

            th, td {
            border: 1px solid #dddddd;
            padding: 10px 15px;
            text-align: center;
            font-size: 14px;
            }

            th {
            background-color: #4a90e2;
            color: white;
            font-weight: bold;
            }

            tr:nth-child(even) {
            background-color: #f2f2f2;
            }

            tr:hover {
            background-color: #e8f4ff;
            } */

            /* button, .edit-link, .delete-link {
            display: inline-block;
            padding: 8px 12px;
            margin: 5px;
            font-size: 14px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            }

            button {
            background-color: #4a90e2;
            color: white;
            }

            button:hover {
            background-color: #357ab8;
            }

            .edit-link {
            background-color: #ff9800;
            color: white;
            text-decoration: none;
            }

            .edit-link:hover {
            background-color: #e68900;
            }

            .delete-link {
            background-color: #f44336;
            color: white;
            text-decoration: none;
            }

            .delete-link:hover {
            background-color: #d32f2f;
            } */

       </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="Checkup.php">Randomizer</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav"> 
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Profile member
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?= $_SESSION['Username'] ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Profile member</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                            <a class="tambah" href="tambah.php"> tambahkan data </a>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th> id member </th>
                                            <th> Nama </th>
                                            <th> umur akun </th>
                                            <th> tanggal masuk server </th>
                                            <th> Roles </th>
                                            <th> Tag Member </th>
                                            <th> status </th>
                                            <th> Atur </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                $no = 1; 
                // foreach ($barang as $item) {
                while ($item = mysqli_fetch_assoc($rows))
                {
            ?>

            <tr>
                <td> <?= $no; ?></td>
                <td> <?= $item["Nama"] ?></td>
                <td> <?= $item["Umur_akun"] ?></td>
                <td> <?= $item["Tanggal_masuk_server"] ?></td>
                <td> <?= $item["Roles"] ?></td>
                <td> <?= $item["Tag_member"] ?></td>
                <td> <?= $item["status"] ?></td>
                <td> 
                    <a href="Edit_barang.php?id=<?=$item['id_member']?>">  edit </a>
                    <a href="hapus_barang.php?id=<?=$item['id_member']?>" onclick="return confirm('Hapus data ini?')"> hapus </a>
                </td>
                <!-- <td> <a href="#"> edit </a> <a href="#">Hapus</a> </td> -->
            </tr>

            <?php

            $no += 1;
                }
            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
        <table>
            <thead>

            </thead>
            <tbody>
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>