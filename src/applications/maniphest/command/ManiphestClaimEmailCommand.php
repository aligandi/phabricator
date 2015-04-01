<?php

final class ManiphestClaimEmailCommand
  extends ManiphestEmailCommand {

  public function getCommand() {
    return 'claim';
  }

  public function buildTransactions(
    PhabricatorUser $viewer,
    PhabricatorApplicationTransactionInterface $object,
    PhabricatorMetaMTAReceivedMail $mail,
    $command,
    array $argv) {
    $xactions = array();

    $xactions[] = $object->getApplicationTransactionTemplate()
      ->setTransactionType(ManiphestTransaction::TYPE_OWNER)
      ->setNewValue($viewer->getPHID());

    return $xactions;
  }

}
