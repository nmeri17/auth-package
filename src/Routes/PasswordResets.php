<?php
	namespace Suphle\Module\Auth\Routes;

	use Suphle\Routing\BaseCollection;

	use Suphle\Response\Format\{Markup, Redirect};

	use Suphle\Auth\Module\Controllers\HandleResets;

	class PasswordResets extends BaseCollection {

		public function _handlingClass ():string {

			return HandleResets::class;
		}
		
		public function SHOW() {
			
			return $this->_get(new Markup("showReset", "password/show-reset-form"));
		}

		public function SUBMIT__MAILh() {
			
			return $this->_post(new Redirect("sendConfirmMail", function () {

				return "resets/mail-success";
			}));
		}
		
		public function MAIL__SUCCESSh() {
			
			return $this->_get(new Markup("showResetSuccess", "password/mail-success"));
		}

		public function CONFIRM__RESETh() {
			
			return $this->_get(new Markup("confirmReset", "password/confirm-reset"));
		}

		public function NEW__PASSWORDh() {
			
			return $this->_post(new Redirect("updatePassword", function () {

				return "/resets/password-updated";
			}));
		}
		
		public function PASSWORD__UPDATEDh() {
			
			return $this->_get(new Markup("updateSuccess", "password/update-success"));
		}
	}
?>