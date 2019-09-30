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

<body>
    <?php
        $num = 5;
        $paper = 1000;

        $paper = $paper/48;

    ?>
    @for ($i = 0; $i < $paper; $i++)
    <table style="height: 825px; margin-left: auto; margin-right: auto;" border="1" width="680">
        <tbody>
        @for ($j = 0; $j < 8; $j++)
            <tr>
                <td style="width: 140px; height: 120px; text-align: center;">
                    <h1 style="font-size: 40px;">{{ $num }}</h1>
                </td>
                <td style="width: 140px; height: 120px; text-align: center;">
                    <h1 style="font-size: 40px;">{{ $num }}</h1>
                </td>
                <td style="width: 140px; height: 120px; text-align: center;">
                    <h1 style="font-size: 40px;">{{ $num }}</h1>
                </td>
                <td style="width: 140px; height: 120px; text-align: center;">
                    <h1 style="font-size: 40px;">{{ $num }}</h1>
                </td>
                <td style="width: 140px; height: 120px; text-align: center;">
                    <h1 style="font-size: 40px;">{{ $num }}</h1>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
    @endfor
</body>
</html>


