<?php    
    $maPB = $_GET["maPB"];  
    $sql = "UPDATE `phong` SET `TrangThai`= 'Trống' WHERE MaLP = '$maPB'";     
    mysqli_query($ketnoisql,$sql); 
    chuyentrang("index.php?url=QuanLyPhong/PhongCanDon.php");    
?>