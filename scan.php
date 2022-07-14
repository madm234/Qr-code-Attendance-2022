<?php
include('header.php');
include('db.php');
// auth();

?>

<style>
#preview{
   width:500px;
   height: 500px;
   margin:0px auto;
}
</style>
<video id="preview"></video>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
     
</script>

<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" rel="nofollow">
</script>
<script type="text/javascript">
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(content){
        window.location.href=content;
    });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        // alert(e);
    });
</script>

<div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
  </label>
  <label class="btn btn-success">
    <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
  </label>
</div>
</div>
</div>


<?php
include('footer.php');
?>