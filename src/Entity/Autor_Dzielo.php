<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\Autor_DzieloRepository")
 */
class Autor_dzielo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

   /**
     * @ORM\ManyToOne(targetEntity="Dzielo")
	 * @ORM\JoinColumn(name="dzielo_id", referencedColumnName="id")
     */
    private $dzielo_id;
	
	/**
     * @ORM\ManyToOne(targetEntity="Autor")
	 * @ORM\JoinColumn(name="autor_id", referencedColumnName="id")
     */
    private $autor_id;
}
