<?php 

$bodyPointPurchased = <<<STARTEMAIL

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<!--[if gte mso 9]>
	<xml>
		<o:OfficeDocumentSettings>
		<o:AllowPNG/>
		<o:PixelsPerInch>96</o:PixelsPerInch>
		</o:OfficeDocumentSettings>
	</xml>
	<![endif]-->
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="format-detection" content="date=no" />
	<meta name="format-detection" content="address=no" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="x-apple-disable-message-reformatting" />
    <!--[if !mso]><!-->
	<link href="https://fonts.googleapis.com/css?family=Merriweather:400,400i,700,700i" rel="stylesheet" />
    <!--<![endif]-->
	<title>Email Template</title>
	<!--[if gte mso 9]>
	<style type="text/css" media="all">
		sup { font-size: 100% !important; }
	</style>
	<![endif]-->
	

	<style type="text/css" media="screen">
		/* Linked Styles */
		body { padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background: linear-gradient(90deg, #f65169, #fab429); -webkit-text-size-adjust:none }
		a { color:#000001; text-decoration:none }
		p { padding:0 !important; margin:0 !important } 
		img { -ms-interpolation-mode: bicubic; /* Allow smoother rendering of resized image in Internet Explorer */ }
		.mcnPreviewText { display: none !important; }

				
		/* Mobile styles */
		@media only screen and (max-device-width: 480px), only screen and (max-width: 480px) {
			.mobile-shell { width: 100% !important; min-width: 100% !important; }
			.bg { background-size: 100% auto !important; -webkit-background-size: 100% auto !important; }
			
			.text-header,
			.m-center { text-align: center !important; }
			
			.center { margin: 0 auto !important; }
			.container { padding: 20px 10px !important }
			
			.td { width: 100% !important; min-width: 100% !important; }

			.m-br-15 { height: 15px !important; }
			.p30-15 { padding: 30px 15px !important; }
			.p0-15-30 { padding: 0px 15px 30px 15px !important; }
			.mpb30 { padding-bottom: 30px !important; }

			.m-td,
			.m-hide { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }

			.m-block { display: block !important; }

			.fluid-img img { width: 100% !important; max-width: 100% !important; height: auto !important; }

			.column,
			.column-dir,
			.column-top,
			.column-empty,
			.column-empty2,
			.column-dir-top { float: left !important; width: 100% !important; display: block !important; }

			.column-empty { padding-bottom: 30px !important; }
			.column-empty2 { padding-bottom: 10px !important; }

			.content-spacing { width: 15px !important; }
            .img a svg {width:25px !important;height:25px !important;margin-right:5px !important;}
            .svg {margin-right:5px !important;width:25px !important;height:25px !important;}
		}
	</style>
</head>
<body class="body" style="padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background: linear-gradient(90deg, #f65169, #fab429); -webkit-text-size-adjust:none;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#fab429">
		<tr>
			<td align="center" valign="top">
				<table width="650" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
					<tr>
						<td class="td container" style="width:650px; min-width:650px; font-size:0pt; line-height:0pt; margin:0; font-weight:normal; padding:55px 0px;">
							<!-- Header -->
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td class="p30-15 tbrr" style="padding: 30px; border-radius:12px 12px 0px 0px;" bgcolor="#ffffff">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<th class="column-top" width="145" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td class="img m-center" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="$siteLogoUrl" width="45" height="45" border="0" alt="" /></td>
														</tr>
													</table>
												</th>
												<th class="column-empty2" width="1" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;"></th>
												<th class="column" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td class="text-header" style="color:#999999; font-family:'Merriweather', Georgia,serif; font-size:13px; line-height:18px; text-align:right;"><a href="$base_url" target="_blank" class="link2" style="color:#999999; text-decoration:none;"><span class="link2" style="color:#999999; text-decoration:none;">$siteName</span></a></td>
														</tr>
													</table>
												</th>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!-- END Header -->

							<!-- Hero Image -->
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td class="fluid-img" style="font-size:30pt; height:300px; line-height:30pt; text-align:center; font-family:'Merriweather', Georgia,serif; background:#f65169; color:#ffffff;" >$planPoint point</td>
								</tr>
							</table>
							<!-- END Hero Image -->

							<!-- Intro -->
							<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
								<tr>
									<td style="padding-bottom: 10px;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td class="p30-15" style="padding: 60px 30px;">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td class="h1 pb25" style="color:#444444; font-family:'Merriweather', Georgia,serif; font-size:35px; line-height:42px; text-align:center; padding-bottom:25px;">$pointPurchasesuccess</td>
														</tr>
														<tr>
															<td class="text-center pb25" style="color:#666666; font-family:Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">$pointPurchaseDetails</td>
														</tr>
														<!-- Button -->
														<tr>
															<td align="center">
																<table class="center" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
																	<tr>
																		<td class="text-button" style="background:#ffda5c; color:#444444; font-family:'Merriweather', Georgia,serif; font-size:14px; line-height:18px; padding:12px 15px; text-align:center; border-radius:10px; text-transform:uppercase;"><a href="$base_url" target="_blank" class="link" style="color:#000001; text-decoration:none;"><span class="link" style="color:#000001; text-decoration:none;">$startUsingYourPoints</span></a></td>
																	</tr>
																</table>
															</td>
														</tr>
														<!-- END Button -->
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!-- END Intro -->
  

							<!-- Footer -->
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td class="p30-15 bbrr" style="padding: 50px 30px; border-radius:0px 0px 12px 12px;" bgcolor="#ffffff">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td align="center" style="padding-bottom: 30px;">
													<table border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td class="img svg" width="25" style="font-size:0pt; line-height:0pt; text-align:left;padding:5px;"><a href="#" target="_blank">$facebookIcon</a></td>
															<td class="img svg" width="25" style="font-size:0pt; line-height:0pt; text-align:left;padding:5px;"><a href="#" target="_blank">$twitterIcon</a></td>
															<td class="img svg" width="25" style="font-size:0pt; line-height:0pt; text-align:left;padding:5px;"><a href="#" target="_blank">$instagramIcon</a></td>
															<td class="img svg" width="25" style="font-size:0pt; line-height:0pt; text-align:left;padding:5px;"><a href="#" target="_blank">$linkedinIcon</a></td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td class="text-footer1 pb10" style="color:#999999; font-family:Arial,sans-serif; font-size:14px; line-height:20px; text-align:center; padding-bottom:10px;">$notQualifyDocument</td>
											</tr>
											<tr>
												<td class="text-footer2" style="color:#999999; font-family:Arial,sans-serif; font-size:12px; line-height:26px; text-align:center;">$businessAddress</td>
											</tr>
										</table>
									</td>
								</tr> 
							</table>
							<!-- END Footer -->
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>


STARTEMAIL;

?>