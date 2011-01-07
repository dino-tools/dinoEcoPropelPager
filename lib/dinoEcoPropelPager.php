<?php
/**
 * 軽い場合もあるかも、なページャ。
 * 
 * SELECT * は重いので、SELECT id にかえるためのページャーです。
 * そのテーブルの１レコードあたりのデータ量（カラム数が多いなど）の場合には効果があります。
 * 
 * @author Dino) TAKEKOSHI Akishige
 * @author ryer
 */
class dinoEcoPropelPager extends sfPropelPager
{
  protected $key_column;
  protected $real_class_peer;
  protected $real_class_retrieve_method = 'retrieveByPk';
  
  public function __construct($class, $key_column, $real_class, $maxPerPage = 10)
  {
    parent::__construct($class, $maxPerPage);
    
    $this->key_column      = $key_column;
    $this->real_class_peer = $real_class . 'Peer';
  }
  
  
  public function getResults()
  {
    $crit = $this->getCriteria();
    $crit->addSelectColumn($this->key_column);
    $ret = array();
    $rs = call_user_func(array($this->getClassPeer(), $this->getPeerMethod() . 'RS'), $crit);
    while ($rs->next()) {
      $ret[] = call_user_func(array($this->real_class_peer, $this->real_class_retrieve_method), $rs->getInt(1));
    }
    return $ret;
  }
}
