<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .error {
            color: #FF0000;
        }
        .success {
            color: green;
        }
    </style>
</head>

<body>
    <center>
        <br><br>
        <h2>Add City Data </h2>
        <br>
        <p id="msg"></p>
        <form method="POST" id="city_form" autocomplete="off">
            City Name : <input type="text" name="city_name" id="city_name">
            <button type="submit" name="submit" id="submit">submit</button>
        </form>
    </center>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>

</body>

</html>