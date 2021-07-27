<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Quote;

/**
 * Description of quoteController
 *
 * @author Home PC
 */
class QuoteController {

    protected $entityManager;

    function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager; //initializing entity manager for accessing the database
    }

    public function addQuoteData($arrayInputs) {

        $task = (string) $arrayInputs['task'];
        $amount = (float) $arrayInputs['amount'];
        $percentage = (float) $arrayInputs['percentage'];
        $total = $amount + ($percentage * $amount) / 100;

        $quoteEntity = new Quote();
        $quoteEntity->setTask($task);
        $quoteEntity->setAmount($amount);
        $quoteEntity->setPercentage($percentage);
        $quoteEntity->setTotalCost($total);

        try {
            //save the entity details in the database.
            $this->entityManager->persist($quoteEntity);
            $this->entityManager->flush();

            //return the response back to the browser
            return (array('result' => $quoteEntity));
        } catch (\Exception $e) {
            //log the error message
            die();
            // throw $this->createNotFoundException('Unable to Add this quote ' . $e);
        }
    }

    public function retriveAllClients() {
        $quoteEntity = $this->entityManager->getRepository(Quote::class)->findAll();
        return (array('result' => $quoteEntity));
    }

    public function deleteQuoteData($id) {
        $quoteEntity = $this->entityManager->getRepository(Quote::class)->findOneBy(['reference' => $id]);
        try {
            $this->entityManager->remove($quoteEntity);
            $this->entityManager->flush();
            return true;
        } catch (\Exception $e) {
            //log the error message
            return true;
            // throw $this->createNotFoundException('Unable to Add this quote ' . $e);
        }
    }

}
