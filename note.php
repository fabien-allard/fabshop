<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page teste</title>
    <!--Import Font awesome Icon Font-->
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">    

</head>
<body>
<style>
    .star{
        font-size:1.5rem;
    }
    .hover{
        color: rgb(255, 196,  0);
    }
    /*1rem egal 16px 1.5rem equivaut a 24 pixel*/
</style>
<main>
    <section>
    <!------<h1 style="color: brown;">Veuillez noté l'article entre 5 et 0 étoiles</h1>--->
    <i class="star" data-note="1">&#9733;</i>
    <i class="star" data-note="2">&#9733;</i>
    <i class="star" data-note="3">&#9733;</i>
    <i class="star" data-note="4">&#9733;</i>
    <i class="star" data-note="5">&#9733;</i>
    <i class="note">Note:</i>



<script>
            const stars = document.querySelectorAll('.star');
            let check = false;
            stars.forEach(star => {
                star.addEventListener('mouseover', selectStars);
                star.addEventListener('mouseleave', unselectStars);
                star.addEventListener('click', activeSelect);
            })

            function selectStars(e){
                const data = e.target;
                const etoiles = priviousSiblings(data);
                if (!check){
                etoiles.forEach(etoile => {
                    etoile.classList.add('hover');
                })
            }
}
            function unselectStars(e){
                const data = e.target;
                const etoiles = priviousSiblings(data);
                    if (!check){
                        etoiles.forEach(etoile => {
                        etoile.classList.remove('hover');
                })
        }
    }
            function activeSelect(e) {
                check = true;
                document.querySelector('.note').innerHTML = 'Note ' + e.target.dataset.note;
    }
            function priviousSiblings(data) {
                let values = [data];
                    while (data = data.previousSibling){
                    if (data.nodeName === 'I'){
                        values.push(data);
                }
            }
            
                return values;
        }
</script>
    </section>
    </main>
<main>
    
  <ul class="pagination">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <li class="active"><a href="#!">1</a></li>
    <li class="waves-effect"><a href="#!">2</a></li>
    <li class="waves-effect"><a href="#!">3</a></li>
    <li class="waves-effect"><a href="#!">4</a></li>
    <li class="waves-effect"><a href="#!">5</a></li>
    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>
            
    </main>




</body>
</html>

