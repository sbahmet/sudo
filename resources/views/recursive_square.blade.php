<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recursive squares</title>
    <style>
        .sq {width: 42%; height: 42%; margin: 4%; border: 1px solid black; float: left; box-sizing: border-box;}
        .container {width: 800px; height: 800px; border: 1px solid black; margin: auto; box-sizing: border-box;}
    </style>
</head>
<body>
    <div class="container"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            const stack = [];
            let currentStackCell = 0;

            stack.push([document.getElementsByClassName('container')[0]]);

            const depth = 5;

            function drawSq(outerSq) {
                let sq = null;
                for (let i=0; i<4; i++){
                    sq = document.createElement('div');
                    sq.classList.add('sq');
                    outerSq.appendChild(sq);
                    stack[currentStackCell].push(sq);
                }
            }

            function processOneCell(){
                stack.push([]);
                currentStackCell++;
                stack[currentStackCell-1].forEach(function(el){
                    drawSq(el);
                });
            }

            for(let i=0; i<depth; i++){
                processOneCell();
            }
        });
    </script>
</body>
</html>