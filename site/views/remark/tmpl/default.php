<?php/** * @version		3.0.1 * @package		Joomla * @subpackage	Imprint * @copyright	(C) 2011 - 2012 Imprint Team * @license		GNU General Public License version 2 or later; see LICENSE.txt */defined( '_JEXEC' ) or die( 'Restricted access' );?><div id="component-imprint">	<table class="imprint_table">		<thead>			<tr>				<td class="imprint_td_header">					<?php echo $this->remark->name; ?>				</td>				<td class="imprint_td_back">					<a href="<?php echo $this->backLink; ?>">						<?php echo JText::_('COM_IMPRINT_REMARK_BACK_TO_IMPRINT')?>					</a>				</td>			</tr>		</thead>		<tbody>			<tr>				<td class="imprint_td_align_top_left" colspan="2">					<?php echo $this->remark->text; ?>				</td>			</tr>		</tbody>	</table></div>