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
        <form id = "form">
                <input type = "hidden" id = "hid">
                <input type = "text" id = 'in' value = "0">
                <input type = 'button' value = 'C' class = 'but' id = 'clear' onclick = "Clear('all')">
                <input type = 'button' value = '&larr;' class = 'but' id = 'clear1' onclick = "Clear('1')">
                <input type = 'button' value = '.' class = 'but'>
                <input type = 'button' value = '+' class = 'but' id = 'operation+' onclick = "operation('+')">
                <input type = 'button' value = '9' class = 'but' id = 'number9' onclick = "setNum('9')">
                <input type = 'button' value = '8' class = 'but' id = 'number8' onclick = "setNum('8')">
                <input type = 'button' value = '7' class = 'but' id = 'number7' onclick = "setNum('7')">
                <input type = 'button' value = '-' class = 'but' id = 'operation-' onclick = "operation('-')">
                <input type = 'button' value = '6' class = 'but' id = 'number6' onclick = "setNum('6')">
                <input type = 'button' value = '5' class = 'but' id = 'number5' onclick = "setNum('5')">
                <input type = 'button' value = '4' class = 'but' id = 'number4' onclick = "setNum('4')">
                <input type = 'button' value = 'x' class = 'but' id = 'operationX' onclick = "operation('x')">
                <input type = 'button' value = '3' class = 'but' id = 'number3' onclick = "setNum('3')">
                <input type = 'button' value = '2' class = 'but' id = 'number2' onclick = "setNum('2')">
                <input type = 'button' value = '1' class = 'but' id = 'number1' onclick = "setNum('1')">
                <input type = 'button' value = '/' class = 'but' id = 'operationSlash' onclick = "operation('/')">
                <input type = 'button' value = 'e' class = 'but'>
                <input type = 'button' value = '0' class = 'but' id = 'number0' onclick = "setNum('0')">
                <input type = 'button' value = "&pi;" class = 'but'>
                <input type = 'button' value = '=' class = 'but' id = 'eq' onclick = "res()">
        </form>
        <div id = "test"></div>
        <script>
            function res(){
                var length = getVal("hid").length
                var num1 = numFromString(getVal("hid"))
                var num2 = getVal("in")

              //  document.getElementById("test").value =
                if(getVal("hid") == "")
                    return
                else{
                    switch(getVal("hid")[length -1]){
                        case "+":
                            var num = parseInt(num1) + parseInt(num2)
                            break
                        case "-":
                            var num = num1 - num2
                            break
                        case "/":
                            var num = parseInt(num1 / num2)
                            break
                        case "x":
                            var num = num1 * num2
                            break
                    }
                    document.getElementById("hid").value = ""
                }
                document.getElementById("in").value = num
            }

            function operation(op){ //oper
                num = getVal("in")
                document.getElementById("in").value = ""
                document.getElementById("hid").value = num + op

            }

            function setNum(num){
                document.getElementById("in").value = getVal("in") * 10 + parseInt(num)
            }

            function Clear(val){
                if(val == "all")
                    document.getElementById("in").value = 0
                else
                    document.getElementById("in").value = parseInt(getVal("in") / 10)
            }

            function getVal(id){
                return document.getElementById(id).value
            }

            function numFromString(str){
                var number = 0
                var j = str.length - 2
                for(var i = str.length - 2; i > -1; i--){
                    if(i != j)
                        number += (10 ** (j - i)) * parseInt(str[i])
                    else
                        number += parseInt(str[i])
                }
                return number
            }
        </script>
    </body>
</html>