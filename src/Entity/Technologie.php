<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="technologie")
 * @ORM\Entity(repositoryClass="App\Repository\TechnologieRepository")
 */
class Technologie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $techno;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomCellule;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $occurences;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total;
    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_general;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $probleme;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $planMaitrise;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $ticket ;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $kpi ;

    /**
     * @ORM\ManyToOne(targetEntity="Technologie")
     * @ORM\JoinColumn(name="famille", referencedColumnName="id")
     */
    //private $famille ;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    //private $statut ;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    //private $porteur ;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    //private $ledelai ;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    //private $vr ;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    //private $atteinte ;

    
    /**
     * @var \Entity\Kpi
     * @ORM\ManyToOne(targetEntity="Kpi")
     * @ORM\JoinColumn(name="nomKpi", referencedColumnName="id")
     */
    private $nomKpi;

    
    /**
     * @var \Entity\Statut
     * @ORM\ManyToOne(targetEntity="Statut")
     * @ORM\JoinColumn(name="optionOk", referencedColumnName="id")
     */
    private $optionOk ;

    /**
     * @var \Entity\Famille
     * @ORM\ManyToOne(targetEntity="Famille")
     * @ORM\JoinColumn(name="nomFamille", referencedColumnName="id")
     */
    private $nomFamille;

    /**
     * @var \Entity\Porteur
     * @ORM\ManyToOne(targetEntity="Porteur")
     * @ORM\JoinColumn(name="nomPorteur", referencedColumnName="id")
     */
    private $nomPorteur ;

    /**
     * @var \Entity\Delai
     * @ORM\ManyToOne(targetEntity="Delai")
     * @ORM\JoinColumn(name="delai", referencedColumnName="id")
     */
    private $delai ;
    /**
     * @var \Entity\Vr
     * @ORM\ManyToOne(targetEntity="Vr")
     * @ORM\JoinColumn(name="nomVr", referencedColumnName="id")
     */
    private $nomVr ;

    /**
     * @var \Entity\AtteinteVr
     * @ORM\ManyToOne(targetEntity="AtteinteVr")
     * @ORM\JoinColumn(name="optionVr", referencedColumnName="id")
     */
    private $optionVr ;

    
    public function __construct()

    {

        //$this->probleme = new \Datetime();

    }
   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTechno(): ?string
    {
        return $this->techno;
    }

    public function setTechno(?string $techno): self
    {
        $this->techno = $techno;

        return $this;
    }

    public function getNomCellule(): ?string
    {
        return $this->nomCellule;
    }

    public function setNomCellule(?string $nomCellule): self
    {
        $this->nomCellule = $nomCellule;

        return $this;
    }

    public function getOccurences(): ?int
    {
        return $this->occurences;
    }

    public function setOccurences(?int $occurences): self
    {
        $this->occurences = $occurences;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): self
    {
        $this->total = $total;

        return $this;
    }

     public function gettotal_general(): ?float
    {
        return $this->total_general;
    }

    public function setTotalGeneral(?float $total_general): self
    {
        $this->total_general = $total_general;

        return $this;
    }
    public function getProbleme(): ?string
    {
        return $this->probleme;
    }

    public function setProbleme(?string $probleme): self
    {
        $this->probleme = $probleme;

        return $this;
    }
    public function getPlanMaitrise(): ?string
    {
        return $this->planMaitrise;
    }

    public function setPlanMaitrise(?string $planMaitrise): self
    {
        $this->planMaitrise = $planMaitrise;

        return $this;
    }
    public function getTicket(): ?string
    {
        return $this->ticket;
    }

    public function setTicket(?string $ticket): self
    {
        $this->ticket = $ticket;

        return $this;
    }
     public function getKpi(): ?string
    {
        return $this->kpi;
    }

    public function setKpi(?string $kpi): self
    {
        $this->kpi = $kpi;

        return $this;
    }

    /**
     * Set nomFamille
     * @param Famille $nomFamille
     * @return Famille
     */
    public function setNomFamille($nomFamille) {
        $this->nomFamille = $nomFamille;
        return $this;
        } 
    /**
     * Get nomFamille
     * @return Famille
     */
    public function getNomFamille() {
        return $this->nomFamille;
    }

    /**
     * Set option_ok
     * @param Statut $option_ok
     * @return Statut
     */
    public function setOptionOk($optionOk) {
        $this->optionOk = $optionOk;
        return $this;
        }
    
    /**
     * Get optionOk
     * @return Statut
     */
    public function getOptionOk() {
        return $this->optionOk;
    }

  
    /**
     * Set nomPorteur
     * @param Porteur $nomPorteeur
     * @return Porteur
     */
    public function setNomPorteur($nomPorteur) {
        $this->nomPorteur = $nomPorteur;
        return $this;
        }
    
    /**
     * Get nomPorteur
     * @return Porteur
     */
    public function getNomPorteur() {
        return $this->nomPorteur;
    }

     /**
     * Set delai
     * @param Delai $delai
     * @return Delai
     */
    public function setDelai($delai) {
        $this->delai = $delai;
        return $this;
        }
    
    /**
     * Get delai
     * @return Delai
     */
    public function getDelai() {
        return $this->delai;
    }

    /**
     * Set nomVr
     * @param Vr $nomVr
     * @return Vr
     */
    public function setNomVr($nomVr) {
        $this->nomVr = $nomVr;
        return $this;
        }
    
    /**
     * Get nomVr
     * @return Vr
     */
    public function getNomVr() {
        return $this->nomVr;
    }

    /**
     * Set optionVr
     * @param AtteinteVr $optionVr
     * @return AtteinteVr
     */
    public function setOptionVr($optionVr) {
        $this->optionVr = $optionVr;
        return $this;
        }
    
    /**
     * Get optionVr
     * @return AtteinteVr
     */
    public function getOptionVr() {
        return $this->optionVr;
    }


    /**
     * Set nomKpi
     * @param Kpi $nomKpi
     * @return Kpi
     */
    public function setNomKpi($nomKpi) {
        $this->nomKpi = $nomKpi;
        return $this;
        }
          
    /**
     * Get nomKpi
     * @return Kpi
     */
    public function getNomKpi() {
        return $this->nomKpi;
    }
}
