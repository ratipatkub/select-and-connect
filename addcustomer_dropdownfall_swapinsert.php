<?php
require 'connect.php';

// 1. ดึงข้อมูลประเทศมาแสดงใน Dropdown
$sql_select = "select * from country order by CountryCode";
$stmt_s = $conn->prepare($sql_select);
$stmt_s->execute();
?>

<html>

<head>
    <title>User Registration</title>
</head>

<body>
    <h1>Add customer</h1>
    <form action="addcustomer_dropdownfull_swapinsert.php" method="POST">
        <input type="text" placeholder="Enter Customer ID" name="CustomerID" required> <br><br>
        <input type="text" placeholder="Enter your Name" name="Name" required> <br><br>
        <input type="number" placeholder="outstandingDebt" name="outstandingDebt"> <br><br>
        <input type="email" placeholder="Email" name="Email"> <br><br>
        <input type="date" placeholder="Enter your birthdate" name="Birthdate"> <br><br>

        <label>Select a country code</label>
        <select name="CountryCode">
            <?php while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) : ?>
                <option value="<?php echo $cc["CountryCode"]; ?>">
                    <?php echo $cc["CountryName"]; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>

<?php
// 2. ตรวจสอบการกดปุ่ม Submit
if (isset($_POST['submit'])) :

    // ตรวจสอบว่าข้อมูลสำคัญไม่เป็นค่าว่าง
    if (!empty($_POST['CustomerID']) && !empty($_POST['Name'])) :

        $sql = "INSERT INTO customer (CustomerID, Name, CountryCode, OutstandingDebt, Email, Birthdate)
                VALUES (:CustomerID, :Name, :CountryCode, :OutstandingDebt, :Email, :Birthdate)";

        $stmt = $conn->prepare($sql);

        // ผูกตัวแปร (ต้องตรงกับ name ใน Form)
        $stmt->bindParam(':CustomerID', $_POST['CustomerID']);
        $stmt->bindParam(':Name', $_POST['Name']);
        $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
        // ใน Form ใช้ชื่อ "outstandingDebt" (d ตัวเล็ก) ต้องแก้ให้ตรงกัน
        $stmt->bindParam(':OutstandingDebt', $_POST['outstandingDebt']);
        $stmt->bindParam(':Email', $_POST['Email']);
        $stmt->bindParam(':Birthdate', $_POST['Birthdate']);

        if ($stmt->execute()) :
            echo "Successfully added new customer";
        else :
            echo "Failed to add new customer";
        endif;

    else :
        echo "Please fill in Customer ID and Name";
    endif;

    // ปิดการเชื่อมต่อเมื่อทำงานเสร็จสิ้น
    $conn = null;

endif; // ปิด if (isset($_POST['submit']))
?>