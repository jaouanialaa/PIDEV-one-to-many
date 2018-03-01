<?php

namespace ForumBundle\Controller;

use ForumBundle\Entity\Commentaire;
use ForumBundle\Entity\Question;
use ForumBundle\Form\CommentaireType;
use KMS\FroalaEditorBundle\Form\Type\FroalaEditorType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;

class CommentaireController extends Controller
{

    public function deleteCAction($id_q,$id_c)
    {

        $em = $this->getDoctrine()->getManager();
        $M = $em->getRepository(Commentaire::class)->find($id_c);
        $question = $em->getRepository(Question::class)->find($id_q);
        $question->setNbrcommentaire($question->getNbrcommentaire()-1);


        $em->remove($M);
        $em->flush();
        return $this->redirectToRoute('readQ',array('id'=>$id_q));

    }

    public function updateCAction(Request $request ,$id_q,$id_c)
    {
        $em = $this->getDoctrine()->getManager();
        $commentaire = $em->getRepository(Commentaire::class)->find($id_c);
        $form = $this->createForm(CommentaireType::class,$commentaire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $commentaire->setDate((new \DateTime()));
            $commentaire=$form->getData();
            $em->flush();
            return $this->redirectToRoute('readQ',array('id'=>$id_q));
        }

        return $this->render('ForumBundle:Question:create.html.twig', array('form'=>$form->createView()

        ));
    }


}
