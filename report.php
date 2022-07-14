<?php
include('header.php');

auth();

if(isset($_GET['id']) && $_GET['id']>0 && isset($_GET['pid']) && $_GET['pid']>0)
{

    $id =get_safe_value($_GET['id']);
    $pid =get_safe_value($_GET['pid']);

    if($pid==1)
    $res =mysqli_query($con,"select * from staff where id ='$id' and status='1'");

    else if($pid==2)
    $res =mysqli_query($con,"select * from student where id ='$id' and status='1'");

    else if($pid==3)
    $res =mysqli_query($con,"select * from employee where id ='$id' and status='1'");

    if(mysqli_num_rows($res)>0)
    {
      $row =mysqli_fetch_assoc($res);
      $zinc =mysqli_query($con,"select * from qr_traffic where qr_traffic.email ='$row[email]' ");

      if(mysqli_num_rows($zinc)>0)
      {
        $mobile =0;
        $pc =0;
        $tablet =0;
        $chrome =0;
        $brave =0;
        $safari =0;
        $window =0;
        $android =0;
        $ios =0;

        while( $row2 =mysqli_fetch_assoc($zinc))
        {
          if($row2['device']=='Mobile')
          $mobile++;

          if($row2['device']=='PC')
          $pc++;

          if($row2['device']=='Tablet')
          $tablet++;

          if($row2['browser']=='Chrome')
          $chrome++;
          
          if($row2['browser']=='Brave')
          $brave++;

          if($row2['browser']=='Safari')
          $safari++;

          if($row2['os']=='Window')
          $window++;

          if($row2['os']=='Android')
          $android++;

          if($row2['os']=='iOS')
          $ios++;
        }
      }
      else
      {
        ?>
        <center><h1> QR is not scanned even once! </h1></center>
        <br>
        <?php
     
      }
    }
    else
    {
      echo "Invalid user";
      die();
    }
  }
  else
    {
        echo "L i n k  E x p i r e d"; 
        die();
    }
?>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawDeviceChart);
      google.charts.setOnLoadCallback(drawBrowserChart);
      google.charts.setOnLoadCallback(drawOsChart);


      function drawDeviceChart() {
var data = google.visualization.arrayToDataTable([
  ['Device', 'Users'],
  ['Mobile',  <?php echo $mobile ?>],
  ['Tablet',   <?php echo $tablet ?>],
  ['PC',  <?php echo $pc ?>],
 
]);

var options = {
  title: 'Device'
};
var chart = new google.visualization.PieChart(document.getElementById('device'));
chart.draw(data, options);
}



function drawBrowserChart() {
var data = google.visualization.arrayToDataTable([
  ['Browser', 'Users'],
  ['Chrome',  <?php echo $chrome ?>],
  ['Safari',  <?php echo $safari ?>],
  ['Brave',   <?php echo $brave ?>],
 
]);

var options = {
  title: 'Browser'
};
var chart = new google.visualization.PieChart(document.getElementById('browser'));
chart.draw(data, options);
}



function drawOsChart() {
var data = google.visualization.arrayToDataTable([
  ['OS', 'Users'],
  ['Android',  <?php echo $android ?>],
  ['iOS',   <?php echo $ios ?>],
  ['Windows',   <?php echo $window ?>],
 
]);

var options = {
  title: 'OS'
};
var chart = new google.visualization.PieChart(document.getElementById('os'));
chart.draw(data, options);
}





</script>


<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">QR Code Report</h3>
            </div>
        </div>
    </div>

    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body " id="device">

                    </div>
                </div>
            </div>


            <div class="col-4">
                <div class="card">
                    <div class="card-body " id="browser">

                    </div>
                </div>
            </div>



            <div class="col-4">
                <div class="card">
                    <div class="card-body " id="os">

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>



</div>
</div>









<?php
include('footer.php');
?>