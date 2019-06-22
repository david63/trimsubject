<?php
/**
*
* @package Trim Subject Extension
* @copyright (c) 2017 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace david63\trimsubject\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

use phpbb\config\config;
use phpbb\language\language;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\language\language */
	protected $language;

	/**
	 * Constructor for listener
	 *
	 * @param \phpbb\config\config		$config		Config object
	 * @param \phpbb\language\language 	$language	Language object
	 *
	 * @access public
	 */
	public function __construct(config $config, language $language)
	{
		$this->config	= $config;
		$this->language	= $language;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.acp_board_config_edit_add'	=> 'acp_board_settings',
			'core.display_forums_before'		=> 'trim_subject',
		);
	}

	/**
	* Set ACP board settings
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function acp_board_settings($event)
	{
		if ($event['mode'] == 'post')
		{
			$new_display_var = array(
				'title'	=> $event['display_vars']['title'],
				'vars'	=> array(),
			);

			foreach ($event['display_vars']['vars'] as $key => $content)
			{
				$new_display_var['vars'][$key] = $content;
				if ($key == 'allow_quick_reply')
				{
					$new_display_var['vars']['trim_subject_length'] = array(
						'lang'		=> 'TRIM_SUBJECT',
						'validate'	=> 'string',
						'type'		=> 'number:0:30', //30 is the core default value
						'explain' 	=> true,
					);
				}
			}

			$event->offsetSet('display_vars', $new_display_var);
		}
	}

	/**
	* Truncate the last subject title
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function trim_subject($event)
	{
		// Not much point running this if it is not needed
		if ($this->config['trim_subject_length'] > 0)
		{
			$forum_rows = $event['forum_rows'];

			foreach ($forum_rows as $key => $rows)
			{
				$subject 			= $forum_rows[$key]['forum_last_post_subject'];
				$subject_truncated	= truncate_string($subject, $this->config['trim_subject_length'], 255, false, $this->language->lang('ELLIPSIS'));

				$forum_rows[$key]['forum_last_post_subject'] = $subject_truncated;
			}

			$event->offsetSet('forum_rows', $forum_rows);
		}
	}
}
