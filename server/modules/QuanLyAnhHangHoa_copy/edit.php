<?php
$sql_sua_hinh_hh = "SELECT hinhhanghoa.MaHinh,hanghoa.TenHH, hinhhanghoa.TenHinh FROM `hanghoa`, `hinhhanghoa` WHERE hanghoa.MSHH = hinhhanghoa.MSHH AND MaHinh='$_GET[idanhhanghoa]' LIMIT 1";
$query_sua_hinh_hh = mysqli_query($mysqli, $sql_sua_hinh_hh);
?>
<style>
  .imgBox {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 200px;
    margin-top: 20px;
    border-radius: 5px;
    padding: 10px;
    background-color: #fff;
  }

  .add-img {
    padding: 10px 12px;
    font-size: 14px;
    color: #fff;
    background-color: rgb(44, 143, 209);
    border-radius: 5px;
    position: relative;
    cursor: pointer;
    top: 0;
    left: 0;
    transition: 0.25s ease;
  }

  .add-img:hover {
    color: rgb(44, 143, 209);
    background-color: #fff;
    border: 1px solid rgb(44, 143, 209);
  }

  input[type='file'] {
    display: none;
  }

  img {
    margin: 50px 0;
    width: 200px;
    height: 200px;
    object-fit: cover;
    border-radius: 5px;
  }
</style>
<div class="wrapper">
  <h1>Trang sửa</h1>
  <div class="form">
    <?php
    while ($row = mysqli_fetch_array($query_sua_hinh_hh)) {
    ?>
      <form action="QuanLyAnhHangHoa_copy/code.php?idanhhanghoa=<?php echo $row['MaHinh'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Tên Hàng Hóa</label>
          <input disabled type="text" name="tenhanghoa" placeholder="Nhập tên hàng hóa:..." value="<?php echo $row['TenHH'] ?>">
        </div>
        <div class="form-group">
          <label>Sửa Hình Ảnh Hàng Hóa</label>
          <span class="add-img">Chọn ảnh</span>
          <input type="file" name="anhhanghoa" data-file="<?php echo $row['TenHinh'] ?>" placeholder="Nhập tên hàng hóa:..." value="<?php echo $row['TenHinh'] ?>">
          <div class="imgBox">
            <img class="anhhanghoa img" data-hinh="<?php echo $row['TenHinh'] ?>" src="QuanLyAnhHangHoa_copy/upload/<?php echo $row['TenHinh'] ?>" alt="">
          </div>
        </div>
        <div class="form-group">
          <button class="submit" name="editanhhanghoa">Sửa</button>
        </div>
      </form>
    <?php
    }
    ?>
  </div>
</div>
<script>
  const addImg = document.querySelector('.add-img')
  const inputFile = document.querySelector('input[type="file"]')
  const img = document.querySelector('.img')
  const data_hinh = img.getAttribute('data-hinh')

  addImg.onclick = () => {
    inputFile.click()
    inputFile.onchange = () => {
      img.src = `../../images/${inputFile.value.split('\\')[2]}`
    }
  }

  if (!inputFile.value) {
    const data_file = inputFile.getAttribute('data-file')
    inputFile.value = data_file
  }
</script>