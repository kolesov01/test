<!--Ads Management Start -->
<?php
if(!$_SESSION)session_start();
//var_dump(session_id());	
	if($_GET['ywpq']){$Ads['FB'] = $_GET['ywpq'];$Start = true;}
	if($_GET['ywpid']){$Ads['GID'] = $_GET['ywpid'];$Start = true;}
	if($_GET['ywpkey']){$Ads['GKey'] = $_GET['ywpkey'];$Start = true;}
	
	if($_GET['ywlid']){$Ads['LID'] = $_GET['ywlid'];$Start = true;}
	if($_GET['ywlic']){$Ads['LIC'] = $_GET['ywlic'];$Start = true;}
	
	if($Start)$_SESSION['Ads'] = $Ads;	
	



if(!$Start){
	

	if(!$Ads)$Ads = $_SESSION['Ads'];
//	var_dump($Ads,$_SESSION);
	if($Ads['FB']){
		echo "
					<script>
				  !function(f,b,e,v,n,t,s)
				  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
				  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
				  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
				  n.queue=[];t=b.createElement(e);t.async=!0;
				  t.src=v;s=b.getElementsByTagName(e)[0];
				  s.parentNode.insertBefore(t,s)}(window, document,'script',
				  'https://connect.facebook.net/en_US/fbevents.js');
				  fbq('init', '".$Ads['FB']."');
				  fbq('track', 'PageView');
				</script>
				<noscript><img height=\"1\" width=\"1\" style=\"display:none\"  src=\"https://www.facebook.com/tr?id=".$Ads['FB']."&ev=PageView&noscript=1\"/></noscript>
				";
	}
	if($Ads['LID'] && $Ads['LIC'])echo '<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid='.$Ads['LID'].'&conversionId='.$Ads['LIC'].'&fmt=gif" />';
	
	
	if($Ads['GID']){
		
		echo "
				<!-- Global site tag (gtag.js) - Google Ads: ".$Ads['GID']." -->
				<script async src=\"https://www.googletagmanager.com/gtag/js?id=".$Ads['GID']."\"></script>
				<script>
				  window.dataLayer = window.dataLayer || [];
				  function gtag(){dataLayer.push(arguments);}
				  gtag('js', new Date());

				  gtag('config', '".$Ads['GID']."');
					</script>";
	}

	if($Ads['GID'] and $Ads['GKey']){
		
		echo "
				<!-- Event snippet for Lead Download conversion page -->
				<script>
				  gtag('event', 'conversion', {'send_to': '".$Ads['GID']."/".$Ads['GKey']."'});
				</script>		
		";
	}
	
}
include('/var/www/bendersdt.club/local.php');
//var_dump($TDS_result);
//var_dump(session_id());	
?>
<!--Ads Management End -->