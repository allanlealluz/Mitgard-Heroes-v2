<!DOCTYPE html>


<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="CSS/Batalha3v3.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <body>
        <div class="esquerda">
               <div class="area" id='area'>
           <div class="espaco" id="11" name="espaco"  style="border:1px solid black;background:white;"onclick="ListarPersonagem(this.id)"></div>
           <div class="espaco" id="12" name="espaco"    style="border:1px solid black;background:white;"onclick="ListarPersonagem(this.id)"></div>
           <div class="espaco" id="13" name="espaco"    style="border:1px solid black;background:white;"onclick="ListarPersonagem(this.id)"></div> 
           <div class="espaco" id="14" name="espaco"    style="border:1px solid black;background:white;"onclick="ListarPersonagem(this.id)"></div>
        </div>
       
        <div id="dados-personagem"></div>
        
         <div class="area" id='area'>
           <div class="espaco" id="21" name="espaco"   style="border:1px solid black;background:white;" onclick="ListarPersonagem(this.id)">oi</div>
           <div class="espaco" id="22" name="espaco"   style="border:1px solid black;background:white;" onclick="ListarPersonagem(this.id)">oi</div>
           <div class="espaco" id="23" name="espaco"   style="border:1px solid black;background:white;" onclick="ListarPersonagem(this.id)">oi</div> 
           <div class="espaco"  id="24" name="espaco"   style="border:1px solid black;background:white;" onclick="ListarPersonagem(this.id)">oi</div>
        </div>
        
        <div class="area" id='area'>
           <div class="espaco" id="31" name="espaco"  style="border:1px solid black;background:white;"onclick="ListarPersonagem(this.id)">oi</div>
           <div class="espaco" id="32" name="espaco"    style="border:1px solid black;background:white;"onclick="ListarPersonagem(this.id)">oi</div>
           <div class="espaco" id="33" name="espaco"    style="border:1px solid black;background:white;"onclick="ListarPersonagem(this.id)">oi</div> 
           <div class="espaco" id="34" name="espaco"    style="border:1px solid black;background:white;"onclick="ListarPersonagem(this.id)">oi</div>
        </div>
        </div>
        <div class="direita">
                 <div class="area" id='area'>
           <div class="espaco" id="41" name="espaco"  style="border:1px solid black;background:white;"onclick="ListarPersonagem(this.id)">oi</div>
           <div class="espaco" id="42" name="espaco"    style="border:1px solid black;background:white;"onclick="ListarPersonagem(this.id)">oi</div>
           <div class="espaco" id="43" name="espaco"    style="border:1px solid black;background:white;"onclick="ListarPersonagem(this.id)">oi</div> 
           <div class="espaco" id="44" name="espaco"    style="border:1px solid black;background:white;"onclick="ListarPersonagem(this.id)">oi</div>
        </div>
       
        <div id="dados-personagem"></div>
        
         <div class="area" id='area'>
           <div class="espaco" id="51" name="espaco"   style="border:1px solid black;background:white;" onclick="ListarPersonagem(this.id)">oi</div>
           <div class="espaco" id="52" name="espaco"   style="border:1px solid black;background:white;" onclick="ListarPersonagem(this.id)">oi</div>
           <div class="espaco" id="53" name="espaco"   style="border:1px solid black;background:white;" onclick="ListarPersonagem(this.id)">oi</div> 
           <div class="espaco"  id="54" name="espaco"   style="border:1px solid black;background:white;" onclick="ListarPersonagem(this.id)">oi</div>
        </div>
        
        <div class="area" id='area'>
           <div class="espaco" id="61" name="espaco"  style="border:1px solid black;background:white;"onclick="ListarPersonagem(this.id)">oi</div>
           <div class="espaco" id="62" name="espaco"    style="border:1px solid black;background:white;"onclick="ListarPersonagem(this.id)">oi</div>
           <div class="espaco" id="63" name="espaco"    style="border:1px solid black;background:white;"onclick="ListarPersonagem(this.id)">oi</div> 
           <div class="espaco" id="64" name="espaco"    style="border:1px solid black;background:white;"onclick="ListarPersonagem(this.id)">oi</div>
        </div>
        </div>
         <div id="escolha"></div>
        <script>
             var div = document.getElementById('escolha')
             var divao = document.getElementById('dados-personagem')
            
             function desativar(){
                 div.innerHTML = ''
            div.style = ''
             }
        function ListarPersonagem(id){
            document.getElementById(id).style.background = 'white'
            var div = document.getElementById('escolha')
            div.innerHTML = ''
            fetch('procurar_personagem.php')
                    .then(function(response){
                         return response.json();
            })
               .then(function(data){
                         for(var i in data){                                                                                          
                        var p = document.createElement('p'); 
                        p.innerText = data[i]['nome'] 
                        p.setAttribute('onclick',`DefinirPersonagem(${data[i]['id']},${id})`)
                        div.appendChild(p)
                        div.style.border = '1px solid black';
                        div.style.width = '20vw'
                        div.style.background = 'white'
                       
                    }
             })           
            
          
        }
        function DefinirPersonagem(id_p,id){
            document.getElementById(id).style.background = 'white'
            divao.innerHTML = '';
             fetch(`procurar_personagem.php?id=${id_p}`)
                    .then(function(response){
                         return response.json();
            })
                    .then(function(data){
                       var valor = document.getElementById(id)
               for(var i in data){
               valor.innerHTML = data[i]['vida']
                valor.setAttribute('oncontextmenu',`Habs(${id_p},${id})`)
               valor.setAttribute('onclick',`Dano(${id},${id_p})`)
             
           }
         
            })
        }
        function Dano(id,id_outo){                                 
           var div = document.getElementById('escolha')
            div.innerHTML = ''
            div.style = ''
            var dano = window.prompt('Qual ?? o dano?')
            var valor = document.getElementById(id).innerText          
            var s = valor - dano
        
         if(s < 0){
             document.getElementById(id).innerHTML = '0'
             document.getElementById(id).setAttribute('onclick',`definirVida(${id},${id_outo})`)
         }else{
             document.getElementById(id).innerHTML = s 
         }
        
        }
        function Habs(id,id_outo){
           
              div.innerHTML = ''
            div.style = ''
            var divao = document.getElementById('dados-personagem')
            divao.innerHTML = ''
          fetch(`procurar_personagem.php?id=${id}`)
                    .then(function(response){
                         return response.json();
            })
              .then(function(data){
                       var valor = document.getElementById(id)
               for(var i in data){                                    
              var s = document.createElement('p'); 
                        s.innerHTML =  'Nome: '+data[i]['nome']+' '
                        s.innerHTML += 'Iniciativa: '+data[i]['ini']+' '
                        s.innerHTML += 'Armadura: '+data[i]['armadura']+'<br>'
                        s.innerHTML += 'Ataque normal: '+data[i]['hab1']+'<br>'
                        s.innerHTML += 'Especial: '+data[i]['hab2']+'<br>'
                        s.innerHTML += 'Passiva 1:'+data[i]['hab3']+'<br>'
                        s.innerHTML += 'Passiva 2:'+ data[i]['hab4']+'<br>'
                        s.innerHTML += 'Passiva 3:'+data[i]['hab5']+'<br>'
                        divao.appendChild(s)
              
           }
        })
        document.getElementById(id_outo).style.background = 'green'
        document.getElementById(id_outo).setAttribute('onmouseout',`teste(${id_outo})`)         
        
    }
    function teste(id_outo){
        document.getElementById(id_outo).style.background = 'white'
    }
    function definirVida(id,id_outo){
       
       fetch(`procurar_personagem.php?id=${id_outo}`)
                    .then(function(response){
                         return response.json();
            })
                    .then(function(data){
                   var valor = document.getElementById(id)   
               for(var i in data){             
             valor.innerHTML = data[i]['vida']
             document.getElementById(id).setAttribute('onclick',`Dano(${id},${id_outo})`)
           }
       })
    }
        </script>
    </body>
</html>
