/*
File: QTP_Library.js

Abstract: This file contains functions to generate a JavaScript-based QuickTime movie 
object, compatable with both Desktop and iPhone platforms. 

Version: <1.0>

Disclaimer: IMPORTANT:  This Apple software is supplied to you by Apple
Computer, Inc. ("Apple") in consideration of your agreement to the
following terms, and your use, installation, modification or
redistribution of this Apple software constitutes acceptance of these
terms.  If you do not agree with these terms, please do not use,
install, modify or redistribute this Apple software.

In consideration of your agreement to abide by the following terms, and
subject to these terms, Apple grants you a personal, non-exclusive
license, under Apple's copyrights in this original Apple software (the
"Apple Software"), to use, reproduce, modify and redistribute the Apple
Software, with or without modifications, in source and/or binary forms;
provided that if you redistribute the Apple Software in its entirety and
without modifications, you must retain this notice and the following
text and disclaimers in all such redistributions of the Apple Software. 
Neither the name, trademarks, service marks or logos of Apple Computer,
Inc. may be used to endorse or promote products derived from the Apple
Software without specific prior written permission from Apple.  Except
as expressly stated in this notice, no other rights or licenses, express
or implied, are granted by Apple herein, including but not limited to
any patent rights that may be infringed by your derivative works or by
other works in which the Apple Software may be incorporated.

The Apple Software is provided by Apple on an "AS IS" basis.  APPLE
MAKES NO WARRANTIES, EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION
THE IMPLIED WARRANTIES OF NON-INFRINGEMENT, MERCHANTABILITY AND FITNESS
FOR A PARTICULAR PURPOSE, REGARDING THE APPLE SOFTWARE OR ITS USE AND
OPERATION ALONE OR IN COMBINATION WITH YOUR PRODUCTS.

IN NO EVENT SHALL APPLE BE LIABLE FOR ANY SPECIAL, INDIRECT, INCIDENTAL
OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
INTERRUPTION) ARISING IN ANY WAY OUT OF THE USE, REPRODUCTION,
MODIFICATION AND/OR DISTRIBUTION OF THE APPLE SOFTWARE, HOWEVER CAUSED
AND WHETHER UNDER THEORY OF CONTRACT, TORT (INCLUDING NEGLIGENCE),
STRICT LIABILITY OR OTHERWISE, EVEN IF APPLE HAS BEEN ADVISED OF THE
POSSIBILITY OF SUCH DAMAGE.

Copyright 2007 Apple Computer, Inc., All Rights Reserved

*/ 

/*
 * This file contains functions to generate a JavaScript-based QuickTime movie 
 * object, compatable with both Desktop and iPhone platforms. 
 */

function _FixIEController(element)
{
	if(navigator.appName != "Microsoft Internet Explorer")
		return;

	var movieObj = element.lastChild;

	if(!movieObj.GetControllerVisible());
		setTimeout( function() { movieObj.SetControllerVisible(true); }, 100);
}

function _FixOperaOpacity(element)
{
	if(navigator.appName != "Opera")
		return;

	element.style.opacity = "1.0";
}

function QT_ReplaceWithPoster()
{
      var args = Array.prototype.slice.call(arguments);
      var clickText = args.shift();
      var posterSrc = args.shift();
      var element = args.shift();
      var src = args[0];
      var width = args[1];
      var height = args[2];

		if (navigator.platform.indexOf('iPhone') > -1) 
		{
 			QT_ReplaceElementContents(element, 
        posterSrc,
				width, height, '',
				'href', src,
				'target', 'myself',
				'controller', 'false', 
				'autoplay', 'true', 
				'scale', 'aspect');
		}
		else
		{
			element.style.position = 'relative';
			element.style.width = width + 'px';
			element.style.height = height + 'px';
			element.style.textAlign = 'center';
			element.style.backgroundImage = 'url(' + posterSrc + ')';
			element.style.backgroundRepeat = 'no-repeat';
			element.style.backgroundPosition = 'top center';
      element.args = args;

			var play = element.appendChild(document.createElement('span'));
			play.innerHTML = clickText;
			play.className = 'playButton';
			_FixOperaOpacity(play);

			element.onclick = function() { 
        element.onclick = '';
        play.style.display = 'none';
        var playBackground = element.appendChild(document.createElement('div'));
        playBackground.className = 'playBackground';
        playBackground.style.opacity = '0';
        playBackground.style.width = element.style.width;
        playBackground.style.height = element.style.height;

        var intervalId = setInterval(function() {
          var opacity = parseFloat(playBackground.style.opacity);
          opacity = Math.min(1.0, opacity + 0.2);
          playBackground.style.opacity = opacity;
          playBackground.style.filter = 'alpha(opacity='+(opacity*100)+')';
          }, 25);


        setTimeout(function() {
            clearInterval(intervalId); 
            element.style.backgroundImage = '';
            element.style.backgroundColor = 'rgb(0,0,0)';
            playBackground.style.opacity = '1.';
            playBackground.style.filter = 'alpha(opacity=100)';

            var	txt = _QTGenerate("QT_WriteOBJECT_XHTML", true, args);
            if(txt.length > 0)
              element.innerHTML = txt;

              _FixIEController(this);
          }, 250);
      }
		}
}

function QT_WritePoster_XHTML()
{
	var args = Array.prototype.slice.call(arguments);
	var clickText = args.shift();
	var posterSrc = args.shift();
	var src = args[0];
	var width = args[1];
	var height = args[2];

	if (navigator.platform.indexOf('iPhone') > -1) 
	{
		QT_WriteOBJECT_XHTML( posterSrc,
			width, height, '',
			'href', src,
			'target', 'myself',
			'controller', 'false', 
			'autoplay', 'true', 
			'scale', 'aspect');
	}
	else
	{
		var id = 'qtp_poster_div_id_' + Math.random();
		document.writeln('<div id="'+id+'"></div>');
		var element = document.getElementById(id);
		element.id = '';
		element.style.position = 'relative';
		element.style.width = width + 'px';
		element.style.height = height + 'px';
		element.style.textAlign = 'center';
		element.style.backgroundImage = 'url(' + posterSrc + ')';
		element.style.backgroundRepeat = 'no-repeat';
		element.style.backgroundPosition = 'top center';

		var play = element.appendChild(document.createElement('span'));
		play.innerHTML = clickText;
		play.className = 'playButton';
		_FixOperaOpacity(play);

		element.onclick = function() { 
			element.onclick = '';
			play.style.display = 'none';
			var playBackground = element.appendChild(document.createElement('div'));
			playBackground.className = 'playBackground';
			playBackground.style.opacity = '0';
			playBackground.style.width = element.style.width;
			playBackground.style.height = element.style.height;

			var intervalId = setInterval(function() {
			var opacity = parseFloat(playBackground.style.opacity);
			opacity = Math.min(1.0, opacity + 0.2);
			playBackground.style.opacity = opacity;
			playBackground.style.filter = 'alpha(opacity='+(opacity*100)+')';
			}, 25);


			setTimeout(function() {
				clearInterval(intervalId); 
				element.style.backgroundImage = '';
				element.style.backgroundColor = 'rgb(0,0,0)';
				playBackground.style.opacity = '1.';
				playBackground.style.filter = 'alpha(opacity=100)';

				var txt = _QTGenerate("QT_WriteOBJECT_XHTML", true, args);
				if(txt.length > 0)
				element.innerHTML = txt;

				_FixIEController(element);
			}, 250);
		}
	}
}

