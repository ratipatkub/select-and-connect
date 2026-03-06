<html>

<head>
    <title>User Registration11</title>
</head>

<body>
    <h1>Add Customer</h1>
    <form action="addcustomer.php" method="POST">

        <input type="text" placeholder="Enter Customer ID" name="CustomerID">
        <br> <br>
        <input type="text" placeholder="Enter your Name" name="Name">
        <br> <br>
        <input type="date" placeholder="Enter your birthdate" name="Birthdate">
        <br> <br>
        <input type="email" placeholder="Email" name="Email">
        <br> <br>
        <input type="text" placeholder="Country Name" name="CountryCode">
        <br> <br>
        <input type="number" placeholder="outstandingDebt" name="outstandingDebt">
        <br> <br>
        <input type="submit" value="Submit">
    </form>
</body>



</html>

<?php
if (isset($_POST['CustomerID']) && isset($_POST['Name'])) :
    echo "<br>" . $_POST['CustomerID'] . $_POST['Name'] . $_POST['Birthdate'] . $_POST['Email'] . $_POST['CountryCode'] . $_POST['outstandingDebt'];

    require 'connect.php';

    $sql = "insert into customer values(:CustomerID, :Name, :Birthdate, :Email, :CountryCode, :outstandingDebt)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CustomerID', $_POST['CustomerID']);
    $stmt->bindParam(':Name', $_POST['Name']);
    $stmt->bindParam(':Birthdate', $_POST['Birthdate']);
    $stmt->bindParam(':Email', $_POST['Email']);
    $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
    $stmt->bindParam(':outstandingDebt', $_POST['outstandingDebt']);

    if ($stmt->execute()):
        $message = 'Suscessfully add new customer';
    else :
        $message = 'Fail to add new customer';
    endif;
    echo $message;
    $conn = null;
endif;
?>