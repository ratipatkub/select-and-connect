<html>

<head>
    <title> Select to See Detail 651</title>
</head>

<body>
    <?php
    require "connect.php";
    $sql = "SELECT*FROM customer";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    ?>

    <table width="800" border="1"></table>
    <tr>
        <th width="90">
            <div align="center">ชื่อผู้ใช้</div>
        </th>
        <th width="140">
            <div align="center">ชื่อ</div>
        </th>
        <th width="120">
            <div align="center">วันเกิด</div>
        </th>
        <th width="100">
            <div align="center">อีเมล์</div>
        </th>
        <th width="50">
            <div align="center">ประเทศ</div>
        </th>
        <th width="70">
            <div align="center">ยอดหนี้</div>
        </th>
    </tr>

    <?php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <tr>
            <td>
                <?php echo $result["CustomerID"]; ?>
            </td>

            <td>
                <?php echo $result["Name"]; ?>
            </td>

            <td><?php echo $result["Birthdate"];
                ?><div>
            </td>
            <td><?php echo $result["Email"]; ?></td>
            <td><?php echo $result["CountryCode"];
                ?></div>
            </td>
            <td><?php echo $result["OutstandingDebt"];
                ?></td>
        </tr>
    <?php
    }
    ?>
    </table>
    <?php
    $conn = null;
    ?>
</body>

</html>