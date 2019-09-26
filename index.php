<?php 
spl_autoload_register(function ($class_name) {
    include 'Classes/' . $class_name . '.class.php';
});

if(isset($_GET['del'])) {
    $id = $_GET['del'];

    $character = new Character();
    $character->delete($id);
}

include 'templates/header.html';
?>

<h3 class="titles">Vos champions</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Pseudo</th>
      <th scope="col">Vie</th>
      <th scope="col">Pouvoir</th>
      <th scope="col">Arme</th>
      <th scope="col">Role</th>
      <th scope="col" class="btn btn-sm btn-success add"><a href="create.php">Ajouter</a></th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $character = new Character();
        $rows = $character->getAllCharacters();
        foreach ($rows as $row) {
    ?>
    
        <tr>
            <th><?php echo $row['id'] ?></th>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['health'] ?></td>
            <td><?php echo $row['power'] ?></td>
            <td><?php echo $row['weapon'] ?></td>
            <td><?php echo $row['name_roles'] ?></td>
            <td class="display">
                <a class='btn btn-sm btn-primary' href="edit.php?id=<?php echo $row['id']; ?>">Editer</a>
                <a class='btn btn-sm btn-danger' href="index.php?del=<?php echo $row['id']; ?>">Supprimer</a>
            </td>
        </tr>    

    <?php
        }
    ?>
  </tbody>
</table>

<?php
include 'templates/footer.html';