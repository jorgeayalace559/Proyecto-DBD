Vuelos Disponibles
<br><br>
(DEBERÍA APARECER UN LISTADO CON LOS VUELOS DISPONIBLES Y SU PRECIO)
<br><br>
<br><br>

<html>
    <head> 
        <title>Menu Desplegable</title> 
            <style type="text/css"> 

                * { 
                    margin:0px; padding:0px; 
                } 
                #header { 
                    margin:auto; width:175px; font-family:Arial, Helvetica, sans-serif;
                }
                ul, ol { 
                    list-style:none; 
                }
                .nav li a { 
                    background-color:#245; color:#fff; text-decoration:none; padding:10px 12px; display:block;
                    position:relative; right:550px;
                }
                .nav li a:hover { background-color:#255; } .nav li ul { display:none; position:absolute; min-width:140px; }
                
            </style> 
            </head>
                <body> 
                    <div id="header"> 
                        <ul class="nav"> 
                            <a href="">Reserva Tu Vuelo</a>
                            
                             
                            <li><a href="">Check-In</a>
                            
                            
                            </li> 
                            <li><a href="">Estado del Vuelo</a>
                            
                            
                            </li> 
                            <li><a href="">Vuelo, Hotel y Auto</a>
                            
                            
                            </li> 
                        </ul>
                    </div> 
                </body> 
            </html>


<p>Display some text when the checkbox is checked:</p>
Checkbox: <input type="checkbox" id="myCheck"  onclick="myFunction()">
<p id="text" style="display:none">Checkbox is CHECKED!</p>
<script>
function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>