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
        if ($this->result->getNbRound() !== 0) {
            $mytab = $this->result->getStatsFor($this->mySide);
            $tabopponent = $this->result->getStatsFor($this->opponentSide);
            $res_mine = max($mytab['scissors'], $mytab['paper'], $mytab['rock']);
            $res_opponent = max($tabopponent['scissors'], $tabopponent['paper'], $tabopponent['rock']);
            switch ($res_opponent) {
                case $tabopponent['paper']:
                    if ($res_mine === 'rock') {
                        return parent::scissorsChoice();
                    } elseif ($res_mine === 'paper') {
                        return parent::rockChoice();
                    } else {
                        return parent::paperChoice();
                    }
                    break;
                case $tabopponent['rock']:
                    if ($res_mine === 'paper') {
                        return parent::rockChoice();
                    } elseif ($res_mine === 'rock') {
                        return parent::scissorsChoice();
                    } else {
                        return parent::paperChoice();
                    }
                    break;
                case $tabopponent['scissors']:
                    if ($res_mine === 'paper') {
                        return parent::rockChoice();
                    } elseif ($res_mine === 'rock') {
                        return parent::scissorsChoice();
                    } else {
                        return parent::paperChoice();
                    }
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
