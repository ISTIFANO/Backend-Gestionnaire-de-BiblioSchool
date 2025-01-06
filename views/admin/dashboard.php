<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">

        <?php include("../components/SideBar.php") ?>

        <!-- ========================= Main ==================== -->
        <div class="main">

        <?php include("../components/search-bar.php") ?>


        <!-- ======================= Cards ================== -->
        <?php include("../components/CardBox.php") ?>

        <!-- ================ Order Details List ================= -->
        <?php include("../components/Reservation.php") ?>


        <!-- ================= New Customers ================ -->
        <?php include("../components/users.php") ?>
    </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="../../public/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>