<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * GroupDocs
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  2012 
 * @author     support@groupdocs.com 
 * @license    GPL 
 */


array_insert($GLOBALS['BE_MOD']['content'], 3, array
(
	'groupdocs_viewer' => array
	(
		'tables' => array('tl_gdv'),
		'icon'   => 'system/modules/groupdocs_viewer/html/groupdocs.gif'
	)
));


// Just add JS to Back End where using TinyMCE
$GLOBALS['TL_HOOKS']['outputBackendTemplate'][] = array('ArticleAddGroupDocs', 'javaScriptFileID');
class ArticleAddGroupDocs{
public function javaScriptFileID($strContent, $strTemplate)
{
    if ($strTemplate == 'be_main')
    {
		if($_GET['do']=='article' && $_GET['act']=='edit')
			print "<script>
					//build GroupDocs Button just above Text Editor
				setTimeout(function(){
					var place_for_but = document.getElementById('pal_text_legend');
					var leg = place_for_but.getElementsByTagName('legend')[0];
					var btn=document.createElement('input');
					btn.type = 'button';
					btn.id = 'groupdocsv'
					btn.value = 'Embed GroupDocs Viewer';
					btn.onclick = function() { insertGroupDocsIframe(); };
					insertAfter(leg, btn);
				},500);

				function insertGroupDocsIframe(){
						// Enter GroupDocs File ID
						var ans=prompt('Enter GroupDocs File ID:','');
						if(ans.length<50) { alert('Sorry, but this File ID is too short'); return false; }
						if(ans.length>70) { alert('Sorry, but this File ID is too big'); return false; }
						// all good continue
						var iframe = '<iframe src=\"https://apps.groupdocs.com/document-viewer/embed/'+ans+'\" frameborder=\"0\" width=\"600\" height=\"400\"></iframe>';
						var tinyMceContent = tinyMCE.activeEditor.getContent();
						// set content
						tinyMCE.activeEditor.setContent(tinyMceContent+iframe);
				}
				// as in jquery .after()
				function insertAfter(referenceNode, newNode) {
					referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
				}
			</script>";
    }
 
}








}
?>