<?php

namespace GuitarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Tests\Model;

/**
 * Guitar
 *
 * @ORM\Table(name="guitar")
 * @ORM\Entity(repositoryClass="GuitarBundle\Repository\GuitarRepository")
 */
class Guitar
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var Brands
     *
     * @ORM\ManyToOne(targetEntity="GuitarBundle\Entity\Brands", inversedBy="id")
     */
    private $brand;

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
     * @return Guitar
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
}

