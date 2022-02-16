<?php
include __DIR__ . '/dbconnect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = "DELETE FROM person where id= '$id'";
    $query = mysqli_query($conn, $delete);
    if ($query) {
        header('location:select-data.php');
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data From Database in Table</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: monospace;
        }

        body {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: darkcyan;
        }

        table {
            border-collapse: collapse;

        }

        table th {
            background-color: lawngreen;
            padding: 10px 10px;
            color: #fff;
            font-size: 1.6rem;
            font-weight: 600;
            letter-spacing: 1px;
        }

        table td {
            background-color: #f3f3f3;
            padding: 10px 10px;
            color: #111;
        }

        .opt1 {
            background-color: RED;
            color: #fff;
            font-size: 1rem;
            padding: 5px;
            text-decoration: none;
            border-radius: 2px;
        }

        .opt2 {
            background-color: blue;
            color: #fff;
            font-size: 1rem;
            padding: 5px;
            text-decoration: none;
            border-radius: 2px;
        }

        .link {
            /* height: 100px; */
            /* margin-left: -20px; */
            /* width: 100%; */
            position: relative;
            left: -43%;
        }

        .btn-add {
            background-color: green;
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
            padding: 5px 15px;
            text-decoration: none;
            border-radius: 2px;

        }

        .btn-edit {
            background-color: blue;
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
            padding: 5px 15px;
            text-decoration: none;
            border-radius: 2px;

        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .heading {
            justify-content: center;
            display: flex;
            text-align: center;
            color: #f3f3f3;
            font-size: 2.8rem;
            font-family: 'Courier New', Courier, monospace;
            margin-bottom: -1px;
            letter-spacing: 4px;
            height: 70px;
            width: 500px;
            border-bottom: 2px solid red;
            border-radius: 50px;

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="heading">
            <h1>ALL RECORDS</h1>
        </div>
        <div class="link">
            <a href="insert-form.php" class="btn-add">ADD</a>
            <a href="edit-form.php" class="btn-edit">EDIT</a>
        </div>


        <?php
        $sql = "SELECT * FROM person";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {

        ?>
            <table border='1' cellpadding='0'>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile No</th>
                        <th>Address</th>
                        <th>State</th>
                        <th>Pincode</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['p_name']; ?></td>
                            <td><?php echo $row['p_email']; ?></td>
                            <td><?php echo $row['p_number']; ?></td>
                            <td><?php echo $row['p_address']; ?></td>
                            <td><?php echo $row['p_state']; ?></td>
                            <td><?php echo $row['pincode']; ?></td>
                            <td>
                                <a href='?id=<?php echo $row['id']; ?>' class="opt1">Delete</a>
                                <a href="" class="opt2">Edit/Update</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        <?php } ?>

    </div>


</body>

</html>