<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">

    <title>Perpustakaan</title>
    <style>
      .nav-link:hover{
        background-color: grey;
        
      }


      
    </style>
  </head>
  <body>
    <!-- navbar start -->
    <nav class="navbar navbar-dark fixed-top " style="background :#E74C3C;">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 px-5"></i>Perpustakaan Bagol</span>
      </div>
    </nav>
    <!-- navbar end -->
    
    <!-- menu utama start -->
    <div class="row no-gutters " style="height:700px; overflow:scroll;">
      <div class="col-md-2 bg-dark" >
        <ul class="nav flex-column  mt-5 p-3" style="position:fixed;">
          <li class="nav-item mb-1">
          <center><a class="nav-link active text-white" aria-current="page" href="perpusBagol.php">Menu utama</a></center>
            <hr class="bg-secondary">
          </li>
          <li class="nav-item mb-1">
            <center><a class="nav-link text-white" href="perpusBagol.php?page=tampil_buku">Buku</a></center>
            <hr class="bg-secondary">
          </li>
          <li class="nav-item mb-1">
          <center><a class="nav-link text-white" href="perpusBagol.php?page=tampil_transaksi">Transaksi</a></center>
            <hr class="bg-secondary">
          </li>
          <li class="nav-item mb-1">
          <center><a class="nav-link text-white" href="perpusBagol.php?page=tampil_anggota">Anggota</a></center>
            <hr class="bg-secondary">
          </li>
          <li class="nav-item mb-1">
          <center><a class="nav-link text-white" href="perpusBagol.php?page=tampil_petugas">Petugas</a></center>
            <hr class="bg-secondary">
          </li>
        </ul>
      </div>
     
      <div class="col-md-10 mt-5" style="background:#87CEEB; ">
      <?php
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        switch ($queries['page']) {
          case 'tampil_buku':
            # code...
            include 'tampilBuku.php';
            break;
          case 'tampil_transaksi':
              # code...
              include 'tampilTransaksi.php';
              break;
          case 'tampil_anggota':
            # code...
            include 'tampilAnggota.php';
            break;
          case 'tampil_petugas':
              # code...
              include 'tampilPetugas.php';
              break;
          case 'utama':
                # code...
                include '';
                break;
        default:
		          #code...
		      include 'utama.php';
		      break;
        }
        ?>
      </div>
      
    </div>
    <!-- menu utama end -->

    <footer class=" text-center text-lg-start bg-warning" >
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright:
        <a class="text-dark" href=""> XI RPL 1</a>
      </div>
      <!-- Copyright -->
    </footer>

    
   













    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>