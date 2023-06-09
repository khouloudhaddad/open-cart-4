<?php
namespace Opencart\Admin\Controller\Startup;
class Permission extends \Opencart\System\Engine\Controller {
	public function index(): object|null {
		if (isset($this->request->get['route'])) {
			$pos = strrpos($this->request->get['route'], '.');

			if ($pos === false) {
				$route = $this->request->get['route'];
			} else {
				$route = substr($this->request->get['route'], 0, $pos);
			}

			// We want to ignore some pages from having its permission checked.
			$ignore = [
				'common/dashboard',
				'common/login',
				'common/logout',
				'common/forgotten',
				'common/authorize',
				'common/language',
				'error/not_found',
				'error/permission'
			];

			if (!in_array($route, $ignore) && !$this->user->hasPermission('access', $route)) {
				return new \Opencart\System\Engine\Action('error/permission');
			}
		}

		return null;
	}
}
