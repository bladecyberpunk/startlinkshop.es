<?php
/**
 * @package		mod_form
 * @copyright	Copyright (C) 2013 ql.de All rights reserved.
 * @author 		Mareike Riegel mareike.riegel@ql.de
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

class modQlFormMailer
{
	/**
	 * method for mailing using JoomlaMailer
	 *
	 * @param   string    $to      recipient of mail
	 * @param   string 	$subject for mail
	 * @param   array  $data post data from form
	 *
	 * @return  bool  True on success, false on failure
	 */
	public function mail($to, $subject, $data, $params)
	{
		$message=$this->generateMail($data,$subject);
		$mail=JFactory::getMailer();
		$mail->addRecipient($to);
        $mail->setSubject($subject);
		$mail->setBody($message);
        $mail->setSender($params['emailsender']);
        $mail->addReplyTo($params['emailreplyto']);
        //echo ("<span style='font-family:courier'>".preg_replace("/\\n/","<br />",$message));echo "<pre>";print_r($mail);die;
		if (!is_object($mail->Send())) return true; else return false;
	}
	
	/**
	 * method to generate headline and body of mail 
	 *  
	 * @param array $data
	 * @param string $subject
	 */
	public function generateMail($data,$subject)
	{
		$headline=$this->generateMailHeadline($data,$subject);
		$body=$this->generateMailBody($data);
		return $headline.$body; 
	}
	
	/**
	 * method to generate headline 
	 *  takes module subject, form subject, name and email by default
	 * @param array $data
	 * @param string $subject
	 */
	public function generateMailHeadline($data,$subject)
	{
        $headline=$subject."\n\n";
		if (isset($data['subject']) AND isset($data['subject']['data'])) $headline.=$data['subject']['data']."\n";
		if (isset($data['name']) AND isset($data['name']['data']) AND isset($data['email']) AND isset($data['email']['data'])) $headline.=$data['name']['data'].' <'.$data['email']['data'].'>'."\n\n";
		return $headline;
	}

	/**
	 * Method to generate body 
	 * 
	 * takes post data and foreaches it to body
	 * @param array $data
	 * @param string $subject
	 */
	public function generateMailBody($data)
	{
		$body='';
		foreach ($data as $k=>$v)
		{
			$vData=$v['data'];
            if (is_array($vData)) $body.=ucfirst($k).' : '.(string)json_encode($vData)."\n";
            else $body.=ucfirst($k).' : '.(string)strip_tags($vData)."\n";
		}
        return $body;
	}
}