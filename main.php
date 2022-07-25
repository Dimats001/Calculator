<!DOCTYPE html>
<html lang = "ru">
    <head>
        <meta charset = "utf-8">
        <title>Калькулятор</title>
        <style>
            #form{
                width: 317px;
                height: 280px;
                box-sizing: border-box;
                margin: 1rem;
                background-color: #ccc;
                border: 2px solid black;
                border-radius: 2px;
            }
            #in{
                width: 296px;
                box-sizing: border-box;
                margin: 0.5rem;
                height: 30px;
            }

            .but{
                 width: 59px;
                 height: 30px;
                 box-sizing: border-box;
                 margin: 0.5rem;
            }
        </style>
   </head>
    <body>
        <?php
        session_start();
        if(isset($_POST['val']))
            $val = $_POST['val'];
        else
            $val = 0;

        if(isset($_POST['number']))
            if($val == 0)
                $val = $_POST['number'];
            else
                $val = $val * 10 + $_POST['number'];


        if(isset($_POST['clear'])){
            $val = 0;
            session_destroy();
        }

        if(isset($_POST['clear1'])){
            $r = $val % 10;
            $val -= $r;
            $val /= 10;
        }

        if(isset($_POST['operation'])){
            $_SESSION['value1'] = $val;
            $_SESSION['operation'] = $_POST['operation'];
            $val = 0;
        }

        if(isset($_POST['eq']))
            if(isset($_SESSION['value1'])){
                switch($_SESSION['operation']){
                    case "+":
                        $val += $_SESSION['value1'];
                        unset($_SESSION['value1']);
                        break;
                    case "-":
                        $val = $_SESSION['value1'] - $val;
                        unset($_SESSION['value1']);
                        break;
                    case "x":
                        $val *= $_SESSION['value1'];
                        unset($_SESSION['value1']);
                        break;
                    case "/":
                        $val = intdiv($_SESSION['value1'], $val);
                        unset($_SESSION['value1']);
                        break;

                }
            }


        echo <<< _END
            <form action = 'main.php' method = 'POST' id = 'form'>
                <input type = 'hidden' name = 'val' value = '$val'>
                <input type = "text" id = 'in' value = "$val">
                <input type = 'submit' value = 'C' class = 'but' name = 'clear'>
                <input type = 'submit' value = '&larr;' class = 'but' name = 'clear1'>
                <input type = 'button' value = '.' class = 'but'>
                <input type = 'submit' value = '+' class = 'but' name = 'operation'>
                <input type = 'submit' value = '9' class = 'but' name = 'number'>
                <input type = 'submit' value = '8' class = 'but' name = 'number'>
                <input type = 'submit' value = '7' class = 'but' name = 'number'>
                <input type = 'submit' value = '-' class = 'but' name = 'operation'>
                <input type = 'submit' value = '6' class = 'but' name = 'number'>
                <input type = 'submit' value = '5' class = 'but' name = 'number'>
                <input type = 'submit' value = '4' class = 'but' name = 'number'>
                <input type = 'submit' value = 'x' class = 'but' name = 'operation'>
                <input type = 'submit' value = '3' class = 'but' name = 'number'>
                <input type = 'submit' value = '2' class = 'but' name = 'number'>
                <input type = 'submit' value = '1' class = 'but' name = 'number'>
                <input type = 'submit' value = '/' class = 'but' name = 'operation'>
                <input type = 'button' value = 'e' class = 'but'>
                <input type = 'submit' value = '0' class = 'but' name = 'number'>
                <input type = 'button' value = "&pi;" class = 'but'>
                <input type = 'submit' value = '=' class = 'but' name = 'eq'>
            </form>
        _END;
        ?>
    </body>
</html>