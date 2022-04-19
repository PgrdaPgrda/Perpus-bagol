<?php
//koneksi ke database mysql,
    include 'koneksi.php';

    $No	            = "";
	$Nama			= "";
	$ID_anggota		= "";
	$No_buku		= "";
    $Tgl_pinjam     = "";
    $Tgl_kembali    = "";

    if(isset($_GET['op'])){
        $op = $_GET['op'];
    }else{
        $op ="";
    }

    if($op =='delete'){
        $No = $_GET['No'];
        $sql1 = "delete from transaksi where No = '$No' ";
        $q1 = mysqli_query($koneksi, $sql1);
        if($q1){
            $sukses ="Berhasil menghapus data";
        }else{
            $error ="Gagal melakukan penghapusan data";
        }
    }

    if($op == 'edit'){
        $No         = $_GET['No'];
        $sql1       = "select * from transaksi where No  = '$No'";
        $q1         = mysqli_query($koneksi, $sql1);
        $r1         = mysqli_fetch_array($q1);
        $No              = $r1['No'];
        $Nama            = $r1['Nama'];
        $ID_anggota      = $r1['ID_anggota'];
        $No_buku         = $r1['No_buku'];
        $Tgl_pinjam      = $r1['Tgl_pinjam'];
        $Tgl_kembali      = $r1['Tgl_kembali'];
       

        if($No ==''){
            $error = "Data tidak ditemukan";
        }
    }


    if(isset($_POST['submit'])){ //untuk create
        $No              = $_POST['No'];
        $Nama            = $_POST['Nama'];
        $ID_anggota      = $_POST['ID_anggota'];
        $No_buku         = $_POST['No_buku'];
        $Tgl_pinjam      = $_POST['Tgl_pinjam'];
        $Tgl_kembali     = $_POST['Tgl_kembali'];

        if($No && $Nama && $ID_anggota && $No_buku && $Tgl_pinjam && $Tgl_kembali){
            if($op == 'edit'){ //untuk update
                $aql1 = "update transaksi set No= '$No', Nama='$Nama', ID_anggota ='$ID_anggota', No_buku ='$No_buku',Tgl_pinjam ='$Tgl_pinjam' ,Tgl_kembali ='$Tgl_kembali' where No = '$No'";
                $q1  = mysqli_query($koneksi, $sql1);
                if($q1){
                    $sukses = "data berhasil di update";
                }else{
                    $error ="data gagal di update";
                }
            }else { //untuk insert
                $sql1 = "insert into transaksi(No, Nama, ID_anggota, No_buku, Tgl_pinjam, Tgl_kembali) values ('$No','$Nama','$ID_anggota','$No_buku', '$Tgl_pinjam', '$Tgl_kembali')";
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
            font-size : 15px;
        }
    </style>
</head>
<body>
    <div class="mx-auto">
        <!-- form start -->
        <div class="card" ">
            <div class="card-header bg-warning">
           Form transaksi
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
                            <label for="No" class="col-sm-2 col-form-label">No</label>
                            <div class="col-sm-10">
                            <input type="text"  name="No" class="form-control" id="No" value="<?php echo $No?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                            <input type="text" name="Nama" class="form-control" id="Nama" value="<?php echo $Nama?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="ID_anggota" class="col-sm-2 col-form-label">ID anggota</label>
                            <div class="col-sm-10">
                            <input type="text"  name="ID_anggota" class="form-control" id="ID_anggota" value="<?php echo $ID_anggota?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="No_buku" class="col-sm-2 col-form-label">No buku</label>
                            <div class="col-sm-10">
                            <input type="text"  name="No_buku" class="form-control" id="No_buku" value="<?php echo $No_buku?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Tgl_pinjam" class="col-sm-2 col-form-label">Tgl pinjam</label>
                            <div class="col-sm-10">
                            <input type="date"  name="Tgl_pinjam" class="form-control" id="Tgl_pinjam" value="<?php echo $Tgl_pinjam?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Tgl_kembali" class="col-sm-2 col-form-label">Tgl kembali</label>
                            <div class="col-sm-10">
                            <input type="date"  name="Tgl_kembali" class="form-control" id="Tgl_kembali" value="<?php echo $Tgl_kembali?>">
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
           Data transaksi
            </div>
                <div class="card-body">
                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">No</th>
                              <th scope="col">Nama</th>
                              <th scope="col">ID anggota</th>
                              <th scope="col">No buku</th>
                              <th scope="col">Tgl pinjam</th>
                              <th scope="col">Tgl kembali</th>
                              <th scope="col">Aksi</th>
                          </tr>
                          <tbody>
                              <?php
                              $sql2 = "select*from transaksi order by No desc";
                              $q2   = mysqli_query($koneksi, $sql2);
                              $urut =1;

                              while($data = mysqli_fetch_array($q2)){
                                $No              = $data['No'];
                                $Nama            = $data['Nama'];
                                $ID_anggota      = $data['ID_anggota'];
                                $No_buku         = $data['No_buku'];
                                $Tgl_pinjam      = $data['Tgl_pinjam'];
                                $Tgl_kembali     = $data['Tgl_kembali'];

                                  ?>
                                <tr>
                                    <th scope="row"><?php echo $urut++ ?></th>
                                    <td scope="row"><?php echo $No?></td>
                                    <td scope="row"><?php echo $Nama?></td>
                                    <td scope="row"><?php echo $ID_anggota?></td>
                                    <td scope="row"><?php echo $No_buku?></td>
                                    <td scope="row"><?php echo $Tgl_pinjam?></td>
                                    <td scope="row"><?php echo $Tgl_kembali?></td>
                                    <td scope="row">
                                        <a href="perpusBagol.php?page=tampil_transaksi&op=delete&No=<?php echo $No?>" onclick="return confirm('Yakin mau delete data?')"> <button type="button" class="btn btn-danger">Delete</button></a>
                                       
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