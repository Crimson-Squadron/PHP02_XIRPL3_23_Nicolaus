<?php
    include 'koneksi.php';

    $query = "SELECT * FROM buku;";
    $sql = mysqli_query($conn, $query);
    $no = 0;

?>
<!DOCTYPE html>
<html lang="en">
   <head>
       <!-- Bootstrap -->
       <link href="css/bootstrap.min.css" rel="stylesheet">
       <script src="js/bootstrap.bundle.min.js"></script>
       <link rel="stylesheet" type="text/css" href="main.css">
    
       <!--Font Awsome-->
       <link rel="stylesheet" href="fontawsm/css/font-awesome.min.css">

       <title>PHP02-CRUD</title>
   </head>
   <body>
       <nav class="navbar navbar-expand-md">
          <div class="container-fluid">
              <a class="navbar-brand" href="#">
              Database Perpustakaan
              </a>
          </div>
       </nav>
    
       <div class="container-fluid">
           <h1 class="mt-3">Koleksi Buku Perpustakaan</h1>
           <br>
           <br>
           <br>
           <a href="kelola.php" type="button" class="btn btn-primary mb-4">
               <i class="fa fa-plus" aria-hidden="true"></i>
               Tambah Data
           </a>
           <div class="table-responsive">
               <table class="table align-middle table-bordered table-hover">
                   <thead>
                      <tr>
                          <th>ID Buku</th>
                          <th>Judul Buku</th>
                          <th>Penulis</th>
                          <th>Jenis Buku</th>
                          <th>Gambar Buku</th>
                          <th>Opsi</th>
                      </tr>
                   </thead>
                   <tbody>
                      <?php
                          while($result = mysqli_fetch_assoc($sql)){
                      ?>
                      <tr>
                         <td><center>
                            <?php echo ++$no; ?>.
                        </center></td>
                        <td><?php echo $result['judul_buku']; ?></td>
                        <td><?php echo $result['penulis']; ?></td>
                        <td><?php echo $result['jenis_buku']; ?></td>
                        <td>
                            <img src="img/<?php echo $result['gambar_buku']; ?>" style="width: 175px;">
                        </td>
                        <td>
                            <a href="kelola.php?ubah=<?php echo $result['id_buku']; ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="proses.php?hapus=<?php echo $result['id_buku']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                    <?php
                        }
                    ?>
                   </tbody>
               </table>
        </div>
    </div>
</nav>
</body>
</html>