<html>

<head>
    <title> Display Selected Customer Information 65</title>
</head>

<body>

    <?php
    if (isset($_GET["CustomerID"])) {
        $strCustomerID = $_GET["CustomerID"];
    }
    echo $strCustomerID;

    require "connect.php";
    $sql = "SELECT * FROM customer WHERE CustomerID = ?";
    $params =  array($strCustomerID);
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <table width="300" border="1">
        <tr>
            <th width="325">รหัสลูกค้าสมาชิก</th>
            <td width="240"><?php echo $result["CustomerID"]; ?></td>
        </tr>

        <tr>
            <th width="130">ชื่อ</th>
            <td><?php echo $result["Name"]; ?></td>
        </tr>
        <tr>
            <th width="130">Birthdate</th>
            <td><?php echo $result["Birthdate"]; ?></td>
        </tr>

        <tr>
            <th width="130">Email</th>
            <td><?php echo $result["Email"]; ?></td>
        </tr>

        <tr>
            <th width="130">CountryCode</th>
            <td><?php echo $result["CountryCode"]; ?></td>
        </tr>

        <tr>
            <th width="130">OutstandingDebt</th>
            <td><?php echo $result["OutstandingDebt"]; ?></td>
        </tr>
    </table>
    <?php
    $conn = null;
    ?>
</body>

</html>