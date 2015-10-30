<?php

class TwitterAuth
{
  protected $client;

  protected $clientCallback = 'http://local.dev:80/fantasyhashtag/callback.php';

  public function __construct(\Codebird\Codebird $client)
  {
    $this->client = $client;
  }

  public function getAuthUrl()
  {
    $this->requestTokens();
    $this->verifyTokenS();

    return $this->client->oauth_authenticate();
  }

  public function signedIn()
  {
    return isset($_SESSION['user_id']);
  }

  public function signIn()
  {
    if($this->hasCallback())
    {
      $this->verifyTokens();

      $reply = $this->client->oauth_accessToken([
          'oauth_verifier' => $_GET['oauth_verifier']
        ]);

        if($reply->httpstatus === 200)
        {

          $this->storeTokens($reply->oauth_token, $reply->oauth_token_secret);

          $_SESSION['user_id'] = $reply->user_id;

          //Store the user here

          return true;
        }

    }

    return false;
  }

  public function signOut()
  {
    unset($_SESSION['user_id']);
  }

  protected function hasCallback()
  {
    return isset($_GET['oauth_verifier']);
  }

  protected function requestTokens()
  {
    $reply = $this->client->oauth_requestToken(['oauth_callback'=> $this->clientCallback]);

    $this->storeTokens($reply->oauth_token, $reply->oauth_token_secret);
  }

  protected function storeTokens($token, $tokenSecret)
  {
    $_SESSION['oauth_token'] = $token;
    $_SESSION['oauth_token_secret'] = $tokenSecret;
  }

  protected function verifyTokens()
  {
    $this->client->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
  }
}
