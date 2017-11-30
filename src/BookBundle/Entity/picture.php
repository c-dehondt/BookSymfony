<?php

namespace BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * picture
 *
 * @ORM\Table(name="picture")
 * @ORM\Entity(repositoryClass="BookBundle\Repository\pictureRepository")
 */
class picture
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;
    
    
      
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return picture
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return picture
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    public function getWebPath()
    
      {
        return $this->getUploadDir().'/'.$this->getId().'.'.$this->getUrl();
      }

      
    public function upload()
    
      {    
        // Si jamais il n'y a pas de fichier (champ facultatif), on ne fait rien   
        if (null === $this->url) {   
          return;    
        }
       
        // On récupère le nom original du fichier de l'internaut
        $name = $this->url->getClientOriginalName();
      
        // On déplace le fichier envoyé dans le répertoire de notre choix  
        $this->url->move($this->getUploadRootDir(), $name);
    
        // On sauvegarde le nom de fichier dans notre attribut $url  
        $this->url = $name;     
        // On crée également le futur attribut alt de notre balise <img>
        $this->alt = $name;
      }
     
      public function getUploadDir()
      {
        // On retourne le chemin relatif vers l'image pour un navigateur (relatif au répertoire /web donc)
        return 'uploads/picture';
      }
    
      protected function getUploadRootDir()
      {
        // On retourne le chemin relatif vers l'image pour notre code PHP
        return __DIR__.'/../../../../web/picture/'.$this->getUploadDir();
      }
}

