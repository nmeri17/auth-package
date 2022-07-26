<?php
	namespace Suphle\Module\Auth\Routes;

	use Suphle\Routing\BaseCollection;

	use Suphle\Response\Format\{Markup, Redirect};

	use Suphle\Module\Auth\Controllers\HandleAuth;

	class BrowserRoutes extends BaseCollection {
		
		public function _prefixCurrent() {
			
			"AUTH";
		}

		public function _handlingClass ():string {

			HandleAuth::class;
		}
		
		public function SHOW__LOGINh() {
			
			$this->_get(new Markup("showLogin", "auth/login-form"));
		}

		public function SUBMIT__LOGINh() {
			
			$this->_post(new Redirect("handleLogin", "/"));
		}

		public function SHOW__REGISTERh() {

			$this->get(new Markup("showRegister", "auth/register-form"));
		}
		
		public function SUBMIT__REGISTERh() {
			
			$this->_post(new Redirect("submitRegister", "auth/check-verify-mail"));
		}
		
		public function CHECK__VERIFY__MAILh() {
			
			$this->_get(new Markup("confirmReset", "password/confirm-reset"));
		}
		
		public function VERIFY__EMAILh() {
			
			$this->_get(new Redirect("verifyEmail", "auth/register-complete"));
		}
		
		public function REGISTER__COMPLETEh() {
			
			$this->_get(new Markup("registrationComplete", "auth/register-complete"));
		}
		
		public function resets() {
			
			$this->_prefixFor(PasswordResets::class);
		}
	}
?>