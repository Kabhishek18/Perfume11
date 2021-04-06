<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
##Function names##
#force_ssl
#generateUUID
#MessageAlertStatus
#DD(Direct Dump)
*/
if ( ! function_exists('force_ssl'))
{
	function force_ssl() {		
		if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
			$url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			redirect($url);
			exit;		
		}	
	}
}



if ( ! function_exists('generateUUID'))
{
	function generateUUID(){
		$charid = md5(uniqid(rand(), true).time());
		$hyphen = chr(45);// "-"
		$uuid = substr($charid, 0, 8).$hyphen
		  .substr($charid, 8, 4).$hyphen
		  .substr($charid,12, 4).$hyphen
		  .substr($charid,16, 4).$hyphen
		  .substr($charid,20,12);
		return $uuid;
	}
}




if ( !function_exists('MessageAlertStatus')) {
		

		function MessageAlertStatus($success,$status,$message,$extra = []){
				  return array_merge([
				        'success' => $success,
				        'status' => $status,
				        'message' => $message
				    ],$extra);
		}
	}

if (!function_exists('dd')) {
 function dd()
  {
      echo '<pre>';
      array_map(function($x) {var_dump($x);}, func_get_args());
      die;
   }
 }


if(!function_exists('EmailMessage')){
	function EmailMessage($user,$link){

		$template ='
					<table width="100%" cellpadding="0" cellspacing="0" border="0" id="m_-2287190302310609224m_-7533971164095270638background-table" style="border-collapse:collapse;padding:0;margin:0 auto;background-color:#ebebeb;font-size:12px">
					   <tbody>
					      <tr>
					         <td valign="top" align="center" style="font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0;width:100%">
					            <table cellpadding="0" cellspacing="0" border="0" align="center" style="border-collapse:collapse;padding:0;margin:0 auto;width:600px">
					               <tbody>
					                  <tr>
					                     <td align="center" style="background:#fff;font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
					                        <table cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;padding:0;margin:0">
					                           <tbody>
					                              <tr>
					                                 <td align="center"  style=" font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:15px 0px 10px 5px;margin:0">
					                                    <a href="https://go2bng.com/" style="color:#3696c2;float:left;display:block" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://go2bng.com/&amp;source=gmail&amp;ust=1612437442476000&amp;usg=AFQjCNGp8vRHo85GtG1KT4EjwDV7Yqv0Lg">
					                                    <img width="50%" height="" src="https://go2bng.com/resource/images/logo.png" alt="Go2bng.com" border="0" style=" outline:none;text-decoration:none" class="CToWUd"></a>
					                                 </td>
					                              </tr>
					                           </tbody>
					                        </table>
					                     </td>
					                  </tr>
					                  <tr>
					                     <td align="center" style="background:#fff;font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
					                        <table cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;padding:0;margin:0;border-top: 3px solid #ffce10; ">
					                           <tbody>
					                           
					                              <tr>
					                                 <td style="font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:5px 15px;margin:0;">
					                                    <h3 style="text-align:left;margin:0;padding:5px 15px">Dear '.$user.'</h3>
					                                    <h3 style="padding:5px 15px;font-family:calibri;font-weight:normal;font-size:17px;margin-bottom:10px;margin-top:10px">
					                                    	You are at final step to create account with please click on button to verify your email.
					                                    </h3>
					                                    
					                                 </td>
					                              </tr>
					                              <tr>
					                                 <td style="width: 650px; font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
					                                    <table bgcolor="" width="100%" height="100px">
					                                       <tr>
					                                          <td></td>
					                                            <td colspan="3" style="color:#000; font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:5px 15px;margin:0;text-align:center">
					                                            	<h3 style="font-family:calibri;font-weight:normal;font-size:32px;margin-bottom:10px;margin-top:10px;text-align: center;">
					                                            	<a href="'.$link.'" style="background: #f19220;color:white;padding: 15px;">
						                                             	Click To Verify
					                                            	</a>
						                                            </h3>

					                                          </td>
					                                          <td></td>

					                                       </tr>
					                                 
					                                    </table>
					                                 </td>
					                                
					                                 </td>
					                              </tr>
					                           </tbody>
					                        </table>
					                        <table cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;padding:0;margin:0;border-bottom: 3px solid #ffce10; "> 
					                           <tbody>
					                              <tr>
					                                  <td style="font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:10px 15px;margin:10px;border-bottom: 3px solid #ffce10;">
					                                       <p>And as always, if you have questions or feedback for us, we love hearing from you.<br/>
					                                       	Cheers,<br/>
					                                       Bng Team</p>
					                                   </td>        
					                              </tr>
					                           </tbody>
					                        </table>
					                     </td>
					                  </tr>
					               </tbody>
					            </table>
					   
					         </td>
					      </tr>
					   </tbody>
					</table>';

		return $template;			
	}
}



?>
