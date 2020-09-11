<?php

include "config.php";
date_default_timezone_set("Asia/Jakarta");

session_start();
$data = $_SESSION['data'];

unset($_SESSION['__data']);
$_SESSION['__data'] = 'daftar_kartu'; // daftar_kartu = nama table

if (!$data) {
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="icon" href="images/favicon.ico" type="image/ico" /> -->

    <title>Kunci Jabatan Apps | Manajemen Kartu</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-lock"></i> <span>Kunci Jabatan!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Halo,</span>
                <h2><?php echo $data['username']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a>
                  </li>
                  <li><a href="manajemen_kartu.php"><i class="fa fa-edit"></i> Manajemen Kartu</a>
                  </li>
                  <li><a href="manajemen_administrator.php"><i class="fa fa-desktop"></i> Manajemen Administrator</a>
                  </li>
                  <li><a href="aktifitas_administrator.php"><i class="fa fa-history"></i> Aktifitas Administrator</a>
                  </li>
                  <li><a href="aktifitas_user.php"><i class="fa fa-history"></i> Aktifitas User</a>
                  </li>
                  <li><a href="logout.php"><i class="fa fa-arrow-left"></i> Sign out</a>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                <br /><br />
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <!-- <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count">2500</div>
              <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
              <div class="count">123.50</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
              <div class="count green">2,500</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count">4,567</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
              <div class="count">2,315</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
          </div> -->
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">
                <h2>Manajemen Kartu</h2>
                <div style="text-align: right;">
                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i></a>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomor ID</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Waktu</th>
                            <th>Keterangan</th>
                            <th>Kartu Dibuat Pada</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'helper_get.php'; ?>
                        <?php while($d = mysqli_fetch_array($__data)){ ?>
                        <tr>
                            <th scope="row"><?php echo $d['id']; ?></th>
                            <td><?php echo $d['no_id']; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['nama_jabatan']; ?></td>
                            <td><?php echo $d['waktu']; ?></td>
                            <td><?php echo $d['keterangan']; ?></td>
                            <td><?php echo $d['dibuat']; ?></td>
                            <th><a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit_<?php echo $d['id']; ?>"><i class="fa fa-pencil"></i></a> <a href="#" data-toggle="modal" data-target="#delete_<?php echo $d['id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a></th>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
          Kunci Jabatan Apps! - 2019
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>

<div class="modal fade" id="add" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Kartu</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form method="POST" action="helper_post.php?key=<?php echo $_SESSION['__data']; ?>&href=manajemen_kartu">
                
                <div class="form-group">
                    <label for="no_id">Nomor ID</label>
                    <input type="text" name="data[no_id]" id="no_id" class="form-control" />
                </div>
				
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="data[nama]" id="nama" class="form-control" />
                </div>
				
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" name="data[nama_jabatan]" id="jabatan" class="form-control" />

                    <input type="hidden" name="data[waktu]" id="" value="<?php echo date("Y-m-d h:i:s"); ?>" class="form-control" />
                    <input type="hidden" name="data[keterangan]" id="" value="Pending" class="form-control" />
                    <input type="hidden" name="data[dibuat]" id="" value="<?php echo date("Y-m-d h:i:s"); ?>" class="form-control" />
                </div>
            </div>    
                    
            <div class="modal-footer">
                <input type="submit" value="Save" id="save_edit_cabang" class="btn btn-sm btn-info" /></form>
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php include 'helper_get.php'; ?>
<?php while($d = mysqli_fetch_array($__data)){ ?>
<div class="modal fade" id="edit_<?php echo $d['id']; ?>" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Kartu</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form method="POST" action="helper_post.php?key=<?php echo $_SESSION['__data']; ?>&href=manajemen_kartu&where=<?php echo $d['no_id']; ?>">

                <input type="hidden" name="data[id]" id="id" class="form-control" value="<?php echo $d['id']; ?>" />
                <div class="form-group">
                    <label for="no_id">Nomor ID</label>
                    <input type="text" name="data[no_id]" id="no_id" class="form-control" value="<?php echo $d['no_id']; ?>" />
                </div>
				
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="data[nama]" id="nama" class="form-control" value="<?php echo $d['nama']; ?>" />
                </div>
				
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" name="data[nama_jabatan]" id="jabatan" class="form-control" value="<?php echo $d['nama_jabatan']; ?>" />

                    <input type="hidden" name="data[waktu]" id="" class="form-control" value="<?php echo $d['waktu']; ?>" />
                    <input type="hidden" name="data[keterangan]" id="" class="form-control" value="<?php echo $d['keterangan']; ?>" />
                </div>
            </div>    
                    
            <div class="modal-footer">
                <input type="submit" value="Save" id="save_edit_cabang" class="btn btn-sm btn-info" /></form>
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete_<?php echo $d['id']; ?>" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmation Delete</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    Apakah anda yakin menghapus <strong>data kartu</strong> ini? data yang sudah terhapus tidak bisa dikembalikan
                </div>
            </div>    
                    
            <div class="modal-footer">
                <a class="btn btn-danger btn-sm" href="helper_delete.php?id=<?php echo $d['id']; ?>&key=<?php echo $_SESSION['__data']; ?>&href=manajemen_kartu&where=<?php echo $d['no_id']; ?>">Delete</a>
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php
$res = !empty($_SESSION['res']) ? $_SESSION['res'] : '';
if ($res) {
    echo '<script>alert("'.$_SESSION['res'].'")</script>';
}
unset($_SESSION['res']);
?>
