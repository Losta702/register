<!DOCTYPE html>
<html>
<head>
    <title>Check In Stats</title>
</head>
<body>
    <?php
        session_start();
        $checkin_data = $_SESSION['checkin_data'];
    ?>

    <h1>Check In Stats</h1>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Total Sign-Ins</th>
        </tr>
        <?php
            foreach ($checkin_data as $name => $data) {
                $totalSignIns = isset($data['count']) ? $data['count'] : 0;
                echo "<tr>";
                echo "<td>$name</td>";
                echo "<td>$totalSignIns</td>";
                echo "</tr>";
            }
			
			if(isset($_POST['reset'])){
				echo 'what';
				foreach ($_SESSION['checkin_data'] as $name => $data) {
					if(isset($data['count'])){
						$_SESSION['checkin_data'][$name]['count'] = 0;
						foreach ($checkin_data as $name => $data) {
							$totalSignIns = isset($data['count']) ? $data['count'] : 0;
							echo "<tr>";
							echo "<td>$name</td>";
							echo "<td>$totalSignIns</td>";
							echo "</tr>";
						}
					}
				}
			}
        ?>
    </table>

    <form action="register.php" method="post">
        <input type="submit" value="Go Back to Check In Page">
    </form>
</body>
</html>
