<?php

// Displays navigation bar with given parameter
function setStyle() {
    echo '<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"/>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Inventory Manager User Interface</title>
    <style type="text/css">
        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
        }

        .container{
            margin: 8px;
        }

        section {
            margin: 8px;
        }

        table {
            margin: 8px;
        }

        table th {
            text-align: center;
        }

        table thead {
            text-align: center;
        }
        
        .navbar {
            overflow: hidden;
            background-color: #8d253e;
            position: fixed;
            top: 0;
            width: 100%;
        }

        .queryResult {
            padding: 20px;
        }

    </style>

</head>';
}

?>