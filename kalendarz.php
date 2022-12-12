<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mój kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>

<body>

    <div class="gorny-lewy">
        <img src="logo1.png" alt="Mój kalendarz"/>
    </div>

    <div class="gorny-prawy">
        <h1>KALENDARZ</h1>
        <?php
        require("connect.php");
        
        $sql = "SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-07-01'";
                $result = $conn -> query($sql);
                while($row = $result -> fetch_assoc()) {
                    $miesiac = $row['miesiac'];
                    $rok = $row['rok'];
                    echo "<p>miesiąc: $miesiac, rok: $rok</p>";
                }
        mysqli_close($conn)
        ?>
        
    </div>


    <main>
        <?php
        require("connect.php");

        $qr = "SELECT dataZadania, miesiac, wpis FROM `zadania` WHERE miesiac = 'lipiec'";
        $result = $conn->query($qr);
        while ($row = $result->fetch_assoc()) {
            $data = $row['dataZadania'];
            $miesiac = $row['miesiac'];
            $wpis = $row['wpis'];

            echo '<div>';
            echo "<h6>$data, $miesiac</h6>";
            echo "<p>$wpis</p>";
            echo '</div>';
        }

        mysqli_close($conn)
        ?>
    </main>




    <?php
    require("connect.php");

    if (isset($_POST['wydarzenie'])) {
        
        $wydarzenie = $_POST['wydarzenie'];
        $qr = "UPDATE zadania SET wpis = '$wydarzenie' WHERE dataZadania = '2020-07-13'";
        $conn->query($qr);
        $conn->close();
    }
    ?>

    <footer class="stopka">
        <form action="kalendarz.php" method="POST">
            <label for="wpis">dodaj wpis: <input type="text" name="wydarzenie"> <button type="submit">DODAJ</button></label>
            <br>
            <br>
            <p>Stronę wykonał: Przemysław Walerczyk</p>
        </form>
    </footer>

</body>

</html>






















<!-- Jan Kupczyk -->