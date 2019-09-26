<?php 
spl_autoload_register(function ($class_name) {
    include 'Classes/' . $class_name . '.class.php';
});

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $health = $_POST['health'];
    $power = $_POST['power'];
    $weapon = $_POST['weapon'];
    $roles_id = $_POST['roles_id'];

    $fields = [
        'name'=>$name,
        'health'=>$health,
        'power'=>$power,
        'weapon'=>$weapon,
        'roles_id'=>$roles_id
    ];

    $character = new Character();

    $character->insert($fields);
}

include 'templates/header.html';
?>

<h3 class="titles">Créer un champion</h3>

<form action="" method="post">
  <div class="form-group">
    <label for="name">Pseudo</label>
    <input type="text" class="form-control" name="name" placeholder="Pseudo du personnage"required>
  </div>
  <div class="form-group">
    <label for="health">Vitalité</label>
    <input type="number" class="form-control" name="health" placeholder="Vie du personnage"required>
  </div>
  <div class="form-group">
    <label for="power">Pouvoir</label>
    <input type="number" class="form-control" name="power" placeholder="Pouvoir du personnage" required>
  </div>
  <div class="form-group">
    <label for="weapon">Arme</label>
    <input type="text" class="form-control" name="weapon" placeholder="Arme du personnage" required>
  </div>
  <div class="form-group">
    <label for="role">Rôle</label>
    <select class="custom-select" name="roles_id">
        <option value="1">Warrior</option>
        <option value="2">Mage</option>
        <option value="3">Thief</option>
        <option value="4">Archer</option>
        <option value="5">Priest</option>
    </select>
  </div>
    <div>
        <input type="submit" name="submit" class="btn btn-primary" value="Créer">
        <button class='btn btn-danger'><a href="index.php">Annuler</a></button>
    </div>
</form>

    
<?php

include 'templates/footer.html';