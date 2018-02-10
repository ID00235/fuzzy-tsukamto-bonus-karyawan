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
        $masakerjaLama=($masakerja - 5) /(8 - 5);
      }else{
        $masakerjaLama = 1;
      }
    //masakerja sedang
      if($masakerja <=3 ){
        $masakerjaSedang = 0;
      }else if($masakerja>3 && $masakerja<=5){
         $masakerjaSedang = ($masakerja-3)/(5-3);
      }
      else if ($masakerja>5 && $masakerja<7){
        $masakerjaSedang=(7 - $masakerja) /(7 - 5);
      }else{
         $masakerjaSedang =0;
      }

    //masakerja baru
      if($masakerja<=2){
        $masakerjaBaru = 1;

      }else if($masakerja>2 && $masakerja<5){
        $masakerjaBaru = (5-$masakerja)/(5-2);

      }else{
        $masakerjaBaru = 0;
      }



    //gaji tinggi
      if($gaji<=3){
         $gajiBanyak = 0;

      }
      else if($gaji>3 && $gaji<=5){
        $gajiBanyak= ($gaji- 3) /(5 - 3);
      }else{
        $gajiBanyak = 1;
      }


    //Gaji Sedikit
      if($gaji<=2){
        $gajiSedikit = 1;

      }else if($gaji>2 && $gaji<=4){
        $gajiSedikit = (4-$gaji)/(4-2);

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
       $z1 = 600000 - (300000*$R1);

      $R2=min($masakerjaBaru,$gajiBanyak); //maka bonus sedikit
       $z2 = 600000 - (300000*$R2);

      $R3=min($masakerjaSedang,$gajiSedikit); //maka bonus sedikit
       $z3 = 600000 - (300000*$R3);

      $R4=min($masakerjaSedang,$gajiBanyak); //maka bonus banyak
       $z4 = 300000 + $R4*300000;

      $R5=min($masakerjaLama,$gajiSedikit); //maka bonus banyak
      $z5 = 300000 + $R5*300000;

      $R6=min($masakerjaLama,$gajiBanyak);
      $z6 = 300000 + $R6*300000;
      $total_RiZi = ($R1*$z1)+($R2*$z2)+($R3*$z3)+($R4*$z4)+($R5*$z5)+($R6*$z6);
      $total_R = $R1+$R2+$R3+$R4+$R5+$R6;
      $z = $total_RiZi/$total_R;
      
      $bonus = $z;
      if($bonus<=300000){
         $bonusBanyak = 0;
      }
      else if($bonus>300000 && $bonus<=600000){
        $bonusBanyak=($bonus - 300000) /(600000 - 300000);
      }else{
        $bonusBanyak = 1;
      }

      if($bonus<=300000){
         $bonusSedikit = 1;
      }
      else if($bonus>300000 && $bonus<=600000){
        $bonusSedikit=(600000-$bonus) /(600000 - 300000);
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
            <td><center><?php echo round($masakerjaBaru,2);?><center></td>
            <td><center><?php echo round($gajiSedikit,2);?><center></td>
            <td><center><?php echo round($R1,2);?><center></td>
            <td><center><?php echo round($z1,2);?><center></td>
            <td><center><?php echo round($R1*$z1,2);?><center></td>
          </tr>

          <tr>
            <td>Rule 2</td>
            <td>Jika Masa Kerja <b>Baru</b> dan Gaji <b>Banyak</b> Maka Bonus <b>Sedikit</b></td>
            <td><center><?php echo round($masakerjaBaru,2);?><center></td>
            <td><center><?php echo round($gajiBanyak,2);?><center></td>
            <td><center><?php echo round($R2,2);?><center></td>
            <td><center><?php echo round($z2,2);?><center></td>
            <td><center><?php echo round($R2*$z2,2);?><center></td>
          </tr>

          <tr>
            <td>Rule 3</td>
            <td>Jika Masa Kerja <b>Sedang</b> dan Gaji <b>Sedikit</b> Maka Bonus <b>Sedikit</b></td>
            <td><center><?php echo round($masakerjaSedang,2);?><center></td>
            <td><center><?php echo round($gajiSedikit,2);?><center></td>
            <td><center><?php echo round($R3,2);?><center></td>
            <td><center><?php echo round($z3,2);?><center></td>
            <td><center><?php echo round($R3*$z3,2);?><center></td>
          </tr>

          <tr>
            <td>Rule 4</td>
            <td>Jika Masa Kerja <b>Sedang</b> dan Gaji <b>Banyak</b> Maka Bonus <b>Banyak</b></td>
            <td><center><?php echo round($masakerjaSedang,2);?><center></td>
            <td><center><?php echo round($gajiBanyak,2);?><center></td>
           <td><center><?php echo round($R4,2);?><center></td>
            <td><center><?php echo round($z4,2);?><center></td>
            <td><center><?php echo round($R4*$z4,2);?><center></td>
          </tr>

          <tr>
            <td>Rule 5</td>
            <td>Jika Masa Kerja <b>Lama</b> dan Gaji <b>Sedikit</b> Maka Bonus <b>Banyak</b></td>
            <td><center><?php echo round($masakerjaLama,2);?><center></td>
            <td><center><?php echo round($gajiSedikit,2);?><center></td>
            <td><center><?php echo round($R5,2);?><center></td>
            <td><center><?php echo round($z5,2);?><center></td>
            <td><center><?php echo round($R5*$z5,2);?><center></td>
          </tr>


          <tr>
            <td>Rule 6</td>
            <td>Jika Masa Kerja <b>Lama</b> dan Gaji <b>Banyak</b> Maka Bonus <b>Banyak</b></td>
            <td><center><?php echo round($masakerjaLama,2);?><center></td>
            <td><center><?php echo round($gajiBanyak,2);?><center></td>
            <td><center><?php echo round($R6,2);?><center></td>
            <td><center><?php echo round($z6,2);?><center></td>
            <td><center><?php echo round($R6*$z6,2);?><center></td>
          </tr>


          <tr>
            <td></td>
            <td>Jumlah</td>
            <td><center><center></td>
            <td><center><center></td>
            <td><center><?php echo round($total_R,3);?><center></td>
            <td><center><center></td>
            <td><center><?php echo round($total_RiZi,2);?><center></td>
          </tr>
          <tr>
            <td></td>
            <td colspan="6">Nilai Bonus = SUM(Ri*Zi) / SUM(Ri) = <?php echo round($total_RiZi,2)." / ".round($total_R,3);?> = Rp. <?php echo number_format($bonus,2,",",".");?> </td>
          </tr>
      </table>
    </div>
  </div>
<?php
}
?>

<?php 
function displayMasaKerja($masakerjaBaru, $masakerjaSedang, $masakerjaLama){

  $masakerjaBaru = round($masakerjaBaru,2);
  $masakerjaSedang = round($masakerjaSedang,2);
  $masakerjaLama = round($masakerjaLama,2);

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

  $gajiSedikit = round($gajiSedikit,2);
  $gajiBanyak = round($gajiBanyak,2);

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

  $bonusSedikit = round($bonusSedikit,2);
  $bonusBanyak = round($bonusBanyak,2);
  
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