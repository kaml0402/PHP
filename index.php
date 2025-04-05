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
            margin: 0 auto 30px auto;
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
        .split-view {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        .panel {
            background: white;
            border-radius: 8px;
            padding: 20px;
            width: 45%;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: left;
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
    natcasesort($files);
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
    echo "<div class='split-view' id='output-section'>";
    echo "<div class='panel'><h2>Code: $filename</h2><pre>" . htmlspecialchars(file_get_contents($filename)) . "</pre></div>";
    echo "<div class='panel'><h2>Output:</h2>";
    include($filename);
    echo "</div></div>";
}
?>

<footer>
    Made with ❤️ by Kamal Mittal
</footer>

<?php if (isset($_GET['file'])): ?>
<script>
    // Scroll to output section
    document.getElementById("output
