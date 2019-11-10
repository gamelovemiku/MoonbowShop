<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    table {
        margin-bottom: 40px;
    }

</style>


<?php

    $count = 8;

    $num = " ";

?>

<body>
    <table style="height: 825px; margin-left: auto; margin-right: auto; margin-botton: -200px;" border="1" width="680">
        <tbody>
            @for ($i = 0; $i < $count; $i++)
            <tr>
                <th style="width: 140px; height: 120px; text-align: center;">
                    <h1 style="font-size: 40px;">{{ $num }}</h1>
                </th>
                <th style="width: 140px; height: 120px; text-align: center;">
                    <h1 style="font-size: 40px;">{{ $num }}</h1>
                </th>
                <th style="width: 140px; height: 120px; text-align: center;">
                    <h1 style="font-size: 40px;">{{ $num }}</h1>
                </th>
                <th style="width: 140px; height: 120px; text-align: center;">
                    <h1 style="font-size: 40px;">{{ $num }}</h1>
                </th>
                <th style="width: 140px; height: 120px; text-align: center;">
                    <h1 style="font-size: 40px;">{{ $num }}</h1>
                </th>
            </tr>
            @endfor

        </tbody>
    </table>
</body>
</html>


