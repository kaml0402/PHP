<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kamal's PHP Practice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            padding: 40px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 20px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            transition: 0.3s;
        }
        a:hover {
            color: #0056b3;
        }
        .code-output {
            background: white;
            border-radius: 8px;
            margin: 30px auto;
            padding: 20px;
            max-width: 900px;
            text-align: left;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        pre {
            background: #eee;
            padding: 10px;
            overflow-x: auto;
        }
        footer {
            margin-top: 40px;
            color: gray;
            font-size: 14px;
        }
    </style>
</head>
<body>

<h1>Welcome to Kamal's PHP Practice</h1>
<p>Select a topic to view:</p>

<table>
    <tr>
        <th>#</th>
        <th>Topic</th>
    </tr>
    <?php
    $files = glob("Q*.php");
    natcasesort($files); // Sort Q1-Q100 correctly
    $i = 1;
    foreach ($files as $file) {
        $display = str_replace(["Q", "_", ".php"], ["Q", " ", ""], $file);
        echo "<tr><td>$i</td><td><a href='?file=$file'>$display</a></td></tr>";
        $i++;
    }
    ?>
</table>

<?php
if (isset($_GET['file']) && file_exists($_GET['file'])) {
    $filename = $_GET['file'];
    echo "<div class='code-output'>";
    echo "<h2>Code: $filename</h2>";
    echo "<pre>" . htmlspecialchars(file_get_contents($filename)) . "</pre>";
    echo "<h2>Output:</h2>";
    echo "<div>";
    include($filename);
    echo "</div></div>";
}
?>

<footer>
    Made with ❤️ by Kamal Mittal
</footer>

</body>
</html>
