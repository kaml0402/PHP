<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kamal's PHP Practice</title>
    <style>
        :root {
            --bg: #f0f0f0;
            --text: #333;
            --panel-bg: white;
            --link: #007BFF;
            --link-hover: #0056b3;
        }

        body.dark {
            --bg: #1e1e1e;
            --text: #eee;
            --panel-bg: #2c2c2c;
            --link: #66aaff;
            --link-hover: #3399ff;
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            padding: 40px;
            text-align: center;
            transition: background 0.3s, color 0.3s;
        }

        h1 {
            color: var(--text);
        }

        table {
            margin: 0 auto 30px auto;
            border-collapse: collapse;
            width: 80%;
            background: var(--panel-bg);
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 20px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        a {
            text-decoration: none;
            color: var(--link);
            transition: 0.3s;
        }

        a:hover {
            color: var(--link-hover);
        }

        .split-view {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .panel {
            background: var(--panel-bg);
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

        .dark pre {
            background: #333;
            color: #eee;
        }

        footer {
            margin-top: 40px;
            color: gray;
            font-size: 14px;
        }

        .toggle-btn {
            position: absolute;
            top: 20px;
            right: 30px;
            padding: 8px 14px;
            background: var(--panel-bg);
            color: var(--text);
            border: none;
            border-radius: 20px;
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<button class="toggle-btn" onclick="toggleMode()">🌗 Toggle Dark Mode</button>

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
    Made with ❤️ by Kamal Mittal | <a href="https://github.com/kaml0402" target="_blank">My GitHub</a>
</footer>

<script>
    function toggleMode() {
        document.body.classList.toggle("dark");
        localStorage.setItem("theme", document.body.classList.contains("dark") ? "dark" : "light");
    }

    // Load saved theme
    window.onload = () => {
        if (localStorage.getItem("theme") === "dark") {
            document.body.classList.add("dark");
        }
    };

    <?php if (isset($_GET['file'])): ?>
    // Auto-scroll to output
    document.getElementById("output-section").scrollIntoView({ behavior: "smooth" });
    <?php endif; ?>
</script>

</body>
</html>
