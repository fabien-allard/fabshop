(function($){

    $('.addPanier').click(function(event){
            event.preventDefault();
            $.get($(this).attr('href'),{},function(data){
                if(data.error){
                    alert(`${data.messsage}. Le Produit à bien était ajouté a votre panier`);
                }else{
                    if(confirm(data.messsage + '. Voulez vous consulter votre panier ?')){
                        location.href = 'panier.php';
                    }else{
                        $('#total').empty().append(data.total);
                        $('#count').empty().append(data.count);
                    }
                }
            },'json');
            return false;
    });
})(jQuery);