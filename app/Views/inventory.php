<?php
if (isset($_GET['search'])) {
    // Get the search keyword
    $searchKeyword = $_GET['search'];

    // Filter the data based on the search keyword
    $filteredData = array_filter($data, function ($row) use ($searchKeyword) {
        foreach ($row as $field) {
            if (stripos($field, $searchKeyword) !== false) {
                return true; // Match found
            }
        }
        return false; // No match found
    });

    // Use the filtered data for display
    $data = $filteredData;
}
?>

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
            background: #fff;
            /* White background */
            border-radius: 10px;
            margin-top: -25px;
            /* Adjust this value to move the table upwards */
            color: #000;
            /* Black font color */
        }

        th,
        td {
            padding: 15px;
            line-height: 1.6;
            border: 1px solid #000;
            color: #000;
        }

        th {
            background: #B7E3D5;
            /* Updated background color */
            color: #000;
            font-size: 18px;
            border-bottom: 2px solid #000;
        }

        tr {
            border-bottom: 1px solid #000;
        }

        tr:nth-child(odd) {
            background: #fff;
            /* White background */
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

        .menu {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="welcome-container">
        <h2 style="color: black;">Welcome!</h2>
    </div>
    <div class="menu">
        <p>
            <a href="/">Dashboard</a> |
            <a href="/inventory">Inventory</a>
        </p>

    </div>

    <div id="search-bar" style="display: flex; justify-content: center">
        <form>
            <label for="search-input" style="margin-right: 5px;">Search:</label>
            <input type="text" id="search-input" name="search" placeholder="Enter keyword">
            <button type="submit">Search</button>
        </form>
    </div>

    <div style="display: flex; flex-direction: column; align-items: flex-end; padding: 10px;">
        <table>
            <thead>
                <tr>
                    <?php foreach ($fields as $field) : ?>
                        <th><?= $field ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <?php foreach ($fields as $field) : ?>
                            <td><?= $row->$field ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>