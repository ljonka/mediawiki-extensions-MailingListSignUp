<?php

class MailingListSignUp {
	// Register any render callbacks with the parser
	public static function onParserFirstCallInit( Parser $parser ) {
		// When the parser sees the <sample> tag, it executes renderTagSample (see below)
		$parser->setHook( 'signup', 'MailingListSignUp::renderSignup' );
	}

	// Render <renderSignup>
	public static function renderSignup( $input, array $args, Parser $parser, PPFrame $frame ) {
		//params: config - url, fieldname, field
		$config = ConfigFactory::getDefaultInstance()->makeConfig( 'main' );
		$sMailingListSignUpURL = $config->get("MailingListSignUpURL");
		$aMailingListSignUpParamsAndMapping = $config->get("MailingListSignUpParamsAndMapping");
		$aMailingListSignUpTypesAndMapping = $config->get("MailingListSignUpTypesAndMapping");
		$aMailingListSignUpFarmatsAndMapping = $config->get("MailingListSignUpFormatsAndMapping");
		$sMailingListSignUpMethod = $config->get("MailingListSignUpMethod");
		$sUrl = $sMailingListSignUpURL;
		return "<form class='' action='".$sMailingListSignUpURL."' method='".$sMailingListSignUpMethod."' target='_blank'>"
				. "<input type='email' name='".$aMailingListSignUpParamsAndMapping["mail"]."' placeholder='E-Mail'/>"
				. "<input "
				. "type='hidden' "
				. "name='".$aMailingListSignUpParamsAndMapping["type"]."' "
				. "value='".$aMailingListSignUpTypesAndMapping["subscribe"]."' />"
				. "<input "
				. "type='hidden' "
				. "name='".$aMailingListSignUpParamsAndMapping["list"]."' "
				. "value='".$args["mailingliste"]."' />"
				. "<input "
				. "type='hidden' "
				. "name='".$aMailingListSignUpParamsAndMapping["format"]."' "
				. "value='".$aMailingListSignUpFarmatsAndMapping["html"]."' />"
				. "<input type='submit' value='In Mailingliste eintragen' name='In Mailingliste eintragen'/>"
				. "</form>";
	}
}
