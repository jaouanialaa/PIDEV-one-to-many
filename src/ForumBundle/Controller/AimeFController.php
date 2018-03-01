<?php

namespace ForumBundle\Controller;

use ForumBundle\Entity\AimeF;
use ForumBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AimeFController extends Controller
{
    public function createAAction(Request $request,$id_q)
    {
        $user=$this->getUser();
        $aime = new AimeF();
        $em = $this->getDoctrine()->getManager();
        $question = $em->getRepository(Question::class)->find($id_q);


        $em = $this->getDoctrine()->getManager();



            $aime->setIdQuestion($question);

            $aime->setIdUser($user);
            $aime->setDate((new \DateTime()));
            $question->setNbrjaimes($question->getNbrjaimes()+1);
            $em->persist($aime);
            $em->flush();

            return $this->redirectToRoute("readQ",array('id'=>$id_q));
    }

    public function deleteAAction($id_q,$id_c)
    {

        $em = $this->getDoctrine()->getManager();
        $M = $em->getRepository(AimeF::class)->find($id_c);
        $question = $em->getRepository(Question::class)->find($id_q);
        $question->setNbrjaimes($question->getNbrjaimes()-1);


        $em->remove($M);
        $em->flush();
        return $this->redirectToRoute('readQ',array('id'=>$id_q));

    }
}
