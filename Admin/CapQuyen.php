<?php   
    $maad=$_GET["maAD"];
    if(empty($_GET["maAD"])){       
        chuyentrang("KhongCoDuLieu");
        exit();
    }
    $quyenDangCo = mysqli_query($ketnoisql,"SELECT * FROM user_quyen WHERE username = '$maad'");
    $CoQuyen=array();
    $sqlIdNhom = "SELECT * FROM `quyen_nhom`";
    $thucthiIdNhom = mysqli_query($ketnoisql,$sqlIdNhom);
    while($dulieuIdNhom = mysqli_fetch_array($thucthiIdNhom)){   
    $IdNhom[] = array("$dulieuIdNhom[0]","$dulieuIdNhom[1]");
    }
    while($dulieuCo = mysqli_fetch_array($quyenDangCo)){   
    $CoQuyen[] = $dulieuCo[1];
    }
    if(!empty($_POST['quyen'])) {
      $ChonQuyen = $_POST['quyen'];
      mysqli_query($ketnoisql,"DELETE FROM `user_quyen` WHERE username = '$maad'");
      foreach($ChonQuyen as $quyen ){         
      $checkEntries = mysqli_query($ketnoisql,"SELECT * FROM user_quyen WHERE username = '$maad' AND MaQuyen ='$quyen'");
        if(mysqli_num_rows($checkEntries) == 0){
          mysqli_query($ketnoisql,"INSERT INTO `user_quyen`(`username`, `MaQuyen`) VALUES ('$maad','$quyen')" ); 
          }
        }
    chuyentrang("index.php?url=Admin/QuanLyAdmin.php");  
    }                
  ?>
<head>
    <style>
        .thanhtrangthai{
        float: top;
        top: 0; 
        height: 10%;
        }
        .noidung{
            margin: 10px auto;
            width: 90%;
        }
        .h21{
          color: #400061;
          text-align: left;  
        }
        .luachon{
            display: block;
            float: left;   
            width: 50%;
            font-weight: bold;
            color: #284e4a;
        }
        .dong{
            display: block;
            float: left;
            margin: 0px 10px 0px 0px ;
        }
    </style> 
</head>
<div class="thanhtrangthai">
    <a class="button button2"  style="float: left" href='index.php?url=Admin/QuanLyAdmin.php'>Quay Lại</a>
</div>
<div class="noidung">
  <form method="post" action="">    
    <?php
     foreach($IdNhom as $Nhom ){        
        $sqlQuyen= mysqli_query($ketnoisql,"SELECT * FROM `quyen` WHERE IdNhom ='$Nhom[0]' ORDER BY TenQuyen" );
        ?>
        <div class='luachon'>
        <h2 class="h21"><?php echo $Nhom[1] ?></h2>
        <?php
        while($dulieuQuyen = mysqli_fetch_array($sqlQuyen)){ 
            $QuyenTrongNhom = "$dulieuQuyen[0],$dulieuQuyen[2]"; 
            $Tach = explode(",", $QuyenTrongNhom);
            $checked = "";      
            if(in_array($Tach[0],$CoQuyen)){
                $checked = "checked";
            }?>
            <div class="dong">
            <input type="checkbox" name="quyen[]" value="<?php echo $Tach[0] ?>" <?php echo $checked ?> > <?php echo $Tach[1] ?>
            </div>
            
            <?php } ?>
        </div><br>
    <?php }
    ?>
    <input type="hidden" name="quyen[]" value='' checked>
    <input class="button button2" style="width: 100%;margin-top: 50px;" type="submit" value="Lưu" onclick="return confirm('Bạn có chắc chắn tài khoản này được cấp các quyền này không?');">
    
  </form>
</div>

