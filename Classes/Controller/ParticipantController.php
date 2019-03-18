<?php
namespace Fixpunkt\FpMasterquiz\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/***
 *
 * This file is part of the "Master-Quiz" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Kurt Gusbeth <k.gusbeth@fixpunkt.com>, fixpunkt werbeagentur gmbh
 *
 ***/

/**
 * ParticipantController
 */
class ParticipantController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * participantRepository
     *
     * @var \Fixpunkt\FpMasterquiz\Domain\Repository\ParticipantRepository
     * @inject
     */
    protected $participantRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $pid = (int)GeneralUtility::_GP('id');
        $participants = $this->participantRepository->findFromPid($pid);
        $this->view->assign('pid', $pid);
        $this->view->assign('participants', $participants);
    }
    
    /**
     * action detail
     *
     * @param \Fixpunkt\FpMasterquiz\Domain\Model\Participant $participant
     * @return void
     */
    public function detailAction(\Fixpunkt\FpMasterquiz\Domain\Model\Participant $participant)
    {
        $this->view->assign('participant', $participant);
    }
}
