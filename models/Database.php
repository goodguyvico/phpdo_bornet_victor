<?php
class Database extends PDO
{

    private $servername;
    private $username;
    private $password;
    private $bddname;

    public function __construct()
    {

        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = 'HBFormation63';
        $this->bddname = 'nocihb';

        parent::__construct('mysql:host=' . $this->servername . ';dbname=' . $this->bddname, $this->username, $this->password);
        try{

            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    /**
     * Fonction dans la base de donné qui permet de réaliser une requete de listing
     * dans une table de la BDD
     *
     * @param $sql
     * @param $fetchmode
     * @param string $classname
     * @return array|false
     */
    public function classlist($sql, $fetchmode, $classname =''){

        $sth = $this->prepare($sql);
        $sth->execute();

        return $sth->fetchAll($fetchmode, $classname);

    }

    /**
     * Fonction qui permet d'executer une requete et retourner un unique résultat de la BDD
     *
     * @param $sql
     * @param array $array
     * @param int $fetchmode
     * @param string $classname
     * @return mixed
     */
    public function select($sql, $array = array(), $fetchmode = PDO::FETCH_CLASS, $classname = '')
    {
        $sth = $this->prepare($sql);

        foreach ($array as $key => $value):
            $sth->bindValue("$key", $value);
        endforeach;
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS, $fetchmode);

        return $sth->fetch();
    }

    /**
     * Fonction qui permet d'executer une requete d'ajout/modification/suppression
     * de la base de donnée.
     *
     * @param $sql
     * @param array $array
     */
    public function update($sql, $array = array())
    {
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value):
            $sth->bindValue("$key", $value);
        endforeach;
        $sth->execute();
    }

}