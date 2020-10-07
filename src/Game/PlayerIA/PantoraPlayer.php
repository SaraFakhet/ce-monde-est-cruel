<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class PantoraPlayers
 * @package Hackathon\PlayerIA
 * @author YOUR NAME HERE
 */
class PantoraPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        $paper = 0;
        $scissor = 0;
        $rock = 0;
        if ($this->result->getNbRound() !== 0) {
            $array = $this->result->getChoicesFor($this->opponentSide);
            foreach ($array as $choice) {
                if ($choice === 'paper') {
                    $paper++;
                } elseif ($choice === 'scissors') {
                    $scissor++;
                } else {
                    $rock++;
                }
            }
            $res = max($paper, $scissor, $rock);
            switch ($res) {
                case $paper:
                    return parent::scissorsChoice();
                    break;
                case $rock:
                    return parent::paperChoice();
                    break;
                case $scissor:
                    return parent::rockChoice();
                    break;
                default:
                    break;
            }
        }

        return parent::rockChoice();

        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------
    }
};
