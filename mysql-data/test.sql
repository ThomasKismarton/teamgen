USE teams;
CREATE TABLE pokemon(
  ID int not null AUTO_INCREMENT,
  PokeName varchar(100) NOT NULL,
  Type1 varchar(100) NOT NULL,
  Type2 varchar(100),
  IsFullyEvolved bool NOT NULL,
  IsLegendary bool NOT NULL,
  PRIMARY KEY (ID)
);

-- INSERT INTO pokemon(PokeName, Type1, Type2, IsFullyEvolved, IsLegendary)
-- VALUES("Bulbasaur", "Grass", "Poison", 0, 0), ("Ivysaur", "Grass", "Poison", 0, 0), ("Venusaur", "Grass", "Poison", 1, 0),
--       ("Charmander", "Fire", "NULL", 0, 0), ("Charmeleon", "Fire", "NULL", 0, 0), ("Charizard", "Fire", "Flying", 1, 0),
--       ("Squirtle", "Water", "NULL", 0, 0), ("Wartortle", "Water", "NULL", 0, 0), ("Blastoise", "Water", "NULL", 1, 0);

LOAD DATA INFILE "/data-files/hoenn_dex.csv" INTO TABLE teams.pokemon
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(PokeName, Type1, Type2, IsFullyEvolved, IsLegendary);