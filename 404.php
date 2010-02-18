<?php
 
$ASKAPACHE_S_C = array(
'400' => array(
  'Bad Request', 
  'Your browser sent a request that this server could not understand. Our bad.'),
'401' => array(
  'Authorization Required', 
  'This server could not verify that you are authorized to '.
  'access the document requested. Either you supplied the '.
  'wrong credentials (e.g., bad password), or your browser '.
  'doesn\'t understand how to supply the credentials required. Or we just messed up.'),
'402' => array(
  'Payment Required', 
  'INTERROR'),
'403' => array(
  'Forbidden', 
  'You don\'t have permission to access THEREQUESTURI on this '.
  'server. Ask nicely.'),
'404' => array(
  ' - Oh No! - Page Not Found'),
'405' => array(
  'Method Not Allowed', 
  'The requested method THEREQMETH is not allowed for the URL '.
  'THEREQUESTURI.'),
'406' => array(
  'Not Acceptable', 
  'An appropriate representation of the requested resource '.
  'THEREQUESTURI could not be found on this server.'),
'407' => array(
  'Proxy Authentication Required', 
  'This server could not verify that you are authorized to '.
  'access the document requested. Either you supplied the wrong '.
  'credentials (e.g., bad password), or your browser doesn\'t '.
  'understand how to supply the credentials required.'),
'408' => array(
  'Request Time-out', 
  'Server timeout waiting for the HTTP request from the client.'),
'409' => array(
  'Conflict', 
  'INTERROR'),
'410' => array(
  'Gone', 
  'The requested resourceTHEREQUESTURIis no longer available on '.
  'this server and there is no forwarding address. Please remove '.
  'all references to this resource.'),
'411' => array(
  'Length Required', 
  'A request of the requested method GET requires a valid '.
  'Content-length.'),
'412' => array(
  'Precondition Failed', 
  'The precondition on the request for the URL THEREQUESTURI '.
  'evaluated to false.'),
'413' => array(
  'Request Entity Too Large', 
  'The requested resource THEREQUESTURI does not allow request '.
  'data with GET requests, or the amount of data provided in the '.
  'request exceeds the capacity limit.'),
'414' => array(
  'Request-URI Too Large', 
  'The requested URL\'s length exceeds the capacity limit for '.
  'this server.'),
'415' => array(
  'Unsupported Media Type', 
  'The supplied request data is not in a format acceptable for '.
  'processing by this resource.'),
'416' => array(
  'Requested Range Not Satisfiable', 
  ''),
'417' => array(
  'Expectation Failed', 
  'The expectation given in the Expect request-header field could '.
  'not be met by this server. The client sent <code>Expect:</code>'),
'422' => array(
  'Unprocessable Entity', 
  'The server understands the media type of the request entity, but '.
  'was unable to process the contained instructions.'),
'423' => array(
  'Locked', 
  'The requested resource is currently locked. The lock must be released '.
  'or proper identification given before the method can be applied.'),
'424' => array(
  'Failed Dependency', 
  'The method could not be performed on the resource because the requested '.
  'action depended on another action and that other action failed.'),
'425' => array(
  'No code', 
  'INTERROR'),
'426' => array(
  'Upgrade Required', 
  'The requested resource can only be retrieved using SSL. The server is '.
  'willing to upgrade the current connection to SSL, but your client '.
  'doesn\'t support it. Either upgrade your client, or try requesting '.
  'the page using https://'),
'500' => array(
  'Internal Server Error. Our gears need oil. Try Again Soon.', 
  'INTERROR'),
'501' => array(
  'Method Not Implemented', 
  'GET to THEREQUESTURI not supported.'),
'502' => array(
  'Bad Gateway', 
  'The proxy server received an invalid response from an upstream server.'),
'503' => array(
  'Service Temporarily Unavailable. Be Back Soon', 
  'The server is temporarily unable to service your request due to '.
  'maintenance downtime or capacity problems. Please try again later.'),
'504' => array(
  'Gateway Time-out', 
  'The proxy server did not receive a timely response from the '.
  'upstream server.'),
'505' => array(
  'HTTP Version Not Supported', 
  'INTERROR'),
'506' => array(
  'Variant Also Negotiates', 
  'A variant for the requested resource <code>THEREQUESTURI</code> '.
  'is itself a negotiable resource. This indicates a configuration error.'),
'507' => array(
  'Insufficient Storage', 
  'The method could not be performed on the resource because the '.
  'server is unable to store the representation needed to successfully '.
  'complete the request. There is insufficient free space left in your '.
  'storage allocation.'),
'510' => array(
  'Not Extended', 
  'A mandatory extension policy in the request is not accepted by the '.
  'server for this resource.')
);
 
 

// prints out the html for the error, taking the status code as input
function aa_print_html ($AA_C){
    global $AA_REQUEST_METHOD, $AA_REASON_PHRASE, $AA_MESSAGE;
    
    if($AA_C == '400'||$AA_C == '403'||$AA_C == '405'||$AA_C[0] == '5'){
        @header("Connection: close",1);
        
        if($AA_C=='405')@header('Allow: GET,HEAD,POST,OPTIONS,TRACE');
        
        echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>";
        echo "<title>$AA_C $AA_REASON_PHRASE</title>";
        echo "<h1>$AA_REASON_PHRASE</h1>\n<p>$AA_MESSAGE<br>\n</p>\n</body></html>";
        return true;
    } else return false;
}


// Tries to determine the error status code encountered by the server
if(!isset($_REQUEST['error']))  $AA_STATUS_CODE = '404';
else  $AA_STATUS_CODE = $_REQUEST['error'];

if(isset($_SERVER['REDIRECT_STATUS']) && $_SERVER['REDIRECT_STATUS']!='200') 
$AA_STATUS_CODE = $_SERVER['REDIRECT_STATUS'];
 
 
$AA_REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
$AA_THE_REQUEST = htmlentities(strip_tags($_SERVER['REQUEST_URI']));
$AA_REASON_PHRASE = $ASKAPACHE_S_C[$AA_STATUS_CODE][0];
$AA_M_SR=array(array('INTERROR','THEREQUESTURI','THEREQMETH'),
array('The server encountered an internal error or misconfiguration '.
'and was unable to complete your request.',$AA_THE_REQUEST,$AA_REQUEST_METHOD));
$AA_MESSAGE=str_replace($AA_M_SR[0],$AA_M_SR[1],$ASKAPACHE_S_C[$AA_STATUS_CODE][1]);


// begin the output buffer to send headers and resonse
ob_start();
@header("HTTP/1.1 $AA_STATUS_CODE $AA_REASON_PHRASE",1);
@header("Status: $AA_STATUS_CODE $AA_REASON_PHRASE",1);

if(!aa_print_html($AA_STATUS_CODE)){
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="chunk">
<head profile="http://gmpg.org/xfn/11">
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="http://www.travisberry.com/wp-content/themes/tbsite/style.css" type="text/css" media="screen" />
<!--[if lte IE 7]>
<link rel="stylesheet" href="http://www.travisberry.com/wp-content/themes/tbsite/ie.css" type="text/css" media="screen" />
<![endif]-->
<link rel="alternate" type="application/rss+xml" title="Travis Berry RSS Feed" href="http://www.travisberry.com/feed/" />
<link rel="pingback" href="http://www.travisberry.com/xmlrpc.php" />
<meta http-equiv="X-UA-Compatible" content="IE=8" />

</head>

<body>
<div id="main">
  <!--[if lte IE 7]>
  <img src="http://www.travisberry.com/wp-content/themes/tbsite/images/footerimage.jpg" alt="Travis Berry" title="Travis Berry" />
  <![endif]-->
<div id="navbar">
    <!--[if lt IE 7]>
  <div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>
    <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'><a href='#' onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-cornerx.jpg' style='border: none;' alt='Close this notice'/></a></div>
    <div style='width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'>
      <div style='width: 75px; float: left;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-warning.jpg' alt='Warning!'/></div>
      <div style='width: 275px; float: left; font-family: Arial, sans-serif;'>
	<div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>'Friends don't let friends use IE6'</div>
        <div style='font-size: 12px; margin-top: 10px;'>You are using an outdated browser</div>
        <div style='font-size: 10px; margin-top: 3px; line-height: 10px;'>For a better, more secure, experience using this, and other sites, please upgrade to a modern web browser. For more information click <a href="http://browsehappy.com/"  style="color: blue" target="blank">here.</a></div>
      </div>
      <div style='width: 75px; float: left;'><a href='http://www.firefox.com' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox 3.5'/></a></div>
      <div style='width: 75px; float: left;'><a href='http://www.browserforthebetter.com/download.html' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8'/></a></div>
      <div style='width: 73px; float: left;'><a href='http://www.apple.com/safari/download/' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a></div>
      <div style='float: left;'><a href='http://www.google.com/chrome' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a></div>
    </div>
  </div>
  <![endif]-->

<ul><li class="current_page_item"
><a href="http://www.travisberry.com/">Home</a></li>
  <li><a href="http://www.travisberry.com/blog/">Blog</a></li>
<li><a href="http://www.travisberry.com/work/">Work</a></li>
<li><a href="http://www.travisberry.com/contact/">Contact</a></li>


</ul>
</div>

<div id="sidestripe">

</div>
<div id="contentbox">
	<div id="content">
		
    <home><?php _e("$AA_STATUS_CODE $AA_REASON_PHRASE"); ?></home><p>Instead, why not read one of these posts?
<?php 
global $post;
$postid = $post->ID;
$args = array(
'orderby' => 'rand',
'showposts'=>4,
'post__not_in'=>array($postid)
);
query_posts($args);
echo '<ul>';
while (have_posts()) : the_post();
echo '<li><a href="'.get_permalink().'" title="'.the_title('','',false).'">'.the_title('','',false).'</a></li>';
endwhile;
echo '</ul>';
?>
<p>Or search for something else here
<?php $search_text = "Type and hit enter"; ?> 
<form method="get" id="searchform" 
action="<?php bloginfo('home'); ?>/"> 
<input type="text" value="<?php echo $search_text; ?>"  
name="s" id="s"  class="search404" 
onblur="if (this.value == '')  
{this.value = '<?php echo $search_text; ?>';}"  
onfocus="if (this.value == '<?php echo $search_text; ?>')  
{this.value = '';}" /> 
<input type="hidden" id="searchsubmit" /> 
</form>
	</div>

</div>
<div id="footer">
	<img src="http://www.travisberry.com/wp-content/themes/tbsite/images/footerimage.jpg" width="388px" height="184px" alt="Travis Berry" title="Travis Berry" />
		</div>
<script type="text/javascript" src="http://m.travisberry.com/mobify/redirect.js"></script>
<script type="text/javascript">try{_mobify("http://m.travisberry.com/");} catch(err) {};</script>
<!--[if lt IE 8]>
<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
<![endif]-->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-11593601-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
<?php } 
exit; exit();
?>





