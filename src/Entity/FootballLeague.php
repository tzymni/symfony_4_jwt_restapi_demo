<?php


namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\FootballLeagueRepository")
 * @ORM\Table(name="football_league")
 */
class FootballLeague
{
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FootballTeam", mappedBy="league")
     * @ORM\OrderBy({"name"="ASC"})
     */
    private $teams;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    public function __construct()
    {
        // php-array on steroids
        $this->teams = new ArrayCollection();
    }

    /**
     * Get list of teams for this league
     *
     * @return ArrayCollection|FootballTeam[]
     */
    public function getTeams()
    {
        return $this->teams;
    }
}