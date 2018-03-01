<?php

namespace ForumBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="ForumBundle\Repository\QuestionRepository")

 */
class Question
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateQ", type="date")
     */
    private $dateQ;

    /**
     * @ORM\OneToMany(targetEntity="ForumBundle\Entity\AimeF", mappedBy="id_question",orphanRemoval=true,fetch="EAGER")
     */
    private $aime;

    /**
     * @ORM\OneToMany(targetEntity="ForumBundle\Entity\Commentaire", mappedBy="id_question",orphanRemoval=true,fetch="EAGER")
     */
    private $commentaire;
    /**
     * @ORM\OneToMany(targetEntity="ForumBundle\Entity\Signale", mappedBy="id_question",orphanRemoval=true,fetch="EAGER")
     */
    private $signale;



    /**
     * @var string|null
     * @Assert\File(
     *      maxSize="5242880",
     *      mimeTypes = {
     *          "image/png",
     *          "image/jpeg",
     *          "image/jpg",
     *          "image/gif"
     *      }
     * )
     * @ORM\Column(name="img", type="string", length=255, nullable=true)
     */


    private $img;

    /**
     * @ORM\ManyToOne(targetEntity="GUBundle\Entity\Utilisateur")
     *
     * @ORM\JoinColumn(name="iduser",referencedColumnName="id",nullable=false)
     */
    private $iduser;


    /**
     * @ORM\ManyToOne(targetEntity="ArticleBundle\Entity\Categorie")
     *
     * @ORM\JoinColumn(name="categorie",referencedColumnName="id")
     */

    private $categorie;
    /**
     * @var int
     *
     * @ORM\Column(name="nbrjaimes", type="integer")
     */

    private $nbrjaimes;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrcommentaire", type="integer")
     */

    private $nbrcommentaire;






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
     * Set titre
     *
     * @param string $titre
     *
     * @return Question
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Question
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }


    /**
     * Set dateQ
     *
     * @param \DateTime $dateQ
     *
     * @return Question
     */
    public function setDateQ($dateQ)
    {
        $this->dateQ = $dateQ;

        return $this;
    }

    /**
     * Get dateQ
     *
     * @return \DateTime
     */
    public function getDateQ()
    {
        return $this->dateQ;
    }

    /**
     * Set img
     *
     * @param string $img
     *
     * @return Question
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set categorie.
     *
     * @param \ArticleBundle\Entity\Categorie|null $categorie
     *
     * @return Question
     */
    public function setCategorie(\ArticleBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie.
     *
     * @return \ArticleBundle\Entity\Categorie|null
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    public function __toString()
    {
        return "titre" . $this->getTitre() . "contenu" . $this->getContenu() . "date" ;
    }


    /**
     * Set iduser.
     *
     * @param \GUBundle\Entity\Utilisateur $iduser
     *
     * @return Question
     */
    public function setIduser(\GUBundle\Entity\Utilisateur $iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser.
     *
     * @return \GUBundle\Entity\Utilisateur
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set nbrjaimes.
     *
     * @param int $nbrjaimes
     *
     * @return Question
     */
    public function setNbrjaimes($nbrjaimes)
    {
        $this->nbrjaimes = $nbrjaimes;

        return $this;
    }

    /**
     * Get nbrjaimes.
     *
     * @return int
     */
    public function getNbrjaimes()
    {
        return $this->nbrjaimes;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->aime = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commentaire = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add aime.
     *
     * @param \ForumBundle\Entity\AimeF $aime
     *
     * @return Question
     */
    public function addAime(\ForumBundle\Entity\AimeF $aime)
    {
        $this->aime[] = $aime;

        return $this;
    }

    /**
     * Remove aime.
     *
     * @param \ForumBundle\Entity\AimeF $aime
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAime(\ForumBundle\Entity\AimeF $aime)
    {
        return $this->aime->removeElement($aime);
    }

    /**
     * Get aime.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAime()
    {
        return $this->aime;
    }

    /**
     * Add commentaire.
     *
     * @param \ForumBundle\Entity\Commentaire $commentaire
     *
     * @return Question
     */
    public function addCommentaire(\ForumBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaire[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire.
     *
     * @param \ForumBundle\Entity\Commentaire $commentaire
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCommentaire(\ForumBundle\Entity\Commentaire $commentaire)
    {
        return $this->commentaire->removeElement($commentaire);
    }

    /**
     * Get commentaire.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Add signale.
     *
     * @param \ForumBundle\Entity\Signale $signale
     *
     * @return Question
     */
    public function addSignale(\ForumBundle\Entity\Signale $signale)
    {
        $this->signale[] = $signale;

        return $this;
    }

    /**
     * Remove signale.
     *
     * @param \ForumBundle\Entity\Signale $signale
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSignale(\ForumBundle\Entity\Signale $signale)
    {
        return $this->signale->removeElement($signale);
    }

    /**
     * Get signale.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSignale()
    {
        return $this->signale;
    }

    /**
     * Set nbrcommentaire.
     *
     * @param int $nbrcommentaire
     *
     * @return Question
     */
    public function setNbrcommentaire($nbrcommentaire)
    {
        $this->nbrcommentaire = $nbrcommentaire;

        return $this;
    }

    /**
     * Get nbrcommentaire.
     *
     * @return int
     */
    public function getNbrcommentaire()
    {
        return $this->nbrcommentaire;
    }
}
