<!DOCTYPE html>


<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="icon.jfif">
        <title>Mitgard_Heroes</title>
        <link rel="stylesheet" href="CSS/Sugestao_instantanea.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <body>
      
        <form>
            <input id="nhe" type="text" onkeyup="ShowResult(this.value)"> 
            <div id="sugestao"></div>
        </form>
        <script>
         function Close(){
              var div = document.getElementById('sugestao')
              div.innerHTML = ''
              div.style.border = ''
         }
         function ShowResult(thing){           
             var div = document.getElementById('sugestao')
             div.innerHTML = '';
             div.style = '';
             fetch(`sugestoes.php?persona=${thing}`)
                     .then(function(response){
                         return response.json();
             })
                     .then(function(data){
                         for(var i in data){
                             if(thing.length == 0){
                           div.innerHTML = '';
                    }else{                        
                        var p = document.createElement('p'); 
                        p.innerText = data[i]['nome']
                        p.setAttribute('onclick',`Autocomplete(this.innerHTML)`)
                        div.appendChild(p)
                        div.style.border = '1px solid black';
                        div.style.width = '45vw'
                        
                    }
                    }
             })
         }
        function Autocomplete(value){
            var input = document.getElementById('nhe');
            input.value = value;
    }
        
        </script>
          <div id="lateral" onclick="Close()">
            
        </div>
    </body>