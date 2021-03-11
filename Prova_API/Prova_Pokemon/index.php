<?php
$url = "https://raw.githubusercontent.com/Biuni/PokemonGO-Pokedex/master/pokedex.json"; 
$pokemons = json_decode(file_get_contents($url));
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokemon API</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Bulma Version 0.7.2-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="poke.css">
  </head>
  <body>
    <section class="hero is-info is-small">
      <div class="hero-body">
        <div class="container has-text-centered">
        <center> <img src="capa.png" width="50%"> </center>
          <p class="title">
             Listagem de Pokémons
          </p>
        </div>
      </div>
    </section>
    <section class="container">
      <?php
      //Verifica se existe o retorno
      if(count($pokemons->pokemon)) {
      $i = 0;
      foreach($pokemons->pokemon as $Pokemon) {
      $i++;
      ?>
      <?php if($i % 3 == 1) { ?>
      <div class="columns features">
      <?php } ?>
        <div class="column is-4">
          <div class="card">
            <div class="card-image has-text-centered">
              <figure class="image is-128x128">
                <img src="<?=$Pokemon->img?>" alt="<?=$Pokemon->name?>" class="" data-target="modal-image2">
              </figure>
            </div>
            <div class="card-content has-text-centered">
              <div class="content">
                <h4><?=$Pokemon->name?></h4>
                <p>
                  <ul>
                  <?php 
                    if(count($Pokemon->type)) {
                      echo "Tipo: ";
                      foreach($Pokemon->type as $Tipo) {
                        echo $Tipo . " ";
                      }
                      } ?>
                      <br>
                  Altura:<?=$Pokemon->height?><br>
                  Peso:<?=$Pokemon->weight?><br>
                  <?php 
                    if(count($Pokemon->weaknesses)) {
                      echo "Fraquezas: ";
                      foreach($Pokemon->weaknesses as $Fraqueza) {
                        echo $Fraqueza . " ";
                      }
                      } ?>
                      <br>
                  <?php
                  if(count($Pokemon->next_evolution)) {
                    echo "Próximas evoluções: ";
                    foreach($Pokemon->next_evolution as $ProximaEvolucao) {
                        echo $ProximaEvolucao->name . " ";
                    }
                  } else {
                    echo "Não possui próximas evoluções ";
                  }
                ?>
                </ul>
                </p>
              </div>
            </div>
          </div>
        </div>
      <?php if($i % 3 == 0) { ?>
      </div>
      <?php } } } else { ?>
        <strong>Nenhum pokemón retornado pela API</strong>
      <?php } ?>
    </section>
  </body>
</html>