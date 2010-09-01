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
		$username = $this->getUser()->getUsername();
		
		$base_url = "http://127.0.0.1:8001/rest/publish";
		$secret = "cometChat";
		$channel_name = "chat";
		$originator = "cometChatBot";
		$payload = $username." just connected";
		$payload = urlencode($payload);
		$url = $base_url.'?secret='.$secret.'&channel_name='.$channel_name.'&originator='.$originator.'&payload="'.$payload.'"';
		$result = @file_get_contents($url,0,null,null);
		
		return $this->renderText('[true, {"name":"'.$username.'"}]');
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
