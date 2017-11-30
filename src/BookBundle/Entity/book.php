<?php

namespace BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity(repositoryClass="BookBundle\Repository\bookRepository")
 */
class book
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToOne(targetEntity="BookBundle\Entity\picture", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $picture;
    
    /**
    * @ORM\ManyToOne(targetEntity="BookBundle\Entity\category", cascade={"persist"})
    * @ORM\JoinColumn(nullable=false)
    */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="editor", type="string", length=255)
     */
    private $editor;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOfEntry", type="datetime")
     */
    private $dateOfEntry;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="releaseDate", type="datetime")
     */
    private $releaseDate;

    /**
     * @var string
     *
     * @ORM\Column(name="summarize", type="text")
     */
    private $summarize;

    /**
     * @var \int
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status = 1;


    public function __construct()
    {
      //  By default, the date to enter a new book is today's date
      $this->dateOfEntry = new \Datetime();
      
    }

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
     * Set title
     *
     * @param string $title
     *
     * @return book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return book
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set editor
     *
     * @param string $editor
     *
     * @return book
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Get editor
     *
     * @return string
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Set dateOfEntry
     *
     * @param \DateTime $dateOfEntry
     *
     * @return book
     */
    public function setDateOfEntry($dateOfEntry)
    {
        $this->dateOfEntry = $dateOfEntry;

        return $this;
    }

    /**
     * Get dateOfEntry
     *
     * @return \DateTime
     */
    public function getDateOfEntry()
    {
        return $this->dateOfEntry;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     *
     * @return book
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set summarize
     *
     * @param string $summarize
     *
     * @return book
     */
    public function setSummarize($summarize)
    {
        $this->summarize = $summarize;

        return $this;
    }

    /**
     * Get summarize
     *
     * @return string
     */
    public function getSummarize()
    {
        return $this->summarize;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return book
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set picture
     *
     * @param \BookBundle\Entity\Picture $picture
     *
     * @return book
     */
    public function setPicture($picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \BookBundle\Entity\Picture
     */
    public function getPicture()
    {
        return $this->picture;
    }


    /**
     * Set category
     *
     * @param \BookBundle\Entity\Category $category
     *
     * @return book
     */
    public function setCategory($category)
    
      {
        $this->category = $category;
        return $this;
      }
    
      /**
     * Get category
     *
     * @return \BookBundle\Entity\Category
     */
      public function getCategory()
      {
        return $this->category;
      }
}

