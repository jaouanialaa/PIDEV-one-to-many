<?php

namespace ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Signale
 *
 * @ORM\Table(name="signale")
 * @ORM\Entity(repositoryClass="ForumBundle\Repository\SignaleRepository")
 */
class Signale
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


    /**
     * @ORM\ManyToOne(targetEntity="GUBundle\Entity\Utilisateur")
     *
     * @ORM\JoinColumn(name="id_user",referencedColumnName="id")
     */
    private $id_user;
    /**
     * @ORM\ManyToOne(targetEntity="ForumBundle\Entity\Question")
     *
     * @ORM\JoinColumn(name="id_question",referencedColumnName="id")
     */
    private $id_question;

    /**
     * @ORM\ManyToOne(targetEntity="ForumBundle\Entity\Commentaire")
     *
     * @ORM\JoinColumn(name="id_commentaire",referencedColumnName="id")
     */
    private $id_commentaire;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Signale
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }




    /**
     * Set idUser.
     *
     * @param \GUBundle\Entity\Utilisateur|null $idUser
     *
     * @return Signale
     */
    public function setIdUser(\GUBundle\Entity\Utilisateur $idUser = null)
    {
        $this->id_user = $idUser;

        return $this;
    }

    /**
     * Get idUser.
     *
     * @return \GUBundle\Entity\Utilisateur|null
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * Set idQuestion.
     *
     * @param \ForumBundle\Entity\Question|null $idQuestion
     *
     * @return Signale
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
     * Set idCommentaire.
     *
     * @param \ForumBundle\Entity\Commentaire|null $idCommentaire
     *
     * @return Signale
     */
    public function setIdCommentaire(\ForumBundle\Entity\Commentaire $idCommentaire = null)
    {
        $this->id_commentaire = $idCommentaire;

        return $this;
    }

    /**
     * Get idCommentaire.
     *
     * @return \ForumBundle\Entity\Commentaire|null
     */
    public function getIdCommentaire()
    {
        return $this->id_commentaire;
    }


}
