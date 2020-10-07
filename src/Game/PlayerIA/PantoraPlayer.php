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
            $tabopponent = $this->result->getStatsFor($this->opponentSide);
            $res_opponent = max($tabopponent['scissors'], $tabopponent['paper'], $tabopponent['rock']);
            switch ($res_opponent) {
                case $tabopponent['paper']:
                    return parent::scissorsChoice();
                    break;
                case $tabopponent['rock']:
                    return parent::paperChoice();
                    break;
                case $tabopponent['scissors']:
                    return parent::rockChoice();
                    break;
                default:
                    break;
            }
        }
        return parent::rockChoice();
    }
};
