<?php
class AttackPokemon {
    public $attackMinimal;
    public $attackMaximal;
    public $specialAttack;
    public $probabilitySpecialAttack;

    public function __construct($attackMinimal, $attackMaximal, $specialAttack, $probabilitySpecialAttack) {
        $this->attackMinimal = $attackMinimal;
        $this->attackMaximal = $attackMaximal;
        $this->specialAttack = $specialAttack;
        $this->probabilitySpecialAttack = $probabilitySpecialAttack;
    }
    public function getSpecialAttack() {
        return $this->specialAttack;
    }
    public function getProbabilitySpecialAttack() {
        return $this->probabilitySpecialAttack;
    }
    public function setSpecialAttack($specialAttack) {
        $this->specialAttack = $specialAttack;
    }
    public function setProbabilitySpecialAttack($probabilitySpecialAttack) {
        $this->probabilitySpecialAttack = $probabilitySpecialAttack;
    }
    public function getAttackMinimal() {
        return $this->attackMinimal;
    }
    public function setAttackMinimal($attackMinimal) {
        $this->attackMinimal = $attackMinimal;
    }
    public function getAttackMaximal() {
        return $this->attackMaximal;
    }
    public function setAttackMaximal($attackMaximal) {
        $this->attackMaximal = $attackMaximal;
    }
}
class Pokemon {
    public $name;
    protected $url;
    protected $hp;
    protected $attackPokemon;

    public function __construct($name, $url, $hp, AttackPokemon $attackPokemon) {
        $this->name = $name;
        $this->url = $url;
        $this->hp = $hp;
        $this->attackPokemon = $attackPokemon;
    }
    public function getHP() {
        return $this->hp;
    }
    public function setHP($hp) {
        $this->hp = $hp;
    }
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getUrl() {
        return $this->url;
    }  
    public function setUrl($url) {
        $this->url = $url;
    }
    public function getAttackPokemon() {
        return $this->attackPokemon;
    }
    public function setAttackPokemon(AttackPokemon $attackPokemon) {
        $this->attackPokemon = $attackPokemon;
    }
    public function isDead() {
        return $this->hp <= 0;
    }
    public function attack(Pokemon $p) {
        $attackValue = rand($this->attackPokemon->attackMinimal, $this->attackPokemon->attackMaximal);
        if (rand(1, 100) >= $this->attackPokemon->probabilitySpecialAttack) {
            $attackValue *= $this->attackPokemon->specialAttack;
        }
        $p->hp -= $attackValue;
    }
    public function whoAmI() {?>
        <div>
        <?php 
        echo "<h3>{$this->name}</h3>";
        echo "<img src='{$this->url}' alt='{$this->name}' width='100'><br>";
        echo "HP: {$this->hp}<br><br>";
        echo "<p>AttaqueMinimal : {$this->attackPokemon->getAttackminimal()} <br>
        AttaqueMaximal : {$this->attackPokemon->getAttackmaximal()} <br> 
        SpecialAttack: {$this->attackPokemon->getSpecialAttack()} <br> 
        Probabilité spéciale: {$this->attackPokemon->getProbabilitySpecialAttack()}%</p>";?>
        </div>
    <?php }
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Pokemon</title>
</head>
<body>
<?php
// Création de deux Pokémons
$pokemon1 = new Pokemon("Pikachu", "pikachu.jpg", 100, new AttackPokemon(5, 15, 2, 30));
$pokemon2 = new Pokemon("Dracaufeu", "dracaufeu.png", 120, new AttackPokemon(8, 20 , 2, 40));
// Affichage des Pokémons 
echo "les combattants "; ?>
<div display=flex; flex-direction=row ;>
    <?php
$pokemon1->whoAmI();
$pokemon2->whoAmI();
?>
</div>
<?php
// Combat
while (!$pokemon1->isDead() && !$pokemon2->isDead()) {
    $pokemon1->attack($pokemon2);
    if ($pokemon2->isDead()) {
        ?>
    <div display=flex; flex-direction=row ;>
    <?php
    $pokemon1->whoAmI();
    $pokemon2->whoAmI();
    $round = 1;
    echo 'round ' . $round;
    ?>
</div>
    <?php
     echo "{$pokemon1->name} a gagné !<br>";    
    break;
    }
    $pokemon2->attack($pokemon1);
    if ($pokemon1->isDead()) {
        ?>
    <div display=flex; flex-direction=row ;>
    <?php
    $pokemon1->whoAmI();
    $pokemon2->whoAmI();
    ?>
    </div>
    <?php
        echo "{$pokemon2->name} a gagné!<br>";
        break;
    }
    $round ++;
    ?>
<div display=flex; flex-direction=row ;>
    <?php
$pokemon1->whoAmI();
$pokemon2->whoAmI();
?>
</div>
<?php
}
?>
</body>
</html>