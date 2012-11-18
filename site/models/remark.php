<?php/** * @version		3.1 * @package		Joomla * @subpackage	Imprint * @copyright	(C) 2011 - 2012 Imprint Team * @license		GNU General Public License version 2 or later; see LICENSE.txt */// Check to ensure this file is included in Joomla!defined('_JEXEC') or die( 'Restricted access' );jimport('joomla.application.component.model');/** * Remark model class. *  * @package     Joomla * @subpackage  Imprint * @since		3.1 */class ImprintModelRemark extends JModel{		/** 	 * @author	mgebhardt	 * @var		int		The id of the imressum; 0 for default imprint.	 * @since	3.1	 */	protected $id;		/** 	 * @author	mgebhardt	 * @var		object	The imprint object.	 * @since	3.1	 */	protected $remark;		/** 	 * @author	mgebhardt	 * @var		string	The name of the website.	 * @since	3.1	 */	protected $siteName;		/**	 * @author	mgebhardt	 * @var		string	The URL back to imprint.	 * @since	3.1	 */	protected $backLink;		/**	 * Method to load the imprint from database.	 *  	 * @author	mgebhardt	 * @return	mixed	The imprint object or false if imprint not found.	 * @since	3.1	 */	function getRemark()	{		if (!isset($this->remark))		{			$this->getId();						$db = JFactory::getDBO();			$query = $db->getQuery(true);			$query->select('*');			$query->from('#__imprint_remarks');			$query->where("`id` = $this->id");			$db->setQuery((string)$query);			$db->query();			if($db->getNumRows() == 0)			{				// Remark not found. Show error page.				$this->setError(JText::_('COM_IMPRINT_ERROR_REMARK_NOT_FOUND'));				return false;			}			$this->remark = $db->loadObject();						// Replace placeholder for site name in remark text			$this->remark->text = preg_replace("/%%SiteName%%/", $this->getSiteName(), $this->remark->text);		}		return $this->remark;	}		/**	 * Method to get the URL back to imprint	 * 	 * @author	mgebhardt	 * @return 	string	The URL back to impritn	 * @since	3.1	 */	function getBackLink()	{		if (!isset($this->backLink))		{			$imprintId = JRequest::getInt('imprintId', 0);			$url = 'index.php?option=com_imprint&view=imprint&id=' . $imprintId;			$this->backLink = JRoute::_($url);		}		return $this->backLink;	}		/**	 * Method to get the imprint id from URL.	 *  	 * @author	mgebhardt	 * @return	int	The imprint id or 0 for default imprint.	 * @since	3.1	 */	function getId()	{		if(!isset($this->id))		{			$this->id = JRequest::getInt('id', 0);		}		return $this->id;	}		/**	 * Method to get the name of the website.	 *  	 * @author	mgebhardt	 * @return	string	The name of the website.	 * @since	3.1	 */	function getSiteName()	{		if(!isset($this->siteName))		{			$app = JFactory::getApplication();			$this->siteName = $app->getCfg('sitename');		}		return $this->siteName;	}}