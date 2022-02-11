<?php

/**
 * Pour cet exercice, vous allez utiliser la base de données table_test_php créée pendant l'exo 189
 * Vous utiliserez également les deux tables que vous aviez créées au point 2 ( créer des tables avec PHP )
 */

require "connPDO.php";

try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */
    $pdo = new connPDO();
    $connect = $pdo->conn();

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    // TODO votre code ici.
    $sql = "
        INSERT INTO user (name, firstname, email, password, adress, cp, country)
        VALUES ('Solo', 'Han', 'falcon@mil.fr', 'chewy', 'star', 29 , 'wars')
    ";
//    $connect->exec($sql);
    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    // TODO votre code ici.
    $sql = "
        INSERT INTO product (title, price, shortDescription, description)
        VALUES ('Arbalette Laser', 2000, 'Arme laser', 'Arbalette pour conbattre l\'empire, légére et très maniable,
        utilisable sur tout les terrains')
    ";
//    $connect->exec($sql);
    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    // TODO Votre code ici.
    $sql = "
        INSERT INTO user (name, firstname, email, password, adress, cp, country)
        VALUES ('Skywalker', 'Luke', 'luke@force.com', 'r2d2', 'desert', 01 , 'tatouin'),
               ('princess', 'laïa', 'laia@force.com', 'c3po', 'rue', 02, 'pays')
    ";
//    $connect->exec($sql);

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    // TODO Votre code ici.
    $sql = "
        INSERT INTO product (title, price, shortDescription, description) 
        VALUES ('Sabre Laser', 31000, 'Arme laser', 'Sabre de Jedi avec laser de couleur bleu'),
               ('Droid C3PO', 1000, 'Droid de protocol', 'Couleur or, très bon état, parle toutes les langues connues')
        ";
//    $connect->exec($sql);
    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    // TODO Votre code ici.
    $connect->beginTransaction();

    $item = 'INSERT INTO user (name, firstname, email, password, adress, cp, country) VALUES ';

    $sql1 = $item . "('Doe', 'john', 'j.doe@face.org', 'azerty', '5 rue Arlette Corrente Fourmies', 59610, 'France')";
    $connect->exec($sql1);

    $sql2 = $item . "('Dane', 'Jane', 'jane.dan@term.fr', '1234', '52 rue Alphonse Fourmies', 59610, 'France')";
    $connect->exec($sql2);

    $sql3 = $item . "('Connor', 'Sarah', 's.connor@gmail.com', 'qwerty', 'rue du parc Mons', 7000, 'Belgique')";
    $connect->exec($sql3);

    $connect->commit();

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */
}
catch (PDOException $e){
    echo "Error : " . $e->getMessage() . "<br>";
    $connect->rollBack();
}
