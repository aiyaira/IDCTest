<?php

namespace App\tests;

use PHPUnit\Framework\TestCase;
use App\Controller\DefaultController;
use App\Controller\QuoteController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentResolverInterface;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\Routing;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * Description of DefaultControllerTest
 *
 * @author Home PC
 */
class DefaultControllerTest extends TestCase{
    //put your code here
    public function testNotFoundHandling()
    {
        $framework = $this->getFrameworkForException(new ResourceNotFoundException());

        $response = $framework->handle(new Request());

        $this->assertEquals(404, $response->getStatusCode());
    }

    private function getFrameworkForException($exception)
    {
        $quoteController = $this->createMock(App\Controller\QuoteController::class);
        // use getMock() on PHPUnit 5.3 or below
     

        $quoteController
            ->expects($this->once())
            ->will($this->throwException($exception))
        ;

        
        
        return new Framework($quoteController);
    }
}
