/**
 * @author VMA
 */

$(document).ready(function(){
				$("#jMenu").jMenu({
				  openClick : false,
				  ulWidth : '100',
				  effects : {
					effectSpeedOpen : 200,
					effectSpeedClose : 200,
					effectTypeOpen : 'slide',
					effectTypeClose : 'hide',
					effectOpen : 'linear',
					effectClose : 'linear'
				  },
				  TimeBeforeOpening : 100,
				  TimeBeforeClosing : 100,
				  animatedText : true,
				  paddingLeft: 8
				});
})