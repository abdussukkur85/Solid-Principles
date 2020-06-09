<?php
// Dependency Inversion Principle violate
class Authenticator {
    public function authneticate($username, $password, $external = false, $externalService = false) {
        if ($external == true && 'google' == $externalService) {
            $ga = new GoogleAuthenticate();
            $ga->authenticate();
        } else if ($external == true && 'github' == $externalService) {
            $ga = new GithubAuthenticate();
            $ga->authenticate();
        } else {
            $la = new LocalAuthenticate();
            $la->authenticate();
        }
    }
}

// Refactored Code
class Authenticator{
    private $authServiceProvider;
    function __construct(AuthServiceProviderInterface $asp)
    {
        $this->authServiceProvider = $asp;
    }

    function authenticate(){
        $this->asp->authenticate()
    }
}

//Example like
$ga = new GithubAuthenticate();
$auth = new Authenticator($ga);
?>