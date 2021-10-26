<?php
class Categories {

    private $id;
    private $title;
    private $description;
    private $picture;
    private $parent;


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
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * Fonction pour obtenir la liste de category par ordre alphabetique
     *
     * @param $dbc
     * @return mixed
     */
    public static function getList($dbc) {
        $query = ("SELECT * FROM category ORDER BY title");
        $reponse = $dbc->classlist($query, PDO::FETCH_CLASS ,__CLASS__);
        return $reponse;

    }

    /**
     * Fonction qui permet d'obtenir l'id d'une category
     *
     * @param $dbc
     * @param $id
     * @return mixed
     */
    public static function getCategoryById($dbc, $id) {
        $query = ('SELECT * FROM category WHERE id = :id');
        $aBindParam = array(':id'=>$id);
        $category = $dbc->select($query, $aBindParam, __CLASS__);
        return $category;
    }

    /**
     * Fonction qui permet d'ajouter une category dans la base
     *
     * @param $dbc
     * @param $title
     * @param $description
     * @param $picture
     * @return mixed
     *
     */
    public static function addCategory($dbc, $title, $description, $picture, $parent){
        $query = 'INSERT INTO category (id, title, description, picture, parent)
    VALUES (NULL, :title, :description, :picture, :parent)';
        $aBindParam = array(':title'=>$title,':description'=>$description,':picture'=>$picture, ':parent'=>$parent);
        $category = $dbc->update($query, $aBindParam, __CLASS__);
        return $category;
    }

    /**
     * Fonction qui permet de supprimer une category de la base de donnée
     *
     * @param $dbc
     * @param $id
     */
    public static function delete($dbc, $id) {
        $query = 'DELETE FROM category WHERE id = :id';
        $aBindParam = array('id'=>$id);
        $dbc->update($query, $aBindParam, __CLASS__);
    }

    /**
     * Fonction pour editer une categorie
     *
     * @param $dbc
     * @param $id
     * @param $title
     * @param $description
     * @param $picture
     * @return mixed
     */
    public static function updateCategory($dbc, $id, $title, $description, $picture, $parent) {

        $query = 'UPDATE category
SET title = :title,
    description = :description,
    picture = :picture,
    parent = :parent
WHERE id = :id';
        $aBindParam = array(':id'=>$id,':title'=>$title,':description'=>$description,':picture'=>$picture, ':parent'=>$parent);
        $category = $dbc->update($query, $aBindParam, __CLASS__);
        return $category;
    }

}