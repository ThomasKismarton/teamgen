<?php
header("Content-type: text/css");

$border = '1px solid';
?>
:root {
  --bug: #bdc45b;
  --dark: #442d04;
  --dragon: #8c79dc;
  --electric: #f8c81d;
  --fairy:	#f0aee1;
  --fighting:	#6d2818;
  --fire:	#df2c04;
  --flying:	#84afff;
  --ghost:	#5d66a6;
  --grass:	#57a031;
  --ground:	#d1b85e;
  --ice:	#81e0e5;
  --normal:	#c3c2a4;
  --poison:	#9345b3;
  --psychic:	#ff398b;
  --rock:	#b29e59;
  --steel:	#B7B7CE;
  --water:	#3578f4;
}

.img {
  width: fit-content;
}

.pokeholder {
  display: flex;
  flex-wrap: wrap;
  height: 60%;
  width: 100%
}

.pokemon {
  width: 30%;
  height: 20%;
  padding: 10px;
  margin: 5px;
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  border-width: thick;
  border: solid;
  border-radius: 10px;
}

.pokemon.img {

}

div[type1=Bug] {
  background-color: var(--bug);
}
div[type1=Dark] {
  background-color: var(--dark);
}
div[type1=Dragon] {
  background-color: var(--dragon);
}
div[type1=Electric] {
  background-color: var(--electric);
}
div[type1=Fairy] {
  background-color: var(--fairy);
}
div[type1=Fighting] {
  background-color: var(--fighting);
}
div[type1=Fire] {
  background-color: var(--fire);
}
div[type1=Flying] {
  background-color: var(--flying);
}
div[type1=Ghost] {
  background-color: var(--ghost);
}
div[type1=Ground] {
  background-color: var(--ground);
}
div[type1=Ice] {
  background-color: var(--ice);
}
div[type1=Normal] {
  background-color: var(--normal);
}
div[type1=Poison] {
  background-color: var(--poison);
}
div[type1=Psychic] {
  background-color: var(--psychic);
}
div[type1=Rock] {
  background-color: var(--rock);
}
div[type1=Steel] {
  background-color: var(--steel);
}
div[type1=Water] {
  background-color: var(--water);
}
div[type1=Grass] {
  background-color: var(--grass);
}