<?php
class Produits
{

    private $id;
    private $title;
    private $description;
    private $picture;
    private $price;
    private $category;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Fonction pour obtenir la liste des produits par ordre alphabetique
     *
     * @param $dbc
     * @return mixed
     */
    public static function getList($dbc)
    {
        $query = ("SELECT * FROM article ORDER BY title");
        $reponse = $dbc->classlist($query, PDO::FETCH_CLASS, __CLASS__);
        return $reponse;

    }


    /**
     * Fonction qui permet d'obtenir l'id d'un produit
     *
     * @param $dbc
     * @param $id
     * @return mixed
     */
    public static function getProductsById($dbc, $id)
    {
        $query = ('SELECT * FROM article WHERE id = :id');
        $aBindParam = array(':id' => $id);
        $category = $dbc->select($query, $aBindParam, __CLASS__);
        return $category;
    }

    /**
     * Fonction qui permet d'ajouter un article dans la base
     *
     * @param $dbc
     * @param $title
     * @param $description
     * @param $picture
     * @return mixed
     *
     */
    public static function addProduct($dbc, $title, $description, $picture, $price, $category)
    {
        $query = 'INSERT INTO article (id, title, description, picture, price, category)
    VALUES (NULL, :title, :description, :picture, :price, :category)';
        $aBindParam = array(':title' => $title, ':description' => $description, ':picture' => $picture, ':price' => $price, ':category'=>$category);
        $product = $dbc->update($query, $aBindParam, __CLASS__);
        return $product;
    }


    /**
     * Fonction qui permet de supprimer un article de la base de donnée
     *
     * @param $dbc
     * @param $id
     */
    public static function delete($dbc, $id)
    {
        $query = 'DELETE FROM article WHERE id = :id';
        $aBindParam = array('id' => $id);
        $dbc->update($query, $aBindParam, __CLASS__);
    }

    /**
     * Fonction pour editer un article
     *
     * @param $dbc
     * @param $id
     * @param $title
     * @param $description
     * @param $picture
     * @return mixed
     */
    public static function updateProduct($dbc, $id, $title, $description, $picture, $price)
    {
        $query = 'UPDATE article
SET title = :title,
    description = :description,
    picture = :picture,
    price = :price
WHERE id = :id';
        $aBindParam = array(':id' => $id, ':title' => $title, ':description' => $description, ':picture' => $picture, ':price' => $price);
        $product = $dbc->update($query, $aBindParam, __CLASS__);
        return $product;
    }

}