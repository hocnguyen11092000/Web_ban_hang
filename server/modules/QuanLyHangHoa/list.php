<style>
  img {
    width: 100px;
    height: 100px;
    object-fit: cover;
  }

  .content {
    min-width: calc(100% - 25%);
    margin-left: 20px;
  }

  table,
  tr,
  th,
  td {
    border-collapse: collapse;
    text-align: center;
    font-size: 14px;
  }

  tr:nth-child(2n + 1) {
    background-color: rgba(224, 228, 228, 0.5);
  }

  tr:first-child {
    background-color: #fff !important;
  }

  /* tr:last-child {
    background-color: #fff;
  } */

  table {
    margin-top: 60px;
    padding: 10px;
    box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
  }

  th {
    padding: 15px 0;
  }


  .delete {
    background-color: rgb(255, 99, 132);
    color: #fff;
    padding: 8px 6px;
    border-radius: 5px;
  }

  .edit {
    background-color: #20c997;
    color: #fff;
    padding: 8px 6px;
    border-radius: 5px;
  }

  .active {
    background-color: #2f80ed;
    color: #fff !important;
  }

  .none {
    display: none;
  }

  .search {
    position: absolute;
    top: 15px;
    right: 105px;
  }

  .search input {
    padding: 8px 12px;
    border: 1px solid #ccc;
    outline: none;
    border-radius: 5px;
    color: #333 !important;
  }

  .search .btn-search {
    padding: 8px 15px;
    border: 1px solid #ccc;
    outline: none;
    border-radius: 5px;
    color: #333;
    cursor: pointer;
  }

  .pagination {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .pagination .list {
    display: flex;
    justify-content: center;
    align-items: center;
    list-style-type: none;
  }

  .pagination .list .item a {
    padding: 4px 10px;
    margin-left: 5px;
    display: inline-block;
    font-size: 16px;
    color: #333;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  span.count {
    position: relative;
    left: 20px;
    top: 40px;
    color: #fb6e2e;
    font-size: 16px;
    display: inline-block;
  }
</style>
<?php
$sql = 'select count(MSHH) as number from hanghoa';
$query = mysqli_query($mysqli, $sql);
$result = mysqli_fetch_array($query);

$number = 0;
if ($result != null && count($result) > 0) {
  $number = (int)($result[0]);
}

$default_page = 5;
// tổng số trang: 
$pages = ceil($number / $default_page);

$current_page = 1;
$fillter = 0;
if (isset($_GET['page'])) {
  $current_page = $_GET['page'];
  if (strlen($current_page) > 1) {
    $fillter = substr($current_page, 0, 1);
    $_GET['page'] = $fillter;
  } else {
    $fillter = $current_page;
  }
}
$index = ($fillter - 1) * $default_page;


if (isset($_GET['q']) && $_GET['q'] != '') {
  $sql_lietke_hh = 'SELECT * FROM `hanghoa`, `hinhhanghoa` WHERE hanghoa.MSHH = hinhhanghoa.MSHH AND hanghoa.TenHH LIKE "%' . $_GET['q'] . '%" ORDER BY hanghoa.MSHH DESC';
} else if (isset($_GET['page'])) {
  $sql_lietke_hh = 'SELECT * FROM `hanghoa`, `hinhhanghoa` WHERE hanghoa.MSHH = hinhhanghoa.MSHH ORDER BY hanghoa.MSHH DESC LIMIT ' . $index . ' , ' . $default_page . '';
} else {
  $sql_lietke_hh = "SELECT * FROM `hanghoa`, `hinhhanghoa` WHERE hanghoa.MSHH = hinhhanghoa.MSHH ORDER BY hanghoa.MSHH DESC";
}


$query_lietke_hh = mysqli_query($mysqli, $sql_lietke_hh);
?>



<div class="content">
  <?php
  if (isset($_GET['q']) && $_GET['q'] != '') {
    $sql_COUNT = 'SELECT COUNT(hanghoa.MSHH) as soluong FROM `hanghoa`, `hinhhanghoa` WHERE hanghoa.MSHH = hinhhanghoa.MSHH AND hanghoa.TenHH LIKE "%' . $_GET['q'] . '%" ORDER BY hanghoa.MSHH DESC';
    $query = mysqli_query($mysqli, $sql_COUNT);

    $result = mysqli_fetch_array($query);

    $count = (int)$result[0];
    echo "<span class='count'>Tìm thấy $count kết quả</span>";
  }
  ?>

  <div class="search">
    <input class="input-search" type="text" style="margin-top: 15px; margin-bottom: 15px; border-radius: 5px; color: blue;" placeholder="Tìm kiếm tên sản phẩm... ">
    <a href="index.php?action=danhsachhanghoa&q=" class="btn-search">tìm kiếm</a>
  </div>
  <table style="width:100%">
    <?php

    if (isset($_SESSION['success']) && $_SESSION['success'] != "") {
      echo '<h2 class="noti_success" >' . $_SESSION['success'] . '</h2>';
      unset($_SESSION['success']);
    }
    if (isset($_SESSION['status']) && isset($_SESSION['status']) != "") {
      echo '<h2 class="noti_error">' . $_SESSION['status'] . '</h2>';
      unset($_SESSION['status']);
    }
    ?>
    <tr>
      <th>Id</th>
      <th>Tên hàng hóa</th>
      <th>Hình ảnh</th>
      <th>Giá hàng hóa</th>
      <th>Số lượng</th>
      <th>Mã loại hàng hóa</th>
      <th>Quản lý</th>
    </tr>
    <?php

    // $sql = 'select * from sanpham limit ' . $index . ', 8';

    //  $query_lietke_hh = mysqli_query($mysqli, $sql_lietke_hh);
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_hh)) {
      $i++;
    ?>
      <tr>
        <td style="width: 50px">
          <?php echo $row['MSHH'] ?>
        </td>
        <td>
          <?php echo $row['TenHH'] ?>
        </td>
        <td><img src="../../images/<?php echo $row['TenHinh'] ?>" alt=""></td>
        <td>
          <?php echo $row['Gia'] ?>
        </td>
        <td>
          <?php echo $row['SoLuongHang'] ?>
        </td>
        <td>
          <?php echo $row['MaLoaiHang'] ?>
        </td>
        <td>
          <a class="delete" href="QuanLyHangHoa/code.php?idhanghoa=<?php echo $row['MSHH'] ?>">Xoá</a>
          <a class="edit" href="?action=suahanghoa&idhanghoa=<?php echo $row['MSHH'] ?>">Sửa</a>
        </td>
      </tr>
    <?php
    }
    ?>

  </table>

  <div class="pagination">
    <ul class="list">
      <?php
      for ($i = 1; $i <= $pages; $i++) {
        if (!isset($_GET['page'])) {
          $_GET['page'] = 1;
        }
        if ($i == $_GET['page']) {
          echo '<li class="item"><a class="active" href="index.php?action=danhsachhanghoa&page=">' . $i . '</a></li>';
        } else {
          echo '<li class="item"><a href="index.php?action=danhsachhanghoa&page=">' . $i . '</a></li>';
        }
      }

      ?>
    </ul>
  </div>

  <script>
    const a = document.querySelector('.btn-search')
    const input = document.querySelector('.input-search')

    function search() {
      a.onclick = function(e) {
        a.href += input.value
      }
    }

    input.onkeyup = (e) => {
      if (e.keyCode === 13) {
        window.location.href += `&q=${input.value}`
      }
    }

    window.addEventListener('click', search)

    const paginate = document.querySelectorAll('.pagination .list .item')
    const a_paginate = document.querySelectorAll('.pagination .list .item a')

    paginate.forEach(function(li, index) {
      li.onclick = () => {
        a_paginate[index].href += (a_paginate[index].innerText)
      }
    })
  </script>