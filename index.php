<?php
session_start();
if (!isset($_SESSION['timedateRefreshCount']))
    $_SESSION['timedateRefreshCount'] = 0;
?>

<!DOCTYPE hmtl>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Server-Time Updates with AJAX</title>
        <script>
            //Set up AJAX infrastructure for requesting date/time from server
            var request = null;

            function getCurrentTime()
            {
                request = new XMLHttpRequest();
                var url = "time.php";
                request.open("GET", url, true);
                request.onreadystatechange = updatePage;
                request.send(null);
            }

            function updatePage()
            {
                if(request.readyState == 4)
                {
                    var dateDisplay = document.getElementById("datetime");
                    dateDisplay.innerHTML = request.responseText;
                    var hiddenParagraph = document.getElementById("colorChoice");
                    dateDisplay.style.color = hiddenParagraph.innerHTML;
                }
            }
        </script>
    </head>
<body>
    <h2>Welcome!</h2>
    <?php
        echo "<h3 id='datetime'> It's ".date("l, F jS").".<br\>\r\n";
        echo "The time is ".date("g:ia").".</h3>\r\n";
    ?>
    <h3>That is our time, it may not be yours.</h3>
    <h6>FYI:<br/>The date and time on this page are refreshed every 60 seconds. When that happens, AJAX is used to
    refresh only those lines of test. To vividly demonstrate this fact, the text is redrawn in different colors,
        while the rest of the page remains the same.</h6>

    <script>
        getCurrentTime();
        setInterval('getCurrentTime()', 6000);
    </script>
</body>
</html>
