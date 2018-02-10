<?php
    error_reporting(0);
    $masakerja  = $_POST['masakerja'];
    $gaji = $_POST['gaji'];
    
    if ($masakerja <= 0 || $gaji<= 0 )  {
      $z="";
    }else {
    //Masakerja lama
      if($masakerja<=2){
      $masakerjaLama = 0;
      }else if($masakerja>2 && $masakerja<=5){
          $masakerjaLama = 0;
      }else if($masakerja>5 && $masakerja<=8){
        $masakerjaLama=round(($masakerja - 5) /(8 - 5),2);
      }else{
        $masakerjaLama = 1;
      }
    //masakerja sedang
      if($masakerja <=3 ){
        $masakerjaSedang = 0;
      }else if($masakerja>3 && $masakerja<=5){
         $masakerjaSedang = round(($masakerja-3)/(5-3),2);
      }
      else if ($masakerja>5 && $masakerja<7){
        $masakerjaSedang=round((7 - $masakerja) /(7 - 5),2);
      }else{
         $masakerjaSedang =0;
      }

    //masakerja baru
      if($masakerja<=2){
        $masakerjaBaru = 1;

      }else if($masakerja>2 && $masakerja<5){
        $masakerjaBaru = round((5-$masakerja)/(5-2),2);

      }else{
        $masakerjaBaru = 0;
      }



    //gaji tinggi
      if($gaji<=3){
         $gajiBanyak = 0;

      }
      else if($gaji>3 && $gaji<=5){
        $gajiBanyak=round(($gaji- 3) /(5 - 3),2);
      }else{
        $gajiBanyak = 1;
      }


    //Gaji Sedikit
      if($gaji<=2){
        $gajiSedikit = 1;

      }else if($gaji>2 && $gaji<=4){
        $gajiSedikit = round((4-$gaji)/(4-2),2);

      }else{
        $gajiSedikit = 0;
      }

      $z1= 0;
      $z2= 0;
      $z3= 0;
      $z4= 0;
      $z5= 0;
      $z6= 0;
    
      $R1=min($masakerjaBaru,$gajiSedikit); //maka bonus sedikit
      if ($R1>0) $z1 = 600000 - (300000*$R1);

      $R2=min($masakerjaBaru,$gajiBanyak); //maka bonus sedikit
      if ($R2>0) $z2 = 600000 - (300000*$R2);

      $R3=min($masakerjaSedang,$gajiSedikit); //maka bonus sedikit
      if ($R3>0) $z3 = 600000 - (300000*$R3);

      $R4=min($masakerjaSedang,$gajiBanyak); //maka bonus banyak
      if ($R4>0) $z4 = 300000 + $R4*300000;

      $R5=min($masakerjaLama,$gajiSedikit); //maka bonus banyak
      if ($R5>0) $z5 = 300000 + $R5*300000;

      $R6=min($masakerjaLama,$gajiBanyak);
      if ($R6>0) $z6 = 300000 + $R6*300000;
      $total_RiZi = ($R1*$z1)+($R2*$z2)+($R3*$z3)+($R4*$z4)+($R5*$z5)+($R6*$z6);
      $total_R = $R1+$R2+$R3+$R4+$R5+$R6;
      $z = round($total_RiZi/$total_R,2);
      
      $bonus = $z;
      if($bonus<=300000){
         $bonusBanyak = 0;
      }
      else if($bonus>300000 && $bonus<=600000){
        $bonusBanyak=round(($bonus - 300000) /(600000 - 300000),2);
      }else{
        $bonusBanyak = 1;
      }

      if($bonus<=300000){
         $bonusSedikit = 1;
      }
      else if($bonus>300000 && $bonus<=600000){
        $bonusSedikit=round((600000-$bonus) /(600000 - 300000),2);
      }else{
        $bonusSedikit = 0;
      }
    }
?>

<?php
if($z!=""){
?>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped">
        <tr>
          <td align="center">Variabel</td>
          <td align="center">Nilai</td>
          <td align="center" width="50%">Derajat Keanggotaan</td>
        </tr>
        <tr>
          <td align="center" valign="middle" class="pt10">Masa Kerja</td>
          <td align="center" valign="middle" class="pt10"><?php echo $masakerja;?> Tahun</td>
          <td align="center" valign="middle">
            <center><?php displayMasaKerja($masakerjaBaru, $masakerjaSedang, $masakerjaLama);?></center>
          </td>
        </tr>
        <tr>
          <td align="center" valign="middle" class="pt10">Gaji Karyawan</td>
          <td align="center" valign="middle" class="pt10"><?php echo $gaji;?> Juta</td>
          <td align="center" valign="middle">
            <center><?php displayGaji($gajiSedikit, $gajiBanyak);?></center>
          </td>
        </tr>
        <tr>
          <td align="center" valign="middle" class="pt10">Bonus Karyawan</td>
          <td align="center" valign="middle" class="pt10">Rp. <?php echo number_format($bonus,2,",",".");?></td>
          <td align="center" valign="middle">
            <center><?php displayBonus($bonusSedikit, $bonusBanyak);?></center>
          </td>
        </tr>
      </table>
      <hr>
      <table class="table table-condensed table-bordered table-striped">
          <tr>
            <td align="center">Rule</td>
            <td align="center">Kondisi</td>
            <td align="center">Derajat <br> Masa Kerja</td>
            <td align="center">Derajat <br> Gaji</td>
            <td align="center">Alpha(Ri) <br>(Min.)</td>
            <td align="center">Zi</td>
            <td align="center">Ri*Z</td>
          </tr>
          <tr>
            <td>Rule 1</td>
            <td>Jika Masa Kerja <b>Baru</b> dan Gaji <b>Sedikit</b> Maka Bonus <b>Sedikit</b></td>
            <td><center><?php echo $masakerjaBaru;?><center></td>
            <td><center><?php echo $gajiSedikit;?><center></td>
            <td><center><?php echo $R1;?><center></td>
            <td><center><?php echo $z1;?><center></td>
            <td><center><?php echo $R1*$z1;?><center></td>
          </tr>

          <tr>
            <td>Rule 2</td>
            <td>Jika Masa Kerja <b>Baru</b> dan Gaji <b>Banyak</b> Maka Bonus <b>Sedikit</b></td>
            <td><center><?php echo $masakerjaBaru;?><center></td>
            <td><center><?php echo $gajiBanyak;?><center></td>
            <td><center><?php echo $R2;?><center></td>
            <td><center><?php echo $z2;?><center></td>
            <td><center><?php echo $R2*$z2;?><center></td>
          </tr>

          <tr>
            <td>Rule 3</td>
            <td>Jika Masa Kerja <b>Sedang</b> dan Gaji <b>Sedikit</b> Maka Bonus <b>Sedikit</b></td>
            <td><center><?php echo $masakerjaSedang;?><center></td>
            <td><center><?php echo $gajiSedikit;?><center></td>
            <td><center><?php echo $R3;?><center></td>
            <td><center><?php echo $z3;?><center></td>
            <td><center><?php echo $R3*$z3;?><center></td>
          </tr>

          <tr>
            <td>Rule 4</td>
            <td>Jika Masa Kerja <b>Sedang</b> dan Gaji <b>Banyak</b> Maka Bonus <b>Banyak</b></td>
            <td><center><?php echo $masakerjaSedang;?><center></td>
            <td><center><?php echo $gajiBanyak;?><center></td>
            <td><center><?php echo $R4;?><center></td>
            <td><center><?php echo $z4;?><center></td>
            <td><center><?php echo $R4*$z4;?><center></td>
          </tr>

          <tr>
            <td>Rule 5</td>
            <td>Jika Masa Kerja <b>Lama</b> dan Gaji <b>Sedikit</b> Maka Bonus <b>Banyak</b></td>
            <td><center><?php echo $masakerjaLama;?><center></td>
            <td><center><?php echo $gajiSedikit;?><center></td>
            <td><center><?php echo $R5;?><center></td>
            <td><center><?php echo $z5;?><center></td>
            <td><center><?php echo $R5*$z5;?><center></td>
          </tr>


          <tr>
            <td>Rule 6</td>
            <td>Jika Masa Kerja <b>Lama</b> dan Gaji <b>Banyak</b> Maka Bonus <b>Banyak</b></td>
            <td><center><?php echo $masakerjaLama;?><center></td>
            <td><center><?php echo $gajiBanyak;?><center></td>
            <td><center><?php echo $R6;?><center></td>
            <td><center><?php echo $z6;?><center></td>
            <td><center><?php echo $R6*$z6;?><center></td>
          </tr>


          <tr>
            <td></td>
            <td>Jumlah</td>
            <td><center><center></td>
            <td><center><center></td>
            <td><center><?php echo $total_R;?><center></td>
            <td><center><center></td>
            <td><center><?php echo $total_RiZi;?><center></td>
          </tr>
          <tr>
            <td></td>
            <td colspan="6">Nilai Bonus = SUM(Ri*Zi) / SUM(Ri) = <?php echo $total_RiZi." / ".$total_R;?> = Rp. <?php echo number_format($bonus,2,",",".");?> </td>
          </tr>
      </table>
    </div>
  </div>
<?php
}
?>

<?php 
function displayMasaKerja($masakerjaBaru, $masakerjaSedang, $masakerjaLama){
  if ($masakerjaBaru==0){
      echo "<span class='col-md-4 nol'><small>Baru</small> (0)</span>";
  }else{
      echo "<span class='col-md-4 rendah'><small>Baru</small> (".$masakerjaBaru.")</span>";
  }
  echo " ";
  if ($masakerjaSedang!=0){
      echo "<span class=' col-md-4 sedang'><small>Sedang</small> (".$masakerjaSedang.")</span>";
  }else{
      echo "<span class='col-md-4  nol'><small>Sedang</small> (0)</span>";
  }
  echo " ";
  if ($masakerjaLama!=0){
      echo "<span class='col-md-4  tinggi'><small>Lama</small> (".$masakerjaLama.")</span>";
  }else{
      echo "<span class='col-md-4  nol'><small>Lama</small> (0)</span>";
  }


}
?>

<?php 
function displayGaji($gajiSedikit, $gajiBanyak){
  if ($gajiSedikit==0){
      echo "<span class='col-md-4 col-md-offset-2 nol'><small>Sedikit</small> (0)</span>";
  }else{
      echo "<span class='col-md-4 col-md-offset-2 rendah'><small>Sedikit</small> (".$gajiSedikit.")</span>";
  }
  echo " ";
  if ($gajiBanyak!=0){
      echo "<span class='col-md-4  tinggi'><small>Banyak</small> (".$gajiBanyak.")</span>";
  }else{
      echo "<span class='col-md-4  nol'><small>Banyak</small> (0)</span>";
  }
}
?>

<?php 
function displayBonus($bonusSedikit, $bonusBanyak){
  
  if ( $bonusSedikit==0){
      echo "<span class='col-md-4 col-md-offset-2 nol'><small>Sedikit</small> (0)</span>";
  }else{
      echo "<span class='col-md-4 col-md-offset-2 rendah'><small>Sedikit</small> (".$bonusSedikit.")</span>";
  }
  echo " ";
  if ($bonusBanyak!=0){
      echo "<span class='col-md-4  tinggi'><small>Banyak</small> (".$bonusBanyak.")</span>";
  }else{
      echo "<span class='col-md-4  nol'><small>Banyak</small> (0)</span>";
  }
}
?>