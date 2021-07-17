<?php
session_start();

$_SESSION['id'] = $_GET['id_dokter'];
include_once "php/config.php";
?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php
        $id = mysqli_real_escape_string($conn, $_GET['id_user']);
        $sql = mysqli_query($conn, "SELECT * FROM user WHERE id = {$id}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        } else {
          header("location: users.php");
        }
        ?>
        <?php if ($row['role_id'] == 3) { ?>
          <a href="../awal/dokter/back_list" class="back-icon"><i class="fas fa-arrow-left"></i></a>

          <img src="../assets/user/img/dokter/<?php echo $row['image']; ?>" alt="">
        <?php } else { ?>
          <a href="../dokter/back_list" class="back-icon"><i class="fas fa-arrow-left"></i></a>

          <img src="../assets/user/img/profil/<?php echo $row['image']; ?>" alt="">
        <?php } ?>
        <div class="details">
          <span><?php echo $row['nama']; ?></span>
          <p style="color: silver;">
            <?php
            if ($row['status'] == 0) {
              echo "Dilihat beberapa menit lalu";
            } else {
              echo "Sedang Aktif";
            }
            ?>
          </p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>

</html>