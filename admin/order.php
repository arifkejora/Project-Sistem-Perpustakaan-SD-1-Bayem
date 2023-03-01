<?php 
session_start();
include '../dbconnect.php';
$orderids = $_GET['orderid'];
$liatcust = mysqli_query($conn,"select * from login l, cart c where orderid='$orderids' and l.userid=c.userid");
$checkdb = mysqli_fetch_array($liatcust);
date_default_timezone_set("Asia/Bangkok");

if(isset($_POST['kirim']))
	{
		$updatestatus = mysqli_query($conn,"update cart set status='Pengiriman' where orderid='$orderids'");
		$del =  mysqli_query($conn,"delete from konfirmasi where orderid='$orderids'");
		
		if($updatestatus&&$del){
			echo " <div class='alert alert-success'>
			<center>Pinjaman diproses.</center>
		  </div>
		<meta http-equiv='refresh' content='1; url= manageorder.php'/>  ";
		} else {
			echo "<div class='alert alert-warning'>
			Gagal Submit, silakan coba lagi
		  </div>
		 <meta http-equiv='refresh' content='1; url= manageorder.php'/> ";
		}
		
	};

if(isset($_POST['selesai']))
	{
		$updatestatus = mysqli_query($conn,"update cart set status='Selesai' where orderid='$orderids'");
		
		if($updatestatus){
			echo " <div class='alert alert-success'>
			<center>Transaksi diselesaikan.</center>
		  </div>
		<meta http-equiv='refresh' content='1; url= manageorder.php'/>  ";
		} else {
			echo "<div class='alert alert-warning'>
			Gagal Submit, silakan coba lagi
		  </div>
		 <meta http-equiv='refresh' content='1; url= manageorder.php'/> ";
		}
		
	};

?>
 
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
	<link rel="icon" 
      type="image/png" 
      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pesanan <?php echo $checkdb['namalengkap']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
	
	
	
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="page-container">
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
							<li><a href="index.php"><span>Home</span></a></li>
							<li><a href="../"><span>Kembali ke Web</span></a></li>
							<li class="active">
                                <a href="manageorder.php"><i class="ti-dashboard"></i><span>Kelola Pinjaman</span></a>
                            </li>
							<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Perpustakaan
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="kategori.php">Kategori</a></li>
                                    <li><a href="produk.php">Buku</a></li>
                                </ul>
                            </li>
							<li><a href="customer.php"><span>Kelola Pengunjung</span></a></li>
							<li><a href="user.php"><span>Kelola Staff</span></a></li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>
                                
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="header-area">
                <div class="row align-items-center">
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						<!--
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="main-content-inner">
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h3>ID Pinjam : #<?php echo $orderids ?></h3>
									
								</div>
                                   <p><?php echo $checkdb['namalengkap']; ?> (<?php echo $checkdb['alamat']; ?>)</p>
								<p>Waktu pinjam : <?php echo $checkdb['tglorder']; ?></p>
									
									<?php
									?>
								   <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No</th>
												<th>Buku</th>
												<th>Jumlah</th>

											</tr></thead><tbody>
											<?php 
											$brgs=mysqli_query($conn,"SELECT * from detailorder d, produk p where orderid='$orderids' and d.idproduk=p.idproduk order by d.idproduk ASC");
											$no=1;
											while($p=mysqli_fetch_array($brgs)){
												
												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $p['namabuku'] ?></td>
													<td><?php echo $p['qty'] ?></td>
													
												</tr>
												
												
												<?php 
											}
											?>
										</tbody>
										</table>
										
                                    </div>
									<br>
									<?php
									
									if($checkdb['status']=='Confirmed'){
										$ambilinfo = mysqli_query($conn,"select * from konfirmasi where orderid='$orderids'");
										while($tarik=mysqli_fetch_array($ambilinfo)){	
											$namarek = $tarik['namapeminjam'];
											$tglb = $tarik['tglpinjam'];	
										echo '
										Informasi Peminjaman
									<div class="data-tables datatable-dark">
									<table id="dataTable2" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>Nama Peminjam</th>
												<th>Tanggal Pinjam</th>
												
											</tr></thead><tbody>
											<tr>
											<td>'.$namarek.'</td>
											<td>'.$tglb.'</td>
											</tr>
											</tbody>
										</table>
									</div>
									<br><br>
									<form method="post">
									<input type="submit" name="kirim" class="form-control btn btn-success" value="Proses" \>
									</form>
									';
									}
									;
									} else {
										echo '
									<form method="post">
									<input type="submit" name="selesai" class="form-control btn btn-success" value="Selesaikan" \>
									</form>
									';
									}
									?>
									<br>
                                </div>
						
                            </div>
                        </div>
                    </div>
            </div>


        </div>

        <footer>
            <div class="footer-area">
            <p>SD Negeri 1 Bayem</p>
            </div>
        </footer>
    </div>
	
	<script type="text/javascript">
		$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );
	$(document).ready(function() {
    $('#dataTable2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );
	</script>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
	 <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
	
	
</body>

</html>
