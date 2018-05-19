/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function VerificarLogin(){
     $(document).ready(function () {

        $.post('/SareResponsive/Business/sesionesAction.php', {
            accion: 'taste',

            user: document.getElementById("user").value,
            password: document.getElementById("pass").value,

        },
                function (responseText)
                {

                    if(responseText=="index.php"){ 
                    }
                       location.href=responseText;


                        }
                                );
                            });
}
