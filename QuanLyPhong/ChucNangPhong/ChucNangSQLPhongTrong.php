<style>
    .formLike{
        float:right; 
        margin-top: 20px;
        margin-right: 20px
    }
</style> 
   <form style="float:right; margin-top: 20px;margin-right: 20px"  action="" method="post">             
     <div class="nhomform">
    <span>Tìm</span>
    <select class="nhap"  style="padding:0" name="timtheo">               
        <option value="IDP">ID Phòng</option>
        <option value="TP">Tên Phòng</option>
        <option value="VTP">Vị Trí Phòng</option>
        <option value="GP">Giá Phòng </option>
        <option value="GC">Ghi Chú</option>  
    </select> 
    <input class='button2' type="submit" value="Chọn">
    </div>
</form>
<?php 
$select ="SELECT * FROM `phong` WHERE TrangThai = N'Trống'"; 
$like = '';
$order = '';
$thongbao=""; 
$sql = ""; 
if(isset($_POST['timtheo'])){
    $timtheo= $_POST['timtheo'];     
        switch ($timtheo){         
        case 'IDP':
        ?>            
        <form class="formLike" action="" method="post">  
            <div class="nhomform">                
                <input class="nhap" type="number" name='keywordid' placeholder="Nhập ID Phòng">
                <input class='button2' type="submit" value="Tìm Kiếm">
            </div> 
        </form>
        <?php           
            break;
        case 'TP':
        ?>            
        <form class="formLike" action="" method="post">   
            <div class="nhomform">                
                <input class="nhap" type="text" name='keywordten' placeholder="Nhập Tên Phòng">
                <input class='button2' type="submit" value="Tìm Kiếm">
            </div> 
        </form>
        <?php 
            break;
         case 'VTP':
        ?>            
        <form class="formLike" action="" method="post">    
            <div class="nhomform">                
                <input class="nhap" type="number" name='keywordvitri' placeholder="Nhập Vị Trí Phòng">
                <input class='button2' type="submit" value="Tìm Kiếm">
            </div> 
        </form>
        <?php 
            break;
        case 'GP':
        ?>            
        <form class="formLike" action="" method="post">    
            <div class="nhomform">                
                <input class="nhap" type="number" name='keywordGia' placeholder="Nhập Giá Phòng">
                <input class='button2' type="submit" value="Tìm Kiếm">
            </div> 
        </form>
        <?php 
            break;
        case 'GC':
        ?>            
        <form class="formLike" action="" method="post">     
            <div class="nhomform">                
                <input class="nhap" type="text" name='keywordGC' placeholder="Nhập Ghi Chú">
                <input class='button2' type="submit" value="Tìm Kiếm">
            </div> 
        </form>
        <?php 
            break;
    }}
    if(isset($_POST['keywordid'])){
        $keyword= $_POST['keywordid'];
        $like = "AND MaLP LIKE '%$keyword%'";         
        $thongbao="với ID là '$keyword'";}
if(isset($_POST['keywordten'])){
        $keyword= $_POST['keywordten'];
        $like = "AND TenLoaiPhong LIKE '%$keyword%'";
        $thongbao="với tên là '$keyword'";}
if(isset($_POST['keywordvitri'])){
        $keyword= $_POST['keywordvitri'];
        $like = "AND ViTri LIKE '%$keyword%'";
        $thongbao="với Vị Trí ở '$keyword'";}
if(isset($_POST['keywordGia'])){
        $keyword= $_POST['keywordGia'];
        $like = "AND  DonGia LIKE '%$keyword%'";
        $thongbao="với Đơn giá là '$keyword'";}
 if(isset($_POST['keywordGC'])){
        $keyword= $_POST['keywordGC'];
        $like = "AND  Note LIKE '%$keyword%'";
        $thongbao="với Note là  ' $keyword '";}       
?>     
<form style="float:right; margin-top: 20px;margin-right: 20px"  action="" method="post">             
     <div class="nhomform">
    <span>Xếp</span>
    <select class="nhap"  style="padding:0" name="kieusx">               
        <option value="TangID">Tăng dần theo ID Phòng</option>
        <option value="GiamID">Giảm dần theo ID Phòng</option>
        <option value="TangT">Tăng dần theo Tên Phòng </option>
        <option value="GiamT">Giảm dần theo Tên Phòng</option>
        <option value="TangVT">Tăng dần theo Vị Trí</option>
        <option value="GiamVT">Giảm dần theo Vị Trí</option>
        <option value="TangG">Tăng dần theo mức Giá Phòng</option>
        <option value="GiamG">Giảm dần theo mức Giá Phòng</option>
    </select> 
    <input class='button2' type="submit" value="Sắp Xếp">
    </div>
</form> 
<?php  
  
    if(isset($_POST['kieusx'])){
    $kieu= $_POST['kieusx'];     
        switch ($kieu){         
        case 'TangID':
            $order = 'ORDER BY MaLP ASC';             
            $thongbao="Xắp Sếp Tăng dần theo ID";
            break;
        case 'GiamID':
            $order = 'ORDER BY MaLP DESC';           
            $thongbao="Xắp Sếp Giảm dần theo ID";
            break;
         case 'TangT':
            $order = 'ORDER BY TenLoaiPhong ASC';           
            $thongbao="Xắp Sếp Tăng theo Tên Loại Phòng";
            break;
        case 'GiamT':
            $order = 'ORDER BY TenLoaiPhong DESC';            
            $thongbao="Xắp Sếp Giảm dần theo Tên Loại Phòng";
            break;
         case 'TangVT':
            $order = 'ORDER BY ViTri ASC';            
            $thongbao="Xắp Sếp Tăng dần theo Vị Trí Phòng";
            break;
        case 'GiamVT':
            $order = 'ORDER BY ViTri DESC';           
            $thongbao="Xắp Sếp Giảm dần theo Vị Trí Phòng";
            break;           
        case 'TangG':
            $order = 'ORDER BY DonGia ASC';           
            $thongbao="Xắp Sếp Tăng dần theo mức Giá Phòng";
            break;
        case 'GiamG':
            $order = 'ORDER BY DonGia DESC';          
            $thongbao="Xắp Sếp Giảm dần theo mức Giá Phòng";
            break;                  
    }} 
    $sql = "$select $like $order";      
    ?>