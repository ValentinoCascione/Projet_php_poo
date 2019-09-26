<?php 
spl_autoload_register(function ($class_name) {
    include 'Classes/' . $class_name . '.class.php';
});

if (isset($_GET['id'])) {
    $uid = $_GET['id'];

    $character = New Character();
    $result = $character->selectOne($uid);
}

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $health = $_POST['health'];
    $power = $_POST['power'];
    $weapon = $_POST['weapon'];
    $roles_id = $_POST['roles_id'];

    $fields = [
        'name'=>$name,
        'health'=>intval($health),
        'power'=>intval($power),
        'weapon'=>$weapon,
        'roles_id'=>intval($roles_id)
    ];

    $id = $_POST['id'];

    $character = new Character();
    $character->update($fields, $id);
}

include 'templates/header.html';
?>

<h3 class="titles">Modifier les caractéristiques</h3>

<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
  <div class="form-group">
    <label for="name">Pseudo</label>
    <input type="text" class="form-control" name="name" placeholder="Pseudo du personnage" value="<?php echo $result['name']; ?>">
  </div>
  <div class="form-group">
    <label for="health">Vie</label>
    <input type="number" class="form-control" name="health" placeholder="Vie du personnage" value="<?php echo $result['health']; ?>">
  </div>
  <div class="form-group">
    <label for="power">Pouvoir</label>
    <input type="number" class="form-control" name="power" placeholder="Pouvoir du personnage" value="<?php echo $result['power']; ?>">
  </div>
  <div class="form-group">
    <label for="weapon">Arme</label>
    <input type="text" class="form-control" name="weapon" placeholder="Arme du personnage" value="<?php echo $result['weapon']; ?>">
  </div>
  <div class="form-group">
    <label for="role">Role</label>
    <select class="custom-select" name="roles_id" value="<?php echo $result['roles_id']; ?>">
        <option value="1">Warrior</option>
        <option value="2">Mage</option>
        <option value="3">Thief</option>
        <option value="4">Archer</option>
        <option value="5">Priest</option>
    </select>
  </div>
  <input type="submit" name="submit" class="btn btn-primary" value="Mettre à jour">
  <button class='btn btn-danger'><a href="index.php">Annuler</a></button>
</form>

    
<?php

include 'templates/footer.html';