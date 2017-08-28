<script type="text/javascript">
/* <![CDATA[ */
    function grin(tag) {
    	var myField;
    	tag = ' ' + tag + ' ';
        if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
    		myField = document.getElementById('comment');
    	} else {
    		return false;
    	}
    	if (document.selection) {
    		myField.focus();
    		sel = document.selection.createRange();
    		sel.text = tag;
    		myField.focus();
    	}
    	else if (myField.selectionStart || myField.selectionStart == '0') {
    		var startPos = myField.selectionStart;
    		var endPos = myField.selectionEnd;
    		var cursorPos = endPos;
    		myField.value = myField.value.substring(0, startPos)
    					  + tag
    					  + myField.value.substring(endPos, myField.value.length);
    		cursorPos += tag.length;
    		myField.focus();
    		myField.selectionStart = cursorPos;
    		myField.selectionEnd = cursorPos;
    	}
    	else {
    		myField.value += tag;
    		myField.focus();
    	}
    }
/* ]]> */
</script>
<a href="javascript:grin(':biggrin:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_biggrin.png" alt="" /></a>
<a href="javascript:grin(':cool:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_cool.png" alt="" /></a>
<a href="javascript:grin(':lol:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_lol.png" alt="" /></a>
<a href="javascript:grin(':arrow:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_arrow.png" alt="" /></a>
<a href="javascript:grin(':confused:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_confused.png" alt="" /></a>
<a href="javascript:grin(':cry:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_cry.png" alt="" /></a>
<a href="javascript:grin(':eek:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_eek.png" alt="" /></a>
<a href="javascript:grin(':smile:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_smile.png" alt="" /></a>
<a href="javascript:grin(':evil:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_evil.png" alt="" /></a>
<a href="javascript:grin(':exclaim:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_exclaim.png" alt="" /></a>
<a href="javascript:grin(':idea:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_idea.png" alt="" /></a>
<a href="javascript:grin(':mad:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_mad.png" alt="" /></a>
<a href="javascript:grin(':mrgreen:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_mrgreen.png" alt="" /></a>
<a href="javascript:grin(':neutral:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_neutral.png" alt="" /></a>
<a href="javascript:grin(':question:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_question.png" alt="" /></a>
<a href="javascript:grin(':razz:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_razz.png" alt="" /></a>
<a href="javascript:grin(':redface:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_redface.png" alt="" /></a>
<a href="javascript:grin(':rolleyes:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_rolleyes.png" alt="" /></a>
<a href="javascript:grin(':sad:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_sad.png" alt="" /></a>
<a href="javascript:grin(':surprised:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_surprised.png" alt="" /></a>
<a href="javascript:grin(':twisted:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_twisted.png" alt="" /></a>
<a href="javascript:grin(':wink:')"><img src="<?php bloginfo('template_url') ?>/smiley/icon_wink.png" alt="" /></a>
<br />
<?php { echo ''; } ?>
