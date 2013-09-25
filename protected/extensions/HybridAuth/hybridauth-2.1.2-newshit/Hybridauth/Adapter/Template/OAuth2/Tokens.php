<?php
/*!
* This file is part of the HybridAuth PHP Library (hybridauth.sourceforge.net | github.com/hybridauth/hybridauth)
*
* This branch contains work in progress toward the next HybridAuth 3 release and may be unstable.
*/

namespace Hybridauth\Adapter\Template\OAuth2;

use Hybridauth\Adapter\Template\OAuth2\TokensInterface;

class Tokens implements TokensInterface
{
	function __construct( $accessToken = null, $refreshToken = null , $accessTokenExpiresIn = null , $accessTokenExpiresAt = null )
	{
		$this->accessToken          = $accessToken;
		$this->refreshToken         = $refreshToken;
		$this->accessTokenExpiresIn = $accessTokenExpiresIn;
		$this->accessTokenExpiresAt = $accessTokenExpiresAt;
	}
}
