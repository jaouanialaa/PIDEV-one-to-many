<?php

namespace ForumBundle\Controller;

use ForumBundle\Entity\Question;
use ForumBundle\Entity\Signale;
use ForumBundle\Form\SignaleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SignaleController extends Controller
{
    public function createSAction(Request $request,$id_q)
    {
        $user=$this->getUser();
        $signale = new Signale();
        $em = $this->getDoctrine()->getManager();
        $question = $em->getRepository(Question::class)->find($id_q);


            $signale->setIdQuestion($question);

            $signale->setIdUser($user);
            $signale->setDate((new \DateTime()));

            $em->persist($signale);
            $em->flush();



            $manager = $this->get("mgilet.notification");
            $notification = $manager->createNotification("Commentaire");
            $notification->setDate(new \DateTime("now"));
            $notification->setLink($question->getTitre());
            $notification->setMessage("Cette utilisteur a commenté");
            $manager->addNotification(array($question->getIduser()),$notification,true);
            $manager = $this->get("mgilet.notification");
            $list = $manager->getUnseenNotifications($user);
//            foreach ($list as $notif)
//                {
//                    $manager->markAsSeen($user,$notif,true);
//                }



            return $this->redirectToRoute("read");

    }

}
