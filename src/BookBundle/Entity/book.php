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
     * @var string
     *
     * @ORM\Column(name="categor", type="string", length=255)
     */
    private $category;

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
    private $status;


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
     * Set category
     *
     * @param string $category
     *
     * @return book
     */
    public function setCategor($categor)
    {
        $this->categor = $categor;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategor()
    {
        return $this->categor;
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
}

