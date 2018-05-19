/*
    Plugin pagination TdA 1.0
    Author: Javier Carabantes

    Uso: El table tiene que tener un ID
    * Por ese motivo no funcionara con class solo con IDs
    *
    *   $("#tableRoomList").paginationTdA({
            elemPerPage: 10
        });
    * Solo recibe un parametro elemPerPage que define cuantos rows mostrara por pagina
    * si no se indica el parametro por defecto son 2
*/
var paginaActual=1;
var paginaFinal=0;
(function ( $ ) {
    /* función privada*/
    function createTableFooterPagination(idTable, nTdsColspan, last)
    {
        var pagination = "<ul class='pagination pull-center'> <li><span><button class='btn-paginacion  paginationInit'>PRMERA</button></span> </li>";
        for (var i = 1; i <= last; i++)
        {
            pagination += "<li><span><button class='btn-paginacion paginationClick'>" + i +"</button></span> </li>";
        }
        pagination += "<li><span><button class='btn-paginacion paginationEnd'>&UacuteLTIMA</button></span></li></ul>"
        //tfoot = "<center><tfoot><tr><td colspan='"+nTdsColspan+"'>"+pagination+"</td></tr></tfoot></center>";
        $("#paginacion").html( pagination);

    /* idTable
        .find("tfoot").remove();
        idTable
        .find("tbody").before(tfoot);*/
    }



    $.fn.paginationTdA = function( options ) {

        var settings = $.extend({
            elemPerPage: 2
        }, options );


            var idTable = $( this );

            //Configuramos los TRs para comenzar con el plugin
            //de cada TR del table tbody agregamos la clase con la que haremos los calculos
            idTable.find("tbody").eq(0).find("tr").each(function(){
                $(this).addClass("elementToPaginate");
            });

            var elemPerPage = settings.elemPerPage;
            var totalElem = idTable.find("tbody").eq(0).find(".elementToPaginate").length;
            var first = 1;
            var division = Math.round(parseInt(totalElem) / elemPerPage);
            var last = totalElem > elemPerPage ?  division : first;
            if ((elemPerPage * last) < totalElem)
            {
                last += 1;
            }


            var numberOfTds = idTable.find("tbody").eq(0).find("tr").eq(0).find("th").length;
            createTableFooterPagination(idTable, numberOfTds, last);
                        //console.log(last+"last");
                        paginaFinal=last;
                        $("#pagina").html("<h3>Página "+paginaActual+" de "+paginaFinal+"</h3>");
            idTable.find("tbody").eq(0).find(".elementToPaginate").each(function(i){
                $(this)
                .attr("data-number", (i + 1));
                // Ocultamos solo los que no sean inferiores o iguales al elemPerPage (para visualizar los primeros)
                if ((i + 1) > elemPerPage)
                {
                    $(this).hide();
                }
            });

            /* Al clicar sobre un numero de la paginacion realizamos el algoritmo */
            $("body").on("click", ".paginationClick", function(e){
                e.preventDefault();
                idTable.find("tbody").eq(0).find(".elementToPaginate").hide();
                var nClicked = $(this).html();
                                //$(this).css("background-color", "yellow")
                var startIn = (elemPerPage * (nClicked - 1)) + 1;
                                // console.log(nClicked+"estado22222");
                                $("#pagina").html("<h3>Página "+nClicked+" de "+paginaFinal+"</h3>");
                var stopIn = (elemPerPage * nClicked)
                for(var i = startIn; i <= stopIn; i++)
                {
                    idTable.find("tbody").eq(0).find(".elementToPaginate[data-number='" + i + "']").fadeIn();
                }

            });

            /* Al clicar en 'primero' emulamos el algoritmo con nClicked = 1 (como si hubieramos clicado en 1)*/
            $("body").on("click", ".paginationInit", function(e){
                e.preventDefault();
                idTable.find("tbody").eq(0).find(".elementToPaginate").hide();
                var nClicked = 1;
                var startIn = (elemPerPage * (nClicked - 1)) + 1;
                var stopIn = (elemPerPage * nClicked);
                              //  console.log(startIn+"estado1");
                                $("#pagina").html("<h3>Página "+startIn+" de "+paginaFinal+"</h3>");
                for(var i = startIn; i <= stopIn; i++)
                {
                    idTable.find("tbody").eq(0).find(".elementToPaginate[data-number='" + i + "']").fadeIn();
                }
            });

            /* Al clicar en 'ultimo' emulamos el algoritmo con nClicked = last (como si hubieramos clicado en el ultimo numero)*/
            $("body").on("click", ".paginationEnd", function(e){
                e.preventDefault();
                idTable.find("tbody").eq(0).find(".elementToPaginate").hide();
                var nClicked = last;
                var startIn = (elemPerPage * (nClicked - 1)) + 1;
                               // console.log(startIn+"estado2");
                                $("#pagina").html("<h3>Página "+nClicked+" de "+paginaFinal+"</h3>");
                var stopIn = (elemPerPage * nClicked);

                for(var i = startIn; i <= stopIn; i++)
                {
                    idTable.find("tbody").eq(0).find(".elementToPaginate[data-number='" + i + "']").fadeIn();
                }
            });

        //});


        return this;

    };

}( jQuery ));
