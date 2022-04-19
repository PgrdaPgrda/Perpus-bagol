<?php
//koneksi ke database mysql,
    include 'koneksi.php';

    $No	            = "";
	$Judul			= "";
	$Pengarang		= "";
	$Jenis			= "";
    $sukses         = "";
    $error          ="";

    if(isset($_GET['op'])){
        $op = $_GET['op'];
    }else{
        $op ="";
    }

    if($op =='delete'){
        $No = $_GET['No'];
        $sql1 = "delete from Buku where No = '$No' ";
        $q1 = mysqli_query($koneksi, $sql1);
        if($q1){
            $sukses ="Berhasil menghapus data";
        }else{
            $error ="Gagal melakukan penghapusan data";
        }
    }

    if($op == 'edit'){
        $No         = $_GET['No'];
        $sql1       = "select * from anggota where No  = '$No'";
        $q1         = mysqli_query($koneksi, $sql1);
        $r1         = mysqli_fetch_array($q1);
        $No         = $r1['No'];
        $Judul      = $r1['Judul'];
        $Pengarang  = $r1['Pengarang'];
        $Jenis      = $r1['Jenis'];
       

        if($No ==''){
            $error = "Data tidak ditemukan";
        }
    }


    if(isset($_POST['submit'])){ //untuk create
        $No         =$_POST['No'];
        $Judul      =$_POST['Judul'];
        $Pengarang  =$_POST['Pengarang'];
        $Jenis      =$_POST['Jenis'];

        if($No && $Judul && $Pengarang && $Jenis){
            if($op == 'edit'){ //untuk update
                $aql1 = "update anggota set No= '$No', Judul='$Judul', Pengarang ='$Pengarang', Jenis ='$Jenis' where No = '$No'";
                $q1  = mysqli_query($koneksi, $sql1);
                if($q1){
                    $sukses = "data berhasil di update";
                }else{
                    $error ="data gagal di update";
                }
            }else { //untuk insert
                $sql1 = "insert into buku(No, Judul, Pengarang, Jenis) value ('$No','$Judul','$Pengarang','$Jenis')";
                $q1 = mysqli_query($koneksi, $sql1);
    
                if($q1){
                    $sukses = "Berhasil menambah data baru";
                }else {
                    $error = "Gagal menambah data";
                }
            }
           
        } else{
            $error = "Silakan masukan semua data";
        }
    }
       

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .mx-auto {
            width : 800px;
        }
        .card {
            margin-top : 10px;
        }
    </style>
</head>
<body>
    <div class="mx-auto">
        <!-- form start -->
        <div class="card">
            <div class="card-header bg-warning">
           Form buku
            </div>
                <div class="card-body">
                  <!-- alert start -->
                  <?php
                  if($error){
                  ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error?>
                        </div>
                  <?php
                  }
                  ?>
                  <?php
                  if($sukses){
                  ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $sukses?>
                        </div>
                  <?php
                  }
                  ?>
                  <!-- alert end -->

                    <form action="" method="post">
                        <div class="mb-3 row">
                            <label for="No" class="col-sm-2 col-form-label">Kode buku</label>
                            <div class="col-sm-10">
                            <input type="text"  name="No" class="form-control" id="No" value="<?php echo $No?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                            <input type="text" name="Judul" class="form-control" id="Judul" value="<?php echo $Judul?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Pengarang" class="col-sm-2 col-form-label">Penulis</label>
                            <div class="col-sm-10">
                            <input type="text"  name="Pengarang" class="form-control" id="Pengarang" value="<?php echo $Pengarang?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Jenis" class="col-sm-2 col-form-label">Jenis</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="Jenis" id="Jenis">
                                    <option value="">-pilih Jenis buku-</option>
                                    <option value="pemrograman" <?php if($Kelas=="pemrograman") echo"selected"?>>pemrograman</option>
                                    <option value="Editing" <?php if($Kelas=="Editing") echo"selected"?>>Editing</option>
                                    <option value="Desain" <?php if($Kelas=="Desain") echo"selected"?>>Desain</option>
                                    <option value="Teknik Komputer" <?php if($Kelas=="Teknik_Komputer") echo"selected"?>>Teknik Komputer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        </div>
                    </form>
                </div>
        </div>
        <!-- form end -->

        <!-- table start -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
           Data buku
            </div>
                <div class="card-body">
                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Kode</th>
                              <th scope="col">Judul</th>
                              <th scope="col">Penulis</th>
                              <th scope="col">Jenis</th>
                              <th scope="col">Aksi</th>
                          </tr>
                          <tbody>
                              <?php
                              $sql2 = "select*from buku order by No desc";
                              $q2   = mysqli_query($koneksi, $sql2);
                              $urut =1;

                              while($data = mysqli_fetch_array($q2)){
                                  $No           = $data['No'];
                                  $Judul        = $data['Judul'];
                                  $Pengarang    = $data['Pengarang'];
                                  $Jenis        = $data['Jenis'];

                                  ?>
                                <tr>
                                    <th scope="row"><?php echo $urut++ ?></th>
                                    <td scope="row"><?php echo $No?></td>
                                    <td scope="row"><?php echo $Judul?></td>
                                    <td scope="row"><?php echo $Pengarang?></td>
                                    <td scope="row"><?php echo $Jenis?></td>
                                    <td scope="row">
                                        <a href="perpusBagol.php?page=tampil_buku&op=delete&No=<?php echo $No?>" onclick="return confirm('Yakin mau delete data?')"> <button type="button" class="btn btn-danger">Delete</button></a>
                                       
                                    </td>
                                </tr>
                                  <?php
                              }
                              ?>
                          </tbody>
                      </thead>
                  </table>
                </div>
        </div>
        <!-- table end -->
    </div>
</body>
</html>