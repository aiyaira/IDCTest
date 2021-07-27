<?php

namespace App\Controller;

/**
 * Description of DefaultController
 *
 * @author Home PC
 */
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\QuoteController;

/**
 * Description of DefaultController
 *
 * @author Home PC
 */
class DefaultController extends AbstractController {

    protected $quoteController;

    public function __construct(QuoteController $quoteController) {
        $this->quoteController = $quoteController;
    }

    public function index() {

        $response = $this->quoteController->retriveAllClients();
        return $this->render('index.html.twig', [
                    'details' => $response
        ]);
    }

    public function addData() {
        return $this->render('addData.html.twig', [
        ]);
    }

    public function saveNewData(Request $request) {

        $arrayOfInputs = $request->request->all(); //retrieve all the form details from request header

        $response = $this->quoteController->addQuoteData($arrayOfInputs);
        //$result = $response->getContent();

        if (!$response) {
            //error is retunred, then display the error page
            return $this->render('errorPage.html.twig', [
                        'error' => 1
            ]);
        } else {
            //saving details is success, display the approval page

            return $this->redirectToRoute('index');
        }
    }

    public function deleteData($id) {


        $response = $this->quoteController->deleteQuoteData($id);
        //$result = $response->getContent();

        if (!$response) {
            //error is retunred, then display the error page
            return $this->render('errorPage.html.twig', [
                        'error' => 1
            ]);
        } else {
            //saving details is success, display the approval page

            return $this->redirectToRoute('index');
        }
    }

}
