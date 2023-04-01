<?php
  include_once "./../connection.php";
  if(isset($_POST['hoten'])) {
    $query = 'INSERT INTO taikhoan (HoTen, email, DiaChi, SDT, MatKhau, VaiTro) 
    VALUES (?,?,?,?,?,?)';
		try{
      $sth = $pdo->prepare($query);
      $sth->execute([
        $_POST['hoten'],
        $_POST['email'],
        $_POST['diachi'],
        $_POST['sdt'],
        $_POST['matkhau'],
        'admin'
      ]);
    }catch (PDOException $e){
      $pdo_error = $e->getMessage();
    }
  }
  if(isset($_POST['email'])) {
    $query = "select k.SoTK from taikhoan k
                where k.email = '".$_POST['email']."'
                and k.MatKhau= '".$_POST['pws']."' and vaitro='admin'";
    // echo $_SESSION['sotk'];
		try {
      $sth = $pdo->query($query);
      if ($row = $sth->fetch()){
        $_SESSION['tkadmin'] = $row['SoTK'];
         header('Location: ../admin.php');
      }   
    } catch (PDOException $e){
        
    }
  }
//   if(isset($_POST['hoten'])){
//     header ('Location: dangnhap.php');
//   }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đăng Nhập Admin</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="shortcut icon" href="logo và phong nen/Logo.PNG" type="image/vnd.microsoft.icon" >
        <script src="https://kit.fontawesome.com/f933a9a1ec.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/index.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </head>
    
    <body>

      <main>
        <div style="text-align: center;"><h1>Đăng Nhập Tài Khoản Admin</h1></div>
        <div style="margin: 0 auto; width: 500px; border: 2px solid yellowgreen; padding: 10px;">
            <form action="dangnhapadmin.php" method="post">
                <div class="form-group">
                    <label for="formGroupExampleInput">Email: </label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Mật Khẩu: </label>
                    <input type="password" class="form-control" name="pws" >
                </div>
                <button type="submit" class="btn btn-primary">Đăng Nhập</button>
            </form>
        </div>
      </main>
        <br>
      
    </body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>