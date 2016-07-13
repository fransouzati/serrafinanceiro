<?php

    /**
     * Use this class to extends your controllers.
     * Here you can implements your own methods to all of your controllers.
     *
    **/
    class AppController extends Controller{
        private $user;

        public function __construct(){
            parent::__construct();
            $className = substr(get_class(debug_backtrace()[0]['object']), 0, -10);
            $model = $className.'Model';
            $viewer = $className.'Viewer';


            if(class_exists($model))
                eval('$this->model = new '.$model.'();');
            if(class_exists($viewer))
                eval('$this->viewer = new '.$viewer.'();');

            // Export classes
            $pdf = $className.'PDF';
            $excel = $className.'Excel';
            if(!class_exists($pdf))
                $pdf = 'BasePDF';
            if(!class_exists($excel))
                $excel = 'BaseExcel';
            $this->export = new Export($pdf, $excel);

            $this->user = isset($_SESSION['user']) ? unserialize($_SESSION['user']) : null;

            $investor = $this->model->search('investor', '*', array('name' => _BANK_INVESTOR_NAME));
            if(count($investor) > 0) {
                $investor = $this->model->query2dto($investor, 'investor')[0];
                $balance = $investor->get('initial_capital', true);
                $this->viewer->set('_balance', $balance);
            }else{
                $this->viewer->set('_balance', 'R$0,00');
            }

        }

    	public function logged(){
    		return isset($_SESSION['logged']);
    	}

    	static function staticLogged(){
			$logged = false;
			if(isset($_SESSION['logged'])){
				if(!is_null($_SESSION['logged'])){
					$logged = true;
				}
			}
			if(!$logged){
				$_SESSION['flash']['danger'][] = _LOGIN_NEED;
				Controller::siteIndex();
				die;
			}
    	}

        public function setUser($user){
            $this->user = $user;
        }

        public function user(){
            return $this->user;
        }

        public function model(){
            return $this->model;
        }

    }

?>
