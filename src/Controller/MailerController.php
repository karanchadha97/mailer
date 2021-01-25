<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Header\Headers;

class MailerController extends AbstractController
{
    /**
     * @Route("/email")
     */
    public function sendEmail(MailerInterface $mailer)
    {
        $addresses=['karan171374.cse@chitkara.edu.in','karan@agilemedialab.in'];
        $em=new Email();
        $em->getHeaders()->addTextHeader('X-Auto-Response-Suppress', 'OOF, DR, RN, NRN, AutoReply');
        $email=$em->from(new Address('karan123chadha@gmail.com','Karan'))->to('chadhakaran63@gmail.com')
                   ->subject('Time for Symfony Mailer!')
                   ->text('Sending emails is fun again!')
                   ->attachFromPath('path/to/Karan Chadha.pdf', 'Privacy Policy')
                   ->embedFromPath('path/to/tisha.png', 'cat');
                   
                           
                           

        $mailer->send($email);
        return new Response("Email Sent!");     
                   
    }
}