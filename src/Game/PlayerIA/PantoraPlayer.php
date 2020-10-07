<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class PantoraPlayers
 * @package Hackathon\PlayerIA
 * @author Sara Chaieb
 * Je me base principalement sur les moves de mes opponents.
 * J'avais fais un algo qui se basait sur les moves de mes opponents ainsi que sur les miens aussi
 * sauf que ça a causé ma chute et l'atterrissage a fait mal, du coup je suis restée dans la simplicité.
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
