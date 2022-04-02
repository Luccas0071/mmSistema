<?php
include_once '../classes/model/Module.php';

class ModuleForm {

    private $share;
    private $id;
    private $title;
    private $description;
    private $creationDate;
    private $updateDate;
    private $course;
    private $user;
 
    public function getShare()
    {
        return $this->share;
    }

    public function setShare($share)
    {
        $this->share = $share;

        return $this;
    }

     
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

     
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

     
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

     
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

     
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

     
    public function getCourse()
    {
        return $this->course;
    }

    public function setCourse($course)
    {
        $this->course = $course;

        return $this;
    }

     
    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
   

    public function validate(){

    }

    public function transferRequestForm($request){
        $this->setShare($request['share']);
        $this->setId($request['idUser']);
        $this->setTitle($request['title']);
        $this->setDescription($request['description']);
        $this->setCreationDate($request['creationDate']);
        $this->setUpdateDate($request['updateDate']);
        $this->setCourse($request['course']);
        $this->setUser($request['user']);
    }

    public function transferFormModel(){

        $objUser = new User();

        $objUser->setShare($this->getShare());
        $objUser->setId($this->getId());
        $objUser->setName($this->getName());
        $objUser->setEmail($this->getEmail());
        $objUser->setStatus($this->getStatus());
        $objUser->setCreationDate($this->getCreationDate());

        return $objUser;
    }

    public function transferModelForm($objUser){

        $this->setShare($objUser->getShare());
        $this->setId($objUser->getId());
        $this->setName($objUser->getName());
        $this->setEmail($objUser->getEmail());
        $this->setStatus($objUser->getStatus());
        $this->setCreationDate($objUser->getCreationDate());
        $this->setUpdateDate($objUser->getUpdateDate());

        return $this;
    }

   

     
    

    
}