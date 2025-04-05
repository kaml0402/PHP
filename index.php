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
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            font-size: 18px;
            transition: 0.3s;
        }
        a:hover {
            color: #0056b3;
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

    <ul>
        <?php
        $files = glob("Q*_*.php");
        usort($files, function($a, $b) {
            preg_match('/Q(\d+)/', $a, $m1);
            preg_match('/Q(\d+)/', $b, $m2);
            return (int)$m1[1] - (int)$m2[1];
        });

        foreach ($files as $file) {
            if (preg_match('/Q(\d+)_([^.]+)\.php/', $file, $match)) {
                $qno = $match[1];
                $title = ucwords(str_replace(['_', '&'], [' ', '&amp;'], $match[2]));
                echo "<li><a href=\"$file\">Q$qno - $title</a></li>";
            }
        }
        ?>
    </ul>

    <footer>
        Made with ❤️ by Kamal Mittal
    </footer>

</body>
</html>
