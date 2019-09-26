<?php

class Character extends DB
{
    public function getAllCharacters()
    {
        $sql = "SELECT characters.id, characters.name, characters.health, characters.power, characters.weapon, characters.roles_id, roles.name_roles, roles.id AS id_roles FROM characters INNER JOIN roles ON characters.roles_id = roles.id";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }


    public function insert($fields)
    {
        $implodeColumns = implode(', ',array_keys($fields));

        $implodePlaceholder = implode(", :",array_keys($fields));

        $sql = "INSERT INTO characters ($implodeColumns) VALUES (:".$implodePlaceholder.")";

        $stmt = $this->connect()->prepare($sql);

        foreach ($fields as $key => $value) {
            $stmt->bindValue(':'.$key,$value);
        }

        $stmtExec = $stmt->execute();

        if ($stmtExec) {
            header('Location: index.php');
        }
    }


    public function delete($id)
    {
        $sql = "DELETE FROM characters WHERE id = :id";

        $stmt = $this->connect()->prepare($sql);

        $stmt->bindValue(":id", $id);

        $stmt->execute();
    }


    public function selectOne($id)
    {
        $sql = "SELECT * FROM characters WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id",$id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    public function update($fields,$id)
    {
        $st = "";
        $counter = 1;
        $total_fields = count($fields);
        foreach ($fields as $key => $value) {
            // var_dump($key);
            if ($counter === $total_fields) {
                $set = "$key = :".$key;
                $st = $st.$set;

            } else {
                $set = "$key = :".$key.", ";
                $st = $st.$set;
                $counter++;
            }
        }

        $sql = "";
        $sql .= "UPDATE characters SET ".$st;
        $sql .= " WHERE id = ".$id;
        
        $stmt = $this->connect()->prepare($sql);

        foreach ($fields as $key => $value) {
            $stmt->bindValue(":".$key."", $value);
        }
        
        $stmtExec = $stmt->execute();

        if ($stmtExec) {
            header('Location: index.php');
        }
    }


}