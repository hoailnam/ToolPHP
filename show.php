<!DOCTYPE html>
<html lang="en">

<head>
    <title>Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>Database Check Link Website</h2>

        
        <table class="table table-dark table-striped">
            <thead>

                <tr>
                    <th>ID</th>
                    <th>Link Check</th>
                    <th>Link Search</th>
                    <th>Status Code</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include './sql.php';
                $page = 1;
                $dbCon = new MySQLUtil();
                $param = array();
                $query = "select * from link";
                $list = $dbCon->getAllData($query, $param);
                foreach ($list as $l) {
                    echo '<tr>';
                    echo '<td>' . $l['id'] . '</td>';

                    echo '<td>' . $l['link_check'] . '</td>';

                    echo '<td>' . $l['link_search'] . '</td>';
                    if ($l['status_code'] == "404") {
                        echo '<td style = "color:red">' . $l['status_code'] . '</td>';
                    } else if ($l['status_code'] == "200") {
                        echo '<td style = "color:blue">' . $l['status_code'] . '</td>';
                    } else if ($l['status_code'] == "301") {
                        echo '<td style = "color:green">' . $l['status_code'] . '</td>';
                    } else if ($l['status_code'] == "302") {
                        echo '<td style = "color:black">' . $l['status_code'] . '</td>';
                    } else if ($l['status_code'] == "403") {
                        echo '<td style = "color:yellow">' . $l['status_code'] . '</td>';
                    } else if ($l['status_code'] == "400") {
                        echo '<td style = "color:pink">' . $l['status_code'] . '</td>';
                    } else
                        echo '<td style = "color:gray">' . $l['status_code'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <td><a href=""></a></td>

</body>

</html>