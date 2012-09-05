<?php

namespace Webomage\MessageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Webomage\MessageBundle\Form\MsgForm;

class MessageController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('WebomageMessageBundle:Message:index.html.twig', array('name' => 'Rithis'));
    }

    public function msgformAction(Request $request)
    {

        $formvars = array('name' => 'Aleksei Tcelishchev', 'email' => 'casualuser@rithis.com');

		$form = $this->createForm(new MsgForm(), $formvars);

		if ($this->getRequest()->getMethod() == 'POST') {
	        $form->bindRequest($this->getRequest());

	        if ($form->isValid()) {

				$msgbody = 'Form data:';
				foreach ($form->getData() as $key => $value) {
				$msgbody .= "\r\n\r\n" . 'form field name =>' . $key . "\r\n" . 'form field value =>' . $value;
				}

				$mailer = $this->get('mailer');

				$msg = \Swift_Message::newInstance()
				->setSubject('sapmle Symfony project form data')
				->setFrom('rithis@webomage.com')
				->setTo('rithis@webomage.com')
				->setBody(
				$msgbody
				);

				$mailer->send($msg);

				return $this->redirect($this->generateUrl('_msgformsubmit'));		
        	}
    	}

        return $this->render('WebomageMessageBundle:Message:msgform.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function msgformsubmitAction()
    {
        return $this->render('WebomageMessageBundle:Message:msgformsubmit.html.twig');
    }
}
