<?php

namespace BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * member
 *
 * @ORM\Table(name="member")
 * @ORM\Entity(repositoryClass="BookBundle\Repository\memberRepository")
 */
class member
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
     * @ORM\OneToMany(targetEntity="BookBundle\Entity\book", mappedBy="member", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $book;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=10)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="streetAddress", type="string", length=100)
     */
    private $streetAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=50)
     */
    private $city;

    /**
     * @var int
     *
     * @ORM\Column(name="postalPost", type="integer")
     */
    private $postalPost;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registrationDate", type="datetime")
     */
    private $registrationDate;


    public function __construct()
    {
      //  By default, the date to enter a new menber is today's date
      $this->registrationDate = new \Datetime();
      
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
     * Set name
     *
     * @param string $name
     *
     * @return member
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return member
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return member
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set streetAddress
     *
     * @param string $streetAddress
     *
     * @return member
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;

        return $this;
    }

    /**
     * Get streetAddress
     *
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return member
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postalPost
     *
     * @param integer $postalPost
     *
     * @return member
     */
    public function setPostalPost($postalPost)
    {
        $this->postalPost = $postalPost;

        return $this;
    }

    /**
     * Get postalPost
     *
     * @return int
     */
    public function getPostalPost()
    {
        return $this->postalPost;
    }

    /**
     * Set registrationDate
     *
     * @param \DateTime $registrationDate
     *
     * @return member
     */
    public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    /**
     * Get registrationDate
     *
     * @return \DateTime
     */
    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }
    

    /**
     * Add book
     *
     * @param \BookBundle\Entity\book $book
     *
     * @return member
     */
    public function addBook(\BookBundle\Entity\book $book)
    {
        $this->book[] = $book;

        return $this;
    }

    /**
     * Remove book
     *
     * @param \BookBundle\Entity\book $book
     */
    public function removeBook(\BookBundle\Entity\book $book)
    {
        $this->book->removeElement($book);
    }

    /**
     * Get book
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBook()
    {
        return $this->book;
    }
}
