<?php
    
    /**
     * Use this class to extends your controllers.
     * Here you can implements your own methods to all of your controllers.
     *
     **/
    class AppController extends Controller {
        private $user;
        
        public function __construct($controller = '', $function = '') {
            parent::__construct($controller, $function);
            $className = substr(get_class(debug_backtrace()[0]['object']), 0, -10);
            $model = $className . 'Model';
            $viewer = $className . 'Viewer';
            
            
            if (class_exists($model))
                eval('$this->model = new ' . $model . '();');
            if (class_exists($viewer))
                eval('$this->viewer = new ' . $viewer . '();');
            
            // Export classes
            $pdf = $className . 'PDF';
            $excel = $className . 'Excel';
            if (!class_exists($pdf))
                $pdf = 'BasePDF';
            if (!class_exists($excel))
                $excel = 'BaseExcel';
            $this->export = new Export($pdf, $excel);
            
            $this->user = isset($_SESSION['user']) ? unserialize($_SESSION['user']) : null;
            
            $investor = $this->model->search('investor', '*', array('name' => _BANK_INVESTOR_NAME));
            if (count($investor) > 0) {
                $investor = $this->model->query2dto($investor, 'investor')[0];
                $balance = $investor->get('initial_capital', true);
                $this->viewer->set('_balance', $balance);
            } else {
                $this->viewer->set('_balance', 'R$0,00');
            }
            
        }
        
        public function logged() {
            return isset($_SESSION['logged']);
        }
        
        static function staticLogged() {
            $logged = false;
            if (isset($_SESSION['logged'])) {
                if (!is_null($_SESSION['logged'])) {
                    $logged = true;
                }
            }
            if (!$logged) {
                $_SESSION['flash']['danger'][] = _LOGIN_NEED;
                Controller::siteIndex();
                die;
            }
        }
    
        /**
         * ####### THIS METHOD SHOULD ONLY BE CALLED ONLY BY AJAX #######
         *
         * Usage:
         * app/assets/js/linkPrevent.js
         *
         * Says if one user has access to something without page refresh
         * @return void
         */
        public function permission(){
            $controller = ucfirst($_GET['controlador']);
            $action = $_GET['funcao'];
            $permission = unserialize($_SESSION['user'])->get('permission');
            $permission = Permission::permissionArray($permission);
            if (in_array(unserialize($_SESSION['user'])->get('id'), unserialize(_MASTERS_ID))) {
                echo 1;
                return;
            }
            if(Permission::hasAccess($permission, $controller, $action)){
                echo 1;
            }else{
                echo 0;
            }
        }
        
    }

?>
