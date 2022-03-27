<!DOCTYPE html>


<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="icon.jfif">
        <title>Mitgard_Heroes</title>
        <link rel="stylesheet" href="CSS/Sugestao_instantanea.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <body>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
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
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="imagens/122tilui.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
        <img src="imagens/130obito.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
        <img src="imagens/138guh_urso.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </body>