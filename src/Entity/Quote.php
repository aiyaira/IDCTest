<?php

namespace App\Entity;

use App\Repository\QuoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuoteRepository::class)
 */
class Quote {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     * 
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $task;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\Column(type="float")
     */
    private $percentage;

    /**
     * @ORM\Column(type="float")
     */
    private $totalCost;


    public function getReference() {
        return $this->reference;
    }

    public function setReference(string $reference) {
        $this->reference = $reference;

        return $this;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setAmount(float $amount) {
        $this->amount = $amount;

        return $this;
    }

    public function getPercentage() {
        return $this->percentage;
    }

    public function setPercentage(float $percentage) {
        $this->percentage = $percentage;

        return $this;
    }

    public function getTask() {
        return $this->task;
    }

    public function setTask($task) {
        $this->task = $task;
    }

    function getTotalCost() {
        return $this->totalCost;
    }

    function setTotalCost($totalCost) {
        $this->totalCost = $totalCost;
    }



}
