<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Logika Fuzzy Bonus Karyawan</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      body {
        padding-top: 50px;
      }
      .starter-template {
        padding: 40px 15px;
        text-align: center;
      }
      .alert{
        text-align: center !important;
      }
      .pt10{
        padding-top: 10px !important;
      }
      .nol{
        background-color:  #eee ;
        color: #999;
        padding: 3px;
        text-align: center !important;
      }
      .rendah{
        background-color: #f5eb25;
        color: #000;
        padding: 3px;
        text-align: center !important;
      }

      .sedang{
        background-color:  #1ea318 ;
        color: #000;
        padding: 3px;
        text-align: center !important;
      }

      .alert{
        color: #000 !important;
      }
      .tinggi{
        background-color:  #62a0f3  ;
        color: #000;
        padding: 3px;
        text-align: center !important;
      }
      .alert-warning{
        background-color: #f5eb25 !important;
      }
      .alert-success{
        background-color: #1ea318  !important;
      }
      .alert-info{
        background-color: #62a0f3  !important;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Logika Fuzzy - Bonus Karyawan</a>
        </div>
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h3>Penerapan Logika Fuzzy dalam menentukan Bonus Karyawan</h3>
        (Tugas Matakuliah Sistem Penunjang Keputusan dan Sistem Pakar) <br>
        <b>Irwan Kurniawan</b><br>
        <b>Refki Satrianto</b><br>
        <b>Linda..</b><br>
        <hr>
        <center>
          <button data-toggle="modal" data-target="#modal-hitung" class="btn btn-primary"> Demo Program</button>
        </center>
      </div>
      <div class="row">
        <div class="col-md-4">
        <h4>Fungsi Keanggotaan Masa Kerja Karyawan</h4>
        <hr>
          <img src="masakerja.png" class="img img-responsive img-thumbnails">
        </div>
        <div class="col-md-4">
        <h4>Fungsi Keanggotaan Gaji Karyawan</h4>
        <hr>
          <img src="gaji.png" class="img img-responsive img-thumbnails">
        </div>

        <div class="col-md-4">
        <h4>Fungsi Keanggotaan Bonus Karyawan</h4>
        <hr>
          <img src="bonus.png" class="img img-responsive img-thumbnails">
        </div>
      </div>
      <hr>
      <div class="row">
        <center><h4>Ada 6 (Enam) Rule yang digunakan</h4></center>
        <hr>
        <div class="col-md-2">
          <div class="alert alert-default">
            <b>Rule 1 (R1)</b>
          </div>
          <div class="alert alert-default">
            <b>Rule 2 (R2)</b>
          </div>
          <div class="alert alert-default">
            <b>Rule 3 (R3)</b>
          </div>
          <div class="alert alert-default">
            <b>Rule 4 (R4)</b>
          </div>
          <div class="alert alert-default">
            <b>Rule 5 (R5)</b>
          </div>
          <div class="alert alert-default">
            <b>Rule 6 (R6)</b>
          </div>
        </div>
        <div class="col-md-3">
          <div class="alert alert-warning">
            <center>Jika Masa Kerja <b>Baru</b></center>
          </div>

          <div class="alert alert-warning">
            Jika Masa Kerja <b>Baru</b> 
          </div>

          <div class="alert alert-success">
            Jika Masa Kerja <b>Sedang</b>
          </div>
          <div class="alert alert-success">
            Jika Masa Kerja <b>Sedang</b>
          </div>

          <div class="alert alert-info">
            Jika Masa Kerja <b>Lama</b>
          </div>

          <div class="alert alert-info">
            Jika Masa Kerja <b>Lama</b>
          </div>

        </div>
         <div class="col-md-3">
          <div class="alert alert-warning">
            Dan Gaji <b>Sedikit</b>
          </div>

          <div class="alert alert-info">
            Dan Gaji <b>Banyak</b> 
          </div>

          <div class="alert alert-warning">
            Dan Gaji <b>Sedikit</b>
          </div>

          <div class="alert alert-info">
            Dan Gaji <b>Banyak</b> 
          </div>

          <div class="alert alert-warning">
            Dan Gaji <b>Sedikit</b>
          </div>
          <div class="alert alert-info">
            Dan Gaji <b>Banyak</b> 
          </div>

        </div>
        <div class="col-md-3">
          <div class="alert alert-warning">
            <center>Maka Bonus <b>Sedikit</b></center>
          </div>
          <div class="alert alert-warning">
            Maka Bonus <b>Sedikit</b>
          </div>

          <div class="alert alert-warning">
            Maka Bonus <b>Sedikit</b>
          </div>

          <div class="alert alert-info">
            Maka Bonus <b>Banyak</b> 
          </div>

           <div class="alert alert-info">
            Maka Bonus <b>Banyak</b> 
          </div>

          <div class="alert alert-info">
            Maka Bonus <b>Banyak</b> 
          </div>

        </div>
      </div>
      <hr>

    </div><!-- /.container -->



<!-- Modal -->

<div class="modal fade" id="modal-hitung" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Demo Logika Fuzzy Bonus Karyawan</h4>
            </div>
            <div class="modal-body" id="body-detail">
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                      <div class="form-group">
                          <label>Masa Kerja (Dalam Tahun)</label>
                          <input id="masakerja" required type="text" placeholder="Dalam satuan Tahun" name="masakerja" value="" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Gaji Karyawan (Dalam Satuan Juta)</label>
                          <input id="gaji" required type="text" name="gaji" value="" 
                          placeholder="Dalam satuan Jutaan" class="form-control">
                      </div>
                      <center>
                          <button class="btn btn-primary" id="hitung">Hitung Bonus</button>
                      </center>
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-outline btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-hasil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Hasil Perhitungan Bonus Karyawan</h4>
            </div>
            <div class="modal-body" id="hasil-detail">
                
            </div>
            <div class="modal-footer">
                <button type="button" data-target="#modal-hitung" data-toggle="modal" class="btn  btn-outline btn-success" data-dismiss="modal">Coba Lagi</button>
                <button type="button" class="btn  btn-outline btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(function(){
            $("#hitung").on('click', function(){
              if($("#masakerja").val() && $("#gaji").val()){
                  $.post('hitung.php', {masakerja:$("#masakerja").val(), gaji:$("#gaji").val()}, function(respon){
                      $("#modal-hitung").modal('hide');
                      $("#hasil-detail").html(respon);
                      $("#modal-hasil").modal('show');
                  })
              }
            })


            $("#modal-hitung").on("shown.bs.modal", function(){
                $("#masakerja").val('');
                $("#gaji").val('');
            })


        })
    </script>
  </body>
</html>
