<?php

namespace ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mgilet\NotificationBundle\Annotation\Notifiable;
use Mgilet\NotificationBundle\NotifiableInterface;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity(repositoryClass="ForumBundle\Repository\CommentaireRepository")
 * @Notifiable(name="Commentaire")
 */
class Commentaire implements NotifiableInterface
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
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="GUBundle\Entity\Utilisateur")
     *
     * @ORM\JoinColumn(name="iduser",referencedColumnName="id",nullable=false)
     */
    private $iduser;

    /**
     * @ORM\ManyToOne(targetEntity="ForumBundle\Entity\Question",cascade={"persist"})
     *
     * @ORM\JoinColumn(name="id_question",referencedColumnName="id")
     */
    private $id_question;

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
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Commentaire
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Commentaire
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }


    /**
     * Set idQuestion.
     *
     * @param \ForumBundle\Entity\Question|null $idQuestion
     *
     * @return Commentaire
     */
    public function setIdQuestion(\ForumBundle\Entity\Question $idQuestion = null)
    {
        $this->id_question = $idQuestion;

        return $this;
    }

    /**
     * Get idQuestion.
     *
     * @return \ForumBundle\Entity\Question|null
     */
    public function getIdQuestion()
    {
        return $this->id_question;
    }


    /**
     * Set iduser.
     *
     * @param \GUBundle\Entity\Utilisateur $iduser
     *
     * @return Commentaire
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
}
