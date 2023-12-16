<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Inventory</title>
    <style>
        body {
            background: #fff;
            margin: 0;
            font-family: 'Inter';
        }

        h2 {
            text-align: center;
            color: #fff;
            margin: 20px 0;
        }

        form {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 10px;
            padding: 10px;
        }

        button {
            background-color: #ff5722;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        div {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        table {
            border-collapse: collapse;
            border: 3px solid #000;
            width: 80%;
            text-align: center;
            margin: 0 auto;
            background: #fff; /* White background */
            border-radius: 10px;
            margin-top: -25px; /* Adjust this value to move the table upwards */
            color: #000; /* Black font color */
        }

        th,
        td {
            padding: 15px;
            line-height: 1.6;
            border: 1px solid #000;
            color: #000;
        }

        th {
            background: #B7E3D5; /* Updated background color */
            color: #000;
            font-size: 18px;
            border-bottom: 2px solid #000;
        }

        tr {
            border-bottom: 1px solid #000;
        }

        tr:nth-child(odd) {
            background: #fff; /* White background */
        }

        .empty-row td {
            height: 10px;
            background: #00bcd4;
            border: none;
            border-left: none;
            border-right: none;
        }

        .welcome-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;

        #search-bar {
            margin: 10px;
            display: flex;
            justify-content: flex-end;
        }

        #search-input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        }
    </style>
</head>

<body>
    <div class="welcome-container">
        <h2 style="color: black;">Welcome!</h2>
    </div>

    <div id="search-bar">
        <form>
            <label for="search-input" style="margin-right: 5px;">Search:</label>
            <input type="text" id="search-input" name="search" placeholder="Enter keyword">
            <button type="submit">Search</button>
        </form>
    </div>

    <div style="display: flex; flex-direction: column; align-items: flex-end; padding: 10px;">
        <table>
            <tr>
                <th style="color: black;">id</th>
                <th style="color: black;">brandName</th>
                <th style="color: black;">genericName</th>
                <th style="color: black;">NDC</th>
                <th style="color: black;">dosage</th>
                <th style="color: black;">expDate</th>
                <th style="color: black;">supplyID</th>
                <th style="color: black;">purchasePrice</th>
                <th style="color: black;">sellPrice</th>
                <th style="color: black;">stock</th>
            </tr>

            <?php
                function printRows() {
                    // Existing data
                    $medicineData = array(
                        "id" => 1, 
                        "brandName" => "Aldactone", 
                        "genericName" => "spironolactone", 
                        "NDC" => 12365, 
                        "dosage" => 25, 
                        "expDate" => "12/24", 
                        "supplyID" => 1, 
                        "purchasePrice" => 14.56, 
                        "sellPrice" => 17.88, 
                        "stock" => 73,
                    );

                    // New medicine data
                    $newMedicine = array(
                        "id" => 2,
                        "brandName" => "ExampleMed",
                        "genericName" => "exampleGeneric",
                        "NDC" => 54321,
                        "dosage" => 50,
                        "expDate" => "01/25",
                        "supplyID" => 2,
                        "purchasePrice" => 22.45,
                        "sellPrice" => 28.99,
                        "stock" => 50,
                    );

                    // Add the new medicine to the array
                    $medicineEntry = [$medicineData, $newMedicine];

                    // Print all rows
                    foreach ($medicineEntry as $data) {
                        echo "<tr>";
                        echo "<td>" . $data["id"] . "</td>";
                        echo "<td>" . $data["brandName"] . "</td>";
                        echo "<td>" . $data["genericName"] . "</td>";
                        echo "<td>" . $data["NDC"] . "</td>";
                        echo "<td>" . $data["dosage"] . "</td>";
                        echo "<td>" . $data["expDate"] . "</td>";
                        echo "<td>" . $data["supplyID"] . "</td>";
                        echo "<td>" . $data["purchasePrice"] . "</td>";
                        echo "<td>" . $data["sellPrice"] . "</td>";
                        echo "<td>" . $data["stock"] . "</td>";
                        echo "</tr>";
                    }
                }
            printRows();
            ?>
        </table>
    </div>
</body>
</html>