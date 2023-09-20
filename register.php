<!DOCTYPE html>
<html>
<head>
    <title>Check In App</title>
</head>
<body>
    <?php
        session_start();
        
        if (!isset($_SESSION['checkin_data'])) {
            $_SESSION['checkin_data'] = array();
        }

        if (isset($_POST['checkin'])) {
            $name = $_POST['name'];
            $_SESSION['checkin_data'][$name]['checkin_time'] = date('Y-m-d H:i:s');
            $_SESSION['checkin_data'][$name]['count'] = isset($_SESSION['checkin_data'][$name]['count']) ? $_SESSION['checkin_data'][$name]['count'] + 1 : 1;
        }

        if (isset($_POST['checkout'])) {
            $name = $_POST['name'];
            if (isset($_SESSION['checkin_data'][$name]['count']) && $_SESSION['checkin_data'][$name]['count'] > 0) {
                $_SESSION['checkin_data'][$name]['checkout_time'] = date('Y-m-d H:i:s');
                //$_SESSION['checkin_data'][$name]['count']--;
            }
        }
    ?>

    <h1>Check In App</h1>

    <form method="post">
        Name: <input type="text" name="name" required>
        <input type="submit" name="checkin" value="Check In">
        <input type="submit" name="checkout" value="Check Out">
        <a href="stats.php"><input type="button" value="View Stats"></a>
    </form>

    <h2>Times</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Check In Time</th>
            <th>Check Out Time</th>
        </tr>
        <?php
            foreach ($_SESSION['checkin_data'] as $name => $data) {
                echo "<tr>";
                echo "<td>$name</td>";
                if(isset($data['checkin_time'])) {
                    echo "<td>{$data['checkin_time']}</td>";
                }
				if(isset($data['checkout_time'])) {
                    echo "<td>{$data['checkout_time']}</td>";    
                }
				echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
