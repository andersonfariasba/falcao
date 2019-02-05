//Inicio o carregamento
$('body').loading({
    message: 'Carregando...' 
});

// Quando finaliza o carregamento para o loading
$(window).load(function() {
//alert('pagina inteira carregada!');
$('body').loading('stop');
})

//Caso precisa fazer alguma operação por tempo
/*setTimeout(function(){
 $('body').loading('stop');
}, 3000);
*/


