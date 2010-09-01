<?php

/**
 * hookbox actions.
 *
 * @package    cometChat
 * @subpackage hookbox
 * @author     clement.ridoret@gmail.com
 */
class hookboxActions extends sfActions
{
 /**
  * Executes connect action
  *
  * @param sfRequest $request A request object
  */
	public function executeConnect(sfWebRequest $request)
	{
		$username = "test";
		return $this->renderText('[true, {"name":"'.$this->getUser()->getUsername().'"}]');
	}
	
	/**
  * Executes createChannel action
  *
  * @param sfRequest $request A request object
  */
	public function executeCreateChannel(sfWebRequest $request)
	{	
		return $this->renderText('[true, { "history_size" : 0, "reflective" : true, "presenceful" : true }]');
	}
	
	/**
  * Executes publish action
  *
  * @param sfRequest $request A request object
  */
	public function executePublish(sfWebRequest $request)
	{
		return $this->renderText('[true, {}]');
	}
	
	/**
  * Executes subscribe action
  *
  * @param sfRequest $request A request object
  */
	public function executeSubscribe(sfWebRequest $request)
	{
		return $this->renderText('[true, {}]');
	}
	
	/**
  * Executes unsubscribe action
  *
  * @param sfRequest $request A request object
  */
	public function executeUnsubscribe(sfWebRequest $request)
	{
		return $this->renderText('[true, {}]');
	}
	
	/**
  * Executes disconnect action
  *
  * @param sfRequest $request A request object
  */
	public function executeDisconnect(sfWebRequest $request)
	{
		return $this->renderText('[true, {}]');
	}
}
