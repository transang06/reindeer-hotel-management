 <form action= "" method="Post">
        <h2>Thêm Phòng Mới</h2>        
        <div class="nhomform">
            <span>Tên Loại Phòng</span>
            <input class="nhap" type="text" name='TenLoaiPhong' placeholder="Nhập tên phòng">
        </div>
        <div class="nhomform">
            <span>Vị Trí</span>
            <input class="nhap" type="text" name='ViTri' placeholder="Nhập vị trí phòng">
        </div>
        <div class="nhomform">
            <span>Đơn Giá(giờ</span>
            <input class="nhap" type="text" name='gia' placeholder="Nhập giá phòng" >
        </div>
        <div class="nhomform">
            <span>Note</span>
            <input class="nhap" type="text" name='Note' value="Không Ghi Chú">
        </div>
        <input type="hidden" name='TrangThai' value="Trống"/> 
        <input class="button button2" value="Thêm Phòng" type="submit"/>
</form>
<?php
    if(isset($_POST['TenLoaiPhong'])&& !empty($_POST['TenLoaiPhong'])&& isset($_POST['ViTri']) && !empty($_POST['ViTri']) && isset($_POST['gia'])&& !empty($_POST['gia'])){        
        $ten = $_POST['TenLoaiPhong'];
        $vitri = $_POST['ViTri'];
        $gia = $_POST['gia'];
        $note = $_POST['Note'];
        $trangThai = $_POST['TrangThai'];
        $sqlthem = "INSERT INTO phong ( `TenLoaiPhong`,`ViTri`,`DonGia`,`Note`,`TrangThai`) VALUES ('$ten','$vitri','$gia','$note','$trangThai')";
        mysqli_query($ketnoisql,$sqlthem);       
        chuyentrang("index.php?url=QuanLyPhong/QuanLyPhong.php");
        }
?>

    


    
    

